<?php

namespace App\Services;

use App\Models\Teacher;

class TeacherService
{
    public function getAllTeachers()
    {
        return Teacher::latest()->paginate(5);
    } 
}