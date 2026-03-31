<?php

namespace App\Filament\Resources\IncomingMails\Tables;

use App\Filament\Exports\IncomingMailExporter;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ExportAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class IncomingMailsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('Nu')
                    ->sortable(),

                TextColumn::make('sender')
                    ->label('Natureza Dokumentus'),

                TextColumn::make('reference_number')
                    ->label('Numeru Dokumentus'),
                
                TextColumn::make('subject')
                    ->label('Sintexe Assuntu'),
                
                TextColumn::make('mail_date')
                    ->label('Data Karta')
                    ->date(),
                
                TextColumn::make('received_date')
                    ->label('Data Resepsaun')
                    ->date(),

                TextColumn::make('mail_category_id')
                    ->label('Kategoria')
                    ->getStateUsing(fn ($record) => $record->category->name),
                
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
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->headerActions([
            ExportAction::make()
                ->exporter(IncomingMailExporter::class),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ExportAction::make()
                        ->exporter(IncomingMailExporter::class)
                ]),
            ]);
    }
}
