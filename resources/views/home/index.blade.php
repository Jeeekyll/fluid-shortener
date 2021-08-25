@extends('layouts.layout')

@section('content')
    <h3 class="mt-5 text-center">
        Welcome to Links shortener
    </h3>
    <p class="lead text-center">
        Insert your link below and we will shorten it for you
    </p>

    <div class="row justify-content-center align-items-center mt-4">
        <form action="{{route('home.store')}}" method="post" class="col-8 justify-content-center">
            @csrf
            <div class="input-group mb-1">
                <input type="text"
                       id="original_link"
                       name="original_link"
                       class="form-control @error('original_link') is-invalid @enderror"
                       placeholder="Put your link">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Cut</button>
                </div>
            </div>
            @foreach($errors->all() as $error)
                <p class="text-danger text-small">*{{$error}}</p>
            @endforeach
        </form>
    </div>

    <div class="col-12">
        @if(session()->has('success'))
            <div class="text-center">
                <p class="text-success lead">{{session('success')}}</p>
            </div>
        @endif
    </div>
@endsection
