@extends('layouts.app')

@section('content')    <h1>Biker's</h1>
    <div class="content">
            <div class="content__post">
                <p class="px-2 py-2">{{ $post->body }}</p>
                <img src="{{ $post->image }}" class="">
            </div>
    </div>
    <div>
        <p class="edit">[<a href="{{ route('posts.edit', ['post' => $post->id]) }}">edit</a>]</p>
        <a href="/">戻る</a>
    </div>
    <div id="comment">
        <comment :post="{{ $post }}" :login_user_id="{{Auth::id()}}"></comment>
    </div>
@endsection