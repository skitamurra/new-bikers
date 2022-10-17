@extends('layouts.app')

@section('content')    <h1>Biker's</h1>
    <div class="content">
        <form action="{{ route('posts.update', ['post' => $post->id]) }} " method="POST">
            @csrf
            @method('PUT')
            <div class='content_body'>
                <input type='text' name='post[body]' value="{{ $post->body }}">
            </div>
            <input type="submit" value="保存">
        </form>
        <form action="{{ route('posts.delete', ['post' => $post->id])  }}" id="form_delete" method="post" style="display:inline">
            @csrf
            @method('DELETE')
            <input type="submit" style="display:none">
            <button type="button" onclick="deletePost()">delete</button> 
        </form>
        
         <script> 
           function deletePost()
           {
                 document.getElementById("form_delete").submit();
           }
         </script>
    </div>
@endsection