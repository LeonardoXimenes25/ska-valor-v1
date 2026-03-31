<?php

namespace App\Filament\Resources\OutgoingMails;

use App\Filament\Resources\OutgoingMails\Pages\CreateOutgoingMail;
use App\Filament\Resources\OutgoingMails\Pages\EditOutgoingMail;
use App\Filament\Resources\OutgoingMails\Pages\ListOutgoingMails;
use App\Filament\Resources\OutgoingMails\Schemas\OutgoingMailForm;
use App\Filament\Resources\OutgoingMails\Tables\OutgoingMailsTable;
use App\Models\OutgoingMail;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class OutgoingMailResource extends Resource
{
    protected static ?string $model = OutgoingMail::class;

    protected static ?string $navigationLabel = 'Karta Sai';
    protected static string | UnitEnum | null $navigationGroup = 'Manajementu Karta';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return OutgoingMailForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return OutgoingMailsTable::configure($table);
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
            'index' => ListOutgoingMails::route('/'),
            'create' => CreateOutgoingMail::route('/create'),
            'edit' => EditOutgoingMail::route('/{record}/edit'),
        ];
    }
}
