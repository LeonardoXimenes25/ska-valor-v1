<?php

namespace App\Filament\Resources\MailCategories\Schemas;

use App\Models\MailCategory;
use App\Services\CodeGeneratorService;
use Filament\Forms\Components\Textarea;
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
                    ->default(fn () => CodeGeneratorService::generate(MailCategory::class, 'code', 'LPS'))
                    ->autocomplete(false)
                    ->required()
                    ->unique(ignoreRecord: true),

                TextInput::make('name')
                    ->autocomplete(false)
                    ->label('Naran')
                    ->required(),

                Textarea::make('description')
                    ->rows(10)
                    ->cols(20),
            ]);
    }
}
