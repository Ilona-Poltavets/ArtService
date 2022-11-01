@extends('layouts.main')
@section('title','Add Review')
@section('content')
    <h1 class="text-center">Add Review</h1>
    <form method="post" action="{{route('rates.store',$postId)}}" enctype="multipart/form-data">
        @csrf
        @include('rates.form')
    </form>
@endsection
