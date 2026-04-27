<?php

namespace App\Filament\Resources\Articles\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ArticleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                ->label('Titulu')
                ->reactive()
                ->afterStateUpdated(fn ($state, callable $set) => 
                    $set('slug', Str::slug($state))),

                TextInput::make('slug')
                    ->label('Slug')
                    ->disabled()
                    ->dehydrated()
                    ->required()
                    ->unique(ignoreRecord: true),

                TextInput::make('excerpt'),

                RichEditor::make('content')
                    ->label('Konteudu'),

                FileUpload::make('image')
                    ->disk('public')
                    ->directory('images')
                    ->label('Imajen')
                    ->image(),

                Select::make('status')
                    ->options(
                        [
                            'draft' => 'Draft',
                            'published' => 'Published',
                            'archieved' => 'Archieved',
                        ]
                    ),

                DatePicker::make('published_at')
                    ->label('Data Publika'),

                TextInput::make('views'),

                Select::make('category_id')
                    ->label('Kategoria')
                    ->options(fn () => \App\Models\ArticleCategory::pluck('name', 'id')), 
            ]);
    }
}
