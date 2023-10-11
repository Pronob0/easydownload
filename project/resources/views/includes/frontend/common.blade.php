
<div class="_agt_dash dark" style="background:#675bca url({{ asset('assets/images/'.$gs->breadcumb_banner) }}) no-repeat">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">

                <div class="dash_hyu76">
                    <div class="dash_hyu74">
                        <div class="dash_hyu72">

                            <img  class="img-fluid" src="{{ $data->photo ? asset('assets/images/'.$data->photo ):asset('assets/images/noimage.png') }}" alt="">
                        </div>
                        <div class="dash_hyu71">
                            <h4 class="_hyu71_title">{{ $data->name }}</h4>
                            @if ($data->created_at)
                            <span>{{ __('Member Since') }} {{ $data->created_at->format('F jS, Y') }}</span>
                            @endif

                            <div class="_hyu71_button">
                                <a href="{{ route('user.portfolio',str_replace(' ','-',$data->username)) }}" class="_njy_likes">{{__('Portfolio')}}</a>
                            @if (Auth::user())
                            @if ($data->id==Auth::user()->id)

                            @else
                            @if($follow)
                            <a  class="_njy_likes">{{__('Followed')}}</a>
                            @else
                            <a href="{{ route('front.followerCreate',$data->id) }}" class="_njy_likes">{{__('Follow')}}</a>

                            @endif
                            @endif

                            @endif

                             </div>


                        </div>
                   </div>
                    <div class="dash_hyu75">
                        <div class="_hyu75">
                            @if ($author=='admin')
                            <h4>{{ DB::table('items')->where('user_id', 0)->sum('sell')}}</h4>


                            @else

                            <h4>{{ DB::table('items')->where('user_id', $data->id)->sum('sell')}}
                            @endif
                            </h4>
                            <span>{{ __('Total Sales') }}</span>
                        </div>
                        <div class="_hyu75_1">
                                                        <div class="_iju7_reviw">
                            @if (App\Models\Item::where('user_id',$data->id)->count()>0)

                            @foreach (App\Models\Item::where('user_id',$data->id)->get() as $item)
                            @php
                            $avg=$item->ratings->avg('rating');
                            @endphp

                            @endforeach

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
                            <span>({{ $item->ratings->count() }} {{ __('Reviews') }})</span>
                            @else
                            <span>({{ 0 }} {{ __('Reviews') }})</span>
                            @endif

                            </div>
                            <span>{{ __('Author Rattings') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




	<!-- ========================== Dashboard Header header ============================= -->


    <!-- Dashboard Header Navigation -->
    <div class="_dash_navigation_wraps">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="_dash_navigation">
                        <ul class="dash">
                          @if (Auth::user()==$data)
                           <li class="{{ request()->path() == 'user/Dashboard' ? 'active':''}}"><a href="{{ route('user.dashboard') }}">{{ __('Profile') }}</a></li>
								<li class="{{ request()->routeIs('user.portfolio') ? 'active':''}}"><a href="{{ route('user.portfolio',str_replace(' ','-',Auth::user()->username)) }}">{{__('Portfolio')}}</a></li>
									<li class="{{ request()->path() == 'user/following' ? 'active':''}}"><a href="{{ route('user.following') }}">{{__('Followings')}}<span class="_counts">{{ DB::table('follows')->where('follower_id',Auth::user()->id)->count() }}</span></a></li>
									<li class="{{ request()->path() == 'user/followers' ? 'active':''}}"><a href="{{ route('user.followers') }}">{{__('Followers')}}<span class="_counts">{{ DB::table('follows')->where('following_id',Auth::user()->id)->count() }}</span></a></li>
									<li class="{{ request()->path() == 'user/settings' ? 'active':''}}"><a href="{{ route('user.setting') }}">{{__('Settings')}}</a></li>
									<li class="{{ request()->path() == 'user/downloads' ? 'active':''}}"><a href="{{ route('user.download') }}">{{__('Downloads')}}</a></li>
                                    <li class="{{ request()->path() == 'user/hidden-items' ? 'active':''}}"><a href="{{ route('user.hidden.items') }}">{{__('Hidden Items')}}</a></li>
									<li class="{{ request()->path() == 'user/reviews' ? 'active':''}}"><a href="{{ route('user.reviews') }}">{{__('Reviews')}}</a></li>
                                    <li class="{{ request()->path() == 'user/refunds' ? 'active':''}}"><a href="{{ route('user.allrefund') }}">{{__('Refund orders')}}</a></li>
                                    <li class="{{ request()->path() == 'user/purchase/history' ? 'active':''}}"><a href="{{ route('user.history') }}">{{__('Purchased History')}}</a></li>
									<li class="{{ request()->path() == 'user/withdraw' ? 'active':''}}"><a href="{{ route('user.withdraw') }}">{{__('Withdraws')}}</a></li>
									<li class="{{ request()->path() == 'user/statements' ? 'active':''}}"><a href="{{ route('user.statements') }}">{{__('Statements')}}</a></li>

                     @else
                            <li class="{{ Request::routeIs('author.portfolio') ? 'active' : '' }}"><a href="{{ route('author.portfolio',str_replace(' ','-',$data->username)) }}">{{ __('Profile') }}</a></li>
                            <li class="{{ Request::routeIs('user.portfolio') ? 'active' : ''}}">

                                    <a href="{{ route('user.portfolio',str_replace(' ','-',$data->username)) }}">{{__('Portfolio')}}</a>

                            </li>
                            <li class="{{ Request::routeIs('item.user.followings') ? 'active' : ''}}"><a href="{{ route('item.user.followings',$data->id) }}">{{__('Followings')}}<span class="_counts">{{ DB::table('follows')->where('follower_id',$data->id)->count() }}</span></a></li>
                            <li class="{{ Request::routeIs('item.user.follower') ? 'active' : ''}}"><a href="{{ route('item.user.follower',$data->id) }}">{{__('Followers')}}<span class="_counts">{{ DB::table('follows')->where('following_id',$data->id)->count() }}</span></a></li>

                     @endif


                        </ul>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    <!-- ========================== Dashboard Header header ============================= -->
