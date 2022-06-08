<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ContactController;

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
    return view('home' ,[
        "title" => "Home"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "nama" => "Salsa Adelia",
        "email" => "salsadelia@gmail.com",
        "gambar" => "https://i.pinimg.com/originals/6c/05/23/6c0523eaab587144a2c57a97ff5aeb5e.gif",
        "title" => "About"
    ]);
});

Route::get('/gallery', function () {
    return view('gallery',[
        "title" => "Gallery"
    ]);
});

Route::get('/delete_contact/{id}', ContactController::class . '@destroy');
Route::get('/edit_contact/{id}', ContactController::class . '@edit');
Route::post('/update_contact', ContactController::class . '@update');


Route::resource('/contact', ContactController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
