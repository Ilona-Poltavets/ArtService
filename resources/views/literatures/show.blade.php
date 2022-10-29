@extends('layouts.main')
@section('title',$lit->title)
@section('content')
    <div class="show-content">
        <h1 class="show-content__header">{{$lit->title}}</h1>
        <div class="show-content__content">
            {{$lit->text}}
        </div>
    </div>
    <div class="about-author"></div>
@endsection
