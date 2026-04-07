<?php

namespace App\Services;

use App\Models\Module;
use Illuminate\Support\Facades\Storage;

class ModuleService
{
    public function getAllModules()
    {
        return Module::with('programCategory')
            ->latest()
            ->paginate(3);
    }

     public function downloadFile($id)
    {
        $module = Module::findOrFail($id);

        if (!$module->file_path) {
            abort(404, 'File tidak ditemukan');
        }

        return Storage::download(
            $module->file_path,
            $module->title . '.' . $this->getExtension($module->file_path)
        );
    }

    private function getExtension($path)
    {
        return pathinfo($path, PATHINFO_EXTENSION);
    }
}