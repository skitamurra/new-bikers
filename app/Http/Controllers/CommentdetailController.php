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
    public function getCommentdetails(Comment $comment, Commentdetail $commentdetail)
    {
        
    }
}
