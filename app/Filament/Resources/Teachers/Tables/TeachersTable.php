<?php

namespace App\Filament\Resources\Teachers\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TeachersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('teacher_id'),
                
                TextColumn::make('name')
                    ->label('Naran')
                    ->sortable()
                    ->searchable(),
                
                TextColumn::make('sex')
                    ->badge()
                    ->label('Sexo')
                        ->color(fn (string $state): string => match ($state) {
                            'm' => 'danger',
                            'f' => 'primary',                        })
                    ->sortable(),
                
                TextColumn::make('address')
                    ->label('Hela-Fatin')
                    ->wrap(),
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
