@extends('layouts.main')
@section('title','Reviews')
@section('content')
    <h1>Reviews of {{$user->name}} {{$user->surname}}</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">user_id</th>
            <th scope="col">post_id</th>
            <th scope="col">Mark complexity</th>
            <th scope="col">Mark creativity</th>
            <th scope="col">Mark innovativeness</th>
            <th scope="col">Review</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($reviews as $review)
            <tr>
                <td>{{$review->id}}</td>
                <td>{{$review->user_id}}</td>
                <td>{{$review->post_id}}</td>
                <td>{{$review->mark_complexity}}</td>
                <td>{{$review->mark_creativity}}</td>
                <td>{{$review->mark_innovativeness}}</td>
                <td>{{$review->review}}</td>
                <td><a class="btn btn-info" href="{{route('rates.edit',[$review->id,$review->post_id])}}">Edit</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection()
