<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

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

Auth::routes();
Route::get('/', function (){
    return redirect()->route('home');
});

Route::get('/home', [IndexController::class, 'index'])->name('home');
Route::get('/danh-muc', [IndexController::class, 'category'])->name('category');
Route::get('/the-loai', [IndexController::class, 'genre'])->name('genre');
Route::get('/quoc-gia', [IndexController::class, 'country'])->name('country');
Route::get('/xem-phim', [IndexController::class, 'movie'])->name('movie');
Route::get('/episode', [IndexController::class, 'episode'])->name('episode');


// Route::get();
