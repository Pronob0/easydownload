@extends('layouts.front')


@section('content')
			<!-- ============================ Header Start================================== -->
			<div class="_agt_dash dark" style="background:#675bca url({{ asset('assets/images/'.$gs->breadcumb_banner) }}) no-repeat;">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="_capt9oi">
								<h1 class="text-light">{{ __('Get In Touch') }}</h1>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- ========================== Header header ============================= -->

			<!-- ========================= Contact Info ============================= -->
			<section>
				<div class="container">
					<!-- row Start -->
                    <h2 class="text-center mb-4">{{__('Get In Touch')}}</h2>

					<div class="row">

						<div class="col-lg-7 col-md-7">
                            <form id="contactform" action="{{route('front.contact.submit')}}" method="POST">
                                {{csrf_field()}}
                                    @include('includes.admin.form-both')


							<div class="row">


								<div class="col-lg-6 col-md-6">

									<div class="form-group">
										<label>{{__('Name')}}</label>
										<input name="name"  type="text" class="form-control simple" placeholder="{{ __('Name') }} *" required="">
									</div>
								</div>
								<div class="col-lg-6 col-md-6">
									<div class="form-group">
										<label>{{__('Email')}}</label>
										<input type="email" name="email"  placeholder="{{ __('Email Address') }} *" required="" class="form-control simple">
									</div>
								</div>
							</div>



							<div class="form-group">
								<label>{{__('Message')}}</label>
								<textarea name="text" required class="form-control simple"></textarea>
							</div>
                            


                            <input type="hidden" name="to" value="{{ $pagesettings->contact_email }}">
							<div class="form-group">
								<button class="submit-btn btn theme-bg rounded" type="submit">{{__('Submit Request')}}</button>
							</div>


                            </form>
						</div>

						<div class="col-lg-5 col-md-5">
							<div class="contact-info">

								<div class="cn-info-detail">
									<div class="cn-info-icon">
										<i class="ti-home"></i>
									</div>
									<div class="cn-info-content">
										<h4 class="cn-info-title">{{__('Reach Us')}}</h4>
										{{ $pagesettings->street }}
									</div>
								</div>

								<div class="cn-info-detail">
									<div class="cn-info-icon">
										<i class="ti-email"></i>
									</div>
									<div class="cn-info-content">
										<h4 class="cn-info-title">{{__('Drop A Mail')}}</h4>
										{{ $pagesettings->email }}
									</div>
								</div>

								<div class="cn-info-detail">
									<div class="cn-info-icon">
										<i class="ti-mobile"></i>
									</div>
									<div class="cn-info-content">
										<h4 class="cn-info-title">{{__('Call Us')}}</h4>
										{{ $pagesettings->phone }}
									</div>
								</div>


								@if ($pagesettings->site==NULL)

								@else
									<div class="cn-info-detail">
										<div class="cn-info-icon">
											<i class="ti-world"></i>
										</div>
										<div class="cn-info-content">
											<h4 class="cn-info-title">{{__('Website')}}</h4>
											{{ $pagesettings->site }}
										</div>
									</div>
								@endif
							</div>
						</div>

					</div>
					<!-- /row -->

				</div>

			</section>
			<!-- ========================= Contact Info ============================ -->

@endsection

