<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Livewire\ArticleIndex;
use App\Livewire\ArticleShow;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Socialite;

Route::redirect('/', '/home');

Route::get('/home', function () {
    return view('pages.home');
})->name('home');

// list student
Route::get('/lista-estudante', [StudentController::class, 'index'])->name('list-student');

Route::get('/module', [ModuleController::class, 'index'])->name('module');
Route::get('/module/{id}/download', [ModuleController::class, 'download'])
    ->name('module.download');

//  list teacher route
Route::get('/lista-professor', [TeacherController::class, 'index'])->name('list-teacher');

// Article
// Route::get('/article', [ArticleController::class, 'index'])->name('article');
// Route::get('/detail-article/{slug}', [ArticleController::class, 'show'])->name('detail-article');
Route::get('/article', ArticleIndex::class)->name('article');
Route::get('/detail-article/{slug}', ArticleShow::class)->name('detail-article');

// laravel socialite
// google
Route::get('auth/google', [SocialiteController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [SocialiteController::class, 'handleGoogleCallback']);

//facebook
Route::get('auth/facebook', [SocialiteController::class, 'redirectToFacebook'])->name('auth.facebook');
Route::get('auth/facebook/callback', [SocialiteController::class, 'handleFacebookCallback']);

// auth routes
// register
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('auth.register');
// api for dynamic dropdown in register form    
Route::get('/api/posts/{municipality}', [RegisterController::class, 'getPosts']);
Route::get('/api/tribes/{municipality}/{post}', [RegisterController::class, 'getTribes']);
Route::get('/api/villages/{municipality}/{post}/{tribe}', [RegisterController::class, 'getVillages']);

// login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// static route
Route::get('/sections/organograma', function () {
    return view('sections.organograma');
})->name('organograma');