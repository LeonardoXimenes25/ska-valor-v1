<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\IncomingMails\IncomingMailResource;
use App\Filament\Resources\OutgoingMails\OutgoingMailResource;
use App\Filament\Resources\Students\StudentResource;
use App\Filament\Resources\Teachers\TeacherResource;
use App\Models\IncomingMail;
use App\Models\OutgoingMail;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Formadores', TeacherResource::getModel()::count())
                ->url(TeacherResource::getUrl('index'))
                ->color('success'),

            Stat::make('Total Estudante', StudentResource::getModel()::count())
                ->url(StudentResource::getUrl('index'))
                ->color('success'),

            Stat::make('Karta Tama', IncomingMail::getModel()::count())
                ->url(IncomingMailResource::getUrl('index'))
                ->color('danger'),

            Stat::make('Karta sai', OutgoingMail::getModel()::count())
                ->url(OutgoingMailResource::getUrl('index'))
                ->color('warning'),
        ];
    }
}
