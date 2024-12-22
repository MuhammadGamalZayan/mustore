@extends('layouts.app')

@section('content')

<div class="banner">
    <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('{{ asset('assets/img/bg-header.jpg')}}');">
        <div class="container">
            <h1 class="pt-5">
                {{__('Your Transuction has been succesfully')}}
            </h1>
            <a href="{{ route('home') }}" class="btn btn-primary">Go Home</a>
            <p class="lead">
            </p>
        </div>
    </div>
</div>

<div class="container">

</div>

@endsection