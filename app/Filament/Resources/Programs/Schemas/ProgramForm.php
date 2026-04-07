<?php

namespace App\Filament\Resources\Programs\Schemas;

use App\Models\ProgramCategory;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ProgramForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('code')
                    ->label('Kode Programa'),

                TextInput::make('program_name')
                    ->label('Naran Programa'),

                Select::make('program_category_id')
                    ->label('Kategoria')    
                    ->options(ProgramCategory::query()->pluck('name', 'id')),

                TextInput::make('sub_category')
                    ->label('Sub-Kategoria'),

                TextInput::make('description')
                    ->label('Deskripasaun'),

                Toggle::make('is_active')
                    ->label('Ativu'),
            ]);
    }
}
