<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

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
Route::post('/add_post', [PostController::class , 'add_post'])->name('add_post');
Route::get('/edit_post/{id}',  [PostController::class , 'edit_post'])->name('edit_post');

Route::put('/update/{post_id}', [PostController::class, 'update'])->name('update');
// Route::get('/delete_post/{post_id}' , [PostController::class, 'delete_post'])->name('delete_post');
Route::delete('/destroy/{post_id}', [PostController::class, 'destroy'])->name('destroy');


 







Route::view('/barta','barta-card')->name('bartcard');
Route::view('/post','post')->name('post'); 

