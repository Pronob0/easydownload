  <!-- ============================ Newest Designs Start ==================================== -->
  <section class="min-sec">
    <div class="container">

        <div class="row">
            <!-- Single Items -->
            @if (empty($favouriteLength))
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center">{{__('No item available')}}</h2>
                    </div>
                </div>
            @endif
            @foreach ($favourite as $favouriteItem)
            @php
            $item = \App\Models\Item::find($favouriteItem["item_id"]);
            @endphp
                <div class="col-lg-4 col-md-6">
                    <div class="item_group">
                        <span class="rmv wishlist-remove" data-href="{{route('user.wishlist.remove',$favouriteItem["id"])}}"><i class="fa fa-times"></i></span>

                        <div class="item_group_thumb">
                            <a href="{{ route('item.details',$item->slug) }}" class="item-figure">
                                <img src="{{asset('assets/images/'.$item->preview_imagename)}}" class="img-fluid wish-img" alt=""/>
                            </a>
                        </div>
                        <div class="item_group_caption">
                            <h3 class="item_title_bmb"><a href="{{ route('item.details',$item->slug) }}">{{$item->name}}</a></h3>
                            @if ($item->user_id==0)
                            <div class="item_info_bmc"><i> by </i><a class="author_bmv" href="{{ route('author.portfolio','admin') }}">{{ $admin->name }}</a><span> in </span><a class="cate_mnb" href="#">{{ $item->category->name }}</a></div>


                            @else
                            <div class="item_info_bmc"><i> by </i><a class="author_bmv" href="{{ route('author.portfolio',$item->user->id) }}">{{ $item->user->username }}</a><span> in </span><a class="cate_mnb" href="#">{{ $item->category->name }}</a></div>

                            @endif


                            <div class="item_inner-caption">
                                <div class="inner-caption_flex">
                                    <div class="items_slaes">{{$item->sell}} {{__('Sales')}}</div>
                                    <div class="items_price">{{$item->showPrice() }}</div>
                                </div>
                                <div class="item_inner-last">
                                    <div class="item_list_links">
                                        <a href="{{$item->demo_link}}" class="link link_prview">{{__('Preview')}}</a>
                                        <a href="{{ route('item.details',$item->slug) }}" class="link link_cart"><i class="fa fa-shopping-cart mr-2"></i></a>
                                        <a href="{{ route('user.wishlist.add',$item->slug) }}" class="link link_save add-to-wish"><i class="fa fa-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @php


            @endphp


        </div>

    </div>
</section>
<!-- ============================ Newest Designs End ==================================== -->














































































