<?php

namespace App\Filament\Resources\OutgoingMails\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class OutgoingMailsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('mail_category_id.name')
                    ->label('Kategoria')
                    ->getStateUsing(fn ($record) => $record->category->name),
                
                TextColumn::make('reference_number')
                    ->label('Numeru Dokumentus')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('destination')
                    ->label('Destinasaun')
                    ->sortable()
                    ->searchable(),
                
                TextColumn::make('subject')
                    ->label('Assunto')
                    ->sortable()
                    ->searchable(),
            
                TextColumn::make('mail_date')
                    ->label('Data Karta Sai')
                    ->sortable()
                    ->searchable(),
                
                TextColumn::make('attachment')
                    ->label('Dokumentus')
                    ->icon('heroicon-s-document-text')
                    ->iconColor('danger')
                    ->color('primary')
                    ->formatStateUsing(fn () => 'Haree PDF') // Mengubah tulisan path menjadi teks statis
                    ->url(fn ($record) => asset('storage/' . $record->attachment), true) // Klik untuk buka di tab baru
                    ->badge(),
                
                TextColumn::make('description')
                    ->label('Deskripsaun')
                    ->wrap(), 
                    
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
