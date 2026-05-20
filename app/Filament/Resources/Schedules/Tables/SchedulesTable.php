<?php

namespace App\Filament\Resources\Schedules\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SchedulesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('program_id.program_name')->label('Naran programa'),
                TextColumn::make('teacher_id.full_name')->label('Naran formador'),
                TextColumn::make('learning_day')->label('Loron aprende'),
                TextColumn::make('start_time')->label('Oras hahu'),
                TextColumn::make('end_time')->label('Oras remata'),
                TextColumn::make('start_date')->label('Data hahu'),
                TextColumn::make('end_date')->label('Data remata'),
                TextColumn::make('quota')->label('Kuota'),
                TextColumn::make('status')->label('Observasaun'),
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
