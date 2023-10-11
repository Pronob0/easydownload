@extends('layouts.front')

@section('content')
		<!-- ============================ Dashboard Header Start================================== -->
        <div class="_agt_dash dark" style="background:#675bca url(assets/img/tag-light.png) no-repeat;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="_capt9oi">
                            <h1 class="text-light">{{__('Create An Account')}}</h1>
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

                                @include('includes.admin.form-both')
                                <form class="mregisterform" action="{{route('user.register.submit')}}" method="POST" onsubmit="return submitUserForm()">


                                    @csrf
                                <div class="log_wraps">

                                    <div class="log__heads">
                                        <h4 class="mt-0 logs_title">{{__('Sign')}} <span class="theme-cl">{{__('Up')}}</span></h4>
                                    </div>

                                    <div class="form-group">
                                        <label>{{__('Name')}}*</label>
                                        <input type="text" required name="username" class="form-control"  placeholder="{{__('Enter Name')}}">
                                    </div>
                                    <div class="form-group">
                                        <label>{{__('User Name')}}*</label>
                                        <input type="text" required name="name" class="form-control"  placeholder="{{__('Enter User Name')}}">
                                    </div>

                                    <div class="form-group">
                                        <label>{{__('Email Address')}}*</label>
                                        <input type="email" required name="email" class="form-control"  placeholder="{{__('Enter Email')}}">
                                    </div>
                                    <div class="form-group">
                                        <label>{{__('Country')}}*</label>
                                        <input type="text" required name="country" class="form-control"  placeholder="{{__('Enter Country')}}">
                                    </div>
                                    <div class="form-group">
                                        <label>{{__('Phone')}}*</label>
                                        <input type="text" required name="phone" class="form-control"  placeholder="{{__('Enter Phone')}}">
                                    </div>

                                    <div class="form-group">
                                        <label>{{__('Password')}}*</label>
                                        <input type="password" name="password" class="form-control" placeholder="{{__('Enter Password')}}">
                                    </div>
                                    <div class="form-group">
                                        <label>{{__('Confirm Password')}}*</label>
                                        <input type="password" class="form-control"  required name="password_confirmation" placeholder="{{__('Enter Confirmation Password')}}">
                                    </div>
                                    @if($gs->is_capcha == 1)
                                        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                                        <div class="g-recaptcha" data-sitekey="{{ $gs->captacha_site_key }}" data-callback="verifyCaptcha"></div>
                                        <div id="g-recaptcha-error"></div>
                                    @endif


                                    <div class="logs_foot mb-3">

                                        <div class="logs_foot_last">
                                            {{__('Already An Account?')}} <a href="{{route('user.login')}}" class="theme-cl">{{__('Login')}}</a>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input class="mprocessdata" type="hidden" value="{{ (('Processing...'))}}">
                                        <button type="submit" id="#btn" href="#" class="btn btn-primary w-100">{{__('Sign Up')}}</button>
                                    </div>

                                </div>
                            </form>
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
    function submitUserForm() {
            var response = grecaptcha.getResponse();
            if (response.length == 0) {
                document.getElementById('g-recaptcha-error').innerHTML = '<span class="text-danger">@lang("Captcha field is required.")</span>';
                return false;
            }
            return true;
        }

 </script>
@endsection
