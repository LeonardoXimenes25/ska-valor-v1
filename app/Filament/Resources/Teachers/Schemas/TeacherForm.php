<?php

namespace App\Filament\Resources\Teachers\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

class TeacherForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Personal Information')
                    ->description('Prevent abuse by limiting the number of requests per period')
                    ->schema([
                        TextInput::make('teacher_code')
                            ->label('Kodigu')
                            ->required(),

                        TextInput::make('full_name')
                            ->label('Naran Kompletu')
                            ->placeholder('Prenxe ita nia naran')
                            ->required(),

                        Select::make('sex')
                            ->label('Sexo')
                            ->placeholder('Hili opsaun')
                            ->options([
                                'm' => 'Mane',
                                'f' => 'Feto'
                            ]),

                        TextInput::make('address')
                            ->label('Hela-Fatin')
                            ->placeholder('Prenxe ita nia hela-fatin'),

                        TextInput::make('phone')
                            ->label('Nu. Telemovel')
                            ->formatStateUsing(fn ($state) => $state ?? 'N/A'),

                        Textarea::make('bio')
                            ->label('Bio')
                            ->formatStateUsing(fn ($state) => $state ?? 'N/A'),

                        FileUpload::make('image')
                            ->label('Imajen')
                            ->formatStateUsing(fn ($state) => $state ?? 'N/A')
                            ->image()
                            ->imageEditor(),
                    ])->columns(2),

                    // Employment Information
                    Section::make('Employment Information')
                        ->schema([
                            Select::make('status')
                                ->label('Status')
                                ->options([
                                            'active' => 'Active',
                                            'resigned' => 'Resigned',
                                            'fired' => 'Fired',
                                            'retired' => 'Retired',
                                            'terminated' => 'Terminated',
                                            'on_leave' => 'On Leave',
                                        ]),

                            TextInput::make('status_note')
                                ->label('Status Note')
                                ->formatStateUsing(fn ($state) => $state ?? 'N/A'),

                            TextInput::make('join_date')
                                ->label('Join Date')
                                ->formatStateUsing(fn ($state) => $state ?? 'N/A'),
                        ])->columns(2),

                    // Education I nformation
                    Section::make('Education Information')
                        ->schema([
                            TextInput::make('institution_name')
                            ->label('Universidade/Institutu'),

                            TextInput::make('major')
                                ->label('Area'),

                            TextInput::make('degree_level')
                                ->label('Nivel Edukasaun'),

                            TextInput::make('graduation_year')
                                ->label('Tinan Graduasaun'),
                        ])->columns(2),
            ])->columns(1);
    }
}
