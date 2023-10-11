<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        @if (count($items) == 0)
            <div class="card shadow-lg">
                <div class="card-body">
                    <h3 class="text-center">{{__('No Items Available')}}</h3>
                </div>
            </div>
        @else
        @foreach ($items as $item)
            <div class="_list_iju76">
                @if (in_array($item->id,$trending) && $item->sell>=$trend->sell)
                <img class="trending_item" alt="Trending" src="{{ asset('assets/images/'.$trend->icon) }}">
                @endif



                <div class="_iju76_01">

                    <div class="_iju76_thumb">
                        <a href="{{ route('item.details',$item->slug) }}"><img src="{{ $item->preview_imagename ? asset('assets/images/'.$item->preview_imagename):asset('assets/images/noimage.png') }}" class="img-fluid" alt=""></a>
                    </div>

                    <div class="_iju76_caption">
                        <h4 class="_kj76"><a href="{{ route('item.details',$item->slug) }}">{{ $item->name }}</a></h4>
                        @if ($item->user_id==0)
                            <div class="item_info_bmc"><i> {{__('by')}} </i><a class="author_bmv" href="{{ route('author.portfolio','admin') }}">{{$admin->name}}</a><span> {{__('in')}} </span><a class="cate_mnb" href="{{route('front.item',['category'=>$item->category->slug])}}">{{$item->category->name}}</a></div>
                        @else
                            <div class="item_info_bmc"><i> {{__('by')}} </i><a class="author_bmv" href="{{ route('author.portfolio',str_replace(' ','-',$item->user->username)) }}">{{$item->user->username}}</a><span> {{__('in')}} </span><a class="cate_mnb" href="{{route('front.item',['category'=>$item->category->slug])}}">{{$item->category->name}}</a></div>
                        @endif


                        @if ($item->outcome)
                            <div class="uhtro">
                                <ul>
                                    @foreach (array_slice(explode(',,,',$item->outcome),0,3) as $feature)
                                    <li>{{ strlen($feature)>30 ? substr($feature,0,30).'...' :  $feature}}</li>
                                    @endforeach

                                </ul>
                            </div>
                        @endif
                        <div class="item_list_links">
                            <a href="{{$item->demo_link}}" class="link link_prview">{{__('Preview')}}</a>
                            <a href="{{ route('item.details',$item->slug) }}" class="link link_cart"><i class="fa fa-shopping-cart mr-2"></i></a>


                            <a href="{{ route('user.wishlist.add',$item->slug) }}" class="link link_save add-to-wish"><i class="fa fa-heart"></i></a>



                        </div>
                    </div>
                </div>
                <div class="_iju76_02">
                    @if ($item->access_status==1)
                    <div class="_lo9orw">{{__('Free')}}</div>
                    @else
                    <div class="_lo9orw">{{$item->showPrice() }}</div>
                    <div class="_8xc_pi">{{ $item->sell }} {{__('Sales')}}</div>
                    @endif


                    <div class="_j56ty1q">
                        <div class="_iju7_reviw">
                            @php
                            $avg=$item->ratings->avg('rating');
                            @endphp
                            @for ($i = 0; $i < 5; $i++)
                                @if (floor($avg - $i) >= 1)
                                    {{--Full Start--}}
                                    <i class="fa fa-star filled"></i>
                                @elseif ($avg - $i > 0)
                                    {{--Half Start--}}
                                    <i class="fa fa-star-half-alt filled"> </i>
                                @else
                                    {{--Empty Start--}}
                                    <i class="fa fa-star"> </i>
                                @endif
                            @endfor
                            <span>({{ $item->ratings->count() }})</span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        @endif
    </div>
</div>
