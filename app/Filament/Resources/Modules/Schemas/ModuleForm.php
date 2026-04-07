<?php

namespace App\Filament\Resources\Modules\Schemas;

use App\Models\ProgramCategory;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ModuleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Título'),
                TextInput::make('subject')
                    ->label('Assunto'),
                TextInput::make('description')
                    ->label('Descrição'),
                Select::make('program_category_id')
                    ->label('Categoria')    
                    ->options(ProgramCategory::query()->pluck('name', 'id')),
                FileUpload::make('file_path'),
            ]);
    }
}
