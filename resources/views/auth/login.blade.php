@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div id="login-box">
                <div class="left">
                    <h1>Log in</h1>
                    <form method="POST" action="{{ route('login') }}">
                    @csrf

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
                        
                        <input type="submit" name="login" value="Log in" />
                        
                    </form>
                </div>
                
                <div class="right-login">
                    <span class="loginwith">Sign in with<br />social network</span>
                    <form action="{{ url('/auth/facebook') }}">
                        <button class="social-signin-login facebook">Log in with Facebook</button>
                    </form>
                    <form action="{{ url('/auth/instagram') }}">
                        <button class="social-signin-login instagram">Log in with Instagram</button>
                    </form>
                </div>
                <div class="or-login">OR</div>
            </div>
        </div>
    </div>


</div>
@endsection
