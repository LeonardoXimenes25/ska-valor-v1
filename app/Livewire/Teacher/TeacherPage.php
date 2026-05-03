<?php

namespace App\Livewire\Teacher;

use App\Services\TeacherService;
use Livewire\Component;

class TeacherPage extends Component
{
    public function render(TeacherService $teacherService)
    {
        $teachers = $teacherService->getAllTeachers();
        return view('livewire.teacher.teacher-page', [
            'teachers' => $teachers
        ])->layout('layouts.app');
    }
}
