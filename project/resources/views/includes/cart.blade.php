<div class="row">

    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        @if (empty($cart))
            <div class="bg-light py-5 text-center">
                <h3>{{__('NO ITEM ADDED TO CART')}}</h3>
            </div>
        @else
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>{{__('Image')}}</th>
                            <th>{{__('Category')}}</th>
                            <th>{{__('Price')}}</th>
                            <th>{{__('Remove')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart as $cartItem)
                            @php
                                $item = \App\Models\Item::find($cartItem["item_id"]);
                            @endphp
                        <tr>
                            @if ($item)
                            <td>
                                <div class="tbl_cart_product">
                                    <div class="tbl_cart_product_thumb">
                                        <img src="{{ $item->preview_imagename ? asset('assets/images/'.$item->preview_imagename):asset('assets/images/noimage.png') }}" class="img-fluid" alt="">
                                    </div>
                                    <div class="tbl_cart_product_caption">
                                        <h5 class="tbl_pr_title">{{$item->name}}</h5>
                                        <span class="tbl_pr_quality theme-cl">{{$cartItem["license"]}}</span>
                                    </div>
                                </div>
                            </td>
                            <td><h4 class="tbl_org_price">{{$item->category->name}}</h4></td>
                            <td><h4 class="tbl_org_price">{{$item->cartPrice($cartItem["total_price"]) }}</h4></td>
                            <td>
                                <div class="tbl_pr_action">
                                    <span class="tbl_remove rmv" data-cart_item_id="{{$cartItem["id"]}}"><i class="ti-close"></i></span>
                                </div>
                            </td>

                            @endif

                        </tr>

                        @endforeach

                        <tr>
                            <td colspan="2"></td>
                            <td><h4><strong>{{__('Cart Total')}}</strong></h4></td>
                            <td colspan="2"><h4><strong>{{cartTotalWithoutTax()}}</strong></h4></td>
                        </tr>
                    </tbody>
                </table>
            </div>

        <!-- Coupon Box -->
        <div class="row align-items-end justify-content-end mb-4">
            <div class="col-12 col-md-auto m-full text-right">
                <a href="{{ route('front.item') }}" class="btn btn-primary">{{__('Continue Browsing')}}</a>
                <a href="{{route('front.checkout.index')}}" class="btn btn-success">{{__('Proceed to Checkout')}}</a>
            </div>
        </div>
        <!-- Coupon Box -->
        @endif

    </div>
</div>


