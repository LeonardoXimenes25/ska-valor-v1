<?php

namespace App\Livewire\Student;

use Livewire\Component;
use Livewire\WithPagination;
use App\Services\StudentService;

class StudentPage extends Component
{
    use WithPagination;

    public $categories;
    public $selectedCategory = 'all';
    public $query = '';

    public function mount(StudentService $studentService)
    {
        $this->categories = $studentService->categories();
    }

    public function selectCategory($slug)
    {
        $this->selectedCategory = $slug;
        $this->resetPage(); // penting
    }

    public function updatingQuery()
    {
        $this->resetPage(); // penting saat search
    }

    public function render(StudentService $studentService)
    {
        return view('livewire.student.student-page', [
            'students' => $studentService->getAllStudents(
                $this->selectedCategory,
                $this->query
            ),
            'categories' => $this->categories,
        ])->layout('layouts.app');
    }
}