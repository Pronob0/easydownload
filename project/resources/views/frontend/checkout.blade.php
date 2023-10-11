@extends('layouts.front')

@section('content')
			<!-- ============================ Dashboard Header Start================================== -->
			<div class="_agt_dash dark" style="background:#675bca url({{ asset('assets/images/'.$gs->breadcumb_banner) }}) no-repeat;">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="_capt9oi">
								<h1 class="text-light">{{__('Billing Page')}}</h1>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- ========================== Dashboard Header header ============================= -->

			<!-- ========================== Billing Form Elements ============================= -->

			<section class="gray-light">
				<div class="container">
					@include('includes.admin.form-flash')


					<form class="checkoutform" action="" method="POST">
						@csrf
						<div class="row form-submit">
							<div class="col-lg-8 col-md-12 col-sm-12">

								<!-- row -->
								<div class="row m-0">
									<div class="submit-page mb-4">
										<div class="row">

											<div class="col-lg-12 col-md-12 col-sm-12">
												<h3>{{__('Billing Details')}}</h3>
											</div>

											<div class="col-lg-6 col-md-6 col-sm-12">
												<div class="form-group">
													<label>{{__('First Name')}}<i class="req"></i></label>
													<input type="text" class="form-control" name="first_name" placeholder="{{__('First Name')}}" value="{{$firstName}}">

													@if ($errors->has('first_name'))
														<p class="text-danger">{{$errors->first('first_name')}}</p>
													@endif
												</div>
											</div>

											<div class="col-lg-6 col-md-6 col-sm-12">
												<div class="form-group">
													<label>{{__('Last Name')}}<i class="req"></i></label>
													<input type="text" name="last_name" class="form-control" placeholder="{{__('Last Name')}}" value="{{$lastName}}">

													@if ($errors->has('last_name'))
														<p class="text-danger">{{$errors->first('last_name')}}</p>
													@endif
												</div>
											</div>

											<div class="col-lg-12 col-md-12 col-sm-12">
												<div class="form-group">
													<label>{{__('Company Name')}}</label>
													<input type="text" class="form-control" name="company_name" placeholder="{{__('Company Name')}}" value="{{$company}}">

													@if ($errors->has('company_name'))
														<p class="text-danger">{{$errors->first('company_name')}}</p>
													@endif
												</div>
											</div>

											<div class="col-lg-12 col-md-12 col-sm-12">
												<div class="form-group">
													<label>{{__('Email Address')}}</label>
													<input type="email" name="email_address" class="form-control" placeholder="{{__('Email Address')}}" value="{{$email}}">
                                                    <input type="hidden" id="grandtotal" value="{{ cartTotal() }}">


													@if ($errors->has('email_address'))
														<p class="text-danger">{{$errors->first('email_address')}}</p>
													@endif
												</div>
											</div>

											<div class="col-lg-12 col-md-12 col-sm-12">
												<div class="form-group">
													<label>{{__('Country Name')}}</label>
													<input type="text" name="country" class="form-control" placeholder="{{__('Country Name')}}" value="{{$country}}">

													@if ($errors->has('country'))
														<p class="text-danger">{{$errors->first('country')}}</p>
													@endif
												</div>
											</div>

											<div class="col-lg-6 col-md-6 col-sm-12">
												<div class="form-group">
													<label>{{__('State')}}<i class="req"></i></label>
													<input type="text" name="state" class="form-control" placeholder="{{__('State')}}" value="{{$state}}">

													@if ($errors->has('state'))
														<p class="text-danger">{{$errors->first('state')}}</p>
													@endif
												</div>
											</div>

											<div class="col-lg-6 col-md-6 col-sm-12">
												<div class="form-group">
													<label>{{__('Zip Code')}}<i class="req"></i></label>
													<input type="text" name="zipcode" class="form-control" placeholder="{{__('Zip Code')}}" value="{{$zipcode}}">

													@if ($errors->has('address'))
														<p class="text-danger">{{$errors->first('address')}}</p>
													@endif
												</div>
											</div>

											<div class="col-lg-12 col-md-12 col-sm-12">
												<div class="form-group">
													<label>{{__('Full Address')}}</label>
													<textarea class="form-control ht-50" name="address" placeholder="{{__('Full Address')}}">{{$address}}</textarea>

													@if ($errors->has('address'))
														<p class="text-danger">{{$errors->first('address')}}</p>
													@endif
												</div>
											</div>

										</div>
									</div>
								</div>
								<!--/row -->
							</div>
							<!-- Col-lg 4 -->
							<div class="col-lg-4 col-md-12 col-sm-12">
								<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12">
										<h3>{{__('Your Order')}}</h3>
									</div>
									<div class="col-lg-12 col-md-12 col-sm-12">
										<div class="product-wrap">
											<ul>
												<li><strong>{{__('Cart Total')}} </strong>{{cartTotalWithoutTax() }}</li>
												<li><strong>{{__('Tax')}}</strong>{{ $gs->tax }}%</li>
                                                <li><strong>{{__('Total')}}</strong>{{ $curr->sign }} {{cartTotal() }}</li>
											</ul>
										</div>
									</div>
								</div>
                                <br>
                                <div class="row">

									<div class="col-lg-12 col-md-12 col-sm-12">
										<h3>{{__('Select Payment Option')}}</h3>
									</div>

									<div class="col-lg-12 col-md-12 col-sm-12">
										<div class="product-wrap">
											@foreach ($gateways as $gt)
												<input class="method" type="radio" form="checkout-form" id="gateway{{$gt->id}}" name="payment_method" value="{{ $gt->keyword }}" data-val="{{ $gt->keyword }}" data-show="{{$gt->showForm()}}"
												data-form="{{ $gt->showCheckoutLink() }}"
												data-href="{{ route('front.load.payment',['slug1' => $gt->showKeyword(),'slug2' => $gt->id]) }}" {{$loop->first ? 'checked' : ''}}>

												<label for="gateway{{$gt->id}}" class="linked-radio">
													<span class="radio primary"><span></span></span>
													{{ $gt->name }}
												</label>

												@if($gt->information != null)
													<p class="pm-text ed_credits" style="display: block;">{{ $gt->getAutoDataText() }}</p>
												@endif
											@endforeach

											<div class="pay-area" style="display: none;">

											</div>
										</div>

									</div>
								</div>

								<div class="col-lg-12 text-right mt-3">
									<button type="submit" id="final-btn" class="btn_pur790 mybtn1">{{__('Submit')}}</button>
								</div>
							</div>
							<!-- /col-lg-4 -->
						</div>
                        <input type="hidden" name="txnid" id="ref_id_paystack" value="">
					</form>
				</div>
			</section>
			<!-- ========================== Billing Form Elements ============================= -->


@endsection

@section('scripts')
<script src="https://js.paystack.co/v1/inline.js"></script>
<script src="https://secure.mlstatic.com/sdk/javascript/v1/mercadopago.js"></script>

<script>
	"use strict";
	$(document).ready(function() {
		$(".checkoutform").attr('action', $("input.method:checked").data('form'));


		$('.method').on('change',function(){
			$('.checkoutform').prop('action',$(this).data('form'));
			var show = $(this).data('show');
            if($(this).val() == 'mercadopago'){
                $('.checkoutform').prop('id','mercadopago');
            }
            else if($(this).val() == 'paystack'){
                $('.checkoutform').prop('id','paystack');

            }
            else{
                $('.checkoutform').prop('id','');
            }
			if(show != 'no') {
				$('.pay-area').show();
				$('.pay-area').load($(this).data('href'));
			}
			else {
				$('.pay-area').hide();
			}
		});

	});

    // paystack submit



        $(document).on('submit','#paystack',function(e){

        var val = $('#sub').val();
        var total =parseFloat($('#grandtotal').val());
        total = Math.round(total);

            var handler = PaystackPop.setup({
            key: '{{$paystackData['key']}}',
            email: $('input[name=email_address]').val(),
            amount: total,
            currency: "{{$curr->name}}",
            ref: ''+Math.floor((Math.random() * 1000000000) + 1),
            callback: function(response){

                $('#ref_id_paystack').val(response.reference);

                $('#sub').val('1');
				$('.checkoutform').attr('id','');
                $('#final-btn').click();
            },
            onClose: function(){
                window.location.reload();

            }
            });
            handler.openIframe();
                    return false;


        });






</script>
@endsection
