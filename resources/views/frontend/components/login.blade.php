@extends('layouts.home')
@section('title', 'Login')
@section('content')
<section id="form">
    <!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form">
                    <!--login form-->
                    <h2>Login to your account</h2>
                    <form action="{{ route('front.post.login') }}" method="POST">
                        @csrf
                        <input type="text" name="email" placeholder="Email" />
                        <input type="password" name="password" placeholder="Password" />
                        <span>
                            <input type="checkbox" class="checkbox" name="remember">
                            Keep me signed in
                        </span>
                        <button type="submit" class="btn btn-default">Login</button>
                    </form>
                </div>
                <!--/login form-->
            </div>
            <div class="col-sm-1">
                <h2 class="or">OR</h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form">
                    <!--sign up form-->
                    <h2>New User Signup!</h2>
                    <form action="{{ route('front.register') }}" method="POST">
                        @csrf
                        <input type="text" name="name" placeholder="Name" class="@error('name') is-invalid @enderror" value="{{ old('name')  }}" />
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="email" name="email" placeholder="Email Address" class="@error('email') is-invalid @enderror" value="{{ old('email')  }}" />
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="password" name="password" placeholder="Password" class="@error('password') is-invalid @enderror" />
                        @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="password" name="re-password" placeholder="Re-password" class="@error('re-password') is-invalid @enderror" />
                        @error('re-password')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <button type="submit" class="btn btn-default">Signup</button>
                    </form>
                </div>
                <!--/sign up form-->
            </div>
        </div>
    </div>
</section>
<!--/form-->
@endsection
