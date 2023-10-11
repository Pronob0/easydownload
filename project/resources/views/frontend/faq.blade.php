@extends('layouts.front')

@section('content')

			<!-- ============================ Header Start================================== -->
			<div class="_agt_dash dark" style="background:#675bca url({{ asset('assets/images/'.$gs->breadcumb_banner) }}) no-repeat;">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="_capt9oi">
								<h1 class="text-light">{{ __("FAQ's Page") }}</h1>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- ========================== Header header ============================= -->


			<!-- ========================== FAQ's Elements ============================= -->
			<section>
				<div class="container">
					<div class="row">
						<div class="col-lg-10 col-md-12 col-sm-12">
							<div class="_faqs9oi87">
								@if (count($faqs) == 0)
									<div class="card">
										<div class="card-body">
											<h2 class="text-center">{{__('No faq available')}}</h2>
										</div>
									</div>
								@else
								<!-- Single -->
									@foreach ($faqs as $faq)
										<div class="_sin98ufaq">
											<h4>{{ $faq->title }}</h4>
											<p>{{ $faq->details }}</p>
										</div>
									@endforeach
								@endif
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- ========================== FAQ's Elements ============================= -->

@endsection
