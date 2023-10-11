@extends('layouts.front')

@section('content')

@includeIf('includes.frontend.common')

			<!-- ========================== Dashboard Elements ============================= -->
			<section class="gray-light">
				<div class="container">
					<div class="row">
                        @if ($followers->count()==0)
                        <div class="p-3 text-center shadow-lg p-5">
                            <h3>{{__("You don,t follower yet!!!")}}</h3>
                        </div>

                        @else

                            @foreach ($followers as $follower)
                                <!-- single Item -->

                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="urip_widget_wrap shadow_0 large mb-4">
                                        <div class="urip_widget_avater">
                                            <a href="{{ route('author.portfolio',str_replace(' ','-',$follower->user->username)) }}">
                                                    <img src="{{  $follower->user->photo ? asset('assets/images/'.$follower->user->photo):asset('assets/images/placeholder.jpg') }}" class="img-fluid circle" alt="">

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
                                                <h4 class="avater_name_214"><a href="{{ route('author.portfolio',str_replace(' ','-',$follower->user->username)) }}">{{ $follower->user->username }}</a></h4>
                                                <span>{{ $follower->user->created_at->format('F jS, Y') }}</span>
                                            </div>
                                        @endif

                                        <div class="widget_avater_124">
                                            <ul class="auhor_list_badges">
                                                @foreach ($badges as $badge)
                                                @php
                                                $date = Carbon\Carbon::parse($follower->user->created_at);
                                                $now = Carbon\Carbon::now();
                                                    $time=($badge->time*365)+$badge->days;
                                                @endphp
                                                @if ($date->diffInDays($now)>=$time)
                                                <li><img src="{{$badge->icon ? asset('assets/images/'.$badge->icon): ''}}" class="img-avater rounded" width="40" alt=""></li>
                                                @endif


                                                @endforeach


                                            </ul>
                                        </div>

                                        <div class="widget_lkpi">
                                            <ul class="auhor_info_list_215">
                                                <li><div class="urip_jbl"><span class="count">{{ DB::table('items')->where('user_id', $follower->user->id)->sum('sell')}}</span></div><span class="smallest">{{ __('Sales') }}</span></li>



                                         @if (App\Models\Item::where('user_id',$follower->user->id)->count()>0)
                                         @foreach (App\Models\Item::where('user_id',$follower->user->id)->get() as $item)
                                        @php
                                        $avg=$item->ratings->avg('rating');
                                        @endphp
                                        @endforeach
                                        <li><div class="urip_jbl urip_rates good">{{ $avg!=0 ? $avg : 0  }}</div><span class="smallest">({{ $item->ratings->count() }}){{ __('Reviews') }}</span></li>
                                        @else
                                        <li><div class="urip_jbl urip_rates good">{{ 0  }}</div><span class="smallest">({{ 0 }}){{ __('Reviews') }}</span></li>
                                        @endif


                                                <li><div class="urip_jbl">{{ DB::table('items')->where('user_id', $follower->user->id)->count()}}</div><span class="smallest">{{ __('Items') }}</span></li>
                                            </ul>
                                        </div>

                                        <a href="{{ route('author.portfolio',str_replace(' ','-',$follower->user->username)) }}" class="link_portfolio">{{__('View Portfolio')}}</a>



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
			<section class="call-to-act" style="background:#5d47dd url(assets/img/landing-bg.png) no-repeat">
				<div class="container">
					<div class="row justify-content-center">

						<div class="col-lg-7 col-md-8">
							<div class="clt-caption text-center mb-4">
								<h3>{{ __('Subscribe Now!') }}</h3>
								<p>{{ __('Simple pricing plans. Unlimited web maintenance service') }}</p>
							</div>
							<div class="inner-flexible-box subscribe-box">
								<div class="input-group">
									<input type="text" class="form-control large" placeholder="Enter your mail here">
									<button class="btn btn-subscribe" type="button"><i class="fa fa-arrow-right"></i></button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- ============================ Call To Action End ================================== -->

@endsection
