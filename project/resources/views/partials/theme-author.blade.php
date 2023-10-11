<section class="gray-light min-sec">
            <div class="container">

                <div class="row justify-content-center">
                    <div class="col-lg-7 col-md-9">
                        <div class="sec-heading">
                            <h2>{{ __('Top & Featured Authors') }}</h2>
                            <p>{{ __('Explore the Top and Featured Author of the Week, Get their profile to see the details, profile and products.') }}</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Single -->

                    @foreach ($authors as $user)
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="blox_instagram_preview">
                            <div class="padd-10 blox_instagram_preview_container">
                                <div class="blox_image_box">
                                    <img class="img-fluid" src="{{ $user->dashboard_banner ? asset('assets/images/'.$user->dashboard_banner ): asset('assets/images/placeholder.png') }}" alt="">
                                </div>

                                <div class="blox_instagram_info">
                                    <div class="blox_profile_pic">
                                        <img src="{{ $user->photo ? asset('assets/images/'.$user->photo): asset('assets/images/placeholder.png') }}" alt="">
                                    </div>
                                    <a href="{{ route('author.portfolio',str_replace(' ','-',$user->username)) }}"><div class="blox_profile_name">{{ $user->username }}</div></a>
                                    <div class="blox_follow_count mt-2">{{ DB::table('follows')->where('following_id',$user->id)->count() }} {{ __('Follower') }}</div>

                                                @if (auth()->user())
                                                @if ($user->id != auth()->user()->id )
                                                @if (empty(DB::table('follows')->where('following_id',$user->id)->where('admin_id',0)->first()))
                                            <a href="{{ route('front.followerCreate',$user->id) }}" class="ure09w mt-2">{{ __('Follow') }}</a>

                                            @else

                                            <a class="ure09w mt-2">{{ __('Followed') }}</a>
                                            @endif
                                            @else
                                            <a href="{{ route('author.portfolio',str_replace(' ','-',$user->username)) }}" class="ure09w mt-2">{{ __('View Profile') }}</a>
                                            @endif
                                            @endif

                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach
                    <div class="col-lg-12 col-md-12 text-center mt-5">
                        <a href="{{ route('front.authorr') }}" class="ure09w">{{ __('Browse More') }}</a>
                    </div>



                </div>

            </div>
        </section>
