@extends('layouts.main')
@section('title','Create')
@section('content')
    <h1>Add literary work</h1>
    <form action="{{route('literatures.store')}}" method="POST">
        @csrf
        @include('literatures.form')
    </form>
@endsection
