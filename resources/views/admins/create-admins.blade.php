@extends('layouts.admin')
@section('content')


<div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-5 d-inline">Create Admins</h5>
      <form method="POST" action="{{ route('admins.store') }}" enctype="multipart/form-data">
        @csrf
            <!-- Email input -->
            <div class="form-outline mb-4 mt-4">
              <input type="text" name="name"  class="form-control" placeholder="username" autocomplete="off" />   
            </div>
            <div class="form-outline mb-4">
              <input type="email" name="email"  class="form-control" placeholder="email" autocomplete="off" />
            </div>
            <div class="form-outline mb-4">
              <input type="password" name="password" class="form-control" placeholder="password" />
            </div>
            <!-- Submit button -->
            <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>
          </form>
        </div>
      </div>
    </div>
</div>

@endsection