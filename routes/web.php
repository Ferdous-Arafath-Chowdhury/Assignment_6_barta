<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

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
    return view('registrer');
});

Route::view('/registrer','registrer')->name('registrer');
Route::view('/login','login')->name('login');
Route::view('/home','index')->name('home');
// Route::view('/profile','profile')->name('profile');
Route::get('/edit_profile',  [UserController::class , 'edit_profile'])->name('edit_profile');
Route::put('/edit_profile/{id}' , [UserController::class , 'update'])->name('update');

Route::post('/add', [UserController::class , 'add'])->name('add');
Route::post('/log' , [UserController::class , 'HandleLogin'])->name('HandleLogin');
Route::get('/profile' ,[ UserController::class , 'profile'])->name('profile');

