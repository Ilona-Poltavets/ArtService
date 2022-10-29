@extends('layouts.main')
@section('title', 'Arts')
@section('content')
    @foreach($arts as $art)
        <div class="content-tile">
            <h2 class="content-tile__title">{{$art->title}}</h2>
            <hr>
            <div class="content-tile__main-content">
                <img class="content-tile__image" src="{{asset($art->img)}}" alt="{{$art->title}}">
            </div>
        </div>
    @endforeach
@endsection
