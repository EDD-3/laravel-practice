@extends('layouts.app')

@section('content')

<h1> Edit Post </h1>

{!! Form::model($post,['method'=> 'PATCH', 'action' =>[ 'PostsController@update', $post->id]]) !!}

        {{ csrf_field() }}

        <div class="form-group">

            {!! Form::label('title', 'Title:') !!}
        
            {!! Form::text('title', null, ['class'=>'form-control']) !!}
        


            {!! Form::submit('Update post', ['class'=>'btn btn-info']) !!}

            {!! Form::close() !!}

<h1> Delete Post </h1>

{!! Form::open(['method'=> 'DELETE', 'action' =>[ 'PostsController@destroy', $post->id]]) !!}

        {!! Form::submit('Delete Post', ['class'=>'btn btn-danger']) !!}

        {!! Form::close() !!}


@endsection