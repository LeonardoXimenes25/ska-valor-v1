<?php

namespace App\Filament\Resources\IncomingMails\Pages;

use App\Filament\Resources\IncomingMails\IncomingMailResource;
use Filament\Resources\Pages\CreateRecord;

class CreateIncomingMail extends CreateRecord
{
    protected static string $resource = IncomingMailResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
