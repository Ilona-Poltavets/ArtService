@extends('layouts.main')
@section('title','Edit')
@section('content')
    <h1>Edit literary work</h1>
    <form action="{{route('literatures.update',$lit->id)}}" method="POST">
        @method('PATCH')
        @csrf
        @include('literatures.form')
    </form>
@endsection
