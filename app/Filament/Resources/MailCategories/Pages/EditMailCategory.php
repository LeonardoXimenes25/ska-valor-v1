<?php

namespace App\Filament\Resources\MailCategories\Pages;

use App\Filament\Resources\MailCategories\MailCategoryResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMailCategory extends EditRecord
{
    protected static string $resource = MailCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
