@extends('layouts.auth')

@section('title', 'Register new account')

@section('content')
    <div class="main d-flex flex-column justify-content-center align-items-center">
        @if ($errors->any())
            <div class="alert alert-danger" style="width:500px">
                <ul>
                    @foreach ($errors->all() as $val)
                        <li>{{ $val }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="login-box rounded-1">
            <form action="{{ route('register.user') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" id="email">
                </div>
                <div class="mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary form-control">Register</button>
                </div>
                <div class="mb-3 text-center">
                    Have an account ? <a href="{{ route('login.index') }}">Login</a>
                </div>
            </form>
        </div>
    </div>
@endsection
