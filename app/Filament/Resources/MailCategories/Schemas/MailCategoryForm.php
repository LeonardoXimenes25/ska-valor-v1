<?php

namespace App\Filament\Resources\MailCategories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class MailCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('code')
                    ->label('Kodigu')
                    ->required()
                    ->unique(ignoreRecord: true),

                TextInput::make('name')
                    ->label('Naran')
                    ->required(),

                TextInput::make('description')
                    ->label('Deskripsaun'),
            ]);
    }
}
