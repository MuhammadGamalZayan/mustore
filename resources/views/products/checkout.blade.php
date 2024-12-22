
@extends('layouts.app')

@section('content')


<div id="page-content" class="page-content">
<div class="banner">
    <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('assets/img/bg-header.jpg');">
        <div class="container">
            <h1 class="pt-5">
                Checkout
            </h1>
            <p class="lead">
                Save time and leave the groceries to us.
            </p>
        </div>
    </div>
</div>

<section id="checkout">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-7">
                <h5 class="mb-3">BILLING DETAILS</h5>
                <!-- Bill Detail of the Page -->
                <form action="{{ route('products.process.checkout') }}" method="POST" class="bill-detail">
                    @csrf
                    <fieldset>
                        <div class="form-group row">
                            <div class="col">
                                <input class="form-control" name="name" placeholder="Name" type="text">
                            </div>
                            <div class="col">
                                <input class="form-control" placeholder="Last Name" type="text" name="last_name">
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <input class="form-control" placeholder="Company Name" type="text">
                        </div> -->
                        <div class="form-group">
                            <textarea class="form-control" placeholder="Address" name="address"></textarea>
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Town / City" type="text" name="town">
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="State / Country" type="text" name="state">
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Postcode / Zip" type="text" name="zip_code">
                        </div>
                        <div class="form-group row">
                            <div class="col">
                                <input class="form-control" placeholder="Email Address" type="email" name="email">
                            </div>
                            <div class="col">
                                <input class="form-control" placeholder="Phone Number" type="tel" name="phone_number">
                            </div>
                        </div>
                        



                        <div class="form-group row">
                            <div class="col">
                                <input class="form-control" value="{{ $checkoutSubtotal + 20 }}" type="hidden" name="price">
                            </div>
                            <div class="col">
                                <input class="form-control" value="{{ Auth::user()->id }}" type="hidden" name="user_id">
                            </div>
                        </div>


                        <div class="form-group">
                            <textarea class="form-control" placeholder="Order Notes" name="order_notes"></textarea>
                        </div>
                    </fieldset>
                    <p class="text-right mt-3">
                        <input checked="" type="checkbox"> I’ve read &amp; accept the <a href="#">terms &amp; conditions</a>
                    </p>
                    <button name="submit" type="submit" class="btn btn-primary float-right">PROCEED TO CHECKOUT <i class="fa fa-check"></i></button>
                    <div class="clearfix">
                    </div>
                </form>
                <!-- Bill Detail of the Page end -->
            </div>
            <div class="col-xs-12 col-sm-5">
                <div class="holder">
                    <h5 class="mb-3">YOUR ORDER</h5>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Products</th>
                                    <th class="text-right">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($checkoutProducts as $product)
                                <tr>
                                    <td>
                                        {{ $product->name }} x {{ $product->qty }}
                                    </td>
                                    <td class="text-right">
                                        {{ $product->price }} EGP
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfooter>
                                
                                <tr>
                                    <td>
                                        <strong>Cart Subtotal</strong>
                                    </td>
                                    <td class="text-right">
                                        {{ $checkoutSubtotal }} EGP
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Shipping</strong>
                                    </td>
                                    <td class="text-right">
                                        20 EGP
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>ORDER TOTAL</strong>
                                    </td>
                                    <td class="text-right">
                                        <strong>{{ $checkoutSubtotal + 20 }} EGP</strong>
                                    </td>
                                </tr>
                            </tfooter>
                        </table>
                    </div>

                    
                </div>
                <!-- <p class="text-right mt-3">
                    <input checked="" type="checkbox"> I’ve read &amp; accept the <a href="#">terms &amp; conditions</a>
                </p>
                <a href="#" class="btn btn-primary float-right">PROCEED TO CHECKOUT <i class="fa fa-check"></i></a>
                <div class="clearfix">
            </div> -->
        </div>
    </div>
</section>
@endsection