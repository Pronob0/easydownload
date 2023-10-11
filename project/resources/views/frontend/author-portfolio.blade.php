@extends('layouts.front')

@section('content')
@includeIf('includes.frontend.common')

	<!-- ========================== Dashboard Elements ============================= -->
	<section class="gray-light">
		<div class="container">

            <div class="row">

                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="_the_thu5t">
                        <img src="{{ asset('assets/images/'.$data->dashboard_banner) }}" class="img-fluid" alt="" />
                    </div>
                    <div class="_the_capt5t">
                        <h4>{{ $data->dashboard_title }}</h4>
                        <p>{{ $data->dashboard_details}}</p>

                    </div>
                    <br>
                    <h4>Featured Items</h4>
                    <div class="row">
                    @foreach (DB::table('items')->where('user_id',$data->id)->get() as $item)
						@if ($item->is_feature==1)

						<div class="col-lg-6 col-md-6 col-sm-12">
							<div class="urip_column_three">
								<div class="item_image_urip">
									<a href="{{ route('item.details',$item->slug) }}" class="item-img">
										<img src="{{ $item->preview_imagename ? asset('assets/images/'.$item->preview_imagename):asset('assets/images/noimage.png') }}" class="img-fluid" alt="">
									</a>
									<div class="image_urip_caption">
										<div class="urip_caption_flex">
											<div class="urip_author">
												<div class="urip_avater">
													<a href="{{ route('author.portfolio',str_replace(' ','-',$data->username)) }}" class="author-img">
														<img src="{{  $data->photo ? asset('assets/images/'.$data->photo):asset('assets/images/placeholder.jpg') }}" class="img-fluid" alt="">
													</a>
												</div>
												<div class="urip_avater_place">
													<h3 class="urip_title"><a href="{{ route('author.portfolio',str_replace(' ','-',$data->username)) }}">{{ $data->name }}</a></h3>
													@if ($data->created_at)
													<span>Member {{ $data->created_at->format('F jS, Y') }}</span>
													@endif

												</div>
											</div>
										</div>

									</div>
								</div>
							</div>
						</div>

						@endif

						@endforeach
						</div>
						 <div class="row">
                            <div class="col-lg-12 col-md-12 text-center">
                                <a href="{{ route('user.portfolio',str_replace(' ','-',$data->username)) }}" class="ure09w">{{ __('Browse More') }}</a>
                            </div>
                        </div>


                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <!-- Single Author Info -->
                    <div class="urip_widget_wrap shadow_0 large mb-4">
                        <div class="urip_widget_avater">
                            <a href="{{ route('author.portfolio',str_replace(' ','-',$data->username)) }}"><img src="{{  $data->photo ? asset('assets/images/'.$data->photo):asset('assets/images/placeholder.jpg') }}" class="img-fluid circle" alt=""></a>
                            <div class="veryfied_author"><img src="assets/img/verified.svg" class="img-fluid" width="15" alt=""></div>
                        </div>
                        <div class="widget_avater_124">
                            <h4 class="avater_name_214"><a href="{{ route('author.portfolio',str_replace(' ','-',$data->username)) }}">{{ $data->username }}</a></h4>
                            @if ($data->created_at)
                            <span>Member {{ $data->created_at->format('F jS, Y') }}</span>
                            @endif
                        </div>
                        <div class="widget_avater_124">
                            <ul class="auhor_list_badges">
                                @foreach ($badges as $badge)
                                @php
                                $date = Carbon\Carbon::parse($data->email_verified_at);
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
                                <li><div class="urip_jbl"><span class="count">{{ DB::table('items')->where('user_id', $data->id)->sum('sell')}}</span></div><span class="smallest">{{__('Sales')}}</span></li>
                                @if (App\Models\Item::where('user_id',$data->id)->count()>0)
                                @foreach (App\Models\Item::where('user_id',$data->id)->get() as $item)
                                @php
                                $avg=$item->ratings->avg('rating');
                                @endphp

                                @endforeach
                                <li><div class="urip_jbl urip_rates good">{{ $avg!=0 ? $avg : 0  }}</div><span class="smallest">({{ $item->ratings->count() }}){{ __('Reviews') }}</span></li>
                                <li><div class="urip_jbl">{{ $item->comments->count() }}</div><span class="smallest">{{ __('Comments') }}</span></li>
                                @else
                                <li><div class="urip_jbl urip_rates good">{{ 0  }}</div><span class="smallest">({{ 0 }}){{ __('Reviews') }}</span></li>
                                <li><div class="urip_jbl">{{ 0 }}</div><span class="smallest">{{ __('Comments') }}</span></li>
                                @endif
                            </ul>
                        </div>
                        <div class="widget_avater_423">
                            <p class="link_portfolio">{{__('I am available for Freelance hire ')}}</p>
                        </div>
                    </div>

                    <!-- Contact Author -->
                    @if (auth()->user())
                   @if (Auth::user()->id!=$data->id)
                    <div class="urip_widget_wrap shadow_0 mb-4">
                        <div class="urip_widget_header bg__2 text-center">
                            <h4>{{ __('Email') }} {{$data->username}}</h4>
                            <span>{{ __('Drop a message to author') }}</span>
                        </div>

                        <div class="urip_widget_body">

                            <form id="geniusform2" action="{{route('user.contact')}}" method="post">
                                @csrf

                                <br>
                                <div class="wid_bghbody simple_uyt">
                                    <input type="hidden" name="userEmail" value="{{$data->email}}">
                                    <div class="form-group">
                                        <label>{{ __('From') }}</label>
                                        <input name="email" type="text" class="form-control" value="{{auth()->user()->email}}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>{{ __('Message') }}</label>
                                        <textarea name="message" class="form-control" class="ht-80" placeholder="{{ __('Type Message') }}"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <div class="widget_avater_423 p-0">
                                            <button type="submit" class="link_portfolio">{{ __('Send Message') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            @else
                            <p class="p-5">{{__('Please')}} <a href="{{route('user.login')}}" class="text-primary">{{__('sign in')}}</a> {{__('to contact this author.')}}</p>

                            @endif
                        </div>
                    </div>

                    @endif


                    <!-- Social Profiles -->
                    <div class="lit98_jhy">
                        <ul class="socil_uyh">
                            <li><a href="{{ $data->f_url }}" class="fb"><i class="fa fa-facebook"></i></a></li>

                            <li><a href="{{$data->t_url}}" class="twt"><i class="fa fa-twitter"></i></a></li>

                            <li><a href="{{ $data->l_url }}" class="pin"><i class="fa fa-linkedin"></i></a></li>

                            <li><a href="{{ $data->g_url }}" class="gp"><i class="fa fa-google-plus"></i></a></li>

                        </ul>
                    </div>

                </div>
            </div>

		</div>
	</section>
	<!-- ========================== Dashboard Elements ============================= -->

@endsection
