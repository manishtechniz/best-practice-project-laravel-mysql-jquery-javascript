<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\PermissionController;

Route::get('/', [QuestionController::class, 'index'])
    ->name('question')
    ->middleware('basic-rate-limiter');

Route::get('/expire-rate-limit', function() {
    return view('expire-rate-limit');
})->name('expire-rate-limit');

//update permissions
Route::put('/permissions', [PermissionController::class, 'update'])
    ->name('permission');   