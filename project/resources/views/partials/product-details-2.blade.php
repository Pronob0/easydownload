<div class="row">
    @if (count($items) == 0)
        <div class="card shadow-lg">
            <div class="card-body">
                <h3 class="text-center">{{__('No Items Available')}}</h3>
            </div>
        </div>
    @else
        @foreach ($items as $item)
        <!-- Single Items -->
        <div class="col-lg-6 col-md-6">
            <div class="item_group">
                @if (in_array($item->id,$trending) && $item->sell>=$trend->sell)
                <img class="trending_item" alt="Trending" src="{{ asset('assets/images/'.$trend->icon) }}">
                @endif
                <div class="item_group_thumb">
                    <a href="{{ route('item.details',$item->slug) }}" class="item-figure">
                        <img src="{{ $item->preview_imagename ? asset('assets/images/'.$item->preview_imagename):asset('assets/images/noimage.png') }}" class="img-fluid" alt="">
                    </a>
                </div>
                <div class="item_group_caption">
                    <h3 class="item_title_bmb"><a href="{{ route('item.details',$item->slug) }}">{{ $item->name }}</a></h3>
                    @if ($item->user_id==0)
                        <div class="item_info_bmc"><i> {{__('by')}} </i><a class="author_bmv" href="{{ route('author.portfolio','admin') }}">{{$admin->name}}</a><span> {{__('in')}} </span><a class="cate_mnb" href="{{route('front.item',['category'=>$item->category->slug])}}">{{$item->category->name}}</a></div>
                    @else
                        <div class="item_info_bmc"><i> {{__('by')}} </i><a class="author_bmv" href="{{ route('author.portfolio',str_replace(' ','-',$item->user->username)) }}">{{$item->user->username}}</a><span> {{__('in')}} </span><a class="cate_mnb" href="{{route('front.item',['category'=>$item->category->slug])}}">{{$item->category->name}}</a></div>
                    @endif

                    <div class="item_inner-caption">
                        <div class="inner-caption_flex">

                            @if ($item->access_status==1)
                            <div class="items_price">{{__('Free')}}</div>
                            @else
                            <div class="items_slaes">{{ $item->sell }} {{__('Sales')}}</div>
                            <div class="items_price">{{$item->showPrice() }}</div>
                            @endif

                        </div>
                        <div class="item_inner-last">
                            <div class="item_list_links">
                                <a href="{{$item->demo_link}}" class="link link_prview">{{__('Preview')}}</a>
                                <a href="{{ route('item.details',$item->slug) }}" class="link link_cart"><i class="fa fa-shopping-cart mr-2"></i> </a>


                                    <a href="{{ route('user.wishlist.add',$item->slug) }}" class="link link_save add-to-wish"><i class="fa fa-heart"></i></a>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    @endif
</div>
