<?php

// Facades

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// Shared Restful Controllers
use App\Http\Controllers\All\TmpImageUploadController;

// Admin Restful Controllers
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\ActivityLogController;
use App\Http\Controllers\Admin\AttendeeController;
use App\Http\Controllers\Admin\BarangayAdminController;
use App\Http\Controllers\Admin\BarangayController;
use App\Http\Controllers\Admin\CalendarController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\FamilyHistoryController;
use App\Http\Controllers\Admin\HealthIssueController;
use App\Http\Controllers\Admin\HealthProfileController;
use App\Http\Controllers\Admin\HealthStatisticController;
use App\Http\Controllers\Admin\ResidentController;

// USer - Restful Controllers
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\ProfileController;
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
    Route::resource('profile', AdminProfileController::class)->parameter('profile', 'user');

});


// User
Route::group(['middleware' => ['auth'], 'prefix' => 'user', 'as' => 'user.'],function() {
        Route::resource('dashboard', UserDashboardController::class);
        Route::resource('activity', UserActivityLogController::class);
        Route::resource('profile', ProfileController::class)->parameter('profile', 'user');
});


// Auth
Route::group(['middleware' => ['auth']],function() {
    // TMP FILE UPLOAD
    Route::delete('tmp_upload/revert', [TmpImageUploadController::class, 'revert']);
    Route::post('tmp_upload/content', [TmpImageUploadController::class, 'faqImageUpload'])->name('tmpupload.faqImageUpload');
    Route::resource('tmp_upload', TmpImageUploadController::class);
  
});



Auth::routes(['register' => false]);

