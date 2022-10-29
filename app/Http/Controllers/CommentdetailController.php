<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Comment;
use App\Commentdetail;
use illuminate\Support\Facades\Auth;

class CommentdetailController extends Controller
{
    //取得
    public function getComments(Comment $comment, Commentdetail $commentdetail)
    {
        foreach($comment->commentdetails as $response) {
            $commentdetail->user = $commentdetail->user;
        }
        return $$comment->commentdetails;
    }
    
    public function store(Comment $comment, Commentdetail $commentdetail, Request $request)
    {
        $commentdetail->text = $request->response;
        $commentdetail->user_id = Auth::id();
        $commentdetail->comment_id = $comment->id;
    
        $commentdetail->save();
    }
    
    public function update(Commentdetail $commentdetail, Request $request)
    {
       if(Auth::id() == $commentdetail->user_id) {
           $commentdetail->text = $request->text;
           $commentdetail->save();
       }
    }

    public function destroy(Post $post, Commentdetail $commentdetail)
    {
       if(Auth::id() == $commentdetail->user_id || Auth::id() == $post->user_id) {
           $commentdetail->delete();
       }
    }
}
