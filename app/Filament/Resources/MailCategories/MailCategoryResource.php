<?php

namespace App\Filament\Resources\MailCategories;

use App\Filament\Resources\MailCategories\Pages\CreateMailCategory;
use App\Filament\Resources\MailCategories\Pages\EditMailCategory;
use App\Filament\Resources\MailCategories\Pages\ListMailCategories;
use App\Filament\Resources\MailCategories\Schemas\MailCategoryForm;
use App\Filament\Resources\MailCategories\Tables\MailCategoriesTable;
use App\Models\MailCategory;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class MailCategoryResource extends Resource
{
    protected static ?string $model = MailCategory::class;

    protected static ?string $navigationLabel = 'Kategoria';
    protected static string | UnitEnum | null $navigationGroup = 'Manajementu Karta';
    
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return MailCategoryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MailCategoriesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListMailCategories::route('/'),
            'create' => CreateMailCategory::route('/create'),
            'edit' => EditMailCategory::route('/{record}/edit'),
        ];
    }
}
