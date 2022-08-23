@extends('layouts.client')
@section('page-id', 'login')
@section('content')
    <main>
        <section class="login_main">
            <div class="container">
                <h2 class="title">Login</h2>
                <form class="login-form" method="post" action="{{ route('client.post-login') }}">
                    @csrf
                    <input type="text" id="email" name="email" placeholder="email..." /><br />
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                        <br>
                    @enderror
                    <input type="password" id="password" name="password" placeholder="Password..." />
                    @error('password')
                        <br>
                        <span class="invalid-feedback" role="alert">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                    @enderror
                    <button class="submit-btn">Login</button>
                </form>
                <span class="another-option">Or</span>
                <div class="social-login">
                    <a href="" class="social-btn">Login with Facebook account
                        <img src="{{ asset('clients/img/icon/facebook.png') }}" alt="" class="login-icon" /></a>
                    <a href="" class="social-btn">Login with Google account
                        <img src="{{ asset('clients/img/icon/search.png') }}" alt="" class="login-icon" /></a>
                </div>
            </div>
        </section>
    </main>
@endsection
