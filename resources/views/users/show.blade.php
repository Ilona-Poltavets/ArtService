@extends('layouts.main')

@section('title',$user->name . ' ' . $user->surname)

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{ __('Edit profile') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{route('edit_profile',$user->id)}}">
                        @csrf
                        @method('PATCH')
                        @include('users.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
