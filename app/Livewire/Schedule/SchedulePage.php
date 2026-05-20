<?php

namespace App\Livewire\Schedule;

use App\Services\ScheduleService;
use Livewire\Component;

class SchedulePage extends Component
{
    public function render(ScheduleService $scheduleService)
    {
        return view('livewire.schedule.schedule-page', [
            'schedules' => $scheduleService->getAllSchedules(),
            'programs' => $scheduleService->programs(),
            'teachers' => $scheduleService->teachers(),
        ])->layout('layouts.app');
    }
}
