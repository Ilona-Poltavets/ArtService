@extends('layouts.main')
@section('title', 'Arts')
@section('content')
    @foreach($posts as $post)

        <div class="content-tile">
            <a class="content-tile__link" href="{{route('posts.show',$post->id)}}">
                <h2 class="content-tile__title">{{$post->title}}</h2>
                <hr>
            </a>
                <div class="content-tile__main-content">
                    @if($post->category=='literature')
                        <div class="content-tile__main-content">
                            <img class="content-tile__pdf_icon" src="{{asset('/css/icons/pdf.png')}}"
                                 alt="{{$post->title}}"/><a
                                href="{{asset($post->pathFile)}}" target="_blank">{{$post->title}}</a>
                        </div>
                    @elseif($post->category=='art')
                        <img class="content-tile__image" src="{{asset($post->pathFile)}}" alt="{{$post->title}}">
                    @elseif($post->category=='sound')
                        <div class="content-tile__main-content">
                            <audio controls>
                                <source src="{{asset($post->pathFile)}}" type="audio/mp3">
                                Your browser does not support the <code>audio</code> element
                            </audio>
                        </div>
                    @endif
                </div>
                <hr>
                <div class="content-tile__footer">
                    Author:<a href="{{route('get_posts',$post->user_id)}}"> {{$post->user->name}} {{$post->user->surname}}</a>
                </div>
        </div>

    @endforeach
@endsection
