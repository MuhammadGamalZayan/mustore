@extends('layouts.admin')
@section('content')
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
          <h5 class="card-title mb-4 d-inline">Admins</h5>
         <a  href="{{ route('admins.create') }}" class="btn btn-primary mb-4 text-center float-right">Create Admins</a>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Admin UID</th>
                <th scope="col">username</th>
                <th scope="col">email</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($adminsMembers as $admin)
                <tr>
                    <th scope="row">{{ $admin->id }}</th>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->email }}</td>
                   
                </tr>
            @endforeach

            </tbody>
          </table> 
        </div>
      </div>
    </div>
</div>
@endsection