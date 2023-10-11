@extends('layouts.front')

@section('content')

			<!-- ============================ Header Start================================== -->
			<div class="_agt_dash dark" style="background:#675bca url({{ asset('assets/images/'.$gs->breadcumb_banner) }}) no-repeat;">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="_capt9oi">
								<h1 class="text-light">{{ $page->title }} Page</h1>
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

								<!-- Single -->
								<div >
									<p> {{ $page->details }}</p>
								</div>

							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- ========================== FAQ's Elements ============================= -->

@endsection
