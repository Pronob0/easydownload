@extends('layouts.front')

@section('content')
 @if (Auth::user())
@includeIf('includes.user.common')
@else
@includeIf('includes.frontend.common')
@endif


@if (Session::has('success'))
	<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		{{ Session::get('success') }}
	</div>
@endif
			<!-- ========================== Dashboard Elements ============================= -->
			<section class="gray-light">
				<div class="container">
					<div class="row">

						<div class="col-lg-8 col-md-12 col-sm-12">
							<div class="_the_thu5t">
								<img src="{{ asset('assets/images/'.Auth::user()->dashboard_banner) }}" class="img-fluid" alt="" />
							</div>
							<div class="_the_capt5t">
								<h4>{{ Auth::user()->dashboard_title }}</h4>
                                <p>{{ Auth::user()->dashboard_details}}</p>

							</div>
							<h4>Featured Items</h4>
							<div class="row">
                    @foreach ($items as $key=>$item)
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
													<a href="{{ route('author.portfolio',str_replace(' ','-',$item->user->username)) }}" class="author-img">
														<img src="{{  $item->user->photo ? asset('assets/images/'.$item->user->photo):asset('assets/images/placeholder.jpg') }}" class="img-fluid" alt="">
													</a>
												</div>
												<div class="urip_avater_place">
													<h3 class="urip_title"><a href="{{ route('author.portfolio',str_replace(' ','-',$item->user->username)) }}">{{ $item->user->username }}</a></h3>
													@if ($item->user->created_at)
													<span>Member {{ $item->user->created_at->format('F jS, Y') }}</span>
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

						</div>

						<div class="col-lg-4 col-md-12 col-sm-12">

                            @if (Auth::user()->is_author == 0)
								<div class="lit98_jhy">
									<div class="extra_ijyu98_head">
										<h4>{{__('Upload Items')}}</h4>
									</div>
									<p>{{__('You Have to Become an Author first!')}} <a class="text-primary" href="{{ route('user.become.author') }}"> {{__('Become an Author')}} </a></p>
								</div>

                            @else



                            <form action="{{route('user.product.extended.form')}}" method="get" enctype="multipart/form-data">
								<div class="lit98_jhy">
									<div class="extra_ijyu98_head">
										<h4>{{__('Upload Items')}}</h4>
									</div>
									<select id="cat" class="form-control mb-3" name="category" required="">
									<option value="">{{ __('Select Category') }}</option>
										@foreach($cats as $cat)
										<option value="{{ $cat->slug }}">{{$cat->name}}</option>
										@endforeach
									</select>

									<div class="widget_avater_423">
										<button type="submit" class="link_portfolio">{{__('Next')}}</button>
									</div>
								</div>
                            </form>
                            @endif
                            <br>
                            @if ($levels->count()>0)
								@foreach ($levels as $level)
									@if ($level->amount>=Auth::user()->total_sell )
										@php
											$name=$level->name;
											$logo=$level->icon
										@endphp
									@else
										@php
											$name=$max->name;
											$logo=$max->icon;
										@endphp
									@endif
								@endforeach



								<div class="urip_widget_wrap shadow_0 mb-4 large">
									<div class="widget_avater_124 d-flex">
										<img src="{{$logo ? asset('assets/images/'.$logo):''}}" class="img-avater rounded ml-3" width="50" alt="">
										<h5 class="mt-2 ml-4">{{$name }} {{ __('Author') }}</h5>
									</div>
								</div>
								@endif
							<!-- Single Author Info -->
							@include('includes.user.common-sidebar')
						</div>

					</div>
				</div>
			</section>
			<!-- ========================== Dashboard Elements ============================= -->

			<!-- ============================ Call To Action Start ================================== -->
            @includeIf('partials.theme-newsletter')
			<!-- ============================ Call To Action End ================================== -->

@endsection
@section('scripts')

<script src="{{ asset("assets/user/js/custom.js") }}"></script>



@endsection

