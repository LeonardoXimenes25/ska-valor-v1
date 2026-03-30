<?php

namespace App\Filament\Resources\Students\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class StudentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('student_id')->label('ID Estudante')->searchable()->sortable(),
                TextColumn::make('name')->label('Naran')->searchable()->sortable(),
                TextColumn::make('sex')->label('Sexu')->searchable()->sortable(),
                TextColumn::make('date_of_birth')->label('Data Moris')->searchable()->sortable(),
                TextColumn::make('place_of_birth')->label('Fatin Moris')->searchable()->sortable(),
                TextColumn::make('address')->label('Hela-Fatin')->searchable()->sortable(),
                ImageColumn::make('image')
                    ->label('Imajen')
                    ->circular(),
            ])
            ->stackedOnMobile()
            ->filters([
                //
            ])
            ->emptyStateHeading('No posts yet')
            ->emptyStateDescription('Once you write your first post, it will appear here.')
            ->emptyStateIcon('heroicon-o-bookmark')

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
