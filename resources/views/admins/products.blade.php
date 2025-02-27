@extends('layouts.admin')
@section('content')
<div class="container mt-5">
    @if(\Session::has('delete'))
    <div class="alert alert-danger">
        <p>{!! \Session::get('delete') !!}</p>
    </div>
    @endif
  </div>

  <div class="container mt-5">
    @if(\Session::has('success'))
    <div class="alert alert-success">
        <p>{!! \Session::get('success') !!}</p>
    </div>
    @endif
  </div>
<div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-4 d-inline">Products</h5>
          <a  href="{{ route('products.create') }}" class="btn btn-primary mb-4 text-center float-right">Create Products</a>
        
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">product</th>
                <th scope="col">price in EGP</th>
                <th scope="col">expiration date</th>
                <th scope="col">delete</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($products as $product)
                <tr>
                    <th scope="row">{{ $product->id }}</th>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->exp_date }}</td>
                     <td><a href="{{ route('products.delete', $product->id) }}" class="btn btn-danger  text-center ">delete</a></td>
                </tr>
            @endforeach
            </tbody>
          </table> 
        </div>
      </div>
    </div>
</div>

@endsection