<?php

namespace App\Filament\Resources\IncomingMails\Pages;

use App\Filament\Resources\IncomingMails\IncomingMailResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditIncomingMail extends EditRecord
{
    protected static string $resource = IncomingMailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
