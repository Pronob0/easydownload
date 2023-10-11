@extends('layouts.front')

@section('content')
@if (Session::has('success'))
                  <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
                  {{ Session::get('success') }}
 </div>


@endif
		<!-- ============================ Dashboard Header Start================================== -->
        <div class="_agt_dash dark" style="background:#675bca url(assets/img/tag-light.png) no-repeat;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="_capt9oi">
                            <h1 class="text-light">{{ __('FORGOT PASSWORD') }}</h1>
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
                                        <h4 class="mt-0 logs_title ">{{ __('Forgot') }} <span class="theme-cl">{{ __('Password') }}</span></h4>
                                    </div>
                                    @include('includes.admin.form-login')
                                    <form id="forgotform" action="{{route('user.forgot.submit')}}" method="post">

                                     @csrf
                                    <div class="form-group">
                                        <label>{{ __('Emain Address*') }}</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter Your email" required>
                                    </div>
                                    <div class="logs_foot mb-3">
                                        
                                        <div class="logs_foot_last">
                                            <a class="btn btn-primary text-right" href="{{ route('user.login') }}">
                                                {{ ('Login') }}
                                              </a>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" id="btn" class="btn btn-primary w-100">{{ __('Submit') }}</button>
                                    </div>
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
