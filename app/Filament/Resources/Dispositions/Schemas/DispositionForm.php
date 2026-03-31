<?php

namespace App\Filament\Resources\Dispositions\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class DispositionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('incoming_mail_id')
                    ->label('Karta Tama')
                    ->relationship('incomingMail', 'subject')
                    ->required(),
                
                TextInput::make('disposition_to')
                    ->label('Dispozisaun To')
                    ->required(),
                
                TextInput::make('instructions')
                    ->label('Instrusaun')
                    ->required(),
                
                DatePicker::make('due_date')
                    ->label('Data Limite')
                    ->required(),

                Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'completed' => 'Completed',
                        'processed' => 'Processed',
                    ])
                    ->label('Observasaun')
                    ->required(),
            ]);
    }
}
