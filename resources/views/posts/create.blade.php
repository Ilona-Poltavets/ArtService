@extends('layouts.main')
@section('title','Create Post')
@section('content')
    <h1 class="text-center">Add Post</h1>
    <form method="post" action="{{route('posts.store')}}" enctype="multipart/form-data">
        @csrf
        @include('posts.form')
    </form>
@endsection
