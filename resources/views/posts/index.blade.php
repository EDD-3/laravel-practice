@extends('layouts.app')

@section('content')

    <ul>

        @foreach($posts as $post)

            <li>
                <div class="image-container"> 

                    <img height="100rm" src="{{$post->path}}" alt="">
                </div>

                <a href="{{route('posts.show', $post->id)}}">{{$post->title}}</a>

            </li>

        @endforeach

    </ul>

@endsection
