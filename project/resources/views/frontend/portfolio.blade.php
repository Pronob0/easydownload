
@extends('layouts.front')

@section('content')
@includeIf('includes.frontend.common')

			<!-- ========================== Dashboard Elements ============================= -->
			<section class="gray-light">
				<div class="container">
					<div class="row">

						<div class="col-lg-8 col-md-12 col-sm-12">
							<div class="_the_capt5t">
								<div class="all_portfwrap">
									<!-- Single Item -->
                                    @foreach ($items as $product)
										@if ($product->status=='completed')
                                        <div class="all_portf987">
                                            <div class="_portf982">
                                                <div class="_portf900">
                                                    <a href="{{ route('item.details',$product->slug) }}"><img src="{{  $product->thumbnail_imagename ? asset('assets/images/'.$product->thumbnail_imagename):asset('assets/images/noimage.png') }}" class="user-product-image" alt=""></a>
                                                </div>
                                                <div class="_portf910">
                                                    <h4 class="_ijy_title"><a href="{{ route('item.details',$product->slug) }}">{{ $product->name }} ({{ $product->showPrice() }} )</a></h4>
                                                    <span class="_sal098">{{ $product->sell }}   {{__('Sales')}}</span>
                                                    @if (Auth::user())


                                                    @if ($product->user->id==Auth::user()->id)

                                                    <div class="_alio98_buttons d-flex flex-wrap">
                                                        <form action="{{ route('user.file') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="file" value="{{ $product->slug }}">
                                                            <button type="submit"  class="_njh_download">{{__('Download')}}</button>
                                                        </form>

                                                        <a href="{{ route('user.product.edit',$product->id) }}" class="_njh_edit mr-2">{{__('Edit')}}</a>
                                                      @if ($product->is_feature==1)
                                                      <a disabled class="_njh_download">{{__('Featured')}}</a>


                                                      @else
                                                      <a href="{{ route('user.feature.edit',$product->id) }}" class="_njh_download">{{__('Feature')}}</a>

                                                      @endif
                                                      <a href="{{ route('user.product.delete',$product->id) }}" class="_njh_delete mr-2">{{__('Delete')}}</a>

                                                    </div>



                                                    @else


                                                    @endif
                                                    @else
                                                    <div class="_portf983">
                                                        <div class="item_list_links">
                                                            <a href="{{$product->demo_link}}" class="link link_prview">{{__('Preview')}}</a>
                                                            <a href="{{ route('item.details',$product->slug) }}" class="link link_cart"><i class="fa fa-shopping-cart mr-2"></i> {{ __('Purchase') }}</a>


                                                            <a href="{{ route('user.wishlist.add',$product->slug) }}" class="link link_save add-to-wish"><i class="fa fa-heart"></i></a>



                                                        </div>
                                                    </div>
                                                    @endif




                                                <div class="_j56ty1q mt-3">
                                                    <div class="_iju7_reviw">
                                                        @php
                                                        $avg=$product->ratings->avg('rating');
                                                        @endphp
                                                        @for ($i = 0; $i < 5; $i++)
                                                            @if (floor($avg - $i) >= 1)
                                                                {{--Full Start--}}
                                                                <i class="fa fa-star filled"></i>
                                                            @elseif ($avg - $i > 0)
                                                                {{--Half Start--}}
                                                                <i class="fa fa-star-half-alt filled"> </i>
                                                            @else
                                                                {{--Empty Start--}}
                                                                <i class="fa fa-star"> </i>
                                                            @endif
                                                        @endfor
                                                        <span>({{ $product->ratings->count() }})</span>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>

                                        </div>
										@endif
                                    @endforeach

									@if ($items->count()==0)
										<div class="p-3 text-center shadow-lg p-5">
											<h3>{{__("You Don't Have any Product yet!")}} </h3>
										</div>
									@endif
								</div>
							</div>
						</div>

					<div class="col-lg-4 col-md-12 col-sm-12">

                            @if (Auth::user())
                            @if ($data->id==Auth::user()->id)


                            @include('includes.user.common-sidebar')
                            @endif
                            <!-- Single Author Info -->
                            @else


							<div class="urip_widget_wrap shadow_0 large mb-4">
								<div class="urip_widget_avater">
									<a href="{{ route('author.portfolio',str_replace(' ','-',$data->username)) }}"><img src="{{  $data->photo ? asset('assets/images/'.$data->photo):asset('assets/images/placeholder.jpg') }}" class="img-fluid circle" alt=""></a>
									<div class="veryfied_author"><img src="assets/img/verified.svg" class="img-fluid" width="15" alt=""></div>
								</div>
								<div class="widget_avater_124">
									<h4 class="avater_name_214"><a href="{{ route('author.portfolio',str_replace(' ','-',$data->username)) }}">{{ $data->username }}</a></h4>
									<span>{{ $data->created_at->format('F jS, Y') }}</span>
								</div>
								<div class="widget_avater_124">
                            <ul class="auhor_list_badges">
                                @foreach ($badges as $badge)
                                @php
                                $date = Carbon\Carbon::parse($data->email_verified_at);
                                $now = Carbon\Carbon::now();
                                    $time=($badge->time*365)+$badge->days;
                                @endphp
                                @if ($date->diffInDays($now)>=$time)
                                <li><img src="{{$badge->icon ? asset('assets/images/'.$badge->icon): ''}}" class="img-avater rounded" width="40" alt=""></li>
                                @endif
                                @endforeach
                            </ul>
                        </div>

								<div class="widget_lkpi">
									<ul class="auhor_info_list_215">
										<li><div class="urip_jbl"><span class="count">{{ DB::table('items')->where('user_id', $data->id)->sum('sell')}}</span></div><span class="smallest">Sales</span></li>
                                        @if (App\Models\Item::where('user_id',$data->id)->count()>0)
                                        @foreach (App\Models\Item::where('user_id',$data->id)->get() as $item)
                                        @php
                                        $avg=$item->ratings->avg('rating');
                                        @endphp

                                        @endforeach
                                        <li><div class="urip_jbl urip_rates good">{{ $avg!=0 ? $avg : 0  }}</div><span class="smallest">({{ $item->ratings->count() }}){{ __('Reviews') }}</span></li>
                                        <li><div class="urip_jbl">{{ $item->comments->count() }}</div><span class="smallest">{{ __('Comments') }}</span></li>
                                        @else
                                        <li><div class="urip_jbl urip_rates good">{{ 0  }}</div><span class="smallest">({{ 0 }}){{ __('Reviews') }}</span></li>
                                        <li><div class="urip_jbl">{{ 0 }}</div><span class="smallest">{{ __('Comments') }}</span></li>
                                        @endif


									</ul>
								</div>
								<div class="widget_avater_423">
									<a href="author-portfolio.html" class="link_portfolio">{{ __('Hire Now') }}</a>
								</div>
							</div>

							<!-- Contact Author -->
							<div class="urip_widget_wrap shadow_0 mb-4">

								<div class="urip_widget_header bg__2">
									<h4>{{ __('Contact Author') }}</h4>
									<span>{{ __('Drop a message to author') }}</span>
								</div>

								<div class="urip_widget_body">
									<div class="wid_bghbody simple_uyt">
										<div class="form-group">
											<label>{{ __('From') }}</label>
											<input type="text" class="form-control" value="themezhub@gmail.com" disabled>
										</div>
										<div class="form-group">
											<label>{{ __('Message') }}</label>
											<textarea name="message" class="form-control" class="ht-80" placeholder="Type Message"></textarea>
										</div>
										<div class="form-group">
											<div class="widget_avater_423 p-0">
												<button type="submit" class="link_portfolio">{{ __('Send Message') }}</button>
											</div>
										</div>
									</div>
								</div>
							</div>

							<!-- Social Profiles -->

							<div class="lit98_jhy">
                                <ul class="socil_uyh">
                                    @if ($data->f_url)
                                    <li><a href="{{ $data->f_url }}" class="fb"><i class="fa fa-facebook"></i></a></li>
                                    @endif
                                    @if ($data->t_url)
                                    <li><a href="{{$data->t_url}}" class="twt"><i class="fa fa-twitter"></i></a></li>
                                    @endif
                                    @if ($data->l_url)
                                    <li><a href="{{ $data->l_url }}" class="pin"><i class="fa fa-linkedin"></i></a></li>
                                    @endif
                                    @if ($data->g_url)
                                    <li><a href="{{$data->g_url }}" class="gp"><i class="fa fa-google-plus"></i></a></li>
                                    @endif




                                </ul>
                            </div>




							</div>

                            @endif
                        </div>
				</div>
			</section>
			<!-- ========================== Dashboard Elements ============================= -->
            <div class="modal fade confirm-modal2" id="statusModal" tabindex="-1" role="dialog"
            aria-labelledby="statusModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">{{ __("Update Status") }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <p class="text-center">{{ __("You are about to change the status.") }}</p>
                    <p class="text-center">{{ __("Do you want to proceed?") }}</p>
                </div>
                <div class="modal-footer">
                <a href="javascript:;" class="btn btn-secondary" data-dismiss="modal">{{ __("Cancel") }}</a>
                <a href="javascript:;" class="btn btn-success btn-ok2">{{ __("Update") }}</a>
                </div>
            </div>
            </div>
        </div>

			<!-- ============================ Call To Action Start ================================== -->
			@includeIf('partials.theme-newsletter')
			<!-- ============================ Call To Action End ================================== -->

@endsection
