<?php

use App\Livewire\QuizManagment;
use App\Livewire\QuizQuestionForm;
use App\Livewire\QuizQuestionManagment;
use App\Livewire\StoryContentManagment;
use App\Livewire\StoryManagment;
use App\Livewire\WordPuzzleManagment;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

Route::get('/quizs', QuizManagment::class)->name('quiz');
Route::get('quiz-questions/{slug}', QuizQuestionManagment::class)->name('quizQuestions');
route::get('add-quiz-questions/{quiz}', QuizQuestionForm::class)->name('addQuizQuestion');
route::get('edit-quiz-questions/{slug}', QuizQuestionForm::class)->name('editQuizQuestion');
Route::get('/story', StoryManagment::class)->name('story');
Route::get('/story-content/{slug}', StoryContentManagment::class)->name('storyContent');
Route::get('puzzlies', WordPuzzleManagment::class)->name('wordPuzzle');

require __DIR__ . '/auth.php';
