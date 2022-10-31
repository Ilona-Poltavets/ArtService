@extends('layouts.main')
@section('title','Add expert')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{ __('Add expert') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{route('store_expert')}}">
                        @csrf
                        @include('users.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
