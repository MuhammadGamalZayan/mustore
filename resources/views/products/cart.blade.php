@extends('layouts.app')

@section('content')
<div class="banner">
    <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('assets/img/bg-header.jpg');">
        <div class="container">
            <h1 class="pt-5">
                Your Cart
            </h1>
            <p class="lead">
                Save time and leave the groceries to us.
            </p>
        </div>
    </div>
</div>
@if(\Session::has('delete'))
    <div class="alert alert-danger">
        <ul>
            <li>{!! \Session::get('delete')  !!}</li>
        </ul>
    </div>
    @endif
<section id="cart">
    <div class="container">
        <div class="row">
            @if($itemsInCart->count() > 0)
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="10%"></th>
                                <th>Products</th>
                                <th>Price</th>
                                <th width="15%">Quantity</th>
                                <!-- <th width="15%">Update</th> -->
                                <th>Subtotal</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($itemsInCart as $product)
                            <tr>
                                <td>
                                    <a href="{{ route('single.product', $product->pro_id) }}">
                                        <img src="{{ asset('assets/img/' . $product->image . '') }}" width="60">
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('single.product', $product->pro_id) }}" class="text-gray">
                                        {{$product->name}}<br>
                                        <small>1000g</small>
                                    </a>
                                </td>
                                <td>
                                    {{ $product->price }} EGP
                                </td>
                                <td>
                                    <!-- <input class="form-control" type="number" min="1" data-bts-button-down-class="btn btn-primary" data-bts-button-up-class="btn btn-primary" value="{{ $product->qty }}" name="vertical-spin"> -->
                                    
                                    <p class="form-control"> {{ $product->qty }}</p>
                                </td>
                                <!-- <td>
                                    <a href="#" class="btn btn-primary">UPDATE</a>
                                </td> -->
                                <td>
                                 {{ $product->price * $product->qty}} EGP
                                </td>
                                <td>
                                    <a href="{{route('products.delete.cart', $product->id)}}" class="text-danger"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @else
            <div class="col">
                <a href="{{ route('products.shop') }}" class="btn btn-default">Continue Shopping</a>
            </div>
            @endif
            <div class="col text-right">
            
                @if($subTotal > 0)
                <div class="clearfix"></div>
                <h6 class="mt-3">Total: {{ $subTotal }} EGP</h6>
                <form action="{{ route('products.prepare.checkout') }}" method="POST">
                    @csrf
                    <input type="hidden" name="price" value="{{ $subTotal }}">
                    <button name="submit" class="btn btn-lg btn-primary">Checkout <i class="fa fa-long-arrow-right"></i></button>
                </form>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection