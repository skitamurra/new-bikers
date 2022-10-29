@extends('layouts.app')

@section('content')
		<form action="{{ route('posts.create') }}" method="POST" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="body">
				<textarea name='post[body]' placeholder="投稿を作成"></textarea></br>
				<input type="hidden" name='post[user_id]' value="{{ Auth::id() }}">
				<input type="file" name="image"></br>
				<spot-component></spot-component>
			</div>
			<button type="submit">投稿</button>
		</form>
		<div class="posts">
			@foreach($posts as $post)
			<div class="post" >
				<a href="{{ route('posts.show', ['post' => $post->id]) }}">{{ $post->body }}</a><br>
				<img src="{{ $post->image }}" ></br>
			</div>
			@endforeach
		</div>
@endsection