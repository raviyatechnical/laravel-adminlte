@extends('layouts.auth')
@section('body_class', 'hold-transition login-page')
@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="{{ url('/') }}">
            {{ config('app.name') }}
        </a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <!-- __('Reset Password') -->
            <p class="login-box-msg">
                {{ __('You forgot your password? Here you can easily retrieve a new password.') }}
            </p>
            @if(session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="input-group mb-3">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" placeholder="Email" required
                        autocomplete="email" autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-12">
                        <!-- __('Send Password Reset Link') -->
                        <button type="submit"
                            class="btn btn-primary btn-block">{{ __('Request new password') }}</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            @guest
                @if(Route::has('login'))
                    <p class="mt-3 mb-1">
                        <a href="{{ route('login') }}">{{ __('Login') }}</a>
                    </p>
                @endif
                @if(Route::has('register'))
                <p class="mb-0">
                    <a href="{{ route('register') }}" class="text-center">{{ __('Register a new membership') }}</a>
                </p>
                @endif
            @endguest
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
@endsection
