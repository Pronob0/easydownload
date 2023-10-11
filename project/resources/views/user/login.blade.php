@extends('layouts.front')

@section('content')
@if (Session::has('success'))
                  <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
                  {{ Session::get('success') }}
 </div>


@endif
		<!-- ============================ Dashboard Header Start================================== -->
        <div class="_agt_dash dark" style="background:#7e7e80 url({{ asset('assets/images/'.$gs->breadcumb_banner) }}) no-repeat;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="_capt9oi">
                            <h1 class="text-light">{{ __('SIGN IN PAGE') }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ========================== Dashboard Header header ============================= -->

        <!-- ========================== SignUp Elements ============================= -->
        <section class="gray-light">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-11 col-md-11">

                        <div class="row no-gutters position-relative log_rads">


                            <div class="col-lg-8 col-md-8 position-static p-4 pl-md-0 mx-auto">
                                <div class="log_wraps">
                                    <div class="log__heads mx-auto">
                                        <h4 class="mt-0 logs_title ">{{ __('Sign') }} <span class="theme-cl">{{ __('In') }}</span></h4>
                                    </div>

                                    <form id="loginform" action="{{route('user.login.submit')}}" method="post">
                                        @include('includes.admin.form-login')
                                     @csrf
                                    <div class="form-group">
                                        <label>{{ __('Email Address*') }}</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" value="" name="email" placeholder="Enter Your email">
                                    </div>

                                    <div class="form-group">
                                        <label>{{ __('Password*') }}</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1" value="" name="password" placeholder="Enter Your Password">
                                    </div>
                                    @if($gs->is_capcha == 1)
                                        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                                        <div class="g-recaptcha" data-sitekey="{{ $gs->captacha_site_key }}" data-callback="verifyCaptcha"></div>
                                        <div id="g-recaptcha-error"></div>
                                    @endif

                                    <div class="logs_foot mb-3">
                                        <div class="logs_foot_first">


                                            <a href="{{ route('user.forgot') }}">
                                                {{ ('Forgot Password?') }}
                                              </a>

                                        </div>
                                        <div class="logs_foot_last">
                                            {{ __("Have Any Account?") }} <a href="{{ route('user.register') }}" class="theme-cl">{{ __('Create') }}</a>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" id="btn" class="btn btn-primary w-100">{{ __('Log In') }}</button>
                                    </div>

                                    @if($socialsetting->f_check == 1 || $socialsetting->g_check == 1)
                                                    <div class="social-area text-center">
                                                        <h3 class="title  mt-3">{{ ('OR') }}</h3>
                                                        <p class="text">{{ __('Sign In with social media') }}</p>
                                                        <ul class="social-links">
                                                            @if($socialsetting->f_check == 1)
                                                            <li>
                                                            <a href="{{ route('social-provider','facebook') }}">
                                                                <i class="fab fa-facebook-f"></i>
                                                            </a>
                                                            </li>
                                                            @endif
                                                            @if($socialsetting->g_check == 1)
                                                            <li>
                                                            <a href="{{ route('social-provider','google') }}">
                                                                <i class="fab fa-google-plus-g"></i>
                                                            </a>
                                                            </li>
                                                            @endif
                                                        </ul>
                                                    </div>
					              @endif
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- ========================== Login Elements ============================= -->

@endsection
@section('scripts')
<script>
   $(document).on('click','#btn',function(e){

    window.scrollTo({top: -200, behavior: 'smooth'});
   });
</script>
@endsection
