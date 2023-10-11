@extends('layouts.front')

@section('content')

			<!-- ============================ Header Start================================== -->
			<div class="_agt_dash dark" style="background:#675bca url({{ asset('assets/images/'.$gs->breadcumb_banner) }}) no-repeat;">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="_capt9oi">
								<h1 class="text-light">{{ __('Blog Detail') }}</h1>
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
							<div class="blog-details single-post-item format-standard">
								<div class="post-details">

									<div class="post-featured-img">
										<img class="img-fluid w-100" src="{{  $data->photo ? asset('assets/images/'.$data->photo):asset('assets/images/noimage.png') }}" alt="">
									</div>

									<div class="post-top-meta">
										<ul class="meta-comment-tag">
											<li><span class="icons me-2"><i class="icofont-calendar"></i></span>{{ date('d M, Y',strtotime($data->created_at)) }}</li>
											<li><span class="icons me-2"><i class="icofont-eye"></i></span>{{ $data->views }} {{__('Views')}}</li>
											<li><span class="icons me-2">{{__('Source')}} :<i class="icofont-speech-comments"></i></span>{{ $data->source }}</li>
										</ul>
									</div>
									<h2 class="post-title">{{$data->title}}</h2>
									{{$data->details}}
								</div>
							</div>

							<!-- Author Detail -->
							<div class="blog-details single-post-item format-standard">



							</div>

							<!-- Blog Comment -->
							<div class="blog-details single-post-item format-standard">

								<div class="comment-area">

									@if($gs->is_disqus == 1)
										<div class="comments">
											@php
											echo $gs->disqus;
											@endphp
										</div>
									@endif
								</div>

							</div>


						</div>

						<!-- Single blog Grid -->
						<div class="col-lg-4 col-md-12 col-sm-12 col-12">

							<!-- Searchbard -->
							<div class="single-widgets widget_search">
								<h4 class="title">{{__('Search')}}</h4>
								<form action="{{route('front.blogsearch')}}" class="sidebar-search-form">
									<input type="search" name="search" placeholder="{{__('Search..')}}" required="">
									<button type="submit"><i class="ti-search"></i></button>
								</form>
							</div>

							<!-- Categories -->
							<div class="single-widgets widget_category">
								<h4 class="title">{{__('Categories')}}</h4>
								<ul>
									@foreach ($bcats as $cat)
										<li><a href="{{ route('front.blogcategory',$cat->slug) }}" {{ $cat->id == $data->category_id ? 'class="active"':'' }}>{{ $cat->name }} <span>({{ $cat->blogs()->count() }})</span></a></li>
									@endforeach
								</ul>
							</div>
							<!-- Tags Cloud -->
							<div class="single-widgets widget_tags">
								<h4 class="title">{{__('Tags')}}</h4>
								<ul>
									@foreach($tags as $tag)
										@if(!empty($tag))
											<li>
												<a href="{{ route('front.blogtags',$tag) }}">{{ $tag }} </a>
											</li>
										@endif
									@endforeach
								</ul>
							</div>

						</div>

					</div>
				</div>
			</section>
			<!-- ========================== Blog Detail Elements ============================= -->



@endsection
