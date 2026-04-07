<?php

use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ModuleController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Socialite;

Route::redirect('/', '/home');

Route::get('/home', function () {
    return view('pages.home');
})->name('home');


Route::get('/module', [ModuleController::class, 'index'])->name('module');
Route::get('/module/{id}/download', [ModuleController::class, 'download'])
    ->name('module.download');

// laravel socialite
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);