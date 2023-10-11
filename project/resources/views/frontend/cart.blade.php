@extends('layouts.front')

@section('content')
    <!-- ============================ Dashboard Header Start================================== -->
    <div class="_agt_dash dark" style="background:#675bca url({{ asset('assets/images/'.$gs->breadcumb_banner) }}) no-repeat;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="_capt9oi">
                        <h1 class="text-light">{{__('Cart')}}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ========================== Dashboard Header header ============================= -->

    <!-- ========================== Add To Cart Elements ============================= -->
    <section class="gray-light">
        <div class="container">
            @include('includes.admin.form-flash')

            <div id="cart">
                @includeIf('includes.cart')
            </div>
        </div>
    </section>
    <!-- ========================== Add To cart Elements ============================= -->

@endsection

@section('scripts')
    <script>
        "use strict";
        $(document).ready(function() {
            $(document).on('click',".rmv", function(e) {
                e.preventDefault();

                let cartItemId = $(this).data('cart_item_id');
                $.get("{{url('/')}}/cart/remove/" + cartItemId, function(data) {
                        $("#cart").load("{{route('front.load.cart')}}");
                    }
                );

                const cartQuantity = $('.cart-quantity').text();
                if(cartQuantity>0){
                    const newQuantity = parseInt(cartQuantity) - 1;
                    $('.cart-quantity').text(newQuantity);
                }
            });

        });
    </script>
@endsection
