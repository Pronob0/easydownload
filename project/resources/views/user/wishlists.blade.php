@extends('layouts.front')
@section('content')

		<!-- ============================ Dashboard Header Start================================== -->
        <div class="_agt_dash dark" style="background:#7e7e80 url({{ asset('assets/images/'.$gs->breadcumb_banner) }}) no-repeat;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="_capt9oi">
                            <h1 class="text-light">{{__('Wishlists')}}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ========================== Dashboard Header header ============================= -->

        <!-- ========================== Add To Cart Elements ============================= -->
        <section class="gray-light">
            <div class="container">
                <div id="cart">
                    @includeIf('includes.wishlists')
                </div>
            </div>
        </section>
        <!-- ========================== Add To cart Elements ============================= -->

@endsection


