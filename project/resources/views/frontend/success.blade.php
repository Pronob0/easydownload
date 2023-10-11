@extends('layouts.front')

@section('content')
    <!-- ============================ Dashboard Header Start================================== -->
    <div class="_agt_dash dark" style="background:#675bca url({{ asset('assets/images/'.$gs->breadcumb_banner) }}) no-repeat;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="_capt9oi">
                        <h1 class="text-light">{{__('Payment Confirmation')}}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ========================== Dashboard Header header ============================= -->

    <!-- ========================== Confirmation Elements ============================= -->
    <section class="gray-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-md-11 col-sm-12">
                
                    <div class="checkout-wrap">
                        
                        <div class="checkout-head">
                            <div class="success-message">
                                <span class="thumb-check"><i class="ti-check"></i></span>
                                <h4>{{__('Purchased Successfully Completed!')}}</h4>
                                <p>{{__('You can download your products.')}}</p>
                                <div class="d-flex mx-auto justify-content-center">
                                    <a href="{{ route('user.download') }}" class="btn btn-sm btn-info"><i class="fa fa-download"></i>{{__('Downloads')}}</a>
                                    <a href="{{ route('front.index') }}" class="btn btn-sm btn-info ml-2"><i class="fa fa-arrow-left"></i>{{__('Home')}}</a>
                                </div>
                                
                            </div>
                        </div>
                        
                    </div>
                
                </div>
            </div>
        </div>
    </section>
    <!-- ========================== Confirmation Elements ============================= -->
			
@endsection

@section('scripts')

@endsection
