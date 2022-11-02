@extends('layouts.main')
@section('title','Admin panel')
@section('content')
    <a href="{{route('create_expert')}}" class="btn btn-outline-success">Add expert</a>
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
            <th scope="col">Name</th>
            <th scope="col">Surname</th>
            <th scope="col">Birthday</th>
            <th scope="col">Gender</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <th>{{$user->id}}</th>
                <th>{{$user->name}}</th>
                <th>{{$user->surname}}</th>
                <th>{{$user->bday}}</th>
                <th>{{$user->gender}}</th>
                <th>{{$user->email}}</th>
                <th>{{$user->roles[0]->name}}</th>
                <th>
                    <div class="btn-group" role="group">
                        <a class="btn btn-primary" href="{{route('profile',$user->id)}}">Edit</a>
                        @if($user->roles[0]->name=='expert')
                            <a class="btn btn-success" href="{{route('get_rate',$user->id)}}">Show review</a>
                        @elseif($user->roles[0]->name=='author')
                            <a class="btn btn-success" href="{{route('get_posts',$user->id)}}">Show posts</a>
                        @endif
                        <form action="{{route('delete_user',$user->id)}}" method="post">
                            @method("DELETE")
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </th>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
