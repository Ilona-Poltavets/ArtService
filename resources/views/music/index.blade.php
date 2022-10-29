@extends('layouts.main')
@section('title', 'Sounds')
@section('content')
    @foreach($music as $sound)
        <div class="content-tile">
            <h2 class="content-tile__title">{{$sound->title}}</h2>
            <hr>
            <div class="content-tile__main-content">
                <audio controls>
                    <source src="{{asset($sound->song)}}"  type="audio/mp3">
                    Your browser does not support the <code>audio</code> element
                </audio>
            </div>
        </div>
    @endforeach
@endsection
