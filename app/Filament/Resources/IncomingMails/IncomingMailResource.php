<?php

namespace App\Filament\Resources\IncomingMails;

use App\Filament\Resources\IncomingMails\Pages\CreateIncomingMail;
use App\Filament\Resources\IncomingMails\Pages\EditIncomingMail;
use App\Filament\Resources\IncomingMails\Pages\ListIncomingMails;
use App\Filament\Resources\IncomingMails\Schemas\IncomingMailForm;
use App\Filament\Resources\IncomingMails\Tables\IncomingMailsTable;
use App\Models\IncomingMail;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class IncomingMailResource extends Resource
{
    protected static ?string $model = IncomingMail::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return IncomingMailForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return IncomingMailsTable::configure($table);
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
            'index' => ListIncomingMails::route('/'),
            'create' => CreateIncomingMail::route('/create'),
            'edit' => EditIncomingMail::route('/{record}/edit'),
        ];
    }
}
