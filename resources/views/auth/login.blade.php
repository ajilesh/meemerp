<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login - {{ config('app.name', 'POS') }}</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <!-- Style -->
    
    <style>
        body {
      font-family: "Roboto", sans-serif;
      background-color: #f8fafb; }
    
    p {
      color: #b3b3b3;
      font-weight: 300; }
    
    h1, h2, h3, h4, h5, h6,
    .h1, .h2, .h3, .h4, .h5, .h6 {
      font-family: "Roboto", sans-serif; }
    
    a {
      -webkit-transition: .3s all ease;
      -o-transition: .3s all ease;
      transition: .3s all ease; }
      a:hover {
        text-decoration: none !important; }
    
    .content {
      padding: 7rem 0; }
    
    h2 {
      font-size: 20px; }
    
    @media (max-width: 991.98px) {
      .content .bg {
        height: 500px; } }
    
    .content .contents, .content .bg {
      width: 50%; }
      @media (max-width: 1199.98px) {
        .content .contents, .content .bg {
          width: 100%; } }
      .content .contents .form-group, .content .bg .form-group {
        position: relative; }
        .content .contents .form-group label, .content .bg .form-group label {
          position: absolute;
          top: 50%;
          -webkit-transform: translateY(-50%);
          -ms-transform: translateY(-50%);
          transform: translateY(-50%);
          -webkit-transition: .3s all ease;
          -o-transition: .3s all ease;
          transition: .3s all ease; }
        .content .contents .form-group input, .content .bg .form-group input {
          background: transparent;
          border-bottom: 1px solid #ccc; }
        .content .contents .form-group.first, .content .bg .form-group.first {
          border-top-left-radius: 7px;
          border-top-right-radius: 7px; }
        .content .contents .form-group.last, .content .bg .form-group.last {
          border-bottom-left-radius: 7px;
          border-bottom-right-radius: 7px; }
        .content .contents .form-group label, .content .bg .form-group label {
          font-size: 12px;
          display: block;
          margin-bottom: 0;
          color: #b3b3b3; }
        .content .contents .form-group.focus, .content .bg .form-group.focus {
          background: #fff; }
        .content .contents .form-group.field--not-empty label, .content .bg .form-group.field--not-empty label {
          margin-top: -25px; }
      .content .contents .form-control, .content .bg .form-control {
        border: none;
        padding: 0;
        font-size: 20px;
        border-radius: 0; }
        .content .contents .form-control:active, .content .contents .form-control:focus, .content .bg .form-control:active, .content .bg .form-control:focus {
          outline: none;
          -webkit-box-shadow: none;
          box-shadow: none; }
    
    .content .bg {
      background-size: cover;
      background-position: center; }
    
    .content a {
      color: #888;
      text-decoration: underline; }
    
    .content .btn {
      height: 54px;
      padding-left: 30px;
      padding-right: 30px; }
    
    .content .forgot-pass {
      position: relative;
      top: 2px;
      font-size: 14px; }
    
    .social-login a {
      text-decoration: none;
      position: relative;
      text-align: center;
      color: #fff;
      margin-bottom: 10px;
      width: 50px;
      height: 50px;
      border-radius: 50%;
      display: inline-block; }
      .social-login a span {
        position: absolute;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%); }
      .social-login a:hover {
        color: #fff; }
      .social-login a.facebook {
        background: #3b5998; }
        .social-login a.facebook:hover {
          background: #344e86; }
      .social-login a.twitter {
        background: #1da1f2; }
        .social-login a.twitter:hover {
          background: #0d95e8; }
      .social-login a.google {
        background: #ea4335; }
        .social-login a.google:hover {
          background: #e82e1e; }
    
    .control {
      display: block;
      position: relative;
      padding-left: 30px;
      margin-bottom: 15px;
      cursor: pointer;
      font-size: 14px; }
      .control .caption {
        position: relative;
        top: .2rem;
        color: #888; }
    
    .control input {
      position: absolute;
      z-index: -1;
      opacity: 0; }
    
    .control__indicator {
      position: absolute;
      top: 2px;
      left: 0;
      height: 20px;
      width: 20px;
      background: #e6e6e6;
      border-radius: 4px; }
    
    .control--radio .control__indicator {
      border-radius: 50%; }
    
    .control:hover input ~ .control__indicator,
    .control input:focus ~ .control__indicator {
      background: #ccc; }
    
    .control input:checked ~ .control__indicator {
      background: #38d39f; }
    
    .control:hover input:not([disabled]):checked ~ .control__indicator,
    .control input:checked:focus ~ .control__indicator {
      background: #4dd8a9; }
    
    .control input:disabled ~ .control__indicator {
      background: #e6e6e6;
      opacity: 0.9;
      pointer-events: none; }
    
    .control__indicator:after {
      font-family: 'icomoon';
      content: '\e5ca';
      position: absolute;
      display: none;
      font-size: 16px;
      -webkit-transition: .3s all ease;
      -o-transition: .3s all ease;
      transition: .3s all ease; }
    
    .control input:checked ~ .control__indicator:after {
      display: block;
      color: #fff; }
    
    .control--checkbox .control__indicator:after {
      top: 50%;
      left: 50%;
      margin-top: -1px;
      -webkit-transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
      transform: translate(-50%, -50%); }
    
    .control--checkbox input:disabled ~ .control__indicator:after {
      border-color: #7b7b7b; }
    .notregi{
        margin-top: -82px;
    margin-left: -84px;
    }
    .control--checkbox input:disabled:checked ~ .control__indicator {
      background-color: #7e0cf5;
      opacity: .2; }
    
    </style>
   
  </head>
  <body>
  

  
    <div class="content">
        <div class="container">
          <div class="row">
            <div class="col-md-6 order-md-2">
              <img src="{{ asset('img/undraw_file_sync_ot38.svg') }}" alt="Image" class="img-fluid">
            </div>
            <div class="col-md-6 contents">
              <div class="row justify-content-center">
                <div class="col-md-8">
                  <div class="mb-4">
                      <img src="{{ asset('img/nub.png') }}" class="rounded mx-auto d-block" style="width:150px">
                  {{-- <h3>Sign In to <strong>Colorlib</strong></h3>
                  <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p> --}}
                </div>
                <form method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    @php
                    $username = old('username');
                    $password = null;
                    if(config('app.env') == 'demo'){
                        $username = 'admin';
                        $password = '123456';

                        $demo_types = array(
                            'all_in_one' => 'admin',
                            'super_market' => 'admin',
                            'pharmacy' => 'admin-pharmacy',
                            'electronics' => 'admin-electronics',
                            'services' => 'admin-services',
                            'restaurant' => 'admin-restaurant',
                            'superadmin' => 'superadmin',
                            'woocommerce' => 'woocommerce_user',
                            'essentials' => 'admin-essentials',
                            'manufacturing' => 'manufacturer-demo',
                        );

                        if( !empty($_GET['demo_type']) && array_key_exists($_GET['demo_type'], $demo_types) ){
                            $username = $demo_types[$_GET['demo_type']];
                        }
                    }
                @endphp
                  <div class="form-group first">
                    {{-- <label for="username">Username</label> --}}
                    <input id="username" type="text" class="form-control" name="username" value="{{ $username }}" required autofocus placeholder="@lang('lang_v1.username')">
                    @if ($errors->has('username'))
                    <span class="help-block">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                @endif
                  </div>
                  <div class="form-group last mb-4 {{ $errors->has('password') ? ' has-error' : '' }}">
                    {{-- <label for="password">Password</label> --}}
                    <input id="password" type="password" class="form-control" name="password"
                    value="{{ $password }}" required placeholder="@lang('lang_v1.password')">
                    @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
                  </div>
                  
                  <div class="d-flex mb-5 align-items-center">
                    <label class="control control--checkbox mb-0">
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> @lang('lang_v1.remember_me')
                      <div class="control__indicator"></div>
                    </label>
                    @if(config('app.env') != 'demo')
                
                    <span class="ml-auto"><a href="{{ route('password.request') }}" class="forgot-pass">@lang('lang_v1.forgot_your_password')</a></span> 
                    
                </a>
            @endif
                    
                  </div>
                  
                  <input type="submit" value="@lang('lang_v1.login')" class="btn text-white btn-block btn-primary">
    
                  
                </form>
                </div>
                @if(config('app.env') == 'demo')
    <div class="col-md-12 col-xs-12" style="padding-bottom: 30px;">
        @component('components.widget', ['class' => 'box-primary', 'header' => '<h4 class="text-center">Demo Shops <small><i> Demos are for example purpose only, this application <u>can be used in many other similar businesses.</u></i></small></h4>'])

            <a href="?demo_type=all_in_one" class="btn btn-app bg-olive" data-toggle="tooltip" title="Showcases all feature available in the application." > <i class="fas fa-star"></i> All In One</a>

            <a href="?demo_type=pharmacy" class="btn bg-maroon btn-app" data-toggle="tooltip" title="Shops with products having expiry dates." ><i class="fas fa-medkit"></i>Pharmacy</a>

            <a href="?demo_type=services" class="btn bg-orange btn-app" data-toggle="tooltip" title="For all service providers like Web Development, Restaurants, Repairing, Plumber, Salons, Beauty Parlors etc."><i class="fas fa-wrench"></i>Multi-Service Center</a>

            <a href="?demo_type=electronics" class="btn bg-purple btn-app" data-toggle="tooltip" title="Products having IMEI or Serial number code." ><i class="fas fa-laptop"></i>Electronics & Mobile Shop</a>
            <a href="?demo_type=super_market" class="btn bg-navy btn-app" data-toggle="tooltip" title="Super market & Similar kind of shops." ><i class="fas fa-shopping-cart"></i> Super Market</a>
            <a href="?demo_type=restaurant" class="btn bg-red btn-app" data-toggle="tooltip" title="Restaurants, Salons and other similar kind of shops." ><i class="fas fa-utensils"></i> Restaurant</a>
            <hr>

            <i class="icon fas fa-plug"></i> Premium optional modules:<br><br>
            <a href="?demo_type=superadmin" class="btn bg-red-active btn-app" data-toggle="tooltip" title="SaaS & Superadmin extension Demo"><i class="fas fa-university"></i> SaaS / Superadmin</a>

            <a href="?demo_type=woocommerce" class="btn bg-woocommerce btn-app" data-toggle="tooltip" title="WooCommerce demo user - Open web shop in minutes!!" style="color:white !important"> <i class="fab fa-wordpress"></i> WooCommerce</a>

            <a href="?demo_type=essentials" class="btn bg-navy btn-app" data-toggle="tooltip" title="Essentials & HRM (human resource management) Module Demo" style="color:white !important">
                    <i class="fas fa-check-circle"></i>
                    Essentials & HRM</a>
                    
            <a href="?demo_type=manufacturing" class="btn bg-orange btn-app" data-toggle="tooltip" title="Manufacturing module demo" style="color:white !important">
                    <i class="fas fa-industry"></i>
                    Manufacturing Module</a>
        @endcomponent   
    </div>
    @endif 
              </div>
              
            </div>
            
          </div>
          {{-- @inject('request', 'Illuminate\Http\Request')
          <div class="col-md-6 contents">
            <div class="row justify-content-center">
                <div class="col-md-8 notregi">
                @if(!($request->segment(1) == 'business' && $request->segment(2) == 'register'))
                    <!-- Register Url -->
                    @if(config('constants.allow_registration'))
                        <a href="{{ route('business.getRegister') }}@if(!empty(request()->lang)){{'?lang=' . request()->lang}} @endif" class="btn bg-maroon btn-flat" ><b>{{ __('business.not_yet_registered')}}</b> {{ __('business.register_now') }}</a>
                        <!-- pricing url -->
                        @if(Route::has('pricing') && config('app.env') != 'demo' && $request->segment(1) != 'pricing')
                            &nbsp; <a href="{{ action('\Modules\Superadmin\Http\Controllers\PricingController@index') }}">@lang('superadmin::lang.pricing')</a>
                        @endif
                    @endif
                @endif
                @if($request->segment(1) != 'login')
                    &nbsp; &nbsp;{{ __('business.already_registered')}} <a href="{{ action('Auth\LoginController@login') }}@if(!empty(request()->lang)){{'?lang=' . request()->lang}} @endif">{{ __('business.sign_in') }}</a>
                @endif
                </div>
            </div>
          </div> --}}
        </div>
      </div>

  
    {{-- <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script> --}}
  </body>
</html>