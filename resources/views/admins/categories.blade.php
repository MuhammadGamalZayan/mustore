@extends('layouts.admin')
@section('content')
<div class="container mt-5">
  @if(\Session::has('success'))
  <div class="alert alert-success">
      <p>{!! \Session::get('success') !!}</p>
  </div>
  @endif
</div>

<div class="container mt-5">
  @if(\Session::has('update'))
  <div class="alert alert-success">
      <p>{!! \Session::get('update') !!}</p>
  </div>
  @endif
</div>
<div class="container mt-5">
  @if(\Session::has('delete'))
  <div class="alert alert-danger">
      <p>{!! \Session::get('delete') !!}</p>
  </div>
  @endif
</div>
<div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-4 d-inline">Categories</h5>
         <a  href="{{ route('admins.storecategory') }}" class="btn btn-primary mb-4 text-center float-right">Create Categories</a>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">update</th>
                <th scope="col">delete</th>
              </tr>
            </thead>
            <tbody>
                @foreach($allCategories as $category)
              <tr>
                <th scope="row">{{ $category->id }}</th>
                <td>{{ $category->name }}</td>
                <td><a  href="{{ route('admins.updatecategory', $category->id) }}" class="btn btn-warning text-white text-center ">Update </a></td>
                <td><a href="{{ route('admins.deletecategory', $category->id) }}" class="btn btn-danger  text-center ">Delete </a></td>
              </tr>
              @endforeach
            </tbody>
          </table> 
        </div>
      </div>
    </div>
</div>

@endsection