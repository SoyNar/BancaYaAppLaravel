<?php

use App\Http\Controllers\AdvisorController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckCategoryPermission;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



//user routes

Route::get('/screen', [UserController::class, 'index']);
Route::post('/create-turn', [UserController::class, 'createTurn'])->name('createTurn')->middleware(CheckCategoryPermission::class);
Route::get('/show-turn', [UserController::class, 'showTurn'])->name('showTurn');
Route::get('/seetickets', [UserController::class, 'seetickets'])->middleware('auth');

// Advisor routes
Route::get('/advisorsview', [AdvisorController::class, 'index'])->middleware('auth');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
