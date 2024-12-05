@extends('layouts.main')
@section('title', 'Login')
@section('content')
<div class="d-flex vh-100 justify-content-center align-items-center">
    <div class="row w-100">
        <!-- Kolom Login Title -->
        <div class="col-12 text-center mb-3">
            <h2>Login</h2>
        </div>
        
        <!-- Kolom Form -->
        <div class="col-12 d-flex justify-content-center">
            <form action="{{ route('login.auth') }}" method="post" class="w-50">
                <x-flash-message/>
                @csrf
                <!-- Email input -->
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="email" id="email" name="email" class="w-100 form-control" required/>
                    <label class="form-label" for="email">Email address</label>
                </div>

                <!-- Password input -->
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="password" id="password" name="password" class="form-control" required/>
                    <label class="form-label" for="password">Password</label>
                </div>

                <!-- Submit button -->
                <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn form-control btn-primary mb-4">
                    Log in
                </button>
            </form>
        </div>
    </div>
</div>

@endsection
