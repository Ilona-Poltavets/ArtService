@extends('layouts.main')
@section('title','Edit Review')
@section('content')
    <h1 class="text-center">Edit Review</h1>
    <form method="post" action="{{route('rates.update',[$rate->id,$postId])}}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        @include('rates.form')
    </form>
@endsection
