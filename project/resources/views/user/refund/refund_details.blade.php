@extends('layouts.front')

@section('content')

@includeIf('includes.user.common')
			<!-- ========================== Dashboard Elements ============================= -->


			<section class="gray-light">
				<div class="container">
                    @include('includes.form-success')
					<div class="row">

						<div class="col-lg-8 col-md-12 col-sm-12">
							<div class="row">

                                <div class="col-lg-6">
                                    <div class="special-box">
                                        <div class="heading-area">
                                            <h4 class="title">
                                            {{__('Order Details')}}
                                            </h4>
                                        </div>
                                        <div class="table-responsive-sm">
                                            <table class="table">
                                                <tbody>
                                                <tr>
                                                    <th class="45%" width="45%">{{__('Order ID')}}</th>
                                                    <td width="10%">:</td>
                                                    <td class="45%" width="45%">{{$order->order->order_number}}</td>
                                                </tr>
                                                <tr>
                                                    <th width="45%">{{__('Product name')}}</th>
                                                    <td width="10%">:</td>
                                                    <td width="45%">{{$order->item->name}}</td>
                                                </tr>
                                                <tr>
                                                    <th width="45%">{{__('Total Cost')}}</th>
                                                    <td width="10%">:</td>
                                                    <td width="45%">$ {{$order->total_price}}</td>
                                                </tr>
                                                <tr>
                                                    <th width="45%">{{__('Ordered Date')}}</th>
                                                    <td width="10%">:</td>
                                                    <td width="45%">{{date('d-M-Y H:i:s a',strtotime($order->created_at))}}</td>
                                                </tr>
                                                <tr>
                                                    <th width="45%">{{__('Payment Method')}}</th>
                                                    <td width="10%">:</td>
                                                    <td width="45%">{{$order->order->method}}</td>
                                                </tr>

                                                @if(!empty($order->order_note))
                                                    <th width="45%">{{__('Order Note')}}</th>
                                                    <th width="10%">:</th>
                                                    <td width="45%">{{$order->order_note}}</td>
                                                @endif

                                                </tbody>
                                            </table>
                                        </div>



                                    </div>
                                    @if ($order->refund==0)
                                    <a href="{{ route('user.refund.approve',$order->id) }}" class="btn btn-success"><i class="fas fa-eye"></i> {{__('Approve')}}</a> Or <a href="{{ route('user.refund.decline',$order->id) }}" class="btn btn-danger"><i class="fas fa-eye"></i> {{__('Decline')}}</a>

                                    @endif

                                </div>
                                <div class="col-lg-6">
                                    <div class="special-box">
                                        <div class="heading-area">
                                            <h4 class="title">
                                            {{__('Billing Details')}}
                                            </h4>
                                        </div>
                                        <div class="table-responsive-sm">
                                            <table class="table">
                                                <tbody>
                                                        <tr>
                                                            <th width="45%">{{__('Name')}}</th>
                                                            <th width="10%">:</th>
                                                            <td width="45%">{{$order->order->billing_first_name}} {{$order->order->billing_last_name}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th width="45%">{{__('Email')}}</th>
                                                            <th width="10%">:</th>
                                                            <td width="45%">{{$order->order->billing_email_address}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th width="45%">{{__('Address')}}</th>
                                                            <th width="10%">:</th>
                                                            <td width="45%">{{$order->order->billing_address}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th width="45%">{{__('Postal Code')}}</th>
                                                            <th width="10%">:</th>
                                                            <td width="45%">{{$order->order->billing_zipcode}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th width="45%">{{__('State')}}</th>
                                                            <th width="10%">:</th>
                                                            <td width="45%">{{$order->order->billing_state}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th width="45%">{{__('Country')}}</th>
                                                            <th width="10%">:</th>
                                                            <td width="45%">{{$order->order->billing_country}}</td>
                                                        </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>


<br>
                            {{-- Review Section Start --}}
                            @if(count($disputes) > 0)
                     <div>
                            <div class="heading-area">
                                <h4 class="title">
                                   {{ __('Refund Messages') }}
                                </h4>

                             </div>
                             <div id="replay-area">
                                <div id="reviews-section">

                                   <ul class="all-replay">
                                      @foreach($disputes as $dispute)
                                      <li>
                                         <div class="single-review">
                                             @if ($dispute->user_id==Auth::user()->id)
                                             <div class="left-area">
                                                <img src="{{ Auth::user()->photo ? asset('assets/images/'.Auth::user()->photo):asset('assets/images/placeholder.jpg') }}"
                                                   alt="">
                                                @if ($dispute->created_at)
                                                <p class="date">
                                                 {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$dispute->created_at)->diffForHumans() }}
                                              </p>
                                              @endif
                                             </div>
                                             <div class="right-area">
                                                <div class="review-body">
                                                    <h5 class="name">{{ Auth::user()->username }} <small>({{ __('seller') }})</small></h5>
                                                    <br>
                                                   <p>
                                                      {{$dispute->text}}
                                                   </p>

                                                </div>
                                             </div>

                                             @else

                                             <div class="left-area">
                                                <img src="{{ $user->photo ? asset('assets/images/'. $user->photo):asset('assets/images/placeholder.jpg') }}"
                                                   alt="">
                                                @if ($dispute->created_at)
                                                <p class="date">
                                                 {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$dispute->created_at)->diffForHumans() }}
                                                 @endif
                                              </p>
                                             </div>
                                             <div class="right-area">
                                                <div class="review-body">
                                                    <h5 class="name">{{ $buyer->user->username }} <small>({{ __('Buyer') }})</small></h5>
                                                    <br>
                                                   <p>
                                                      {{$dispute->text}}
                                                   </p>

                                                </div>
                                             </div>
                                               @endif

                                               @endforeach




                                         </div>

                                      </li>
                                   </ul>

                                </div>
                             </div>
                        </div>

                        {{-- refund message section start --}}
                            @if ($order->refund_seen==1)
                            <form id="geniusform" action="{{ route('user.refund.reply',$order->id) }}"
                                method="POST">

                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-lg-12">
                                    <textarea class="form-control" name="text" required rows="7" placeholder="{{ __('Your Message') }}"></textarea>
                                    <input type="hidden" name='is_seller' value='1'>
                                    <input type="hidden" name='is_buyer' value='0'>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="widget_avater_423">
                                        <button  type="submit" class="submit-btn link_portfolio">{{ __('SUBMIT') }}</button>
                                    </div>
                                </div>
                            </div>
                            </form>

                            @endif
                            @endif
                    {{-- refund section end --}}
						</div>
						<div class="col-lg-4 col-md-12 col-sm-12">
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
<script src="{{ asset('assets/user/js/custom.js') }}"></script>
@endsection
