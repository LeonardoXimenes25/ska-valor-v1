<?php

namespace App\Filament\Resources\Teachers\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TeachersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('teacher_code')
                    ->label('Kodigu'),

                ImageColumn::make('image')
                    ->label('Imajen')
                    ->circular(),
                
                TextColumn::make('full_name')
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
                
                TextColumn::make('phone')
                    ->label('Nu. Telemovel')
                    ->wrap(),

                TextColumn::make('bio')
                    ->label('Bio')
                    ->wrap(),

                TextColumn::make('institution_name')
                    ->label('Universidade/Instituisaun'),

                TextColumn::make('major')
                    ->label('Major'),

                TextColumn::make('degree_level')
                    ->label('Nivel Edukasaun'),

                TextColumn::make('graduation_year')
                    ->label('Tinan Graduasaun')
                    ->wrap(),
                
                TextColumn::make('is_active')
                    ->label('Observasaun')
                    ->badge()
                    ->formatStateUsing(fn ($state) => $state ? 'Active' : 'Tidak Active')
                    ->color(fn ($state) => $state ? 'success' : 'danger'),

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
