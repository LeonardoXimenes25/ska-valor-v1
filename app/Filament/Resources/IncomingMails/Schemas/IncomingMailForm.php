<?php

namespace App\Filament\Resources\IncomingMails\Schemas;

use App\Models\MailCategory;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class IncomingMailForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('mail_category_id')
                    ->label('Mail Category')
                    ->options(MailCategory::query()->pluck('name', 'id'))
                    ->searchable(),

                TextInput::make('reference_number')
                    ->label('Numeru Dokumentus')
                    ->required(),

                TextInput::make('sender')
                    ->label('Natureza de Dokumentus')
                    ->required(),

                TextInput::make('subject')
                    ->label('Sintase Assuntu')
                    ->required(),
                    
                DatePicker::make('mail_date')
                    ->label('Data Karta')
                    ->date()
                    ->required(),

                DatePicker::make('received_date')
                    ->label('Data Resepsaun')
                    ->date()
                    ->required(),

                FileUpload::make('attachment')
                    ->disk('public')
                    ->directory('attachments')
                    ->label('Attachment'),

                Textarea::make('description')
                    ->label('Deskripsaun')
                    ->rows(10)
                    ->cols(20)
            ]);
    }
}
