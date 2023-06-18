@extends('layouts.auth-layouts')

@section('header-content', 'Login')

@section('main-content')
    <div class="card fat">
        <div class="card-body">
            <h4 class="card-title">Login</h4>
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    @if (session('status'))
                        <div class="alert alert-info">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
            <form wire:submit.prevent="login">
                @csrf
                <div class="form-group">
                    <label for="username">Username</label>
                    <input wire:model="username" id="username" type="text" class="form-control" autofocus>
                    @if (session('status_fail_username'))
                        <div class="invalid-feedback">
                            {{ session('status_fail_username') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="password">Password
                        <a href="forgot.html" class="float-right">
                            Forgot Password?
                        </a>
                    </label>
                    <input wire:model="password" id="password" type="password" class="form-control">
                    @if (session('status_fail_password'))
                        <div class="invalid-feedback">
                            {{ session('status_fail_password') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <div class="custom-checkbox custom-control">
                        <input type="checkbox" id="remember" class="custom-control-input">
                        <label for="remember" class="custom-control-label">Remember Me</label>
                    </div>
                </div>

                <div class="form-group m-0">
                    <button class="btn btn-primary btn-block">
                        Login
                    </button>
                </div>
                <div class="mt-4 text-center">
                    Don't have an account? <a href="{{ route('dashboard') }}">Create One</a>
                </div>
            </form>

        </div>
    </div>
@endsection
