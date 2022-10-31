@extends('layouts.main')
@section('title',$post->title)
@section('content')
    <div class="show-content">
        <h1 class="show-content__header">{{$post->title}}</h1>
        <hr>
        <div class="show-content__content">
            @if($post->category=='literature')
            <object class="show-content__preview" data='{{asset($post->pathFile)}}' type="application/pdf">
                <iframe src='{{asset($post->pathFile)}}'>
                    <p>This browser does not support PDF!</p>
                </iframe>
            </object>
            @elseif($post->category=='art')
                <a data-fancybox="single" href="{{asset($post->pathFile)}}">
                    <img src="{{asset($post->pathFile)}}" alt="{{$post->title}}" class="show-content__photo single-images">
                </a>
            @elseif($post->category=='sound')
                <div class="show-content__sound">
                    <audio controls>
                        <source src="{{asset($post->pathFile)}}" type="audio/mp3">
                        Your browser does not support the <code>audio</code> element
                    </audio>
                </div>
            @endif
        </div>
        <div class="show-content__about-author"><a href="{{route('get_posts',$post->user_id)}}">{{$post->user->name}} {{$post->user->surname}}</a></div>
        <hr>
        <div class="show-content__comments">
            <h2>Comments</h2>
            <hr>
            <div class="show-content__comment">

            </div>
        </div>
    </div>

@endsection
