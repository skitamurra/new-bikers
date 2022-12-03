@extends('layouts.app')

@section('content')
	<div class="post-store">
		<form action="{{ route('posts.create') }}" method="POST" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="body">
				<textarea name='post[body]' class='msr_textarea_05' placeholder="投稿を作成"></textarea></br>
				<input type="hidden" name='post[user_id]' value="{{ Auth::id() }}">
				<input type="file" name="image" class="file"></br>
				<spot-component></spot-component>
			</div>
			<button type="submit">投稿</button>
		</form>
	</div>
		<div class="posts">
			@foreach($posts as $post)
			<div class="post" >
				<h6>投稿者　{{ $post->user->name }}</h6>
				<a href="{{ route('posts.show', ['post' => $post->id]) }}">{{ $post->body }}</a><br>
				<img src="{{ $post->image }}" ></br>
			</div>
			@endforeach
		</div>
@endsection