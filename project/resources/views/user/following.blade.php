@extends('layouts.front')

@section('content')

@includeIf('includes.user.common')

			<!-- ========================== Dashboard Elements ============================= -->
			<section class="gray-light">
				<div class="container">
				     @if ($followers->count()==0)

                            <div class="p-3 text-center shadow-lg p-5">
                                <h3>{{__("You don,t following someone yet.")}}</h3>
                            </div>

                        @else

					<div class="row">

                            @foreach ($followers as $follower)
                                <!-- single Item -->
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="urip_widget_wrap shadow_0 large mb-4">
                                        <div class="urip_widget_avater">
                                            <a href="{{ route('author.portfolio',str_replace(' ','-',$follower->follower->username)) }}">

                                                <img src="{{  $follower->follower->photo ? asset('assets/images/'.$follower->follower->photo):asset('assets/images/placeholder.jpg') }}" class="img-fluid circle" alt="">

                                            </a>
                                            <div class="veryfied_author"><img src="assets/img/verified.svg" class="img-fluid" width="15" alt=""></div>
                                        </div>

                                        @if ($follower->admin_id==1)
                                            <div class="widget_avater_124">
                                                <h4 class="avater_name_214"><a href="author-portfolio.html">{{ $admin->name }}</a></h4>
                                                <span>{{ __('This is Admin') }}</span>
                                            </div>
                                        @else
                                            <div class="widget_avater_124">
                                                <h4 class="avater_name_214"><a href="{{ route('author.portfolio',str_replace(' ','-',$follower->follower->username)) }}">{{ $follower->follower->name }}</a></h4>
                                                <span>{{ $follower->follower->created_at->format('F jS, Y') }}</span>
                                            </div>
                                        @endif

                                        <div class="widget_avater_124">
                                            <ul class="auhor_list_badges">
                                                <li><img src="assets/img/golden.svg" class="img-avater rounded" width="40" alt=""></li>
                                            </ul>
                                        </div>
                                        <div class="widget_lkpi">
                                            <ul class="auhor_info_list_215">
                                                <li><div class="urip_jbl"><span class="count">{{ DB::table('items')->where('user_id', $follower->follower->id)->sum('sell')}}</span></div><span class="smallest">Sales</span></li>
                                                @if (App\Models\Item::where('user_id',$follower->follower->id)->count()>0)
                                         @foreach (App\Models\Item::where('user_id',$follower->follower->id)->get() as $item)
                                        @php
                                        $avg=$item->ratings->avg('rating');
                                        @endphp
                                        @endforeach
                                        <li><div class="urip_jbl urip_rates good">{{ $avg!=0 ? $avg : 0  }}</div><span class="smallest">({{ $item->ratings->count() }}){{ __('Reviews') }}</span></li>
                                        @else
                                        <li><div class="urip_jbl urip_rates good">{{ 0  }}</div><span class="smallest">({{ 0 }}){{ __('Reviews') }}</span></li>
                                        @endif
                                                <li><div class="urip_jbl">{{ DB::table('items')->where('user_id', $follower->follower->id)->count()}}</div><span class="smallest">Items</span></li>
                                            </ul>
                                        </div>
                                        <div class="widget_avater_423">
                                            @if ($follower->admin_id==1)
                                                <a href="{{ route('author.portfolio','admin') }}" class="link_portfolio">{{__('View Portfolio')}}</a>
                                            @else
                                                <a href="{{ route('author.portfolio',str_replace(' ','-',$follower->follower->username)) }}" class="link_portfolio">{{__('View Portfolio')}}</a>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
					</div>

					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							{{$followers->links()}}
						</div>
					</div>

				</div>
			</section>
			<!-- ========================== Dashboard Elements ============================= -->

			<!-- ============================ Call To Action Start ================================== -->
			@includeIf('partials.theme-newsletter')
			<!-- ============================ Call To Action End ================================== -->

@endsection
