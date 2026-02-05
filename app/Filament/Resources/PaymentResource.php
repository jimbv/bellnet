<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaymentResource\Pages;
use App\Filament\Resources\PaymentResource\RelationManagers;
use App\Models\Payment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PaymentResource extends Resource
{
    protected static ?string $model = Payment::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('paid_at')
                    ->label('Fecha')
                    ->date()
                    ->sortable(),

                Tables\Columns\TextColumn::make('subscription.client.name')
                    ->label('Cliente')
                    ->searchable(),

                Tables\Columns\TextColumn::make('subscription.service.name')
                    ->label('Servicio'),

                Tables\Columns\TextColumn::make('amount')
                    ->label('Monto')
                    ->money('ARS', true)
                    ->sortable(),

                Tables\Columns\BadgeColumn::make('method')
                    ->label('Método')
                    ->colors([
                        'success' => 'cash',
                        'info' => 'transfer',
                        'warning' => 'card',
                    ])
                    ->formatStateUsing(fn($state) => match ($state) {
                        'cash' => 'Efectivo',
                        'transfer' => 'Transferencia',
                        'card' => 'Tarjeta',
                        default => $state,
                    }),

                Tables\Columns\TextColumn::make('notes')
                    ->label('Observaciones')
                    ->limit(30)
                    ->toggleable(),
            ])
            ->defaultSort('paid_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('client')
                    ->label('Cliente')
                    ->relationship('subscription.client', 'name')
                    ->searchable()
                    ->preload(),

                Tables\Filters\SelectFilter::make('service')
                    ->label('Servicio')
                    ->relationship('subscription.service', 'name')
                    ->searchable()
                    ->preload(),

                Tables\Filters\SelectFilter::make('method')
                    ->label('Método de pago')
                    ->options([
                        'cash' => 'Efectivo',
                        'transfer' => 'Transferencia',
                        'card' => 'Tarjeta',
                    ]),

                Tables\Filters\Filter::make('mes_actual')
                    ->label('Mes actual')
                    ->query(
                        fn($query) =>
                        $query->whereMonth('paid_at', now()->month)
                            ->whereYear('paid_at', now()->year)
                    ),
            ])
        ;
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
            'index' => Pages\ListPayments::route('/'),
            'create' => Pages\CreatePayment::route('/create'),
            'edit' => Pages\EditPayment::route('/{record}/edit'),
        ];
    }


    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->with([
                'subscription.client',
                'subscription.service',
            ]);
    }
}
