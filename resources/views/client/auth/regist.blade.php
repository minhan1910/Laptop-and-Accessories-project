@extends('layouts.client')
@section('page-id', 'regist')
@section('content')
    <main>
        <section class="login_main">
            <div class="container">
                <h2 class="title">Registation</h2>
                <form class="login-form" action="{{ route('client.registation') }}" method="post">
                    @csrf
                    <input type="text" id="name" name="name" placeholder="Full name..." /><br />
                    <input type="text" id="email" name="email" placeholder="Email..." /><br />
                    <input type="password" id="password" name="password" placeholder="Password..." />
                    <button type="submit" value="regist" class="submit-btn">
                        Regist
                    </button>
                </form>
                <span class="another-option">Or </span>
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
