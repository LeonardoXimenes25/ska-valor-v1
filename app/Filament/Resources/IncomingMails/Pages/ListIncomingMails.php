<?php

namespace App\Filament\Resources\IncomingMails\Pages;

use App\Filament\Resources\IncomingMails\IncomingMailResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListIncomingMails extends ListRecords
{
    protected static string $resource = IncomingMailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
