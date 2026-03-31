<?php

namespace App\Filament\Resources\OutgoingMails\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class OutgoingMailForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('mail_category_id')
                    ->label('Kategoria')
                    ->options(fn () => \App\Models\MailCategory::pluck('name', 'id')),
                
                TextInput::make('reference_number')
                    ->label('Numeru Referensia')
                    ->unique(ignoreRecord: true)
                    ->required(),
                
                TextInput::make('destination')
                    ->label('Destinasaun') 
                    ->required(),   

                TextInput::make('subject')
                    ->label('Assunto')
                    ->required(),

                DatePicker::make('mail_date')
                    ->label('Data Karta')
                    ->required(),

                TextInput::make('description')
                    ->label('Deskripsaun'),
                
                FileUpload::make('attachment')
                    ->disk('public')
                    ->directory('attachments')
                    ->label('Attachment'),

                Select::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'published' => 'published',
                        'archieved' => 'Archieved',
                    ])
                    ->label('Observasaun')
                    ->required(),     
            ]);
    }
}
