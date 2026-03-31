<?php

namespace App\Filament\Resources\OutgoingMails\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
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
    // 1. Logika Teks
    ->formatStateUsing(fn ($state) => $state ? 'Haree PDF' : 'La iha file')
    
    // 2. Logika Badge & Warna
    ->badge()
    ->color(fn ($state) => $state ? 'primary' : 'gray')
    
    // 3. Logika Icon
    ->icon(fn ($state) => $state ? 'heroicon-s-document-text' : 'heroicon-o-x-circle')
    ->iconColor(fn ($state) => $state ? 'danger' : 'gray')
    
    // 4. LOGIKA URL (Kunci Perbaikan)
    // Jika $state null, kita return null agar tidak menjadi link
    ->url(function ($state) {
        if (!$state) {
            return null; 
        }
        return asset('storage/' . $state);
    }, shouldOpenInNewTab: true)
    
    // 5. Mencegah Hover Effect jika tidak ada file
    ->extraAttributes(fn ($state) => [
        'style' => $state ? '' : 'pointer-events: none; cursor: default;',
    ]),

                TextColumn::make('description')
                    ->label('Deskripsaun')
                    ->placeholder('La iha deskripsaun')
                    ->color(fn ($state) => $state ? 'default' : 'gray')
                    // Gunakan extraAttributes untuk menambahkan class CSS Tailwind
                    ->extraAttributes(fn ($state) => [
                        'class' => $state ? '' : 'italic text-gray-400',
                    ])
                    ->wrap()
                    ->limit(50),

                    
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
                TrashedFilter::make(),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(), // Ini akan melakukan Soft Delete
                RestoreAction::make(), // Memulihkan data
                ForceDeleteAction::make(), // Hapus permanen
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                ]),
            ]);
    }
}
