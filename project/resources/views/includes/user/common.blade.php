			<!-- ============================ Dashboard Header Start================================== -->
			<div class="_agt_dash dark" style="background:#7e7e80 url({{ asset('assets/images/'.$gs->breadcumb_banner) }}) no-repeat;">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">

							<div class="dash_hyu76">
								<div class="dash_hyu74">
									<div class="dash_hyu72">

										<img  class="img-fluid" src="{{ Auth::user()->photo ? asset('assets/images/'.Auth::user()->photo ):asset('assets/images/noimage.png') }}" alt="">
									</div>
									<div class="dash_hyu71">
										<h4 class="_hyu71_title">{{ Auth::user()->username }}</h4>
										<span>{{ __('Member Since') }} {{ Auth::user()->created_at->format('F jS, Y') }}</span>
										<div class="_hyu71_button">
											<a href="{{ route('user.portfolio',str_replace(' ','-',Auth::user()->username)) }}" class="_njy_likes">{{__('Portfolio')}}</a>
										</div>
									</div>
								</div>
								<div class="dash_hyu75">
									<div class="_hyu75">
										<h4>{{ DB::table('items')->where('user_id', Auth::user()->id)->sum('sell')}}</h4>
										<span>{{ __('Total Sales') }}</span>
									</div>
									<div class="_hyu75_1">
                                       							<div class="_iju7_reviw">
                                        @if (App\Models\Item::where('user_id',Auth::user()->id)->count()>0)

                                        @foreach (App\Models\Item::where('user_id',Auth::user()->id)->get() as $item)
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
			<!-- Dashboard Header Navigation -->
			<div class="_dash_navigation_wraps">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="_dash_navigation">
								<ul class="dash">

									<li class="{{ request()->path() == 'user/Dashboard' ? 'active':''}}"><a href="{{ route('user.dashboard') }}">{{ __('Profile') }}</a></li>
									<li class="{{ request()->path() == 'user/portfolio' ? 'active':''}}"><a href="{{ route('user.portfolio',str_replace(' ','-',Auth::user()->username)) }}">{{__('Portfolio')}}</a></li>
									<li class="{{ request()->path() == 'user/following' ? 'active':''}}"><a href="{{ route('user.following') }}">{{__('Followings')}}<span class="_counts">{{ DB::table('follows')->where('follower_id',Auth::user()->id)->count() }}</span></a></li>
									<li class="{{ request()->path() == 'user/followers' ? 'active':''}}"><a href="{{ route('user.followers') }}">{{__('Followers')}}<span class="_counts">{{ DB::table('follows')->where('following_id',Auth::user()->id)->count() }}</span></a></li>
									<li class="{{ request()->path() == 'user/settings' ? 'active':''}}"><a href="{{ route('user.setting') }}">{{__('Settings')}}</a></li>
									<li class="{{ request()->path() == 'user/downloads' ? 'active':''}}"><a href="{{ route('user.download') }}">{{__('Downloads')}}</a></li>
                                    <li class="{{ request()->path() == 'user/hidden-items' ? 'active':''}}"><a href="{{ route('user.hidden.items') }}">{{__('Pending Items')}}</a></li>
									<li class="{{ request()->path() == 'user/reviews' ? 'active':''}}"><a href="{{ route('user.reviews') }}">{{__('Reviews')}}</a></li>
                                    <li class="{{ request()->path() == 'user/refunds' ? 'active':''}}"><a href="{{ route('user.allrefund') }}">{{__('Refund orders')}}</a></li>
                                    <li class="{{ request()->path() == 'user/purchase/history' ? 'active':''}}"><a href="{{ route('user.history') }}">{{__('Purchased History')}}</a></li>
									<li class="{{ request()->path() == 'user/statements' ? 'active':''}}"><a href="{{ route('user.statements') }}">{{__('Statements')}}</a></li>
                                    <li class="{{ request()->path() == 'user/ticket' ? 'active':''}}"><a href="{{ route('user.ticket') }}">{{__('Ticket')}}</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- ========================== Dashboard Header header ============================= -->

