<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
// use App\Http\Controllers\Blog\IndexController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Tag\TagController;
use App\Http\Controllers\Admin\Post\PostController;
use App\Http\Controllers\Admin\Vocal\VocalController;
use App\Http\Controllers\Admin\Song\SongController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::namespace('App\Http\Controllers\Blog')->group(function() {
    Route::get('/blog', 'IndexController');
});

Route::group(['middleware' => ['role:admin|writer']], function () {
    Route::prefix('admin')->group(function() {
        Route::get('/', [MainController::class, 'index'])->name('adminIndex');
        Route::resource('category', CategoryController::class);
        Route::resource('tag', TagController::class);
        Route::resource('post', PostController::class);
        Route::resource('vocal', VocalController::class);
        Route::resource('song', SongController::class);
    });
});


Route::get('/getSongs', [TestController::class, 'getSongs']);
Route::get('/getVocals', [TestController::class, 'getVocals']);
Route::get('/getPostsTags', [TestController::class, 'getPostsTags']);
Route::get('/getTagsPosts', [TestController::class, 'getTagsPosts']);
