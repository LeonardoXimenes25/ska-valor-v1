<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Livewire\Article\ArticleDetail;
use App\Livewire\Article\ArticlePage;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Home;
use App\Livewire\Lesson\LessonPage;
use App\Livewire\Section\Organograma;
use App\Livewire\Student\StudentPage;
use App\Livewire\Teacher\TeacherPage;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Socialite;

Route::redirect('/', '/home');
// route home
Route::get('/home', Home::class)->name('home');

// list student
Route::get('/list-estudante', StudentPage::class)->name('list-student');

// list lesson
Route::get('/lista-materia', LessonPage::class)->name('list-lesson');

//  list teacher route
Route::get('/lista-professor', TeacherPage::class)->name('list-teacher');

// Article
Route::get('/article', ArticlePage::class)->name('article');
Route::get('/detail-article/{slug}', ArticleDetail::class)->name('detail-article');

// laravel socialite
// google
Route::get('auth/google', Login::class)->name('auth.google');
Route::get('auth/google/callback', Login::class)->name('auth.google.callback');

//facebook
// auth routes
// register
Route::get('/register', Register::class)->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('auth.register');
// api for dynamic dropdown in register form    
Route::get('/api/posts/{municipality}', [RegisterController::class, 'getPosts']);
Route::get('/api/tribes/{municipality}/{post}', [RegisterController::class, 'getTribes']);
Route::get('/api/villages/{municipality}/{post}/{tribe}', [RegisterController::class, 'getVillages']);

Route::get('/login', Login::class)->name('login');

// static route
Route::get('/Organograma', Organograma::class)->name('organograma');