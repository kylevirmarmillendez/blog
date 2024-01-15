@extends('layouts.app')

@section('content')

{{-- <form method="POST" action="/posts"> --}}
{!!Form::open(['method'=> 'POST', 'action'=>'App\Http\Controllers\PostsController@store', 'files'=>true])!!}

<div class="form-group">
    {!!Form::label('title','Title:')!!}
    {!!Form::text('title',null,['class'=>'form-control', 'placeholder'=>'Enter title'])!!}
    {!!Form::text('content',null,['class'=>'form-control', 'placeholder'=>'Enter Content'])!!}
</div>

<div class="form-group">

    {!!Form::file('file')!!}
 </div>


    {!!Form::submit('Submit')!!}
    {{-- <input type="text" name="title" placeholder="Enter title">
    <input type="text" name="content" placeholder="content"> --}}
    {{-- <input type="submit" name="submit"> --}}
{!!Form::close()!!}

@if(count($errors)>0)
    @foreach($errors->all() as $error)

    <li>{{$error}}</li>
    @endforeach
@endif

@endsection