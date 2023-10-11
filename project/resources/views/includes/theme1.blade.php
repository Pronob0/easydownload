		<!-- ============================ Hero Banner  Start================================== -->
        <div class="hero-banner center" style="background:{{ $homepage->hero_bg }};">
            <div class="container">
                <h1>{{ $homepage->hero_title }}</h1>
                <p class="lead">{{ $homepage->hero_text}}</p>
                <form  action="{{ route('front.item') }}" method="GET">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-md-10 col-sm-12">
                            <div class="banner-search style-1">
                                <div class="input-group">
                                    <input type="text" class="form-control lio-rad" placeholder="Search By Item" name="search" >
                                    <div class="input-group-append">
                                        <button type="submit" class="btn bt-round"><i class="ti-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- ============================ Hero Banner End ================================== -->

        <!-- ============================ Category Section Start ==================================== -->
            @includeIf('partials.theme-category')
        <!-- ============================ Category Section End ==================================== -->

        <!-- ============================ Newest Designs Start ==================================== -->
        <section class="min-sec">
            <div class="container">

                <div class="row justify-content-center">
                    <div class="col-lg-7 col-md-9">
                        <div class="sec-heading first-head">
                            <h2>{{ $homepage->checkout_theme_title }}</h2>
                            <p>{{ $homepage->checkout_theme_text }}</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="product_879_list">
                            <a class="_uy98p cat_hm_prod active" href="javascript:;" data-href="{{route('get.catetegory.item',0)}}">{{__('All categories')}}</a>
                            @foreach ($categories as $key=>$category)
                                <a href="javascript:;" data-href="{{route('get.catetegory.item',$category->id)}}" class="_uy98p cat_hm_prod">{{$category->name}}</a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="row" id="view_hm_cat_prod">
                    <!-- Single Items -->
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

                                            @if ($item->access_status==1)
                                            <div class="items_price">{{__('Free')}}</div>
                                            @else
                                            <div class="items_slaes">{{$item->sell}} {{__('Sales')}}</div>
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
                        </div>
                    @endforeach
                    <div class="col-lg-12 col-md-12 text-center mt-5">
                        <a href="{{ route('front.item') }}" class="ure09w">{{ __('Browse More') }}</a>
                    </div>
                </div>



            </div>
        </section>
        <!-- ============================ Newest Designs End ==================================== -->

        <!-- ============================ Featured Themes Start ==================================== -->
            @includeIf('partials.theme-feature')
        <!-- ============================ Featured Themes End ==================================== -->

        <!-- ============================ Authors List ================================== -->
        @includeIf('partials.theme-author')
        <!-- ============================ Author Lists End ================================== -->

        <!-- ============================ News Updates Start ==================================== -->
            @includeIf('partials.theme-blog')
        <!-- ============================ News Updates End ==================================== -->



        <!-- ============================ Call To Action Start ================================== -->
            @includeIf('partials.theme-newsletter')
        <!-- ============================ Call To Action End ================================== -->

