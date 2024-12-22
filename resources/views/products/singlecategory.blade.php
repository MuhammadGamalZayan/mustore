@extends('layouts.app')

@section('content')
<div class="banner">
    <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('{{ asset('assets/img/bg-header.jpg') }}');">
        <div class="container">
            <h1 class="pt-5">
             {{__('Category Page')}}
            </h1>
            <p class="lead">
                Save time and leave the groceries to us.
            </p>
        </div>
    </div>
</div>


<section id="most-wanted">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if($products->count() > 0)
                <h2 class="title">{{__('Products')}}</h2>
                <div class="product-carousel owl-carousel">
                    @foreach ($products as $product)
                    <div class="item">
                        <div class="card card-product">
                            <div class="card-ribbon">
                                <div class="card-ribbon-container right">
                                    <span class="ribbon ribbon-primary">SPECIAL</span>
                                </div>
                            </div>
                            @if(!empty($product->exp_date))
                            <div class="card-badge">
                                <div class="card-badge-container left">
                                    <span class="badge badge-default" style="color:gray">
                                        Until {{ $product->exp_date }}
                                    </span>
                                    <span class="badge badge-primary">
                                        20% OFF
                                    </span>
                                </div>
                            @endif
                                <img src="{{ asset('assets/img/'. $product->image . '') }}" alt="Card image 2" class="card-img-top">
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="{{ route('single.product', $product->id) }}">{{ $product->name }}</a>
                                </h4>
                                <div class="card-price">
                                    <!-- <span class="discount">Rp. 300.000</span> -->
                                    <span class="reguler">{{ $product->price }} EGP</span>
                                </div>
                                <a href="{{ route('single.product', $product->id) }}" class="btn btn-block btn-primary">
                                    View Product
                                </a>

                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <p class="alert alert-success">There is no products <a href="{{ route('home') }}" class="btn btn-block btn-primary">Back to shop</a></p>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>



@endsection