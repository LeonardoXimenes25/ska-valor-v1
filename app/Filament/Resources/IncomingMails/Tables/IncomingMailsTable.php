<?php

namespace App\Filament\Resources\IncomingMails\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class IncomingMailsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('mail_category_id')
                    ->label('Category')
                    ->getStateUsing(fn ($record) => $record->category->name),
                TextColumn::make('reference_number')
                    ->label('Reference Number'),
                TextColumn::make('sender')
                    ->label('Sender'),
                TextColumn::make('subject')
                    ->label('Subject'),
                TextColumn::make('mail_date')
                    ->label('Mail Date')
                    ->date(),
                TextColumn::make('received_date')
                    ->label('Received Date')
                    ->date(),  
                TextColumn::make('attachment')
                    ->label('Attachment URL'),
                TextColumn::make('description')
                    ->label('Description')
                    ->wrap(),   
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
