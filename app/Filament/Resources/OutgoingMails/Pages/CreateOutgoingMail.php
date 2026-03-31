<?php

namespace App\Filament\Resources\OutgoingMails\Pages;

use App\Filament\Resources\OutgoingMails\OutgoingMailResource;
use Filament\Resources\Pages\CreateRecord;

class CreateOutgoingMail extends CreateRecord
{
    protected static string $resource = OutgoingMailResource::class;
}
