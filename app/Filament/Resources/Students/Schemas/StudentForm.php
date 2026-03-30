<?php

namespace App\Filament\Resources\Students\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class StudentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('student_id')
                    ->label('ID Estudante')
                    ->required()
                    ->unique(ignoreRecord: true),

                TextInput::make('name')
                    ->label('Naran')
                    ->autocomplete(false)
                    ->required(),

                Select::make('sex')
                    ->label('Sexu')
                    ->required()
                    ->options([
                        'M' => 'Male',
                        'F' => 'Female',
                    ]),

                DatePicker::make('date_of_birth')
                    ->label('Data Moris')
                    ->required(),

                TextInput::make('place_of_birth')
                    ->label('Fatin Moris')
                    ->required(),

                TextInput::make('address')
                    ->label('Hela-Fatin')
                    ->required(),

                FileUpload::make('image')
                    ->label('Imajen')
                    ->image()
                    ->imageEditor()
                    ->imageEditorAspectRatioOptions([
                        '16:9',
                        '4:3',
                        '1:1',
                    ]),
            ]);
    }
}
