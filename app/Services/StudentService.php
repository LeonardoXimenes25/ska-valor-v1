<?php

namespace App\Services;

use App\Models\Student;

class StudentService
{
    // Tambahkan metode untuk mengelola data mahasiswa jika diperlukan
    public function getAllStudents()
    {
        return Student::with('programCategory')
            ->latest()
            ->paginate(10);
    }
    
}