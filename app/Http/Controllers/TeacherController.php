<?php

namespace App\Http\Controllers;

use App\Services\TeacherService;

class TeacherController extends Controller
{
    protected TeacherService $teacherService;

    public function __construct(TeacherService $teacherService)
    {
        $this->teacherService = $teacherService;
    }

    public function index()
    {
        $teachers = $this->teacherService->getAllTeachers();
        return view('pages.teachers.index', compact('teachers'));
    }
}
