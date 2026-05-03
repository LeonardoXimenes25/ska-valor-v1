<?php

namespace App\Filament\Resources\Modules\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ModulesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Titulu'),

                TextColumn::make('subject')
                    ->label('Materia'),

                TextColumn::make('description')
                    ->label('Deskripsaun'),

                TextColumn::make('file_path')
                    ->label('Dokumentus')
                    ->icon('heroicon-s-document-text')
                    ->iconColor('danger')
                    ->color('primary')
                    ->formatStateUsing(fn () => 'Haree PDF') // Mengubah tulisan path menjadi teks statis
                    ->url(fn ($record) => asset('storage/' . $record->module), true) // Klik untuk buka di tab baru
                    ->badge(), 

                TextColumn::make('programCategory.name')
                    ->label('Kategoria'),
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
