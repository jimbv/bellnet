<?php

namespace App\Filament\Widgets;

use App\Models\Subscription;
use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

class UpcomingSubscriptions extends BaseWidget
{
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
}
