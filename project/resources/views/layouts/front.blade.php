<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>{{$gs->title}}</title>

        <!-- All Plugins Css -->
        <link href="{{ asset('assets/front/css/plugins.css') }}" rel="stylesheet">

		<!-- Favicon -->
		<link rel="shortcut icon" href="{{asset('assets/images/'.$gs->favicon)}}" type="image/x-icon">

		@if ($default_font->font_value)
			<link href="https://fonts.googleapis.com/css?family={{ $default_font->font_value }}&display=swap" rel="stylesheet">
		@else
			<link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
		@endif

		<!-- Bootstrap css -->
		<link href="{{ asset('assets/front/css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

		<script src="https://kit.fontawesome.com/e445375c38.js" crossorigin="anonymous"></script>


        <!-- Custom CSS -->
        <link href="{{ asset('assets/front/css/styles.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/front/css/responsive.css') }}" rel="stylesheet">
         <!--Updated CSS-->
 	     <!--Updated CSS-->
 	    <link rel="stylesheet" href="{{ asset('assets/front/css/rtl/styles.php?color='.str_replace('#','',$gs->colors)) }}">


        <link href="{{ asset('assets/front/css/custom.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('assets/front/css/toastr.min.css')}}">

		@if ($default_font->font_family)
			<link rel="stylesheet" id="colorr" href="{{ asset('assets/front/css/font.php?font_familly='.$default_font->font_family) }}">
		@else
			<link rel="stylesheet" id="colorr" href="{{ asset('assets/front/css/font.php?font_familly='."Open Sans") }}">
		@endif
    </head>

    <body class="blue-skin">
        @if ($gs->is_loader==1)

        <div class="Loader" style="background: url({{asset('assets/images/'.$gs->loader)}}) no-repeat scroll center center #FFF;"></div>

        @endif


        <div id="main-wrapper">
            <div class="container">
            <div class="first-menu">

                    <div class="nav-menus-wrapper">

                        <ul class="nav-menu nav-menu-social align-to-left curr-menu">
                            @if($gs->is_currency == 1)
                            <li class="">
                                <div class="currency-selector">
                                    <span class="contacts">{{DB::table('pagesettings')->first()->contact_email }}</span>
                                </div>
                            </li>
                            @endif

                            <li class="">
                                <div class="language-selector">
                                    <span class="contacts">{{DB::table('pagesettings')->first()->phone }}</span>
                                </div>
                            </li>
                        </ul>


                        <ul class="nav-menu nav-menu-social align-to-right curr-menu ">
                            @if($gs->is_currency == 1)
                            <li class="">
                                <div class="currency-selector">
                        		<span>{{ Session::has('currency') ?   DB::table('currencies')->where('id','=',Session::get('currency'))->first()->sign   : DB::table('currencies')->where('is_default','=',1)->first()->sign }}</span>
                                <select name="currency" class="currency selectors nice">
                                @foreach(DB::table('currencies')->get() as $currency)
                                    <option value="{{route('front.currency',$currency->id)}}" {{ Session::has('currency') ? ( Session::get('currency') == $currency->id ? 'selected' : '' ) : ( $currency->is_default == 1 ? 'selected' : '') }} >{{$currency->name}}</option>
                                @endforeach
                                </select>
                                </div>
                            </li>
                            @endif
                            <li class="">
                                <div class="language-selector">
                        		<span></span>
                                <select name="currency" class="currency selectors nice">
                                @foreach(DB::table('languages')->get() as $language)
                                    <option value="{{route('front.language',$language->id)}}" {{ Session::has('language') ? ( Session::get('language') == $language->id ? 'selected' : '' ) : ( $language->is_default == 1 ? 'selected' : '') }} >{{$language->language}}</option>
                                @endforeach
                                </select>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
<hr>
			<div class="header header-light">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<nav id="navigation" class="navigation navigation-landscape">
								<div class="nav-header">
									<a class="nav-brand" href="{{url('/')}}">
										<img src="{{asset('assets/images/'.$gs->logo)}}" class="logo" alt="" />
									</a>
									<div class="nav-toggle"></div>
								</div>
								<div class="nav-menus-wrapper">
									<ul class="nav-menu pro-menu">
										<li><a href="{{ route('front.index') }}">{{__("Home")}}</a></li>
										<li><a href="{{ route('front.item') }}">{{__("Product")}}</a></li>
										<li><a href="{{ route('front.blog') }}">{{__("Blog")}}</a></li>

										@if(DB::table('pages')->where('status',1)->count() > 0 )

											<li>
												<a href="#">{{ __('Pages') }}<span class="submenu-indicator"></span></a>
												<ul class="nav-dropdown nav-submenu">
													@foreach(DB::table('pages')->orderBy('id','desc')->get() as $data)

													@if ($data->status==1)
													<li><a href="{{ route('front.page',$data->slug) }}">{{ $data->title }}</a></li>

													@endif

													@endforeach
												</ul>
											</li>
                                		@endif

                                         <li><a href="{{ route('front.faq') }}">{{__("FAQ's")}}</a></li>
										 @if ($gs->is_contact == 1)
										 	<li><a href="{{ route('front.contact') }}">{{__('Contacts')}}</a></li>
										 @endif

									</ul>

									<ul class="nav-menu nav-menu-social align-to-right">

                                        <li class="favorite-area">
											@if (!empty($favouriteLength))
												<a href="{{route('user.wishlists')}}" class="urip_list_cart">
													<i class="fa fa-heart"></i><span class="urip_product_count ">{{$favouriteLength}}</span>
												</a>
											@else
												<a href="{{route('user.wishlists')}}" class="urip_list_cart">
													<i class="fa fa-heart"></i><span class="urip_product_count ">0</span>
												</a>
											@endif
										</li>
										<li>
											@if (!empty($cartLength))
												<a href="{{route('front.add.cart')}}" class="urip_list_cart">
													<i class="fa fa-shopping-cart"></i><span class="urip_product_count cart-quantity">{{$cartLength}}</span>
												</a>
											@else
												<a href="{{route('front.add.cart')}}" class="urip_list_cart">
													<i class="fa fa-shopping-cart"></i><span class="urip_product_count cart-quantity">0</span>
												</a>
											@endif
										</li>
                                            @if (auth()->user())
                                            <li class="green-bg dropdown">
                                                <a class="dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="{{ route('user.login') }}" >
                                                   <img style="max-width: 40px" class="img-fluid rounded-circle" src="{{ Auth::user()->photo ? asset('assets/images/'.Auth::user()->photo ):asset('assets/images/noimage.png') }}" alt=""> {{Auth::user()->username}}
                                               </a>
                                               <div class="dropdown-menu text-black" aria-labelledby="dropdownMenuButton">
												@if (auth()->user()->is_author==0)
													<a class="dropdown-item" href="{{ route('user.become.author') }}">{{__('Become an Author')}}</a>
												@endif
                                             	<a class="dropdown-item" href="{{ route('user.dashboard') }}">{{ __('Dashboard') }}</a>
                                                <a id="setting" class="dropdown-item" href="{{ route('user.setting') }}">{{__('Settings')}}</a>
                                                <a id="portfolio" class="dropdown-item" href="{{ route('user.portfolio',str_replace(' ','-',Auth::user()->username)) }}">{{__('Portfolio')}}</a>
                                                <a id="downoad" class="dropdown-item" href="{{ route('user.download') }}">{{__('Downloads')}}</a>
                                                <a id="history" class="dropdown-item" href="{{ route('user.history') }}">{{__('Purchase History')}}</a>
                                                <a id="withdraw" class="dropdown-item" href="{{ route('user.withdraw') }}">{{__('Withdraws')}}</a>
                                                <a id="statement" class="dropdown-item" href="{{ route('user.statements') }}">{{__('Statements')}}</a>
                                                <a class="dropdown-item" href="{{ route('user.logout.submit') }}">{{__('Logout')}}</a>
                                              </div>


                                            </li>
                                            @else
                                            <li class="add-listing green-bg">
                                            <a href="{{ route('user.login') }}" >
                                                <i class="ti-user mr-1"></i> {{__('Login/Register')}}
                                           </a>
                                        </li>
                                            @endif

									</ul>
								</div>
							</nav>
						</div>
					</div>
				</div>
			</div>
			<!-- End Navigation -->
			<div class="clearfix"></div>
			<!-- ============================================================== -->
			<!-- Top header  -->
			<!-- ============================================================== -->


@yield('content')
			<!-- ============================ Call To Action Start ================================== -->

			<!-- ============================ Call To Action End ================================== -->

			<!-- =========================== Footer Start ========================================= -->
			<footer class="dark-footer skin-dark-footer">
				<div>
					<div class="container">
						<div class="row">

							<div class="col-lg-6 col-md-6">
								<div class="footer-widget">
									<img src="{{asset('assets/images/'.$gs->footer_logo)}}" class="img-fluid f-logo" width="120" alt="">
									<p>{{ $gs->footer }}</p>
									<ul class="footer-bottom-social">
									    @if($sc->f_status==1)
										<li><a target="_blank" href="{{$sc->facebook}}"><i class="ti-facebook"></i></a></li>
										@endif
										@if($sc->g_status==1)
										<li><a target="_blank" href="{{$sc->gplus}}"><i class="ti-google"></i></a></li>
										@endif
										@if($sc->t_status==1)
										<li><a target="_blank" href="{{$sc->twitter}}"><i class="ti-twitter"></i></a></li>
										@endif
										@if($sc->l_status)
										<li><a target="_blank" href="{{$sc->linkedin}}"><i class="ti-linkedin"></i></a></li>
										@endif
									</ul>
								</div>
							</div>
							<div class="col-lg-2 col-md-6 ">
								<div class="footer-widget foot">
									<h4 class="widget-title">{{__('Useful links')}}</h4>
									<ul class="footer-menu">
                                        @foreach(DB::table('pages')->orderBy('id','desc')->get() as $data)

                                        @if ($data->status==1)
                                        <li><a href="{{ route('front.page',$data->slug) }}">{{ $data->title }}</a></li>
                                        <li><a href="{{ route('front.blog') }}">{{__('Blog')}}</a></li>
                                        <li><a href="{{ route('front.faq') }}">{{__("FAQ'S")}}</a></li>
                                        <li><a href="{{ route('front.contact') }}">{{__("Contact")}}</a></li>
                                        @endif

                                        @endforeach
                                        <li><a href="{{ route('front.index') }}">{{__("Home")}}</a></li>
										<li><a href="{{ route('front.item') }}">{{__("Product")}}</a></li>
										<li><a href="{{ route('front.blog') }}">{{__("Blog")}}</a></li>


									</ul>
								</div>
							</div>



							<div class="col-lg-4 col-md-6">
								<div class="footer-widget">
									<h4 class="widget-title ">{{__('Recent Post')}}</h4>
									<ul class="footer-menu">
										@foreach (App\Models\Blog::orderBy('created_at', 'desc')->limit(3)->get() as $blog)
											<li>
												<div class="post">
												<div class="post-img">
													<img style="width: 73px; height: 59px;" src="{{  $blog->photo ? asset('assets/images/'.$blog->photo):asset('assets/images/noimage.png') }}" alt="">
												</div>
												<div class="post-details">
													<a href="{{ route('blog.details',$blog->slug) }}">
														<h6 class="post-title text-light">
															{{mb_strlen($blog->title,'utf-8') > 45 ? mb_substr($blog->title,0,45,'utf-8')." .." : $blog->title}}
														</h6>
													</a>
													<p class="date">
														{{ date('M d - Y',(strtotime($blog->created_at))) }}
													</p>
												</div>
												</div>
											</li>
											<hr>
										@endforeach
									</ul>
								</div>
							</div>

						</div>
					</div>
				</div>



				<div class="footer-bottom">
					<div class="container">
						<div class="row align-items-center">

							<div class="col-lg-12 col-md-12 text-center">
								<p>{{$gs->copyright }}</p>
							</div>

						</div>
					</div>
				</div>
			</footer>
			<!-- =========================== Footer End ========================================= -->

            @if($gs->is_cookie == 1)
            <div class="cookie-bar-wrap show">
                <div class="container d-flex justify-content-center">
                    <div class="col-xl-10 col-lg-12">
                        <div class="row justify-content-center">
                            @include('cookieConsent::index')
                        </div>
                    </div>
                </div>
            </div>
        @endif

			<!-- End Modal -->

		</div>
		<!-- ============================================================== -->
		<!-- End Wrapper -->
		<!-- ============================================================== -->

		<!-- ============================================================== -->
		<!-- All Jquery -->
		<!-- ============================================================== -->
		<script src="{{ asset("assets/front/js/jquery.min.js") }}"></script>
		<script src="{{ asset('assets/front/js/popper.min.js') }}"></script>
		<script src="{{ asset("assets/front/js/bootstrap.min.js") }}"></script>
		<script src="{{ asset("assets/front/js/select2.min.js") }}"></script>
		<script src="{{ asset('assets/front/js/owl.carousel.min.js') }}"></script>
		<script src="{{ asset('assets/front/js/ion.rangeSlider.min.js') }}"></script>
        <script src="{{asset('assets/front/js/notify.min.js')}}"></script>
		<script src="{{ asset('assets/front/js/counterup.min.js') }}"></script>
        <script src="{{asset('assets/front/js/toastr.min.js')}}"></script>
        <script src="{{ asset('assets/front/js/api.js') }}"></script>
        <script src="{{ asset('assets/front/js/custom.js') }}"></script>
        <script>
            let mainurl = '{{ url('/') }}';
             var loader = {{ $gs->is_loader }};
             var gs      = {!! json_encode(DB::table('generalsettings')->where('id','=',1)->first(['is_cookie'])) !!};

        </script>
        @php
			echo Toastr::message();
		@endphp
		<!-- ============================================================== -->
		<!-- This page plugins -->
		<!-- ============================================================== -->

		<script>
			function openRightMenu() {
				document.getElementById("rightMenu").style.display = "block";
			}
			function closeRightMenu() {
				document.getElementById("rightMenu").style.display = "none";
			}
		</script>
        <script>
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
		</script>
		@yield('scripts')
        @if (session()->has('alert'))
		<script>
		   $.notify("{{ session('alert') }}", "error");
		</script>
		@endif
		@if (session()->has('success'))
		<script>
		   $.notify("{{ session('success') }}", "success");
		</script>
		@endif
	</body>
</html>
