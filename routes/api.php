<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Middleware\ApiMiddleware;
use Illuminate\Support\Facades\Route;

Route::prefix('v1/')->group(function () {
    Route::controller(AuthController::class)->prefix('auth/')->group(function () {
        route::post('login', 'login');
        route::post('signup', 'signup');
        route::post('logout', 'logout')->middleware(['auth:sanctum']);
        route::post('updateProfile', 'updateProfile')->middleware(['auth:sanctum', ApiMiddleware::class]);
        route::post('changePassword', 'changePassword')->middleware(['auth:sanctum', ApiMiddleware::class]);
        route::post('addStudent', 'addStudent')->middleware(['auth:sanctum', ApiMiddleware::class]);
        route::get('getStudent', 'getStudent')->middleware(['auth:sanctum', ApiMiddleware::class]);
        route::get('removeStudent/{id}', 'removeStudent')->middleware(['auth:sanctum', ApiMiddleware::class]);
    });

    Route::middleware(['auth:sanctum', ApiMiddleware::class])->controller(HomeController::class)->group(function () {
        route::get('getQuiz', 'getQuiz');
        route::get('getQuizQuestions/{slug}', 'getQuizQuestions');
        route::get('getLaderbaord', 'getLaderbaord');
        route::get('getStory', 'getStory');
        route::get('getWordPuzzle', 'getWordPuzzle');
        route::get('getSpelingPuzzle', 'getSpelingPuzzle');
        route::post('setLeaderboard', 'setLeaderboard');
    });
});
