<?php

namespace App\Filament\Resources\OutgoingMails\Pages;

use App\Filament\Resources\OutgoingMails\OutgoingMailResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditOutgoingMail extends EditRecord
{
    protected static string $resource = OutgoingMailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
