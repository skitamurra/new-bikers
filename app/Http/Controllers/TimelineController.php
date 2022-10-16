<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TimelineController extends Controller
{
    // 一覧表示
    public function index(Post $post)
    {
        return view('/posts/index')->with(['posts' => $post->get()]);
    }
    
    // 詳細表示
    public function show(Post $post)
    {
        return view('/posts/show')->with(['post' => $post]);
    }
    
    // 編集画面
    public function edit(Post $post)
    {
        return view('/posts/edit')->with(['post' => $post]);
    }
    
    // 投稿作成処理
    public function createPost(Request $request, Post $post)
    {
       $input = $request['post'];
       $post->fill($input)->save();
       //画像の保存
       if ($request->hasFile('image'))
       {
           $image = $request->file('image');
           $uploded = Storage::disk('s3')->putFile('', $image, 'public');
           $post->image = Storage::disk('s3')->url($uploded);
           $post->save();
       }
       return back();
    }
    
    // 投稿更新
    public function update(Request $request, Post $post)
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    
    // 投稿削除
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
}