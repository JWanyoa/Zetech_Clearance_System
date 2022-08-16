<?php

use App\Http\Controllers\MyData\UserController;
use App\Http\Controllers\MyData\HomeController;
use App\Http\Controllers\MyData\MessagesController;
use App\Http\Controllers\MyData\ChangePasswordController;
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

Route::get('/', function () {
    return view('welcome');
});




Auth::routes();

//Dashboard Routes
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/hodHome', [App\Http\Controllers\HomeController::class, 'hodindex'])->name('hodHome');
Route::get('/registrarHome', [App\Http\Controllers\HomeController::class, 'registrarindex'])->name('registrarHome');
Route::get('/roHome', [App\Http\Controllers\HomeController::class, 'roindex'])->name('roHome');
Route::get('/financeHome', [App\Http\Controllers\HomeController::class, 'financeindex'])->name('financeHome');
Route::get('/librarianHome', [App\Http\Controllers\HomeController::class, 'libindex'])->name('librarianHome');
Route::get('/studentHome', [App\Http\Controllers\HomeController::class, 'studentindex'])->name('studentHome');

//Login Routes
Route::get('/hodLogin', [App\Http\Controllers\MyData\UserController::class, 'login']);
Route::get('/registrarLogin', [App\Http\Controllers\MyData\UserController::class, 'login']);
Route::get('/financeLogin', [App\Http\Controllers\MyData\UserController::class, 'login']);
Route::get('/roLogin', [App\Http\Controllers\MyData\UserController::class, 'login']);
Route::get('/librarianLogin', [App\Http\Controllers\MyData\UserController::class, 'login']);
Route::get('/studentLogin', [App\Http\Controllers\MyData\UserController::class, 'login']);

Route::resource('users', UserController::class);
Route::post('users/{user}/change-password',[ChangePasswordController::class, 'change_password'])->name('users.change.password');