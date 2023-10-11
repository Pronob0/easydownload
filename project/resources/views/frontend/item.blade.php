
@extends('layouts.front')

@section('content')

	<!-- ============================ Dashboard Header Start================================== -->
	<div class="_agt_dash dark" style="background:#675bca url({{ asset('assets/images/'.$gs->breadcumb_banner) }}) no-repeat;">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="_capt9oi">
						<h1 class="text-light">{{__('Search Products')}}</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- ========================== Dashboard Header header ============================= -->


	<!-- ========================== Search Elements ============================= -->
	<section class="gray-light">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-12 col-sm-12">
					<div class="search-sidebar sm-sidebar">
						<div class="search-sidebar_header">
							<h4 class="ssh_heading">{{__('Filter & Refine')}}</h4>
						</div>
						<div class="search-sidebar-body">

							<!-- Single Option -->
							<div class="single_search_boxed">
								<div class="widget-boxed-body">
									<div class="side-list no-border">
										<div class="filter-card" id="shop-categories">
											<!-- Single Filter Card -->
											@foreach ($categories as $key=>$category)
											<div class="single_filter_card">
												<h5>
													<a href="#allcates{{$category->id}}" data-toggle="collapse" data-id="{{$category->slug}}" class="collapsed serach_cat_item" aria-expanded="false" role="button">{{$category->name}}
														@if ($category->subs->count() > 0)
														<i class="accordion-indicator ti-angle-down"></i>
														@endif
													</a>
												</h5>
												<div class="collapse" id="allcates{{$category->id}}" data-parent="#shop-categories">
													<div class="card-body">
														<div class="inner_widget_link">
															<ul>
																@foreach ($category->subs as $key=>$subcategory)
																	<li><a class="search_sub_category" href="javascript:;" data-href="{{$subcategory->slug}}">{{$subcategory->name}}</a></li>
																@endforeach
															</ul>
														</div>
													</div>
												</div>
											</div>
											@endforeach
										</div>
									</div>
								</div>
							</div>

							<!-- Single Option -->
							<div class="single_search_boxed">
								<div class="widget-boxed-header">
									<h4><a href="#pricing" data-toggle="collapse" class="collapsed" aria-expanded="false" role="button">{{__('Pricing')}}</a></h4>
								</div>
								<div class="widget-boxed-body collapse body-area" id="pricing" data-parent="#pricing">
										<div class="price-range-block">
											<div id="slider-range" class="price-filter-range" name="rangeInput"></div>
											<div class="livecount">
												<input name="min" type="number" min=0 name="min" id="min_price" class="price-range-field" value="{{request()->input('min')}}" placeholder="{{__('min')}}" />
												<span>{{__('to')}}</span>
												<input name="max" type="number" min=0  name="max" id="max_price" class="price-range-field" value="{{request()->input('max')}}" placeholder="{{__('max')}}"/>
											</div>
										</div>
										<br>
										<button class="filter-btn range_search btn-sm" type="button">{{__('Search')}}</button>
								</div>
							</div>

							<div class="single_search_boxed">
								<div class="widget-boxed-header">
								   <h4><a href="#tags" data-toggle="collapse" aria-expanded="false" role="button">{{ __('Tags') }}</a></h4>
								</div>
								<div class="widget-boxed-body collapse show" id="tags" data-parent="#tags">
								   <div class="side-list no-border">
									  <!-- Single Filter Card -->
									  <div class="single_filter_card">
										 <div class="card-body pt-0">
											<div class="inner_widget_link">
											   <ul class="no-ul-list">
												   @foreach ($tags as $key => $tag)
													@if ($tag)
														<li>
															<input id="tag{{$key}}" class="checkbox-custom tag_search" name="tag{{$key}}" value="{{$tag}}" type="checkbox">
															<label for="tag{{$key}}" class="checkbox-custom-label">{{$tag}}</label>
														</li>
													@endif
												   @endforeach
											   </ul>
											</div>
										 </div>
									  </div>
								   </div>
								</div>
							 </div>


						</div>
					</div>
				</div>

				<div class="col-lg-8 col-md-12 col-sm-12" id="show_search_items">
					@include('includes.search_item')
				</div>
			</div>
		</div>
	</section>
	<!-- ========================== Dashboard Elements ============================= -->

	<form id="search_item" class="d-none" action="{{route('front.item')}}" method="GET">
		<input type="text" name="sortby" id="sortby" value="{{request()->input('sortby')}}">
		<input type="text" name="category" id="category" value="{{request()->input('category')}}">
		<input type="text" name="subcategory" id="subcategory" value="{{request()->input('subcategory')}}">
		<input type="text" name="max" id="max" value="{{request()->input('max')}}">
		<input type="text" name="min" id="min" value="{{request()->input('min')}}">
		<input type="text" name="tags" id="tags" value="{{request()->input('tags')}}">
		<button type="submit" id="search_btn_submit" class="d-none"></button>
	</form>
@endsection

@section('scripts')
	<script>
		// category js
		$(document).on('click','.single_filter_card .serach_cat_item',function(){
			let category = $(this).attr('data-id');
			$('#search_item #category').val(category);
			$('#search_btn_submit').click();
		})
		// subcategory js
		$(document).on('click','.search_sub_category',function(){
			let subcategory = $(this).attr('data-href');
			$('#search_item #subcategory').val(subcategory);
			$('#search_btn_submit').click();
		})
		// range js
		$(document).on('click','.range_search',function(){
			let max = $('#max_price').val();
			let min = $('#min_price').val();
			$('#search_item #max').val(max);
			$('#search_item #min').val(min);
			$('#search_btn_submit').click();
		})

		$(document).on('change','#search_orderby_item',function(){
			let sortby = $(this).val();
			$('#search_item #sortby').val(sortby);
			$('#search_btn_submit').click();
		})

		$(document).on('click','.tag_search',function(){
		    	let tags = $(this).val();
		    $.each($('.tag_search'), function( index, value ) {
				if($(this).is(':checked')){
				    if(tags != $(this).val()){
				        $(this).prop('checked',false);
				    }

				}
			});

			$('#search_item #tags').val(tags);
			$('#search_btn_submit').click();
		})


		$(document).on('submit','#search_item',function(e){
			e.preventDefault();
			$.ajax({
				method: 'GET',
				url: $(this).attr('action'),
				data: $(this).serialize(),
				success: function (data) {
					$('#show_search_items').html(data);
				}
			});
		})


	</script>
@endsection
