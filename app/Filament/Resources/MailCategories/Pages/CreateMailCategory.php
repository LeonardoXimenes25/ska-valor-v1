<?php

namespace App\Filament\Resources\MailCategories\Pages;

use App\Filament\Resources\MailCategories\MailCategoryResource;
use Filament\Resources\Pages\CreateRecord;

class CreateMailCategory extends CreateRecord
{
    protected static string $resource = MailCategoryResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
