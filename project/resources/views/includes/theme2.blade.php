        <!-- ============================ Hero Banner  Start================================== -->
        <div class="hero-banner bg-cover center" style="background:#f7f6f2 url({{ url($homepage->hero_photo ? asset('assets/images/'.$homepage->hero_photo) : '') }}) no-repeat;">
            <div class="container">
                <h1 class="small">{{ $homepage->hero_title }}</h1>
                <p class="lead">{{ $homepage->hero_text}}</p>
                <form action="{{route('front.item')}}" method="GET">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-md-10 col-sm-12">
                            <div class="banner-search style-1 shadow">
                                <div class="input-group">
                                    <input type="text" class="form-control lio-rad" placeholder="e.g. responsive WordPress" name="search" value="{{request()->input('search')}}">
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


        <!-- =========================== All Fonts List ========================================== -->
       <section>
            <div class="container">
                <div class="row">
                    @foreach ($items->take(9) as $key=>$item)
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="item_image_urip">

                            <a href="{{ route('item.details',$item->slug) }}" class="item-img">
                                <img src="{{asset('assets/images/'.$item->preview_imagename)}}" class="img-fluid" alt="" />
                            </a>
                            <div class="image_urip_caption">
                                <div class="urip_caption_flex">
                                    <div class="urip_author">
                                        <div class="urip_avater">
                                            <a href="{{ route('author.portfolio',$item->user->id) }}" class="author-img">
                                                <img src="{{ $item->user->photo ? asset('assets/images/'.$item->user->photo): '' }}" class="img-fluid" alt="" />
                                            </a>
                                        </div>
                                        <div class="urip_avater_place">
                                            <h3 class="urip_title"><a href="{{ route('author.portfolio',str_replace(' ','-',$item->user->username)) }}">{{ $item->user->name }}</a></h3>
                                            <span>{{ $item->created_at->format('F jS, Y') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="urip_caption_last">
                                    <div class="item_list_links">
                                        <a href="{{ route('item.details',$item->slug) }}" class="urip_link"><i class="fa fa-plus-circle"></i></a>
                                        <a href="{{ route('user.wishlist.add',$item->slug) }}" class="urip_link add-to-wish"><i class="fa fa-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <br>

                    @endforeach

                <div class="row">
                    <div class="col-lg-12 col-md-12 text-center mt-5">
                        <a href="{{ route('front.item') }}" class="ure09w">{{ __('Browse More') }}</a>
                    </div>
                </div>

            </div>
        </section>
        <!-- =========================== All fonts End =========================================== -->



        <!-- ============================ News Updates Start ==================================== -->
            @includeIf('partials.theme-blog')
        <!-- ============================ News Updates End ==================================== -->



        <!-- ============================ Partners Area ================================== -->
        @if ($Partners->count()>0)
        <section class="gray-light min-sec">
            <div class="container">

                <div class="row justify-content-center">
                    <div class="col-lg-7 col-md-9">
                        <div class="sec-heading">
                            <h2>Our partners &<br>Featured Running Brands</h2>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                        @foreach ($Partners->take(9) as $partner)
                        <!-- Single -->
                        <div class="col-lg-2 col-md-3 col-sm-4">
                        <div class="card">
                            <div class="card-body py-0">

                                    <div class="royh9">
                                        <img src="{{$partner->photo ? asset('assets/images/'.$partner->photo) : '' }}" class="img-fluid" alt="">
                                    </div>
                                </div>

                            </div>
                        </div>

                        @endforeach
                </div>

            </div>
        </section>
        <!-- ============================ Partners End ================================== -->

        @endif


        <!-- ============================ Call To Action Start ================================== -->
            @includeIf('partials.theme-newsletter')
        <!-- ============================ Call To Action End ================================== -->


