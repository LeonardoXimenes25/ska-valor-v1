<?php

namespace App\Filament\Resources\ProgramCategories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ProgramCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name'),
                TextInput::make('description'),
            ]);
    }
}
