<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubscriptionResource\Pages;
use App\Filament\Resources\SubscriptionResource\RelationManagers;
use App\Models\Subscription;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope; 
use Filament\Tables\Actions\Action;
use App\Services\SubscriptionPaymentService;

class SubscriptionResource extends Resource
{
    protected static ?string $model = Subscription::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('client_id')
                    ->relationship('client', 'name')
                    ->searchable()
                    ->required(),

                Forms\Components\Select::make('service_id')
                    ->relationship('service', 'name')
                    ->searchable()
                    ->required(),

                Forms\Components\DatePicker::make('start_date')
                    ->required(),

                Forms\Components\DatePicker::make('next_billing_date')
                    ->required(),

                Forms\Components\DatePicker::make('end_date'),

                Forms\Components\TextInput::make('agreed_price')
                    ->numeric()
                    ->prefix('$')
                    ->required(),

                Forms\Components\Select::make('status')
                    ->options([
                        'active'    => 'Activa',
                        'suspended' => 'Suspendida',
                        'cancelled' => 'Cancelada',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('client.name')
                    ->label('Cliente')
                    ->searchable(),

                Tables\Columns\TextColumn::make('service.name')
                    ->label('Servicio'),

                Tables\Columns\TextColumn::make('agreed_price')
                    ->label('Precio acordado')
                    ->money('ARS'),

                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'success' => 'active',
                        'warning' => 'suspended',
                        'danger'  => 'cancelled',
                    ]),

                Tables\Columns\TextColumn::make('next_billing_date')
                    ->label('Próxima fecha de facturación')
                    ->date()
                    ->color(
                        fn($record) =>
                        $record->next_billing_date->isToday() ||
                            $record->next_billing_date->isPast()
                            ? 'danger'
                            : ($record->next_billing_date->diffInDays(now()) <= 5
                                ? 'warning'
                                : 'success')
                    )
            ])
            ->actions([
            Action::make('pay')
                ->label('Pagar')
                ->icon('heroicon-o-banknotes')
                ->color('success')
                ->visible(fn ($record) => $record->status === 'active')
                ->form([
                    Forms\Components\DatePicker::make('paid_at')
                        ->label('Fecha de pago')
                        ->default(now())
                        ->required(),

                    Forms\Components\TextInput::make('amount')
                        ->label('Monto')
                        ->numeric()
                        ->default(fn ($record) => $record->agreed_price)
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
        
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSubscriptions::route('/'),
            'create' => Pages\CreateSubscription::route('/create'),
            'edit' => Pages\EditSubscription::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->with(['client', 'service']);
    }
}
