@extends('layouts.app')

@section('content')
    <div class="content">
            <div class="content__post">
                <p class="px-2 py-2">{{ $post->body }}</p>
                <img src="{{ $post->image }}" class="">
            </div>
    </div>
        <comment-component :post="{{ $post }}" :login_user_id="{{Auth::id()}}"></comment-component>
    <div class="spot">
        @if ($post->spot)
            <iframe id='map' src='https://www.google.com/maps/embed/v1/place?key={{ config("services.google-map.apikey") }}&q={{ $post->spot->address }}' width='50%' height='300' frameborder='0'></iframe>
        @endif
    </div>
    <div>
        <p class="edit">[<a href="{{ route('posts.edit', ['post' => $post->id]) }}">edit</a>]</p>
        <a href="/">戻る</a>
    </div>
@endsection