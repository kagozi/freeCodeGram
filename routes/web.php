<?php

use App\Mail\NewUserWelcomeMail;
use Illuminate\Support\Facades\Route;

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

Route::get('/email', function() {
    return new NewUserWelcomeMail;
});

Route::post('follow/{user}', 'App\Http\Controllers\FollowsController@store')->name('user.follow');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', 'App\Http\Controllers\PostsController@index');
Route::get('/p/create', 'App\Http\Controllers\PostsController@create')->name('post.create');
Route::post('/p', 'App\Http\Controllers\PostsController@store');
Route::get('/p/{post}', 'App\Http\Controllers\PostsController@show')->name('post.show');

Route::patch('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'update'])->name('profile.update');
Route::get('/profile/{user}/edit', 'App\Http\Controllers\ProfilesController@edit')->name('profile.edit');
Route::get('/profile/show/{user}', [App\Http\Controllers\ProfilesController::class, 'index'])->name('profile.show');




