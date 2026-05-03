<?php

namespace App\Services;

use App\Models\Student;
use App\Models\ProgramCategory;

class StudentService
{
   public function getAllStudents($category = 'all', $search = null)
{
    return Student::with('programCategory')
        ->when($category !== 'all', function ($query) use ($category) {
            $query->whereHas('programCategory', function ($q) use ($category) {
                $q->where('slug', $category);
            });
        })
        ->when($search, function ($query) use ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('student_id', 'like', "%{$search}%");
            });
        })
        ->latest()
        ->paginate(10);
}

    public function categories()
    {
        return ProgramCategory::all();
    }
}