<?php

use Illuminate\Support\Facades\Route;

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
Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        $laravelSession = request()->cookie('laravel_session');
        $try = 'tyr';

        return view('home', compact('laravelSession', 'try'));
        return view('home');
    });
    // About
    Route::get('/about', [App\Http\Controllers\AboutSettingController::class, 'index']);
    Route::post('/about', [App\Http\Controllers\AboutSettingController::class, 'update']);
    Route::post('/update-image', [App\Http\Controllers\AboutSettingController::class, 'image']);
    // fitur
    Route::get('/fiture', [App\Http\Controllers\FitureController::class, 'index']);
    Route::put('/fiture/naik', [App\Http\Controllers\FitureController::class, 'up']);
});

Auth::routes();

Route::get('/', [App\Http\Controllers\LandingPageController::class, 'index']);
