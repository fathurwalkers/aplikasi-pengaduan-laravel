@extends('layouts.auth-layouts')

@section('header-content', 'Register')

@section('main-content')
    <div class="card fat">
        <div class="card-body">
            <h4 class="card-title">Daftar Akun</h4>
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    @if (session('status'))
                        <div class="alert alert-info">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
            <form action="{{ route('post-register') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="login_username">Username</label>
                    <input name="login_username" id="login_username" type="text" class="form-control" autofocus>
                </div>

                <div class="form-group">
                    <input name="login_password" id="login_password" type="password" class="form-control">
                </div>

                <div class="form-group">
                    <div class="custom-checkbox custom-control">
                        <input type="checkbox" id="remember" class="custom-control-input">
                        <label for="remember" class="custom-control-label">Remember Me</label>
                    </div>
                </div>

                <div class="form-group m-0">
                    <button type="submit" class="btn btn-primary btn-block">
                        Daftar Akun
                    </button>
                </div>
                <div class="mt-4 text-center">
                    Sudah punya Akun? <a href="{{ route('login') }}">Login sekarang!</a>
                </div>
            </form>

        </div>
    </div>
@endsection
