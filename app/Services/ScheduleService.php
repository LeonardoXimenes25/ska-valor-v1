<?php

namespace App\Services;

use App\Models\Program;
use App\Models\Schedule;
use App\Models\Teacher;

class ScheduleService
{
    public function getAllSchedules()
    {
        return Schedule::with('program', 'teacher')
            ->latest()
            ->paginate(5);
    }

    public function programs()
    {
        return Program::all();
    }

    public function teachers()
    {
        return Teacher::all();
    }
}