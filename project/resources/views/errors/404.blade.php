@extends('layouts.front')

@section('content')
    <!-- ============================ Dashboard Header Start================================== -->
    <div class="_agt_dash dark" style="background:#675bca url({{ asset('assets/front/img/tag-light.png') }}) no-repeat;">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="_capt9oi">
              <h1 class="text-light">{{ __('Error Page') }}</h1>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- ========================== Dashboard Header header ============================= -->


    <!-- ========================== Error's Elements ============================= -->
    <section>
      <div class="container">
        <div class="row">
          <div class="col-lg-10 col-md-12 col-sm-12">
            <div class="_faqs9oi87">
              <!-- Single -->
              <div>
                  <img src="{{ $gs->error_banner ? asset('assets/images/'.$gs->error_banner):asset('assets/images/noimage.png') }}" alt="">
                  <p class="mt-5">
                    <a href="{{ route('front.index') }}" class="link link_cart"><i class="fa fa-arrow-left mr-2"></i> {{__('Return Home')}}</a>
                  </p>
              </div>
              <!-- Single -->
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ========================== Error's Elements ============================= -->

@endsection