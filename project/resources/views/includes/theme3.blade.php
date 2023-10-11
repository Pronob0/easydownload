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


        <!-- ============================ All Images List Start ================================== -->
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
        <!-- ============================ All Images List End ================================== -->


        <!-- ============================ Authors List ================================== -->

        <!-- ============================ Author Lists End ================================== -->


        <!-- ============================ News Updates Start ==================================== -->
        @includeIf('partials.theme-blog')
        <!-- ============================ News Updates End ==================================== -->


        <!-- ============================ Call To Action Start ================================== -->
            @includeIf('partials.theme-newsletter')
        <!-- ============================ Call To Action End ================================== -->
