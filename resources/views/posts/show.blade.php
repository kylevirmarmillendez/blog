@extends('layouts.app')

@section('content')


<ul>

    <div>
        <img src="{{$post->path}}" alt="">
    </div>
    
    <li>{{$post->title}}-{{$post->content}}   ----- <a href="/posts/{{$post->id}}/edit">Edit</a></li>
  
</ul>


@endsection