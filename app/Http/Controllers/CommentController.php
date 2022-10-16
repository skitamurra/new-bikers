<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\User;
use App\Http\Post;
use App\Http\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    // 取得
    public function getComments(Post $post, Comment $comment) 
    {

       // 投稿のコメントループ
       foreach($post->comments as $comment) {
           // コメントのユーザーを格納
           $comment->user = $comment->user;
       }
       return $post->comments;
    }

    // 追加
    public function store(Post $post, Comment $comment, Request $request)
    {
      
      $comment->comment = $request->comment;
      $comment->user_id = Auth::id();
      $comment->post_id = $post->id;

      $comment->save();
    }

    // 更新
    public function update(Post $post, Comment $comment, Request $request)
    {
       if(Auth::id() == $comment->user_id) {
           $comment->comment = $request->comment;
           $comment->save();
       }
    }

    // 削除
    public function destroy(Post $post, Comment $comment)
    {
       if(Auth::id() == $comment->user_id || Auth::id() == $post->user_id) {
           $comment->delete();
       }
    }
}