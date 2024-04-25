@extends('layouts.main')
@section('content')
<div class="container my-5">
        <h1 class="mb-5 text-center">Sign Up</h1>
        <form class="px-5 mx-5" action="{{ route('validate_register') }}" method="POST">
            @csrf
            
            <div class="input-group mb-3" data-mdb-input-init>
                <input type="text" name="first_name" class="form-control" placeholder="First Name"/>
            </div>

            <div class="input-group mb-3" data-mdb-input-init>
                <input type="text" name="last_name" class="form-control" placeholder="Last Name"/>
            </div>

            <div class="input-group mb-3" data-mdb-input-init>
                <input type="text" name="country" class="form-control" placeholder="Country"/>
            </div>

            <div class="input-group mb-3" data-mdb-input-init>
                <input type="text" name="postal" class="form-control" placeholder="Postal Code"/>
            </div>

            <div class="input-group mb-3" data-mdb-input-init>
                <input type="email" name="email" class="form-control" placeholder="Email"/>
            </div>

            <div class="input-group mb-3" data-mdb-input-init>
                <input type="password" class="form-control" name="password" placeholder="Password"/>

            </div>

            <div class="container text-center">
                <button type="submit" class="btn btn-primary mb-3">Register</button>
            </div>

            <p class="text-center">Already have an account? <a href="{{ route('sign_in') }}">click here!</a></p>
        </form>
    </div>
@endsection


