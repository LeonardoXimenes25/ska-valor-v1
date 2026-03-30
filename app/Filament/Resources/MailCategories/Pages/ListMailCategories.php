<?php

namespace App\Filament\Resources\MailCategories\Pages;

use App\Filament\Resources\MailCategories\MailCategoryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMailCategories extends ListRecords
{
    protected static string $resource = MailCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
