<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=5, user-scalable=1"
        name="viewport" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Insulink Kenya Ltd, the top insurer in East Africa. Your trusted insurance partner">
    <meta name="keywords" content="Best Insurer,Best Agency, Best Insurance Agency,Insurance Agency,Top Insurer,Buy,Insure,Claim,Insurance,Health Insurance,Medical Cover,Medical Insurance,Motor,Home,Travel,Pension,Retirement,Travel Cover,Benefits,Beneficiaries,Annuity,Trusted Insurer,investment,investments,life cover,life insurance,motor vehicle,investing,investor">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-migrate-3.3.2.min.js"
            integrity="sha256-Ap4KLoCf1rXb52q+i3p0k2vjBsmownyBTE1EqlRiMwA=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
                integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
    {!! Theme::header() !!}
</head>

<body>
    <div id="engine">
    @if (theme_option('preloader_enabled', 'no') == 'yes')
    <!-- LOADER -->
    <div class="preloader">
        <div class="lds-ellipsis">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <!-- END LOADER -->
    @endif

    <div id="alert-container"></div>

    <!-- START HEADER -->
    <header
        class="header_wrap @if (theme_option('enable_sticky_header', 'yes') == 'yes') fixed-top header_with_topbar @endif">
        <section class="top-header d-none d-md-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-sm-2">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img src="{{asset('images/logo.png')}}" alt="">
                        </a>
                    </div>
                    <div class="col-md-3">
                        <div class="d-flex align-items-center justify-content-center justify-content-md-start">
                            <div class="elements">
                                <div class="element-icon-box">
                                    <div class="icon text-center"><svg id="element-svg"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                            height="24">
                                            <path
                                                d="M4 4h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6c0-1.1.9-2 2-2zm16 3.38V6H4v1.38l8 4 8-4zm0 2.24l-7.55 3.77a1 1 0 0 1-.9 0L4 9.62V18h16V9.62z"
                                                class="heroicon-ui"></path>
                                        </svg></div>
                                    <div class="iconbox-body">
                                        {{ theme_option('email') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="elements">
                            <div class="element-icon-box">
                                <div class="icon text-center">
                                    <svg id="element-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        width="24" height="24">
                                        <path
                                            d="M13.04 14.69l1.07-2.14a1 1 0 0 1 1.2-.5l6 2A1 1 0 0 1 22 15v5a2 2 0 0 1-2 2h-2A16 16 0 0 1 2 6V4c0-1.1.9-2 2-2h5a1 1 0 0 1 .95.68l2 6a1 1 0 0 1-.5 1.21L9.3 10.96a10.05 10.05 0 0 0 3.73 3.73zM8.28 4H4v2a14 14 0 0 0 14 14h2v-4.28l-4.5-1.5-1.12 2.26a1 1 0 0 1-1.3.46 12.04 12.04 0 0 1-6.02-6.01 1 1 0 0 1 .46-1.3l2.26-1.14L8.28 4z"
                                            class="heroicon-ui"></path>
                                    </svg>
                                </div>
                                <div class="iconbox-body">
                                    {{ theme_option('hotline') }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        @if (is_plugin_active('quotation'))
                        <ul class="header_list">
                            
                            <li><a href="{{ theme_option('claim') }}" class="btns file-claim">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="text-white mr-2 fill-current">
                                        <path d="M6 2h9a1 1 0 0 1 .7.3l4 4a1 1 0 0 1 .3.7v13a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V4c0-1.1.9-2 2-2zm9 2.41V7h2.59L15 4.41zM18 9h-3a2 2 0 0 1-2-2V4H6v16h12V9zm-2 7a1 1 0 0 1-1 1H9a1 1 0 0 1 0-2h6a1 1 0 0 1 1 1zm0-4a1 1 0 0 1-1 1H9a1 1 0 0 1 0-2h6a1 1 0 0 1 1 1zm-5-4a1 1 0 0 1-1 1H9a1 1 0 1 1 0-2h1a1 1 0 0 1 1 1z"
                                            class="heroicon-ui">
                                        </path>
                                    </svg>
                                    <span>File a Claim</span></a>
                            </li>
                            @if (!auth('customer')->check())
                            <li>
                                @guest
                                <a href="{{ route('login') }}" class="btns login-area">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                                        class="text-white mr-2 fill-current">
                                        <path
                                            d="M12 12a5 5 0 1 1 0-10 5 5 0 0 1 0 10zm0-2a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm9 11a1 1 0 0 1-2 0v-2a3 3 0 0 0-3-3H8a3 3 0 0 0-3 3v2a1 1 0 0 1-2 0v-2a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v2z"
                                            class="heroicon-ui"></path>
                                    </svg>
                                    <span>{{ __('Login') }}</span></a>
                                    @else
                                    @if (auth::user()->isSuperUser() ==1)
                                        <a href="{{ route('dashboard.index') }}" class="btns login-area">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                                                class="text-white mr-2 fill-current">
                                                <path
                                                    d="M12 12a5 5 0 1 1 0-10 5 5 0 0 1 0 10zm0-2a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm9 11a1 1 0 0 1-2 0v-2a3 3 0 0 0-3-3H8a3 3 0 0 0-3 3v2a1 1 0 0 1-2 0v-2a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v2z"
                                                    class="heroicon-ui"></path>
                                            </svg>
                                            <span>{{ __('Dashboard') }}</span>
                                        </a>
                                    @else
                                        <a href="{{ route('customer.dashboard') }}" class="btns login-area">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                                                class="text-white mr-2 fill-current">
                                                <path
                                                    d="M12 12a5 5 0 1 1 0-10 5 5 0 0 1 0 10zm0-2a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm9 11a1 1 0 0 1-2 0v-2a3 3 0 0 0-3-3H8a3 3 0 0 0-3 3v2a1 1 0 0 1-2 0v-2a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v2z"
                                                    class="heroicon-ui"></path>
                                            </svg>
                                            <span>{{ __('Dashboard') }}</span>
                                        </a>
                                    @endif
                                    
                                    @endguest
                            </li>
                            @endif
                        </ul>
                        @endif
                    </div>
                </div>
            </div>
        </section>
        <nav class="navbar bg-primary-blue navbar-expand-lg" id="dsc__navigation">
           <div class="container">
               <div class="d-block d-sm-none">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{asset('images/logo.png')}}" alt="">
                    </a>
               </div>
                <button class="navbar-toggler side_navbar_toggler" type="button" data-toggle="collapse" data-target="#navbarSidetoggle"
                    aria-expanded="false">
                    <svg width="40" height="40" class="text-primary-color" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <span class="ion-android-menu"></span>
                </button>
                <div class="collapse navbar-collapse mobile_side_menu" id="navbarSidetoggle">
                    {!! Menu::renderMenuLocation('main-menu', ['view' => 'main-menu', 'options' => ['class' => 'navbar-nav']]) !!}
                </div>
                
            </div>
        </nav>
    </header>
    <!-- END HEADER -->
    