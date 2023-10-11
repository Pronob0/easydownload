
@extends('layouts.front')
@section('content')

@includeIf('includes.user.common')
			<!-- ========================== Dashboard Elements ============================= -->
			<section class="gray-light">
				<div class="container">
					<div class="row">

						<div class="col-lg-8 col-md-12 col-sm-12">
							<div class="extra_ijyu98">
                                <div class="extra_ijyu98_head">
                                    <h4>Withdraw Information</h4>
                                </div>
                                <div class="extra_ijyu98_body">

                                    <form class="geniusformdata" action="{{route('user.withdraw.request.send')}}"  method="POST" enctype="multipart/form-data">
                                        @include('includes.admin.form-both')


                                        {{ csrf_field() }}
                                        <div class="item form-group">
                                           <h5 class="control-label col-sm-12" for="name">{{ __('Current Balance') }} : $ {{ Auth::user()->balance }}</h5>
                                        </div>
                                        <br>
                                        <div class="item form-group">
                                           <label class="control-label col-sm-4" for="name">{{ __('Withdraw Method') }} *
                                           </label>
                                           <div class="col-sm-12">

                                            <select class="form-select form-group form-control" name="methods" id="withmethod" aria-label="Default select example">
                                                <option value="">{{ __('Select Withdraw Method') }}</option>
                                                <option value="Paypal">{{ __('Paypal') }}</option>
                                                <option value="Skrill">{{ __('Skrill') }}</option>
                                                <option value="Payoneer">{{ __('Payoneer') }}</option>
                                                <option value="Bank">{{ __('Bank') }}</option>
                                              </select>
                                           </div>
                                        </div>
                                        <div class="item form-group">
                                           <label class="control-label col-sm-12" for="name">{{ __('Withdraw Amount') }} *
                                           </label>
                                           <div class="col-sm-12">
                                              <input name="amount" placeholder="{{ __('Withdraw Amount') }}" class="form-control"  type="text" value="{{ old('amount') }}" required>
                                           </div>
                                        </div>


                                         <div id="paypal" style="display: none;">

                                             <div class="form-group">
                                                 <label class="control-label col-sm-12" for="name">{{__('Enter Account Email')}} *

                                                 </label>
                                                 <div class="col-sm-12">
                                                     <input name="acc_email" placeholder="{{__('Enter Account Email')}}" class="form-control" value="" type="email" required="required">
                                                 </div>
                                             </div>

                                         </div>


                                         <div id="bank" style="display: none;">

                                             <div class="form-group">
                                                 <label class="control-label col-sm-12" for="name">{{__('Enter IBAN/Account No')}} *

                                                 </label>
                                                 <div class="col-sm-12">
                                                     <input name="iban" value="" placeholder="{{__('Enter IBAN/Account No')}}" class="form-control" type="text">
                                                 </div>
                                             </div>

                                             <div class="form-group">
                                                 <label class="control-label col-sm-12" for="name">{{__('Enter Account Name')}} *

                                                 </label>
                                                 <div class="col-sm-12">
                                                     <input name="acc_name" value="" placeholder="{{__('Enter Account Name')}}" class="form-control" type="text">
                                                 </div>
                                             </div>

                                             <div class="form-group">
                                                 <label class="control-label col-sm-12" for="name">{{__('Enter Address')}} *

                                                 </label>
                                                 <div class="col-sm-12">
                                                     <input name="address" value="" placeholder="{{__('Enter Address')}}" class="form-control" type="text">
                                                 </div>
                                             </div>

                                             <div class="form-group">
                                                 <label class="control-label col-sm-12" for="name">{{__('Enter Swift Code')}} *

                                                 </label>
                                                 <div class="col-sm-12">
                                                     <input name="swift" value="" placeholder="{{__('Enter Swift Code')}}" class="form-control" type="text">
                                                 </div>
                                             </div>

                                         </div>


                                        <div class="item form-group">
                                           <label class="control-label col-sm-12" for="name">{{ __('Additional Reference(Optional)') }}) *
                                           </label>
                                           <div class="col-sm-12">
                                              <textarea class="form-control" name="reference" rows="6" placeholder="{{ __('Additional Reference(Optional)') }}">{{ old('reference') }}</textarea>
                                           </div>
                                        </div>
                                        <div id="resp" class="col-md-12">
                                           <span class="help-block">
                                           <strong>{{ __('Withdraw Fee') }} ${{ $gs->withdraw_fee }} {{ __('and') }} {{ $gs->withdraw_charge }}% {{ __('deduct from your account') }}</strong>
                                           </span>
                                        </div>
                                        <hr>
                                        <div class="add-product-footer">
                                            <button type="submit" id="submit-btn" class="link_portfolio">{{ __('Withdraw') }}</button>

                                        </div>
                                    </form>
                                </div>
						</div>
                        </div>
						<div class="col-lg-4 col-md-12 col-sm-12">
							<!-- Single Author Info -->
							@include('includes.user.common-sidebar')
							<!-- Contact Author -->
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
<script type="text/javascript">

    $("#withmethod").change(function(){
        var method = $(this).val();
        if(method == "Bank"){

            $("#bank").show();
            $("#bank").find('input, select').attr('required',true);

            $("#paypal").hide();
            $("#paypal").find('input').attr('required',false);

        }
        if(method != "Bank"){
            $("#bank").hide();
            $("#bank").find('input, select').attr('required',false);

            $("#paypal").show();
            $("#paypal").find('input').attr('required',true);
        }
        if(method == ""){
            $("#bank").hide();
            $("#paypal").hide();
            $("#bank").find('input, select').attr('required',false);
             $("#paypal").find('input').attr('required',false);
        }

    })



//    $(document).on('click','#submit-btn',function(e){

//     window.scrollTo({top: -300, behavior: 'smooth'});
//    });


</script>
@endsection
