@extends('layouts.front')

@section('content')

@includeIf('includes.user.common')
			<!-- ========================== Dashboard Elements ============================= -->
            @include('includes.admin.form-both')
			<section class="gray-light">
				<div class="container">
                    @if ($orderitems->count()==0)
                    <div class="p-3 text-center shadow-lg p-5">
                        <h3>{{__("You don,t have any Refund Request")}}</h3>
                    </div>
                    @else
                    <div class="row">

						<div class="col-lg-8 col-md-12 col-sm-12">
							<div class="table-responsive">
								<table class="table table-lg table-hover">
									<thead class="thead-dark">
										<tr>
                                            <th>#{{ __('Order') }}</th>
                                            <th>{{ __('Date') }}</th>
                                            <th>{{ __('Order Total') }}</th>
                                            <th>{{ __('Refund Status') }}</th>
                                            <th>{{ __('View') }}</th>
										</tr>
									</thead>

									<tbody>

                                        @foreach ($orderitems as $item)
                                        <tr>
                                            <td>{{$item->order->order_number}}</td>
                                            <td>{{date('d-M-Y',strtotime($item->created_at))}}</td>
                                            <td>{{$item->total_price}}</td>
                                            @if ($item->refund==0)
                                            <td><span class="bg-primary btn btn-sm" disabled >{{ __('pending') }}</span></td>
                                            @elseif($item->refund==1)
                                            <td><span class="btn bg-success btn-sm" >{{ __('Approved') }}</span></td>
                                            @else
                                            <td><span class="btn bg-danger btn-sm" >{{ __('Declined') }}</span></td>
                                            @endif

                                            <td><a class="btn btn-primary btn-sm" href="{{ route('user.refund.details',$item->id) }}">{{ __('view order') }}</a></td>
                                        </tr>



                                        @endforeach

									</tbody>
								</table>
							</div>
						</div>

						<div class="col-lg-4 col-md-12 col-sm-12">
							<!-- Single Author Info -->
							<div class="urip_widget_wrap shadow_0 large mb-4">
								<div class="urip_widget_avater">
									<a href="author-portfolio.html"><img src="{{  Auth::user()->photo ? asset('assets/images/'.Auth::user()->photo):asset('assets/images/placeholder.jpg') }}" class="img-fluid circle" alt=""></a>
									<div class="veryfied_author"><img src="assets/img/verified.svg" class="img-fluid" width="15" alt=""></div>
								</div>
								<div class="widget_avater_124">
									<h4 class="avater_name_214"><a href="author-portfolio.html">{{ Auth::user()->name }}</a></h4>
									<span>{{ Auth::user()->created_at->format('F jS, Y') }}</span>
								</div>
								<div class="widget_avater_124">
									<ul class="auhor_list_badges">
										<li><img src="assets/img/golden.svg" class="img-avater rounded" width="40" alt=""></li>
										<li><img src="assets/img/1st.svg" class="img-avater rounded" width="40" alt=""></li>
										<li><img src="assets/img/2year.svg" class="img-avater rounded" width="40" alt=""></li>
										<li><img src="assets/img/3year.svg" class="img-avater rounded" width="40" alt=""></li>
										<li><img src="assets/img/platinum.svg" class="img-avater rounded" width="40" alt=""></li>
										<li><img src="assets/img/green-elite.svg" class="img-avater rounded" width="40" alt=""></li>
										<li><img src="assets/img/gold-medal.svg" class="img-avater rounded" width="40" alt=""></li>
										<li><img src="assets/img/smart.svg" class="img-avater rounded" width="40" alt=""></li>
									</ul>
								</div>
								<div class="widget_lkpi">
									<ul class="auhor_info_list_215">
										<li><div class="urip_jbl"><span class="count">{{ DB::table('items')->where('user_id', Auth::user()->id)->sum('sell')}}</span></div><span class="smallest">Sales</span></li>
										<li><div class="urip_jbl urip_rates good">4.7</div><span class="smallest">42Reviews</span></li>
										<li><div class="urip_jbl">152</div><span class="smallest">Comments</span></li>
									</ul>
								</div>
								<div class="widget_avater_423">
									<a href="author-portfolio.html" class="link_portfolio">Hire Now</a>
								</div>
							</div>

							<!-- Contact Author -->
							<div class="urip_widget_wrap shadow_0 mb-4">

								<div class="urip_widget_header bg__2">
									<h4>Contact Author</h4>
									<span>Drop a message to author</span>
								</div>

								<div class="urip_widget_body">
									<div class="wid_bghbody simple_uyt">
										<div class="form-group">
											<label>From</label>
											<input type="text" class="form-control" value="themezhub@gmail.com" disabled>
										</div>
										<div class="form-group">
											<label>Message</label>
											<textarea name="message" class="form-control" class="ht-80" placeholder="Type Message"></textarea>
										</div>
										<div class="form-group">
											<div class="widget_avater_423 p-0">
												<button type="submit" class="link_portfolio">Send Message</button>
											</div>
										</div>
									</div>
								</div>
							</div>

							<!-- Social Profiles -->
							<div class="lit98_jhy">
								<ul class="socil_uyh">
									<li><a href="javascript:void(0);" class="fb"><i class="fa fa-facebook"></i></a></li>
									<li><a href="javascript:void(0);" class="drb"><i class="fa fa-dribbble"></i></a></li>
									<li><a href="javascript:void(0);" class="twt"><i class="fa fa-twitter"></i></a></li>
									<li><a href="javascript:void(0);" class="ins"><i class="fa fa-instagram"></i></a></li>
									<li><a href="javascript:void(0);" class="be"><i class="fa fa-behance"></i></a></li>
									<li><a href="javascript:void(0);" class="pin"><i class="fa fa-pinterest"></i></a></li>
									<li><a href="javascript:void(0);" class="sk"><i class="fa fa-skype"></i></a></li>
									<li><a href="javascript:void(0);" class="gp"><i class="fa fa-google-plus"></i></a></li>
									<li><a href="javascript:void(0);" class="tum"><i class="fa fa-tumblr"></i></a></li>
								</ul>
							</div>
						</div>

					</div>

                    @endif
					</div>
			</section>
			<!-- ========================== Dashboard Elements ============================= -->

			<!-- ============================ Call To Action Start ================================== -->
			@includeIf('partials.theme-newsletter')
			<!-- ============================ Call To Action End ================================== -->

@endsection
