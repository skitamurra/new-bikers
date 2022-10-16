<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\CommentController;
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
    
    // コメント詳細
    Route::get('posts/{post}/comments/{comment}/get_comments', 'CommentdetailController@getComments')->name('comment_details.get_comments');
    Route::resource('posts.comments.commentdetails', 'CommentdetailController', [
     'only' => ['store', 'update', 'destroy'],
    ]);
    
    // いいね
    Route::get('/posts/{post}/check', 'LikeController@check')->name('like.check');
    Route::get('/posts/{post}/counts', 'LikeController@counts')->name('like.counts');
    Route::resource('posts.likes', 'LikeController', [
     'only' => ['store'],
    ]);

Auth::routes();