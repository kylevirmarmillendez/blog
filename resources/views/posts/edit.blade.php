@extends('layouts.app')

@section('content')

{!!Form::model($post,['method'=> 'PATCH', 'action'=>['App\Http\Controllers\PostsController@update',$post->id]])!!}


{!!Form::label('title', 'Title:')!!}
{!!Form::text('title', $post->title)!!}
{!!Form::text('content', $post->content)!!}
{!!Form::submit('update')!!}


    {{-- <input type="hidden" name="_method" value="PUT">
    <input type="text" name="title" placeholder="Enter title" value="{{$post->title}}">
    <input type="text" name="content" placeholder="content" value="{{$post->content}}">
    <input type="submit" > --}}

{!!Form::close()!!}

{{-- <form method="POST" action="/posts/{{$post->id}}">
    <input type="hidden" name="_method" value="DELETE">
    <input type="submit" value="DELETE">
</form> --}}

@endsection 


