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

//Index controller routes
Route::controller(IndexController::class)->group(function () {
    Route::get('/home', 'index')->name('home');
    Route::get('/danh-muc/{slug}', 'category')->name('category');
    Route::get('/the-loai/{slug}', 'genre')->name('genre');
    Route::get('/quoc-gia/{slug}', 'country')->name('country');
    Route::get('/xem-phim/{slug}', 'movie')->name('movie.detail');
    Route::get('/phim/{slug}/episode-{tap}', 'watch')->name('movie.watch');
    Route::get('/year/{year}', 'year')->name('year');
    Route::get('/tag/{tag}', 'tags')->name('tag');
    Route::get('/search', 'search')->name('search');
    Route::get('/episode/watch-movie', 'episode')->name('episodes');
    Route::get('/increment-view',  'increment_view');
});
Route::middleware(['auth'])
    ->group(function () {
        //Admin
        Route::prefix('admin')->group(function () {
            //Category
            Route::resource('category', CategoryController::class);
            Route::post('resorting_category', [CategoryController::class, 'resorting'])->name('resorting_category');

            //Movie
            Route::controller(MovieController::class)->group(function () {
                Route::resource('movie', MovieController::class);
                Route::post('/update-season-phim',  'season_update')->name('season_update');
                Route::post('/update-year-movie',  'update_year');
                Route::post('/update-topview-phim',  'update_topview');
                

            });
            //Genre
            Route::resource('genre', GenreController::class);

            //Episode
            Route::resource('episode', EpisodeController::class);
            Route::get('/select-movie', [EpisodeController::class, 'select_movie'])->name('select-movie.episode');
            Route::get('/add-episode/id-{id}', [EpisodeController::class, 'add_episode'])->name('admin.add_episode');

            //Country
            Route::resource('country', CountryController::class);
        });
});


