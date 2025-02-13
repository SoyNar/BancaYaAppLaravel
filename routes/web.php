<?php

use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckCategoryPermission;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



//user routes

Route::get('/screen', [UserController::class, 'index'])->name('screen');
Route::post('/create-turn', [UserController::class, 'createTurn'])->name('createTurn')->middleware(CheckCategoryPermission::class);
Route::get('/show-turn', [UserController::class, 'showTurn'])->name('showTurn');
Route::get('/seetickets', [UserController::class, 'seetickets'])->middleware('auth');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/screen', function () {
        return view('user-screen');
    })->name('screen');
});
