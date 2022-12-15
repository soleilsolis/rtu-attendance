<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\UserController;

use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/test', function () {
    return view('/test');
});

Route::middleware('guest')->group(function(){
    Route::get('/login', function () {
        return view('login');
    })->name('login');
    
    Route::get('/register', function () {
        return view('welcome');
    })->name('register');
});


Route::middleware('auth')->group(function(){

    Route::get('/dashboard', function () {
        $schedules = Auth::user()->section->schedules
                        ->where('day', '=', now()->startOfDay()->dayOfWeek)
                        ->sortBy('end_time');

        $recurringSchedules =  Auth::user()->section->schedules->sortBy('end_time');

        return view('dashboard', compact('schedules', 'recurringSchedules'));
    })->name('dashboard');
    
    Route::get('/setup', function () {
        return view('welcome'); 
    });
    

    
    Route::get('/attendance', [AttendanceController::class, 'index']);

    Route::get('/courses', [CourseController::class, 'index']);
    
    Route::get('/schedule', function () {
        return view('welcome');
    });

    Route::get('/user/{id}',[UserController::class, 'show']);

    Route::get('/users', function () {
        $users = User::all();
        return view('users', compact('users'));
    });
});



