<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Process_Controller;
use App\Http\Controllers\Purpose_Controller;
use App\Http\Controllers\Auth\RegisterController;
use App\Mail\UserContacted;
use Illuminate\Support\Facades\Mail;

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
    Mail::send(new UserContacted());
    return view('welcome');
});

//下記のrouteにmiddlewareを指定しているが、
//それぞれのcontrollerの__construsctでmiddlewareを指定しても同じ処理を実現できる

Route::resource('process', Process_Controller::class)->middleware('auth');
Route::resource('purpose', Purpose_Controller::class)->middleware('auth');

Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware(['guest']);;
Route::post('/register', [RegisterController::class, 'create'])->name('register.create')->middleware(['guest']);;

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware(['guest']);;
Route::post('/login', [LoginController::class, 'store'])->name('login.store')->middleware(['guest']);;

Route::post('/logout', [LogoutController::class, 'store'])->name('logout.store');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
