@extends('layouts.main')
@section('title','Create Post')
@section('content')
    <h1 class="text-center">Edit Post</h1>
    <form method="post" action="{{route('posts.update',$post->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        @include('posts.form')
    </form>
@endsection
