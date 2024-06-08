<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Admin\LinkMovieController;
use App\Http\Controllers\Admin\InfoController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\GenreController;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\EpisodeController;
use App\Http\Controllers\Admin\CategoryController;

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
    // return view('auth.partials.dashboard');
});

//Index controller routes
Route::controller(IndexController::class)->group(function () {
    Route::get('/home', 'index')->name('home');
    Route::get('/danh-muc/{slug}', 'category')->name('category');
    Route::get('/the-loai/{slug}', 'genre')->name('genre');
    Route::get('/quoc-gia/{slug}', 'country')->name('country');
    Route::get('/xem-phim/{slug}', 'movie')->name('movie.detail');
    Route::get('/phim/{slug}/episode-{tap}/server-{server_active}', 'watch')->name('movie.watch');
    Route::get('/year/{year}', 'year')->name('year');
    Route::get('/tag/{tag}', 'tags')->name('tag');
    Route::get('/search', 'search')->name('search');
    Route::get('/episode/watch-movie', 'episode')->name('episodes');
    Route::get('/increment-view',  'increment_view');
    Route::post('/add-rating',  'add_rating');
});
Route::middleware(['auth'])
    ->group(function () {
        //Admin
        Route::prefix('admin')->group(function () {
            //Info website
            Route::controller(InfoController::class)->group(function () {
                Route::get('/info/create', 'create')->name('info.create');
                Route::post('info/store', 'store')->name('info.store');
                Route::post('info/update', 'update')->name('info.update');
                Route::post('info/destroy', 'destroy')->name('info.destroy');
                Route::get('dashboard/index', 'dashboard')->name('dasboard.index');
            });

            //Category
            Route::resource('category', CategoryController::class);
            Route::post('resorting_category', [CategoryController::class, 'resorting'])->name('resorting_category');

            //Movie
            Route::controller(MovieController::class)->group(function () {
                Route::resource('movie', MovieController::class);
                Route::post('/update-season-phim', 'season_update')->name('season_update');
                Route::post('/update-year-movie', 'update_year');
                Route::post('/update-topview-phim', 'update_topview');
                Route::get('/update-category-get', 'update_category');
                Route::get('/update-country-get', 'update_country');
                Route::get('/update-status-get', 'update_status');
                Route::get('/update-thuocphim-get', 'update_thuocphim');
                Route::get('/update-hotmovie-get', 'update_hotmovie');
                Route::get('/update-vietsub-get', 'update_vietsub');
                Route::post('/update-image-movie-ajax', 'update_image_movie');
                Route::post('/watch-video/ajax', 'watch_video');
                Route::get('/movie-sort','movie_sort')->name('movie_sort');
                Route::post('/navbar/resorting','resorting_navbar');
                

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
        Route::controller(LinkMovieController::class)->group(function () {
            Route::get('movielink/link/index', 'index')->name('linkmovie.index');
            Route::get('movielink/link/create', 'create')->name('linkmovie.create');
            Route::post('movielink/link/store', 'store')->name('linkmovie.store');
            Route::get('movielink/link/edit/{id}', 'edit')->name('linkmovie.edit');
            Route::put('movielink/link/update/{id}', 'update')->name('linkmovie.update');
            Route::delete('movielink/link/destroy/{id}', 'destroy')->name('linkmovie.destroy');
        });
});

//update sitemap
Route::get('/create_sitemap', function(){
    return Artisan::call('sitemap:create');
});

