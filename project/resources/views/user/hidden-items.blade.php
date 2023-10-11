
@extends('layouts.front')
@section('content')

@includeIf('includes.user.common')
			<!-- ========================== Dashboard Elements ============================= -->
			<section class="gray-light">
				<div class="container">
					<div class="row">

						<div class="col-lg-8 col-md-12 col-sm-12">
							<div class="_the_capt5t">
								<div class="all_portfwrap">
									<!-- Single Item -->
                                    @foreach ($hp as $product)
										@if ($product->status=='pending' || $product->status=='declined' || $product->Resubmission==1)
										<div class="all_portf987">
											<div class="_portf982">
												<div class="_portf900">
													<a href="{{ route('item.details',$product->slug) }}"><img src="{{  $product->thumbnail_imagename ? asset('assets/images/'.$product->thumbnail_imagename):asset('assets/images/noimage.png') }}" class="user-product-image" alt=""></a>
												</div>
												<div class="_portf910 ml-2">
													<h4 class="_ijy_title"><a href="{{ route('item.details',$product->slug) }}">{{ $product->name }} ( {{ $product->showPrice() }} )</a></h4>

													<span class="_sal098">{{ $product->sell }}   {{__('Sales')}}</span>
													<div class="_alio98_buttons ml-2 mt-2">

														<a href="{{ route('user.product.edit',$product->id) }}" class="_njh_edit bg-success text-white">{{__('Edit')}}</a>
                                                        @if ($product->status=='pending')
                                                        <p class="_njh_edit bg-primary text-white">{{__('Pending')}}</p>
                                                        @elseif($product->status=='declined')
                                                        <p class="_njh_edit bg-danger text-white">{{__('Soft Reject')}}</p>

                                                        <a data-item="{{ $product->comment }}" type="button" class="_njh_edit btn-modal2 bg-primary text-white" data-toggle="modal" data-target="#exampleModal2">
                                                            {{ __('View Reason') }}
                                                          </a>
                                                        @endif
                                                        @if($product->status=='completed')
                                                        @if ($product->Resubmission==1 && $product->temp_status=='pending')
                                                        <p class="_njh_edit bg-primary text-white">{{__('Update Pending')}}</p>
                                                        @elseif($product->Resubmission==1 && $product->temp_status=='declined')
                                                        <p class="_njh_edit bg-danger text-white">{{__('Soft Reject')}}</p>
                                                        <a data-item="{{ $product->temp_comment }}" type="button" class="_njh_edit btn-modal bg-primary text-white" data-toggle="modal" data-target="#exampleModal">
                                                            {{ __('View Reason') }}
                                                          </a>
                                                        @endif
                                                        @endif
													</div>

												</div>
											</div>
											<div class="_portf983">

											</div>
										</div>
										@endif
                                    @endforeach
								</div>
							</div>
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
            @if($hp->count()>0)
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">{{ __('Reject Reason') }}</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                    <p id="para">{{ $product->temp_comment }}</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>

                    </div>
                  </div>
                </div>
              </div>

              {{-- Create Product Soft Reject Modal --}}
              <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">{{ __('Reject Reason') }}</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                   <p id="para2">{{ $product->comment }}</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>

                    </div>
                  </div>
                </div>
              </div>
              @endif

@endsection
@section('scripts')
<script>
$(document).on("click", ".btn-modal", function () {
    var itemid= $(this).attr('data-item');
    $("#para").html(itemid)
 });

 $(document).on("click", ".btn-modal2", function () {
    var itemid2= $(this).attr('data-item');
    $("#para2").html(itemid2)
 });

</script>
@endsection
