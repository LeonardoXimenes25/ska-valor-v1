<?php

namespace App\Livewire\Lesson;

use App\Models\Module;
use App\Services\LessonService;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class LessonPage extends Component
{
    // download lesson
    public function download($lessonId)
    {
        $lesson = Module::findOrFail($lessonId);

        // Pastikan file ada di storage
        if (!$lesson->file_path || !Storage::disk('public')->exists($lesson->file_path)) {
            session()->flash('error', 'File tidak ditemukan di server.');
            return;
        }

        // Nama file saat didownload (misal: judul-materi.pdf)
        $downloadName = \Str::slug($lesson->title) . '.pdf';

        return Storage::disk('public')->download($lesson->file_path, $downloadName);
    }
    
    public function render(LessonService $lessonService)
    {
        $lessons = $lessonService->getAllLessons();

        return view('livewire.lesson.lesson-page', ['lessons' => $lessons])
            ->layout('layouts.app');
    }
}
