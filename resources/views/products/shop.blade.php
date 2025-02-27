@extends('layouts.app')

@section('content')

<div class="banner">
    <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('assets/img/bg-header.jpg');">
        <div class="container">
            <h1 class="pt-5">
                Shopping Page
            </h1>
            <p class="lead">
                Save time and leave the groceries to us.
            </p>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="shop-categories owl-carousel mt-5">
                @foreach($categories as $category)
                <div class="item">
                    <a href="{{ route('single.category', $category->id) }}">
                        <div class="media d-flex align-items-center justify-content-center">
                            <span class="d-flex mr-2"><i class="sb-bistro-{{$category->icon}}"></i></span>
                            <div class="media-body">
                                <h5>{{$category->icon}}</h5>
                                <p>{{ $category->category_desc }}</p>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<section id="most-wanted">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="title">Most Wanted</h2>
                <div class="product-carousel owl-carousel">
                    @foreach($mostWanted as $most)
                    <div class="item">
                        <div class="card card-product">
                            <div class="card-ribbon">
                                <div class="card-ribbon-container right">
                                    <span class="ribbon ribbon-primary">SPECIAL</span>
                                </div>
                            </div>
                            <div class="card-badge">
                            @if(!empty($most->exp_date))
                                <div class="card-badge-container left">
                                    <span class="badge badge-primary">
                                        Until {{ $most->exp_date}}
                                    </span>
                                    <span class="badge badge-primary">
                                        20% OFF
                                    </span>
                                </div>
                            @endif
                                <img src="{{ asset('assets/img/' . $most->image . '') }}" alt="Card image 2" class="card-img-top">
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="{{ route('single.product', $most->id) }}">{{ $most->name }}</a>
                                </h4>
                                <div class="card-price">
                                    <!-- <span class="discount">Rp. 300.000</span> -->
                                    <span class="reguler">{{ $most->price }} EGP</span>
                                </div>
                                <a href="{{ route('single.product', $most->id) }}" class="btn btn-block btn-primary">
                                    View Product
                                </a>

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@if($vegetables->count() > 0)
<section id="vegetables" class="gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="title">Vegetables</h2>
                <div class="product-carousel owl-carousel">
                    @foreach($vegetables as $product)
                    <div class="item">
                        <div class="card card-product">
                            <div class="card-ribbon">
                                <div class="card-ribbon-container right">
                                    <span class="ribbon ribbon-primary">SPECIAL</span>
                                </div>
                            </div>
                            <div class="card-badge">
                                <div class="card-badge-container left">
                                    <span class="badge badge-primary">
                                        Until {{ $product->exp_date }}
                                    </span>
                                    <span class="badge badge-primary">
                                        20% OFF
                                    </span>
                                </div>
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
                </div>
            </div>
        </div>
    </div>
</section>
@endif
@if($meats->count() > 0)
<section id="meats">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="title">Meats</h2>
                <div class="product-carousel owl-carousel">
                    @foreach($meats as $product)
                    <div class="item">
                        <div class="card card-product">
                            <div class="card-ribbon">
                                <div class="card-ribbon-container right">
                                    <span class="ribbon ribbon-primary">SPECIAL</span>
                                </div>
                            </div>
                            <div class="card-badge">
                                <div class="card-badge-container left">
                                    <span class="badge badge-primary">
                                        Until {{ $product->exp_date }}
                                    </span>
                                    <span class="badge badge-primary">
                                        20% OFF
                                    </span>
                                </div>
                                <img src="{{ asset('assets/img/' . $product->image . '') }}" alt="Card image 2" class="card-img-top">
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="{{ route('single.product', $product->id) }}">{{ $product->name }}</a>
                                </h4>
                                <div class="card-price">
                                    <!-- <span class="discount">Rp. 300.000</span> -->
                                    <span class="reguler">{{ $product->price }}</span>
                                </div>
                                <a href="{{ route('single.product', $product->id) }}" class="btn btn-block btn-primary">
                                    Add to Cart
                                </a>

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif
@if($fishes->count() > 0)
<section id="fishes" class="gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="title">Fishes</h2>
                <div class="product-carousel owl-carousel">
                    @foreach($fishes as $product)
                    <div class="item">
                        <div class="card card-product">
                            <div class="card-ribbon">
                                <div class="card-ribbon-container right">
                                    <span class="ribbon ribbon-primary">SPECIAL</span>
                                </div>
                            </div>
                            <div class="card-badge">
                                <div class="card-badge-container left">
                                    <span class="badge badge-primary">
                                        Until {{ $product->exp_date }}
                                    </span>
                                    <span class="badge badge-primary">
                                        20% OFF
                                    </span>
                                </div>
                                <img src="{{ asset('assets/img/' . $product->image . '') }}" alt="Card image 2" class="card-img-top">
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="{{ route('single.product', $product->id) }}">{{ $product->name }}</a>
                                </h4>
                                <div class="card-price">
                                    <!-- <span class="discount">Rp. 300.000</span> -->
                                    <span class="reguler">{{ $product->price }}</span>
                                </div>
                                <a href="{{ route('single.product', $product->id) }}" class="btn btn-block btn-primary">
                                    Add to Cart
                                </a>

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif
@if($fruits->count() > 0)
<section id="fruits">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="title">Fruits</h2>
                <div class="product-carousel owl-carousel">
                    @foreach($fruits as $product)
                    <div class="item">
                        <div class="card card-product">
                            <div class="card-ribbon">
                                <div class="card-ribbon-container right">
                                    <span class="ribbon ribbon-primary">SPECIAL</span>
                                </div>
                            </div>
                            <div class="card-badge">
                                <div class="card-badge-container left">
                                    <span class="badge badge-primary">
                                        Until {{ $product->exp_date }}
                                    </span>
                                    <span class="badge badge-primary">
                                        20% OFF
                                    </span>
                                </div>
                                <img src="{{ asset('assets/img/' . $product->image . '') }}" alt="Card image 2" class="card-img-top">
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="{{ route('single.product', $product->id) }}">{{ $product->name }}</a>
                                </h4>
                                <div class="card-price">
                                    <!-- <span class="discount">Rp. 300.000</span> -->
                                    <span class="reguler">{{ $product->price }}</span>
                                </div>
                                <a href="{{ route('single.product', $product->id) }}" class="btn btn-block btn-primary">
                                    Add to Cart
                                </a>

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif
@endsection