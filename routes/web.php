<?php

use App\Livewire\AdminDashboard;
use App\Livewire\AdminManagment;
use App\Livewire\ParentManagment;
use App\Livewire\QuizManagment;
use App\Livewire\QuizQuestionForm;
use App\Livewire\QuizQuestionManagment;
use App\Livewire\SpelingPuzzleManagment;
use App\Livewire\StoryContentManagment;
use App\Livewire\StoryManagment;
use App\Livewire\StudentManagment;
use App\Livewire\WordPuzzleManagment;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
    Route::get('/', AdminDashboard::class)->name('home');
    Route::get('/quizs', QuizManagment::class)->name('quiz');
    Route::get('quiz-questions/{slug}', QuizQuestionManagment::class)->name('quizQuestions');
    route::get('add-quiz-questions/{quiz}', QuizQuestionForm::class)->name('addQuizQuestion');
    route::get('edit-quiz-questions/{slug}', QuizQuestionForm::class)->name('editQuizQuestion');
    Route::get('/story', StoryManagment::class)->name('story');
    Route::get('/story-content/{slug}', StoryContentManagment::class)->name('storyContent');
    Route::get('puzzlies', WordPuzzleManagment::class)->name('wordPuzzle');
    Route::get('speling-puzzlies', SpelingPuzzleManagment::class)->name('spelingPuzzle');
    Route::get('admins', AdminManagment::class)->name('admins');
    Route::get('parents', ParentManagment::class)->name('parents');
    Route::get('students/{id}', StudentManagment::class)->name('students');

});

require __DIR__ . '/auth.php';
