<?php

namespace App\Http\Controllers;

use App\Services\StudentService;

class StudentController extends Controller
{
    protected StudentService $studentService;

    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }

    public function index()
    {
        $students = $this->studentService->getAllStudents();
        return view('pages.students.index', compact('students'));
    }
}
