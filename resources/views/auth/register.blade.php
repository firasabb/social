@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
            <div class="col-md-8">
                    <div id="register-box">
                        <div class="left">
                            <h1>Sign up</h1>
                            <form method="POST" action="{{ route('register') }}">
                            @csrf
                                <input type="text" name="name" placeholder="Name" value="{{ old('name') }}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"/>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif

                                <input type="text" name="email" placeholder="E-mail" value="{{ old('email') }}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" />

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

                                <input type="password" name="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"/>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                                <input type="password" name="password_confirmation" placeholder="Retype password" />
                                
                                <input type="submit" name="signup_submit" value="Sign up" />
                                
                            </form>
                        </div>
                        
                        <div class="right">
                            <span class="loginwith">Sign in with<br />social network</span>
                            <form action="{{ url('/auth/facebook') }}">
                                <button class="social-signin-register facebook">Log in with Facebook</button>
                            </form>
                            <form action="{{ url('/auth/instagram') }}">
                                <button class="social-signin-register instagram">Log in with Instagram</button>
                            </form>
                        </div>
                        <div class="or-register">OR</div>
                    </div>
            </div>
    </div>
</div>
@endsection
