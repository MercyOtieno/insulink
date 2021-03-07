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
    
        <div class="col-md-6">
            <div class="card">
    
                <div class="card-body p-5">
                    <h4 class="my-3" style="
            color: #048ABF;
            font-size: 1.8rem;
            font-weight: 700 !important;
            font-family: 'Roboto', sans-serif !important;
        ">{{ __('Verify Your Email Address') }}</h4>
                    <hr class="my-3">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-block btn-secondary py-2 px-4 my-3 align-baseline">{{ __('Request another Veification code') }}
                        <svg class="inline-flex text-white" width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
