@extends('layouts.front')

@section('content')

			<!-- ============================ Dashboard Header Start================================== -->
			<div class="_agt_dash dark" style="background:#7e7e80 url({{ asset('assets/images/'.$gs->breadcumb_banner) }}) no-repeat;">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="_capt9oi">
								<h1 class="text-light">{{ __('Blogs Page') }}</h1>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- ========================== Dashboard Header header ============================= -->


			<!-- ============================ News Updates Start ==================================== -->
			<section class="min-sec">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-7 col-md-9">
							<div class="sec-heading">
								<h2>{{ $homepage->blog_section_title }}</h2>
                            <p>{{ $homepage->blog_section_text }}</p>
							</div>
						</div>
					</div>

					<div class="row">
						@if (count($blogs) == 0)
							<div class="card">
								<div class="card-body">
									<h2 class="text-center">{{__('No blog available')}}</h2>
								</div>
							</div>
						@else
                        @foreach ($blogs as $blog)
							<div class="col-lg-4 col-md-6 col-sm-12">
								<a href="{{route('blog.details',$blog->slug)}}" target="_blank">
									<div class="articles_grid_style style-2">
										<div class="articles_grid_thumb">
											<a href="{{route('blog.details',$blog->slug)}}"><img src="{{  $blog->photo ? asset('assets/images/'.$blog->photo):asset('assets/images/noimage.png') }}" class="img-fluid" alt=""></a>
										</div>

										<div class="articles_grid_caption">
											<div class="mpd-date-wraps">
												<span class="mpd-meta-date">{{ $blog->created_at->format('d')}}</span>
												<span class="mpd-meta-month">{{ $blog->created_at->format('F')}}</span>
											</div>
											<div class="blog-grid-cat" style="background-color: {{ $blog->category->colors}}">{{ $blog->category->name }}</div>
											<a href="{{route('blog.details',$blog->slug)}}"><h4>{{strlen($blog->title)>47 ? substr($blog->title,0,46) : $blog->title}}</h4></a>
											<div class="articles_grid_desc">
												<p>{{ strlen($blog->details)>50 ? substr($blog->details,0,10) : $blog->details }}</p>
											</div>
										</div>

									</div>
								</a>
							</div>
                        @endforeach
						@endif
						<!-- Single Slide -->



					</div>
                    <div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							{{$blogs->links()}}
						</div>
					</div>

				</div>
			</section>
			<!-- ============================ News Updates End ==================================== -->



@endsection
