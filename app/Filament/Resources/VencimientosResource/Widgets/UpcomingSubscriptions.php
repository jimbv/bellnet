<?php

namespace App\Filament\Widgets;

use App\Models\Subscription;
use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon; 
use Filament\Forms;
use App\Services\SubscriptionPaymentService;

class UpcomingSubscriptions extends BaseWidget
{

    protected int|string|array $columnSpan = 'full';

    protected static ?string $heading = 'Próximos vencimientos';

    protected static ?int $sort = 1; // orden en el dashboard

    protected function getTableQuery(): Builder
    {
        return Subscription::query()
            ->where('status', 'active')
            ->whereDate(
                'next_billing_date',
                '<=',
                Carbon::now()->addDays(15)
            )
            ->orderBy('next_billing_date');
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('client.name')
                ->label('Cliente')
                ->searchable(),

            Tables\Columns\TextColumn::make('service.name')
                ->label('Servicio'),

            Tables\Columns\TextColumn::make('next_billing_date')
                ->label('Vence')
                ->date()
                ->sortable(),

            Tables\Columns\TextColumn::make('agreed_price')
                ->money('ARS'),

            Tables\Columns\BadgeColumn::make('status')
                ->colors([
                    'success' => 'active',
                    'warning' => 'suspended',
                    'danger'  => 'cancelled',
                ]),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Tables\Actions\Action::make('pay')
                ->label('Pagar')
                ->icon('heroicon-o-banknotes')
                ->color('success')
                ->visible(fn($record) => $record->status === 'active')
                ->form([
                    Forms\Components\DatePicker::make('paid_at')
                        ->label('Fecha de pago')
                        ->default(now())
                        ->required(),

                    Forms\Components\TextInput::make('amount')
                        ->label('Monto')
                        ->numeric()
                        ->default(fn($record) => $record->agreed_price)
                        ->required(),

                    Forms\Components\Select::make('method')
                        ->label('Método de pago')
                        ->options([
                            'cash' => 'Efectivo',
                            'transfer' => 'Transferencia',
                            'card' => 'Tarjeta',
                        ])
                        ->required(),

                    Forms\Components\Textarea::make('notes')
                        ->label('Observaciones'),
                ])
                ->action(function ($record, array $data) {
                    app(SubscriptionPaymentService::class)
                        ->pay($record, $data);
                })
                ->successNotificationTitle('Pago registrado correctamente'),
        ];
    }
}
