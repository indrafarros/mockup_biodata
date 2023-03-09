@extends('layouts.auth')

@section('title', 'Login')

@section('content');
    <div class="main d-flex justify-content-center align-items-center">
        <div class="login-box rounded-1">
            @if (Session::has('message'))
                <div class="alert alert-success">
                    {{ Session::get('message') }}
                </div>
            @endif
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" id="email" required>
                </div>
                <div class="mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary form-control">Login</button>
                </div>
                <div class="mb-3 text-center">
                    Don't have an account ? <a href="{{ route('register') }}">Sign Up</a>
                </div>
            </form>
        </div>
    </div>
@endsection
