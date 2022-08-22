@extends('layouts.client')
@section('page-id', 'login')
@section('content')
    <main>
        <section class="login_main">
            <div class="container">
                <h2 class="title">Login</h2>
                <form class="login-form">
                    <input type="text" id="uname" name="uname" placeholder="email..." /><br />
                    <input type="password" id="password" name="password" placeholder="Password..." />
                    <a href="" class="submit-btn">Login</a>
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
