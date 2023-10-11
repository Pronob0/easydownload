@extends('layouts.front')
@section('content')
			<!-- ============================================================== -->

            @includeIf('includes.user.common')
			<!-- ========================== Dashboard Elements ============================= -->
			<section class="gray-light">
				<div class="container">

					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-12">
							<div class="_wid9kj67">
								<h4><sup>$</sup><span class="count">{{ Auth::user()->balance }}</span></h4>
								<p>{{ __('Current Balance') }}</p>
							</div>
						</div>

						<div class="col-lg-4 col-md-4 col-sm-12">
							<div class="_wid9kj67">
								<h4 class="_plus">+<sup>$</sup><span class="count">{{Auth::user()->total_sell }}</span></h4>
								<p>{{ __('Total Earning') }}</p>
							</div>
						</div>

						<div class="col-lg-4 col-md-4 col-sm-12">
							<div class="_wid9kj67">
								<h4 class="_minus"><sup>$</sup><span class="count">{{ $sell }}</span></h4>
								<p>{{ __('Last month profit') }}</p>
							</div>
						</div>


					</div>

					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="table-responsive">
								<table class="table table-lg table-hover">
									<thead class="thead-dark">
										<tr>
											<th scope="col">{{__('Order Number')}}</th>
											<th scope="col">{{__('Invoice Number')}}</th>
											<th scope="col">{{__('Date')}}</th>
											<th scope="col">{{__('Product Details')}}</th>
											<th scope="col">{{__('Additional Info')}}</th>
											<th scope="col">{{__('Included Support')}}</th>
											<th scope="col">{{__('Extended Support')}}</th>
											<th scope="col">{{__('Item Price')}}</th>
											<th scope="col">{{__('Profit')}}</th>
											</tr>
									</thead>

									<tbody>
										@if (count($ots) == 0)
											<tr>
												<td>{{__('No results found.')}}</td>
											</tr>
										@else
											@foreach ($ots as $ot)
												<tr>
													<td>{{$ot->order->order_number}}</td>

													<td><a href="{{route('user.invoice',$ot->id)}}" target="_blank">{{$ot->invoice_number}}</a></td>
													<td>{{date('M jS, Y', strtotime($ot->created_at))}}</td>
													@if (!empty($ot->item))
														@php
															$item = $ot->item;
														@endphp
													@endif
													<td><a target="_blank" href="{{ route('item.details',$item->id) }}">{{$item->name}}</a></td>
													<td>
														@if (!empty($ot->item))
															<strong>{{$item->category->name}}</strong><br>
															<strong class="light">{{__('Author')}}:</strong> {{$item->user->username}} <br>
														@endif
														<strong class="light">{{__('License')}}:</strong> <span style="text-transform: Capitalize;">{{$ot->license}}</span><br>
														<strong class="light">{{__('Support')}}:</strong> <span style="text-transform: Capitalize;">{{support_date($ot->id)}}</span>
													</td>
													<td>${{$ot->included_support}}</td>
													<td>${{$ot->extended_support}}</td>
													<td>${{$ot->price}}</td>
													<td>${{$ot->author_profit}}</td>
												</tr>
											@endforeach
										@endif
									</tbody>
								</table>

							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							{{$ots->links()}}
						</div>
					</div>

				</div>
			</section>
			<!-- ========================== Dashboard Elements ============================= -->

			<!-- ============================ Call To Action Start ================================== -->
			@includeIf('partials.theme-newsletter')
			<!-- ============================ Call To Action End ================================== -->

            {{-- new update --}}

@endsection
