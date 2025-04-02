<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;

Route::get('/', [QuestionController::class, 'index'])
    ->name('question')
    ->middleware('basic-rate-limiter');

Route::get('/expire-rate-limit', function() {
    return view('expire-rate-limit');
})->name('expire-rate-limit');