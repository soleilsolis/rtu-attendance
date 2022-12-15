<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\InstanceController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\UserController;
use Illuminate\Session\Middleware\AuthenticateSession;
use App\Models\User;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/create/token', function(){
    $user = User::where('email', "domenico65@example.com")->first();
    return $user->createToken("android")->plainTextToken;
});

Route::middleware('auth.session')->group(function(){
    Route::controller(CourseController::class)->group(function(){
        Route::get('/courses', 'index');
        Route::get('/course/{id}', 'show');
        Route::post('/courses', 'store');
        Route::post('/course/update', 'update');
    });

    Route::controller(AttendanceController::class)->group(function(){
        Route::get('/attendances', 'index');
        Route::get('/attendance/{id}', 'show');
        Route::post('/attendances', 'store');
        Route::put('/attendance/{id}', 'update');
    });

    Route::controller(SectionController::class)->group(function(){
        Route::get('/sections', 'index');
        Route::get('/section/{id}', 'show');
        Route::post('/sections', 'store');
        Route::post('/section/update', 'update');
    });

    Route::controller(SubjectController::class)->group(function(){
        Route::get('/subjects', 'index');
        Route::get('/subject/{id}', 'show');
        Route::post('/subjects', 'store');
        Route::post('/subject/update', 'update');
    });

    Route::controller(InstanceController::class)->group(function(){
        Route::get('/instances', 'index');
        Route::get('/instance/{id}', 'show');
        Route::post('/instances', 'store');
        Route::post('/instance/update', 'update');
    });

    Route::controller(ScheduleController::class)->group(function(){
        Route::get('/schedules', 'index');
        Route::get('/schedule/{id}', 'show');
        Route::post('/schedules', 'store');
        Route::post('/schedule/update', 'update');
        Route::delete('/schedule/delete/{id}', 'destroy');
    });

    Route::controller(UserController::class)->group(function(){

        Route::post('/users', 'store');
        Route::post('/users/create', 'create');
        Route::post('/users/show', 'show');
        Route::post('/user/update', 'update');
    });
});
