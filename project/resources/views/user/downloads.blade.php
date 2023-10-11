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
									@if (count($orders) == 0)
										<div class="p-3 text-center">
											<h3>{{__("You haven't bought anything yet.")}}</h3>
											<p>{{__('Discover the')}} <a href="{{route('front.item')}}" class="text-primary">{{__('items')}}</a> {{__('available.')}}</p>
										</div>
									@else
										@foreach ($orders as $key=>$order)
											@foreach ($order->ordered_items as $key=>$ordered_item)
                                            @php
                                                $item = json_decode($ordered_item->item_info,true);
                                            @endphp
                                            @if ($ordered_item->refund==0)
                                            <div class="all_portf987">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="_portf982">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="_portf900">
                                                                        <a href="{{route('item.details',$item['slug'])}}"><img src="{{asset('assets/images/'.$item['thumbnail_imagename'])}}" class="img-fluid w-50" alt=""></a>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="_portf910">
                                                                        <h4 class="_ijy_title"><a href="{{route('item.details',$item['slug'])}}">{{$item['name']}}</a></h4>
                                                                        <div class="_elio812">
                                                                            <div class="_sal098">{{strtoupper($ordered_item->license)}} {{__('License')}}</div>
                                                                            @php
                                                                                $date = Carbon\Carbon::parse($ordered_item->created_at);
                                                                                $now = Carbon\Carbon::parse($ordered_item->support_valid_till);

                                                                            $diff = $date->diffInDays($now);
                                                                            @endphp
                                                                            <div class="_sal098">{{ $diff }} {{ __('days remaining of support') }}</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="_portf983">
                                                            <div class="_elioto_8j7">
                                                                <div class="_elio31_8j7">
                                                                    <form action="{{ route('user.file') }}" method="POST">
                                                                        @csrf
                                                                        <input type="hidden" name="file" value="{{ $item['slug'] }}">
                                                                        <button type="submit"  class="_njh_download">{{__('Download')}}</button>
                                                                    </form>

                                                                </div>
                                                                <div class="_elio31_8j7">
                                                                    <button type="button" class="_njh_download review_click"  data-toggle="modal" data-id="{{ $item['id'] }}" data-target="#exampleModal">
                                                                        {{ __('Review') }}
                                                                      </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif


											@endforeach
										@endforeach
									@endif

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
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Review</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

                        <div class="review-area">
                           <h4 class="title">{{ __('Review') }}</h4>
                           <div class="star-area">
                              <ul class="star-list">
                                 <li class="stars" data-val="1">
                                    <i class="fas fa-star"></i>
                                 </li>
                                 <li class="stars" data-val="2">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                 </li>
                                 <li class="stars" data-val="3">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                 </li>
                                 <li class="stars" data-val="4">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                 </li>
                                 <li class="stars active" data-val="5">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                 </li>
                              </ul>
                           </div>
                        </div>
                        <br>
                        @if ($orders->count()>0)


                       <div class="write-comment-area">
                           <div class="gocover"
                              style="background: url({{ asset('assets/images/'.$gs->loader) }}) no-repeat scroll center center rgba(45, 45, 45, 0.5);">
                           </div>
                           <form id="reviewform" action="{{route('front.review.submit')}}" method="POST">
                              @include('includes.admin.form-both')
                              {{ csrf_field() }}
                              <input type="hidden" id="rating" name="rating" value="5">
                              <input type="hidden" name="user_id" value="{{Auth::guard('web')->user()->id}}">
                              <input type="hidden" id="itemvalue" name="item_id" value="">
                              <div class="row">
                                 <div class="col-lg-12">
                                    <textarea class="form-control" name="review" required rows="7" placeholder="{{ __('Your Review') }}"></textarea>

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
                        </div>
                        @endif

                    </div>

                  </div>
                </div>
              </div>

			<!-- ============================ Call To Action Start ================================== -->
			@includeIf('partials.theme-newsletter')
			<!-- ============================ Call To Action End ================================== -->

@endsection
@section('scripts')
<script>
   $(document).ready(function() {
    $(document).on('click',".review_click",function () {
       var my_id_value = $(this).attr('data-id');
       $("#itemvalue").val(my_id_value);
    });
    });


</script>

@endsection
