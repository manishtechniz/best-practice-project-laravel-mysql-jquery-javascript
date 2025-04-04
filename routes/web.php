<?php

use App\Http\Controllers\UpdateUserProfileImage;
use App\Http\Controllers\UserBatchInsertController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\PermissionController;

Route::get('/', [QuestionController::class, 'index'])
    ->name('question')
    ->middleware('basic-rate-limiter');

// visit expire rate
Route::get('/expire-rate-limit', function() {
    return view('expire-rate-limit');
})->name('expire-rate-limit');

//update permissions
Route::put('/permissions', [PermissionController::class, 'update'])
    ->name('permission');

// This route can access by which user 9th no. of laravel question has access
Route::group(['middleware' => ['can:php:9']], function(){
    // Run batch job for user table
    Route::get('user-batch', [UserBatchInsertController::class, 'store'])
        ->name('user_batch');

    // Visit batch progress ui page
    Route::get('batch-progress-ui/{id}', [UserBatchInsertController::class, 'batchProgressUI'])
    ->name('batch_progress_ui');

    // check batch progress
    Route::get('batch-progress/{id}', [UserBatchInsertController::class, 'batchProgress'])
    ->name('batch_progress');
});

// Update profile image
Route::post('/update-profile-image', [UpdateUserProfileImage::class, 'update'])
    ->name('update_profile_image');