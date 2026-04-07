<?php

namespace App\Http\Controllers;

use App\Services\ModuleService;

class ModuleController extends Controller
{
    protected ModuleService $moduleService;

    public function __construct(ModuleService $moduleService)
    {
        $this->moduleService = $moduleService;
    }

    // show list
    public function index()
    {
        $modules = $this->moduleService->getAllModules();

        return view('pages.module.index', compact('modules'));
    }

    public function download($id)
    {
        return $this->moduleService->downloadFile($id);
    }
}
