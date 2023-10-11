<section style="background-color: {{ $homepage->featured_theme_bg }}">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-9">
                <div class="sec-heading">
                    <h2>{{ $homepage->featured_theme_title }}</h2>
                    <p>{{ $homepage->featured_theme_text }}</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="owl-carousel owl-theme middle-arrow-hover" id="theme-slide">

                    @foreach ($items as $key=>$item)

                        <div class="themes-slides">
                            @if ($item->is_feature==1)
                                <div class="item_group">

                                    <div class="item_group_thumb">
                                        <a href="{{ route('item.details',$item->slug) }}" class="item-figure">
                                            <img src="{{asset('assets/images/'.$item->preview_imagename)}}" class="img-fluid" alt="" />
                                        </a>
                                    </div>
                                    <div class="item_group_caption">
                                        <h3 class="item_title_bmb"><a href="{{ route('item.details',$item->slug) }}">{{$item->name}}</a></h3>
                                        @if ($item->user_id==0)
                                        <div class="item_info_bmc"><i> {{__('by')}} </i><a class="author_bmv" href="{{ route('author.portfolio','admin') }}">{{ $admin->name }}</a><span> {{__('in')}} </span><a class="cate_mnb" href="{{route('front.item',['category'=>$item->category->slug])}}">{{ $item->category->name }}</a></div>


                                        @else
                                        <div class="item_info_bmc"><i> {{__('by')}} </i><a class="author_bmv" href="{{ route('author.portfolio',str_replace(' ','-',$item->user->username)) }}">{{ $item->user->username }}</a><span> {{__('in')}} </span><a class="cate_mnb" href="#">{{ $item->category->name }}</a></div>

                                        @endif

                                        <div class="item_inner-caption">
                                            <div class="inner-caption_flex">


                                                @if ($item->access_status==1)
                                                <div class="items_price">{{__('Free')}}</div>
                                                @else
                                                <div class="items_slaes">{{$item->sell}} Sales</div>
                                                <div class="items_price">{{$item->showPrice() }}</div>
                                                @endif
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
                                @else
                            @endif
                        </div>
                   @endforeach
                </div>
            </div>
        </div>

    </div>
</section>
