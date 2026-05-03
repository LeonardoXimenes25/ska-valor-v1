<?php

namespace App\Filament\Resources\Programs\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProgramsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('code')
                    ->label('Kode Programa')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('program_name')
                    ->label('Naran Programa')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('programCategory.name')
                    ->label('Kategoria')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('sub_category')
                    ->label('Sub-Kategoria')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('description')
                    ->label('Deskripasaun'),
                TextColumn::make('is_active')
                    ->label('Observasaun')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
