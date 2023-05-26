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
        return view('home');
    });
    Route::get('/about', [App\Http\Controllers\AboutSettingController::class, 'index']);
    Route::post('/about', [App\Http\Controllers\AboutSettingController::class, 'update']);
    Route::post('/update-image', [App\Http\Controllers\AboutSettingController::class, 'image']);
});

Auth::routes();

Route::get('/', [App\Http\Controllers\LandingPageController::class, 'index']);
