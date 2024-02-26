<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\BookInquiryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::resource('/books', BookController::class);


Route::get('/search', [SearchController::class, 'search'])->name('search');

Route::get('/inquiry', [BookInquiryController::class, 'inquiry'])->name('inquiry');
Route::post('/inquiry', [BookInquiryController::class, 'store'])->name('inquiry.store');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
