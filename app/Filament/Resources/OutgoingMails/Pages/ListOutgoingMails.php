<?php

namespace App\Filament\Resources\OutgoingMails\Pages;

use App\Filament\Resources\OutgoingMails\OutgoingMailResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListOutgoingMails extends ListRecords
{
    protected static string $resource = OutgoingMailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
