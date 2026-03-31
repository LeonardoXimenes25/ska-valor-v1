<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\Students\StudentResource;
use App\Filament\Resources\Teachers\TeacherResource;
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

            Stat::make('Bounce rate', '21%'),
            Stat::make('Average time on page', '3:12'),
        ];
    }
}
