@extends('layouts.main')
@section('title', 'Texts')
@section('content')
    @foreach($literatures as $lit)
        <div class="content-tile">
            <a class="content-tile__link" href="{{route('literatures.show',$lit->id)}}">
                <h2 class="content-tile__title">{{$lit->title}}</h2>
                <hr>
                <div class="content-tile__main-content">{{$lit->text}}
                </div>
            </a>
        </div>
    @endforeach
@endsection
