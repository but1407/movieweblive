<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\IndexController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\EpisodeController;
use App\Http\Controllers\Admin\GenreController;
use App\Http\Controllers\Admin\MovieController;

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
    return redirect('/login');
});

Route::get('/home', [IndexController::class, 'index'])->name('home');
Route::get('/danh-muc/{slug}', [IndexController::class, 'category'])->name('category');
Route::get('/the-loai/{slug}', [IndexController::class, 'genre'])->name('genre');
Route::get('/quoc-gia/{slug}', [IndexController::class, 'country'])->name('country');
Route::get('/xem-phim/{slug}', [IndexController::class, 'movie'])->name('movie');
Route::get('/episode', [IndexController::class, 'episode'])->name('episode');


Route::resource('category', CategoryController::class);
Route::resource('movie', MovieController::class);
Route::resource('genre', GenreController::class);
Route::resource('episode', EpisodeController::class);
Route::resource('country', CountryController::class);

Route::post('resorting_category', [CategoryController::class,'resorting'])->name('resorting_category');