@extends('layouts.app')

@section('content')

<div class="banner">
    <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('{{ asset('assets/img/bg-header.jpg') }}');">
        <div class="container">
            <h1 class="pt-5">
                {{__('Settings')}}
            </h1>
            <p class="lead">
                Update Your Account Info
            </p>
        </div>
    </div>
</div>

    <div class="container mt-5">
        @if(\Session::has('update'))
        <div class="alert alert-success">
            <p>{!! \Session::get('update') !!}</p>
        </div>
        @endif
    </div>

<section id="checkout">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xs-12 col-sm-6">
                <h5 class="mb-3">ACCOUNT DETAILS</h5>
                <!-- Bill Detail of the Page -->

                <form action="{{ route('account.settings.update', $myData->id) }}" class="bill-detail" method="POST">
                    @csrf
                    <fieldset>
                        <div class="form-group row">
                            <div class="col">
                                <input class="form-control" name="fullName" placeholder="Full Name" type="text" value="{{ $myData->fullName }}">
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" placeholder="Address" name="address">{{ $myData->address }}</textarea>
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="city" placeholder="Town / City" value="{{ $myData->city }}" type="text">
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="country" placeholder="State / Country" type="text" value="{{ $myData->country }}">
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="postal" placeholder="Postcode / Zip" type="text" value="{{ $myData->postal}}">
                        </div>
                        <div class="form-group row">
                            <div class="col">
                                <input class="form-control" name="email" placeholder="Email Address" value="{{ $myData->email }}" type="email">
                            </div>
                            <div class="col">
                                <input class="form-control" name="phone" placeholder="Phone Number" type="tel" value="{{ $myData->phone }}">
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <input class="form-control" placeholder="Password" type="password">
                        </div> -->
                        <div class="form-group" style="width:150px;height:150px;">
                            <img width="150" height="150" class="form-control" name="image" type="text" src="{{ asset('/assets/users_images/'. $myData->image . '') }}">
                        </div>
                        <div class="form-group text-right">
                            <button href="#" name="submit" type="submit" class="btn btn-primary">UPDATE</button>
                            <div class="clearfix">
                                </div>
                            </fieldset>
                        </form>
                <!-- Bill Detail of the Page end -->
            </div>
        </div>
    </div>
</section>
@endsection