@extends('layouts.app')
@section('body')

<body class="bg-dark">
    
@endsection
@section('content')
<div class="container mt-5 ">
    <div class="row py-5 justify-content-center">
        <div class="col-md-10">
            <div class="card bg-dark text-white">
                <div class="card-body">
                    <div class="row p-5">
                        <div class="col-md-6 px-0 mt-0 mt-md-5 mb-2 mb-md-0">
                            <img class="img-fluid rounded-circle d-block mx-5" src="{{ asset('img/sample-logo.png') }}" width="65%" alt="logo">
                        </div>
                        <div class="col-md-6 px-0 mt-0 mt-md-5">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <h2 class="text-white font-weight-bold">Login *</h2> <br>
                                @if (session('message'))
                                      <center>
                                        <div class="alert alert-info alert-dismissible fade show w-50" role="alert">
                                            {{ session('message') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                      </center>
                                @endif
                                      
                                <div class="form-group">
                                    <label for="email" class="form-label">Email: </label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
        
                                <div class="form-group">
                                    <label for="password" class="form-label">Password: </label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
        
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
        
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
        
                                <div class="form-group row mb-0 ml-0 ml-md-1">
                                    <button type="submit" class="btn btn-secondary">
                                        {{ __('Login') }}
                                    </button>
    
                                    @if (Route::has('password.request'))
                                        <a class="btn text-white" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif 
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
</div>
@endsection
