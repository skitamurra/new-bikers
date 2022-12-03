<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CommentdetailController;
use Illuminate\Support\Facades\Auth;
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

Route::group(['middleware' => ['auth']], function(){
    Route::get('/', [TimelineController::class, 'index'])->name('posts.index');
    
    Route::put('/posts/create', 'TimelineController@createPost')->name('posts.create');
    
    Route::get('/posts/{post}', 'TimelineController@show')->name('posts.show');
    
    Route::get('/posts/{post}/edit', 'TimelineController@edit')->name('posts.edit');
    
    Route::put('/posts/{post}/update', 'TimelineController@update')->name('posts.update');
    
    Route::delete('/posts/{post}/delete', 'TimelineController@delete')->name('posts.delete');
});

    // コメント
    Route::get('/posts/{post}/get_comments', 'CommentController@getComments')->name('get_comments');
    Route::resource('posts.comments', 'CommentController', [
     'only' => ['store', 'update', 'destroy'],
    ]);
    
    # ゲストユーザーログイン
    Route::get('guest', 'Auth\LoginController@guestLogin')->name('login.guest');

Auth::routes();