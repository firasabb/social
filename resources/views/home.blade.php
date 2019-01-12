@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div id="profile-box">
                <div class="profile-header">
                    <img id="profile-img" src="{{$user->avatar}}">
                </div>
                <div class="profile-content">

                    <h3>{{ $user->name }}</h3>
                    
                    
                </div>
                <div class="profile-social">
                    @if($facebook)
                    <span class="social-span">
                        <i class="fab fa-facebook-square"></i>
                    </span>
                    @endif

                    @if($instagram)
                    <span class="social-span">
                        <i class="fab fa-instagram"></i>
                    </span>
                    @endif
                </div>
                
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
            </div>
        </div>
    </div>
</div>
@endsection
