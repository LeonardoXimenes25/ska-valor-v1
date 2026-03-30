<?php

namespace App\Filament\Resources\Teachers\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TeacherForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('teacher_id'),
                TextInput::make('name'),
                Select::make('sex')
                    ->options([
                        'm' => 'Mane',
                        'f' => 'Feto,'
                    ]),
                TextInput::make('address'),
            ]);
    }
}
