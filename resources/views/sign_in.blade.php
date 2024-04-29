@extends('layouts.main')
@section('content')

{{ csrf_field()}}
<div class="container my-5 pt-5">
<div class="card text-center w-75 mx-auto">
  <div class="card-body">
    <h1 class="card-title py-4">Sign In</h1>
    <form class="px-5 mx-5" action="{{ route('validate_sign_in') }}" method="POST">
            @csrf
            
            <!-- Display errors -->
            @error('error')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        
            <div class="input-group mb-4" data-mdb-input-init>
                <input type="email" name="email" class="form-control" placeholder="Email"/>
            </div>

            <div class="input-group mb-4" data-mdb-input-init>
                <input type="password" class="form-control" name="password" placeholder="Password"/>

            </div>

            <div class="container text-center">
                <button type="submit" class="btn btn-primary mb-4">Sign In</button>
            </div>

            <p class="text-center">Don't have an account? <a href="{{ route('register') }}">click here!</a></p>

        </form>

  </div>
</div>
        

        
    </div>
@endsection


