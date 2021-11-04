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
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Admin\Tutorial\TutorialController;
use App\Http\Controllers\Admin\Role\RoleController;
use App\Http\Controllers\Admin\OriginalSong\OriginalSongController;
use App\Http\Controllers\Front\MailController;
use App\Http\Controllers\Front\SongBaseController;

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
    return view('front.pages.index');
    // return view('welcome');
})->name('mainPage');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::namespace('App\Http\Controllers\Blog')->group(function() {
    Route::get('/blog', 'IndexController');
});

Route::middleware(['adminWriter'])->prefix('admin')->group(function() {
    Route::get('/', [MainController::class, 'index'])->name('adminIndex');
    Route::resource('vocal', VocalController::class);
    Route::resource('song', SongController::class);
    Route::resource('originalsong', OriginalSongController::class);
    Route::resource('tutorial', TutorialController::class);
});

Route::middleware(['admin'])->prefix('admin')->group(function() {
    Route::resource('category', CategoryController::class);
    Route::resource('tag', TagController::class);
    Route::resource('post', PostController::class);
    Route::resource('user', UserController::class);
    Route::post('/setWriter/{user}', [RoleController::class, 'setWriter'])->name('setWriter');
    Route::post('/unsetWriter/{user}', [RoleController::class, 'unsetWriter'])->name('unsetWriter');

    Route::get('pending/song', [SongController::class, 'pending'])->name('song.pending');
    Route::put('song/{song}/approve', [SongController::class, 'approval'])->name('song.approve');
});

Route::post('/sendMail', [MailController::class, 'sendMail'])->name('feedback');

Route::get('/songs', [SongBaseController::class, 'index'])->name('allSongs');
Route::get('/song/{song}', [SongBaseController::class, 'show'])->name('showSong');

// тестовые роуты не нужны совсем
Route::get('/getTest', [TestController::class, 'getTest']);
Route::get('/getSong', [TestController::class, 'getSong']);
Route::get('/getPostsTags', [TestController::class, 'getPostsTags']);
Route::get('/getTagsPosts', [TestController::class, 'getTagsPosts']);
// тестовые роуты не нужны совсем
