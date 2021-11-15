<?php

// Facades

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// Shared Restful Controllers
use App\Http\Controllers\All\ProfileController;

// Admin Restful Controllers
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ActivityLogController;

// USer - Restful Controllers
use App\Http\Controllers\All\TmpImageUploadController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\ActivityLogController as UserActivityLogController;


Route::get('/', function () {
    return redirect(route('login'));
});

Route::get('/test', function () {
    return view('test');
});

// Admin
Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin', 'as' => 'admin.'],function() {
    Route::resource('dashboard', DashboardController::class);
    Route::resource('user', UserController::class);
    Route::resource('activity', ActivityLogController::class);
});


// User
Route::group(['middleware' => ['auth'], 'prefix' => 'user', 'as' => 'user.'],function() {
        Route::resource('dashboard', UserDashboardController::class);
        Route::resource('activity', UserActivityLogController::class);
});


// Auth
Route::group(['middleware' => ['auth']],function() {
    // TMP FILE UPLOAD
    Route::delete('tmp_upload/revert', [TmpImageUploadController::class, 'revert']);
    Route::post('tmp_upload/content', [TmpImageUploadController::class, 'faqImageUpload'])->name('tmpupload.faqImageUpload');
    Route::resource('tmp_upload', TmpImageUploadController::class);
    Route::resource('profile', ProfileController::class)->parameter('profile', 'user');;
  
});



Auth::routes(['register' => false]);

