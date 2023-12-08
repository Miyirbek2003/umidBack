<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/login', function () {
    return view('auth.login');
});
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('/slides', App\Http\Controllers\SlideController::class);
    Route::resource('/employees', App\Http\Controllers\EmployeeController::class);
    Route::resource('/treatments', App\Http\Controllers\TreatmentsController::class);
    Route::resource('/typetreatments', App\Http\Controllers\TypeTreatmentsController::class);
    Route::resource('/feedback', App\Http\Controllers\FeedbackController::class);
    Route::resource('/imageslide', App\Http\Controllers\ImageSlideController::class);
    Route::resource('/order', App\Http\Controllers\OrderController::class);
    Route::get('/zeroorder', [App\Http\Controllers\OrderController::class, 'zeroindex'])->name('zeroindex');
});

Auth::routes();
