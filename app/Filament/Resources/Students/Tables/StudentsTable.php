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

                // lokasi
                TextColumn::make('address')->label('Hela-Fatin')->searchable()->sortable(),
                TextColumn::make('municipality')->label('Munisipiu')->searchable()->sortable(),
                TextColumn::make('administrative_post')->label('Posto Administrativu')->searchable()->sortable(),
                TextColumn::make('tribe')->label('Suku')->searchable()->sortable(),
                TextColumn::make('village')->label('Aldeia')->searchable()->sortable(),

                TextColumn::make('phone_number')
                    ->formatStateUsing(fn (?string $state): string => $state ?: 'La iha Nu. Kontaktu')
                    ->label('Telemovel')
                    ->searchable()
                    ->sortable(),

                // Informasi Orang Tua/Wali
                TextColumn::make('parent_name')->label('Naran Pai/Mae')->searchable()->sortable(),
                TextColumn::make('parent_phone')->label('Telemovel Pai/Mae')->searchable()->sortable(),
                TextColumn::make('status')->label('Status')->searchable()->sortable(),
                TextColumn::make('is_active')->label('Ativu')->searchable()->sortable(),
                TextColumn::make('program_category.name')->label('Kategoria Programa')->searchable()->sortable(),
                TextColumn::make('enrollment_date')->label('Data Matricula')->searchable()->sortable(),
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
