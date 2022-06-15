<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Process_Controller;
use App\Http\Controllers\Purpose_Controller;

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
    return view('welcome');
});

Route::resource('process', Process_Controller::class);
Route::resource('purpose', Purpose_Controller::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
