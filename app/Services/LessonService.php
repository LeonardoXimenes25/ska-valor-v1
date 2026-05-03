<?php

namespace App\Services;

use App\Models\Module;

class LessonService
{
    // retrieve all data from module model
    public function getAllLessons()
    {
        return Module::with('programCategory')
            ->latest()
            ->paginate(5);
    }
}