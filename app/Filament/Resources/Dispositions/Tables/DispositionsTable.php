<?php

namespace App\Filament\Resources\Dispositions\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class DispositionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('Nu')
                    ->sortable(),

                TextColumn::make('incomingMail.subject')
                    ->label('Assuntu Karta Tama'),

                TextColumn::make('disposition_to')
                    ->label('Dispozisaun To'),

                TextColumn::make('instructions')
                    ->label('Instrusaun')
                    ->wrap(),

                TextColumn::make('due_date')
                    ->label('Data Limite')
                    ->date(),

                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'completed' => 'success',
                        'processed' => 'primary',
                        default => 'secondary',
                    })
                    ->label('Observasaun'),
            ])
            ->emptyStateHeading('No posts yet')
            ->emptyStateDescription('Once you write your first post, it will appear here.')
            ->emptyStateIcon('heroicon-o-bookmark')
            ->emptyStateActions([
            Action::make('create')
                ->label('Create post')
                ->url(fn (): string => route('filament.admin.resources.dispositions.create'))
                ->icon('heroicon-m-plus')
                ->button(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
