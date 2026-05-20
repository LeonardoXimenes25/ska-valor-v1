<?php

namespace App\Filament\Resources\Students\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\File;

class StudentForm
{   
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Personal Information')
                    ->description('Prevent abuse by limiting the number of requests per period')
                    ->schema([
                        TextInput::make('student_id')
                            ->label('ID Estudante')
                            ->required()
                            ->unique(ignoreRecord: true),

                        TextInput::make('name')
                            ->label('Naran Kompletu')
                            ->placeholder('Melsior Miranda Branco')
                            ->autocomplete(false)
                            ->required(),

                        Select::make('sex')
                            ->label('Sexu')
                            ->required()
                            ->options([
                                'm' => 'Mane',
                                'f' => 'Feto',
                            ]),

                        DatePicker::make('date_of_birth')
                            ->seconds(false)
                            ->format('d/m/Y')
                            ->label('Data Moris')
                            ->required(),

                        TextInput::make('place_of_birth')
                            ->label('Fatin Moris')
                            ->placeholder('Lospalos')
                            ->required(),
                        
                        TextInput::make('address')
                            ->label('Hela-Fatin')
                            ->placeholder('Vila Antiga')
                            ->required(),

                        TextInput::make('phone_number')
                            ->label('Telemovel')
                            ->placeholder('+670 77 123 456')
                            ->nullable(), 
                        ])->columns(2),

                Section::make('Location Information')
                    ->description('Prevent abuse by limiting the number of requests per period')
                    ->schema([
                        
                        Select::make('municipality')
                            ->label('Municipio')
                            ->options(function () {
                                // Mengambil data dari file JSON
                                $path = resource_path('data/timor_leste.json');
                                $locations = json_decode(File::get($path), true);
                                
                                $municipalities = array_keys($locations);
                                return array_combine($municipalities, $municipalities);
                            })
                            ->reactive()
                            ->afterStateUpdated(fn ($set) => [
                                $set('administrative_post', null),
                                $set('tribe', null),
                                $set('village', null),
                            ])
                            ->searchable(),
        
                        Select::make('administrative_post')
                            ->label('Postu Administrativu')
                            ->options(function ($get) {
                                $municipality = $get('municipality');
                                $path = resource_path('data/timor_leste.json');
                                $locations = json_decode(File::get($path), true);
        
                                if (!$municipality || !isset($locations[$municipality])) {
                                    return [];
                                }
        
                                $posts = array_keys($locations[$municipality]);
                                return array_combine($posts, $posts);
                            })
                            ->reactive()
                            ->afterStateUpdated(fn ($set) => [
                                $set('tribe', null),
                                $set('village', null),
                            ])
                            ->disabled(fn ($get) => !$get('municipality'))
                            ->searchable(),
        
                        Select::make('tribe')
                            ->label('Suku')
                            ->options(function ($get) {
                                $municipality = $get('municipality');
                                $post = $get('administrative_post');
                                $path = resource_path('data/timor_leste.json');
                                $locations = json_decode(File::get($path), true);
        
                                if (!$municipality || !$post || !isset($locations[$municipality][$post])) {
                                    return [];
                                }
        
                                $sukus = array_keys($locations[$municipality][$post]);
                                return array_combine($sukus, $sukus);
                            })
                            ->reactive()
                            ->afterStateUpdated(fn ($set) => $set('village', null))
                            ->disabled(fn ($get) => !$get('administrative_post'))
                            ->searchable(),
        
                        Select::make('village')
                            ->label('Aldeia')
                            ->options(function ($get) {
                                $municipality = $get('municipality');
                                $post = $get('administrative_post');
                                $suku = $get('tribe');
                                $path = resource_path('data/timor_leste.json');
                                $locations = json_decode(File::get($path), true);
        
                                if (!$municipality || !$post || !$suku || !isset($locations[$municipality][$post][$suku])) {
                                    return [];
                                }
        
                                $aldeias = $locations[$municipality][$post][$suku];
                                return array_combine($aldeias, $aldeias);
                            })
                            ->disabled(fn ($get) => !$get('tribe'))
                            ->searchable(),
                    ])->columns(2),

                Section::make('Parents Information')
                        ->description('Prevent abuse by limiting the number of requests per period')
                        ->schema([
                                
                            TextInput::make('parent_name')
                                ->label('Naran Pai/Mae')
                                ->nullable(), 
            
                            TextInput::make('parent_phone')
                                ->label('Telemovel Pai/Mae') 
                                ->tel()
                                ->nullable(),
                        ])->columns(2),
                

            Section::make('Academic information')
                        ->description('Prevent abuse by limiting the number of requests per period')
                        ->schema([
                            Select::make('status')
                                ->label('Status')
                                ->required()
                                ->options([
                                    'active' => 'Active',
                                    'dropout' => 'Dropout',
                                    'alumni' => 'Alumni',
                                ]), 
            
                            Select::make('program_category_id')
                                ->label('Kategoria Programa')
                                ->relationship('programCategory', 'name')
                                ->required(),
                                
                            DatePicker::make('enrollment_date')
                                ->label('Data Matricula')
                                ->nullable(),
            
                            FileUpload::make('image')
                                ->label('Imajen')
                                ->image()
                                ->imageEditor()
                                ->imageEditorAspectRatioOptions([
                                    '16:9',
                                    '4:3',
                                    '1:1',
                                ]),
                        ])->columns(2),
            ])->columns(1);
    }
}
