@extends('layouts.front')

@section('content')
			<!-- ============================ Header Start================================== -->
			<div class="_agt_dash dark" style="background:#675bca url({{ asset('assets/images/'.$gs->breadcumb_banner) }}) no-repeat;">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="_capt9oi">
								<h1 class="text-light">{{ __('All Author') }}</h1>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- ========================== Header header ============================= -->

			<!-- ========================== Blog Detail Elements ============================= -->
			<section class="gray-light">
				<div class="container">
					<div class="row">

						<!-- Blog Detail -->
						<div class="col-lg-8 col-md-12 col-sm-12 col-12">
							<div class="_the_capt5t">
								<div class="all_portfwrap ">
									<!-- Single Item -->
                                    @foreach ($author as $user)
										
										<div class="all_portf987">
											<div class="_portf982">
												<div class="_portf900">
													<a href="{{ route('author.portfolio',str_replace(' ','-',$user->username)) }}"><img src="{{ $user->photo ? asset('assets/images/'.$user->photo): asset('assets/images/placeholder.png') }}" class="user-product-image" alt=""></a>
												</div>
												<div class="_portf910 ml-2">
													<h4 class="_ijy_title"><a href="{{ route('author.portfolio',str_replace(' ','-',$user->username)) }}">{{ $user->username }}</a></h4>

													<span class="_sal098">{{ DB::table('items')->where('user_id', $user->id)->sum('sell')}}  {{__('Sales')}}</span>
                                                    <br>
                                                    <span class="_sal098">{{ DB::table('items')->where('user_id', $user->id)->count()}}  {{__('Items')}}</span>
													<br>
                                                    <span class="_sal098">{{ __('Member Since') }} {{ $user->created_at->format('F jS, Y') }}</span>
												</div>
											</div>
											<div class="_portf983">
                                                <div class="_hyu75_1">
                                                    <div class="_iju7_reviw">
                                                    @if (App\Models\Item::where('user_id',$user->id)->count()>0)
                    
                                                    @foreach (App\Models\Item::where('user_id',$user->id)->get() as $item)
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
                                    @endforeach
								</div>
							</div>
                            {{ $author->links()  }}
						</div>

						<!-- Single blog Grid -->
						<div class="col-lg-4 col-md-12 col-sm-12 col-12">

                            <div class="_the_capt5t ">
								<div class="all_portfwrap pl-3 pr-3">
                                    <div class="footer-widget">
                                        <h4 class="widget-title ">{{__('Popular Items')}}</h4>
                                        <ul class="footer-menu">
                                            @foreach ($items as $blog)
                                                <li>
                                                    <div class="post">
                                                    <div class="post-img">
                                                        <img style="width: 73px; height: 59px;" src="{{  $blog->thumbnail_imagename ? asset('assets/images/'.$blog->thumbnail_imagename):asset('assets/images/noimage.png') }}" alt="">
                                                    </div>
                                                    <div class="post-details">
                                                        <a href="{{ route('item.details',$item->slug) }}">
                                                            <h6 class="post-title ">
                                                                {{mb_strlen($blog->name,'utf-8') > 45 ? mb_substr($blog->name,0,45,'utf-8')." .." : $blog->name}}
                                                            </h6>
                                                        </a>
                                                        <p class="date">
                                                            {{ date('M d - Y',(strtotime($blog->created_at))) }}
                                                        </p>
                                                    </div>
                                                    </div>
                                                </li>
                                                <hr>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                           
						</div>
					</div>
				</div>
			</section>
			<!-- ========================== Blog Detail Elements ============================= -->



@endsection
