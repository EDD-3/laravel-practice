@extends('layouts.app')

@section('content')

<h1>Create Post</h1>
{{-- 
    <form method="post" action="/posts">
        {{ csrf_field() }} --}}
{!! Form::open(['method'=> 'POST', 'action' => 'PostsController@store']) !!}

<div class="form-group">

    {!! Form::label('title', 'Title:') !!}

    {!! Form::text('title', null, ['class'=>'form-control']) !!}


</div>

    <div class="form-group">

        {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}

    </div>
        {{-- <input type="text" name="title" placeholder="Enter title"> --}}
    {!! Form::close() !!}

@endsection