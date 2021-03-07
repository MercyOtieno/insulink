@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center my-5">
        <div class="col-sm-4">
            <div class="text-center">
                <a href="/">
                    <img src="{{asset('images/logo.png')}}" alt="{{ config('app.name', 'Laravel') }}" style="height: 100px">
                </a>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
       
        <div class="col-md-5">
            <div class="card">

                <div class="card-body p-5">
                    <h4 class="my-3" style="
    color: #048ABF;
    font-size: 1.8rem;
    font-weight: 700 !important;
    font-family: 'Roboto', sans-serif !important;
">{{ __('Customer Login') }}</h4>
                    <hr class="my-3">
                    <form method="POST" action="{{ route('login') }}" >
                        @csrf

                        <div class="form-group ">
                            <label for="email" class="">{{ __('E-Mail Address') }}</label>

                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus>
                            
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password" class="">{{ __('Password') }}</label>

                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                                required autocomplete="current-password">
                            
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link px-0" href="{{ route('password.request') }}" >
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
