
@if ($items->count() > 0)


@foreach ($items as $key=>$item)
<div class="col-lg-4 col-md-6">
    <div class="item_group">

        @if (in_array($item->id,$trending) && $item->sell>=$trend->sell)
        <img class="trending_item" alt="Trending" src="{{ asset('assets/images/'.$trend->icon) }}">
        @endif

        <div class="item_group_thumb">
            <a href="{{ route('item.details',$item->slug) }}" class="item-figure">
                <img src="{{asset('assets/images/'.$item->preview_imagename)}}" class="img-fluid" alt=""/>
            </a>
        </div>
        <div class="item_group_caption">
            <h3 class="item_title_bmb"><a href="{{ route('item.details',$item->slug) }}">{{$item->name}}</a></h3>

            <div class="item_info_bmc"><i> by </i><a class="author_bmv" href="{{ route('author.portfolio',str_replace(' ','-',$item->user->username)) }}">{{ $item->user->username }}</a><span> in </span><a class="cate_mnb" href="{{route('front.item',['category'=>$item->category->slug])}}">{{ $item->category->name }}</a></div>

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
@if ($items->count() > 6)
<div class="col-lg-12 col-md-12 text-center mt-5">
    <a href="{{ route('front.item') }}" class="ure09w">{{ __('Browse More') }}</a>
</div>

@endif
@else
<div class="mx-auto border">
    <div class="text-center p-4">
        <h3>{{__('Item Not Found')}}</h3>
    </div>
</div>

@endif
