@extends('layouts.front')

@section('content')

	<!-- ============================ Item Detail Start ================================== -->
    <section class="gray-light">
        <div class="container">
             <div class="_uy76_title">
                        <h1>{{ $item->name }}</h1>
                        <nav aria-label="breadcrumb">
                          <ol class="breadcrumb light">
                            <li class="breadcrumb-item"><a href="javascript:void(0)"><i class="fa fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0)">{{__('Files')}}</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0)">{{ $item->category->name }}</a></li>
                          </ol>
                        </nav>
                    </div>
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="_uy76_gallery light">
                        <img src="{{ $item->preview_imagename ? asset('assets/images/'.$item->preview_imagename):asset('assets/images/noimage.png') }}" class="img-fluid mx-auto" alt="">
                    </div>

                    <div class="_uy76_buttons">
                        <div class="urip_follo_link">
                            <ul>
                                <li><a href="{{$item->demo_link}}" class="liks light-dark">{{__('Live Demo')}}</a></li>
                                <li><a type="button" data-toggle="modal" data-target="#example"  class="liks gree_button">{{__('Screenshots')}}</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="_uy76_noted">
                        <blockquote class="noted">
                            <div class="prouct-details-tab-menu details-tab">
								<ul class="nav" role="tablist">
									<li class="nav-item">
										<a class="nav-link active link_details" id="pills-productdetails-tab" data-toggle="pill" href="#pills-productdetails" role="tab" aria-controls="pills-productdetails" aria-selected="false">{{__('Description')}}</a>
									</li>
									<li class="nav-item ">
										<a class="nav-link link_details" id="pills-review-tab" data-toggle="pill" href="#pills-review" role="tab" aria-controls="pills-review" aria-selected="false">{{__('Review')}}</a>
									</li>
									<li class="nav-item ">
										<a class="nav-link link_details" id="pills-comment-tab" data-toggle="pill" href="#pills-comment" role="tab" aria-controls="pills-comment" aria-selected="false">{{__('Comment')}}</a>
									</li>

								</ul>
							</div>
                        </blockquote>
                    </div>
                    <div class="tab-content" id="pills-tabContent">

                        <div class="tab-pane fade show active" id="pills-productdetails" role="tabpanel" aria-labelledby="pills-productdetails-tab">
                            <div class="_uy76_caption">
                                <div class="g6">
                                    {{ $item->description }}
                                </div>

                                <div class="g6">
                                    <h2 id="item-description__features-list">{{ __('Features list') }}</h2>
                                    <ul>
                                        @foreach (explode(',,,',$item->outcome) as $feature)
                                            <li>{{ $feature }}</li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="my-4 social-linkss social-sharing a2a_kit a2a_kit_size_32">
                                    <h2 id="item-description__features-list">{{ __('Share Now') }}</h2>
                                    <ul class="social-iconss  share-product social-links d-flex">
                                        <li>
                                        <a class="facebook a2a_button_facebook" href="">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                        </li>
                                        <li>
                                        <a class="twitter a2a_button_twitter" href="">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                        </li>
                                        <li>
                                        <a class="linkedin a2a_button_linkedin" href="">
                                            <i class="fab fa-linkedin-in"></i>
                                        </a>
                                        </li>
                                        <li>
                                        <a class="pinterest a2a_button_pinterest" href="">
                                            <i class="fab fa-pinterest-p"></i>
                                        </a>
                                        </li>
                                        <li>
                                            <a class="instagram a2a_button_whatsapp" href="">
                                            <i class="fab fa-whatsapp"></i>
                                            </a>
                                        </li>
                                        <li> <a class="a2a_dd plus" href="https://www.addtoany.com/share">
                                            <i class="fas fa-plus"></i>
                                            </a></li>
                                    </ul>
                                </div>
                                <script async src="https://static.addtoany.com/menu/page.js"></script>
                            </div>
                        </div>
                        {{-- Review Section Start --}}
                        <div class="tab-pane fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
                            <div class="heading-area">
                                <h4 class="title">
                                   {{ __('Ratings & Reviews') }}
                                </h4>
                                <div class="reating-area">
                                   <div class="stars"><span id="star-rating">{{App\Models\Rating::rating($item->id)}}</span> <i
                                      class="fas fa-star"></i></div>
                                </div>
                             </div>
                             <div id="replay-area">
                                <div id="reviews-section">
                                   @if(count($item->ratings) > 0)
                                   <ul class="all-replay">
                                      @foreach($item->ratings as $review)
                                      <li>
                                         <div class="single-review">
                                            <div class="left-area">
                                               <img

                                                  src="{{ $review->user->photo ? asset('assets/images/'.$review->user->photo):asset('assets/images/placeholder.jpg') }}"
                                                  alt="">
                                               <h5 class="name">{{ $review->user->username }}</h5>
                                               @if ($review->created_at)
                                               <p class="date">
                                                {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$review->created_at)->diffForHumans() }}
                                             </p>
                                               @endif

                                            </div>
                                            <div class="right-area">
                                               <div class="header-area">
                                                  <div class="stars-area">
                                                     <ul class="stars">
                                                        <div class="ratings">
                                                           <div class="empty-stars"></div>
                                                           <div class="full-stars" style="width:{{$review->rating*20}}%"></div>
                                                        </div>
                                                     </ul>
                                                  </div>
                                               </div>
                                               <div class="review-body">
                                                  <p>
                                                     {{$review->review}}
                                                  </p>
                                                  <div class="star-area">
                                                    <ul class="star-list">

                                                       <li class="stars active" data-val="5">

                                                      @for($i=0;$i<$review->rating;$i++)
                                                        <i class="fas fa-star"></i>

                                                  @endfor
                                                  </li>
                                                </ul>
                                             </div>
                                               </div>
                                            </div>
                                         </div>
                                         @endforeach
                                      </li>
                                   </ul>
                                   @else
                                   <p>{{ __('No Review Found.') }}</p>
                                   @endif
                                </div>

                             </div>
                        </div>
                        {{-- Review Section End --}}

                        {{-- Comment Section Start --}}
                        <div class="tab-pane fade" id="pills-comment" role="tabpanel" aria-labelledby="pills-comment-tab">
                            <div id="comment-area">
                                @include('includes.comment-replies')
                            </div>
                        </div>
                        {{-- Comment Section End --}}

                    </div>


                </div>

                <!-- Sidebar Start -->
                <div class="col-lg-4 col-md-12 col-sm-12">
                    @if ($item->access_status==0)
                    <div class="urip_widget_wrap shadow_0 mb-4">
                        <div class="urip_widget_header bg__2">
                            <h4>{{__('Select License')}}</h4>
                            <span>{{__('Choose Suitable License')}}</span>
                        </div>

                        <div class="urip_widget_body">
                            <div class="urip_single_license">
                                <div class="urip_license_lko">
                                    <div class="urip_license_123">
                                        <ul class="no-ul-list filter-list">
                                            <li>
                                                <input name="license" data-type="regular" id="single-licence" value="{{$item->showPrice() }}" type="radio" checked="">
                                                <label for="single-licence" class="radio-custom-label"></label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="urip_license_124">
                                        <h5 class="urip_license_title">{{__('Regular License')}}</h5>
                                        <div class="urip_desc">{{__('Use or by you or onle client in a single we end.')}}</div>
                                    </div>
                                </div>
                                <div class="urip_license_next">
                                    <span class="urip_purchase_price">{{$item->showPrice() }}</span>
                                </div>
                            </div>

                            <!-- Regular License -->
                            <div class="urip_single_license">
                                <div class="urip_license_lko">
                                    <div class="urip_license_123">
                                        <ul class="no-ul-list filter-list">
                                            <li>
                                                <input type="radio" class="radio-custom" name="license" data-type="extended" id="multi-licence" value="{{$item->showExtendedPrice() }}">
                                                <label for="multi-licence" class="radio-custom-label"></label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="urip_license_124">
                                        <h5 class="urip_license_title">{{__('Extended License')}}</h5>
                                        <div class="urip_desc">{{__('Use or by you or onle client in a single we end.')}}</div>
                                    </div>
                                </div>
                                <div class="urip_license_next">
                                    <span class="urip_purchase_price">{{$item->showExtendedPrice() }}</span>
                                </div>
                            </div>


                            <div class="_purchagser_buttons">

                                @if (Auth::check())
                                    @if (Auth::user()->id != $item->user_id)
                                        <a href="#" class="_yt5r_buy promo-popup"  data-toggle="modal" data-target="#exampleModalCenter" data-itemid="{{$item->id}}">
                                            {{__('Add to Cart')}}
                                        </a>
                                    @endif
                                @else
                                    <a href="#" class="_yt5r_buy promo-popup"  data-toggle="modal" data-target="#exampleModalCenter" data-itemid="{{$item->id}}">
                                        {{__('Add to Cart')}}
                                    </a>
                                @endif

                            </div>
                        </div>
                    </div>
                    @else

                    <div class="urip_widget_wrap shadow_0 mb-4">
                        <div class="urip_widget_header bg__2">
                            <h4>{{__('Free Download')}}</h4>
                            <span>{{__('No License Available')}}</span>
                        </div>
                        <div class="urip_widget_body">
                            <div class="urip_single_license">
                                <div class="urip_license_lko">
                                    <div class="urip_license_123">
                            <p>{{ ('You can download and use this product without any cost. You dont have to pay. ') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="_purchagser_buttons">
                            <form action="{{ route('user.file') }}" method="POST">
                                @csrf
                                <input type="hidden" name="file" value="{{ $item->slug }}">
                                <button type="submit"  class="_yt5r_buy">{{__('Download')}}</button>
                            </form>
                            </div>
                        </div>

                    </div>



                    @endif

                    <!-- Sell Info -->

                @if ($levels->count()>0)
                    @foreach ($levels as $level)
                    @if ($level->amount>=$item->user->total_sell )
                        @php
                         $name=$level->name;
                         $logo=$level->icon
                        @endphp
                    @else
                     @php
                         $name=$max->name;
                         $logo=$max->icon;
                    @endphp
                       @endif
                       @endforeach



                   <div class="urip_widget_wrap shadow_0 mb-4 large">
                        <div class="widget_avater_124 d-flex">
                            <img src="{{$logo ? asset('assets/images/'.$logo):''}}" class="img-avater rounded ml-3" width="50" alt="">
                            <h5 class="mt-2 ml-4">{{$name }} {{ __('Author') }}</h5>
                        </div>
                    </div>
                @endif



                    <!-- Author Info -->
                    <div class="urip_widget_wrap shadow_0 mb-4 large">
                        @if ($item->user_id==0)
                            <div class="urip_widget_avater">
                                <a href="{{ route('author.portfolio','admin') }}"><img src="{{  $admin->photo ? asset('assets/images/'.$admin->photo):asset('assets/images/placeholder.jpg') }}" class="img-fluid circle" alt=""></a>
                            </div>
                            <div class="widget_avater_124">
                                <h4 class="avater_name_214"><a href="{{ route('author.portfolio','admin') }}">{{ $admin->name }}</a></h4>
                            </div>
                        @else
                            <div class="urip_widget_avater">
                                <a href="{{ route('author.portfolio',str_replace(' ','-',$item->user->username)) }}"><img src="{{  $item->user->photo ? asset('assets/images/'.$item->user->photo):asset('assets/images/placeholder.jpg') }}" class="img-fluid circle" alt=""></a>
                            </div>
                            <div class="widget_avater_124">
                                <h4 class="avater_name_214"><a href="{{ route('author.portfolio',str_replace(' ','-',$item->user->username)) }}">{{ $item->user->username }}</a></h4>
                                <span>{{__('Member since')}} {{ $item->user->created_at->format('F jS, Y') }}</span>
                            </div>
                        @endif
                        <div class="widget_avater_124">
                            <ul class="auhor_list_badges">
                                @foreach ($badges as $badge)
                                @php
                                $date = Carbon\Carbon::parse($item->user->created_at);
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
                        </div>
                        <div class="widget_avater_423">

                            <a href="{{ route('author.portfolio',str_replace(' ','-',$item->user->username)) }}" class="link_portfolio">{{__('View Portfolio')}}</a>
                            <br>
                            @if (Auth::user())
                            @if ($item->user->id==Auth::user()->id)

                            @else
                            @if ($follow==null)

                            <a href="{{ route('front.followerCreate',$item->user->id) }}" class="link_portfolio">{{__('Follow')}}</a>
                            @else
                            @if ($follow)
                            <a  class="link_portfolio">{{__('Followed')}}</a>
                            @else
                            <a href="{{ route('front.followerCreate',$item->user->id) }}" class="link_portfolio">{{__('Follow')}}</a>
                            @endif

                            @endif

                            @endif

                            @endif



                        </div>
                    </div>

                    <!-- Product Information -->
                    <div class="urip_widget_wrap shadow_0 mb-4">

                        <div class="urip_widget_header bg__2">
                            <h4>{{__('Product Information')}}</h4>
                        </div>

                        <div class="urip_widget_body">
                            <div class="dp_detail_infobox">

                                <div class="dp_single_list">
                                    <div class="dp_single_list_title">
                                        {{__('Created')}}:
                                    </div>
                                    <div class="dp_single_list_info">
                                        {{ $item->created_at->format('F jS, Y') }}
                                    </div>
                                </div>

                                <div class="dp_single_list">
                                    <div class="dp_single_list_title">
                                        {{__('Last update')}}:
                                    </div>
                                    <div class="dp_single_list_info">
                                        {{ $item->updated_at->format('F jS, Y') }}
                                    </div>
                                </div>


                                @foreach ($attributes as $key=>$value)
                                    <div class="dp_single_list">
                                        <div class="dp_single_list_title">
                                            {{ str_replace('_'," ",$key) }}:
                                        </div>
                                        <div class="dp_single_list_info">

                                             @foreach ($value as $cval)

                                                <a href="javascript:void(0);">{{ $cval }}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach

                                <div class="dp_single_list">
                                    <div class="dp_single_list_title">
                                        {{__('Category Name')}}:
                                    </div>
                                    <div class="dp_single_list_info">
                                        <a href="{{route('front.item',['category'=>$item->category->slug])}}">{{ $item->category->name }}</a>

                                    </div>
                                </div>
                                <div class="dp_single_list">
                                    <div class="dp_single_list_title">
                                        {{__('Tag Name')}}:
                                    </div>
                                    <div class="dp_single_list_info">
                                        @foreach($tags as $tag)
                                        @if(!empty($tag))
                                                <a href="{{route('front.item').'?tags='.$tag}}">{{ $tag }} </a>
                                        @endif
                                    @endforeach

                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                </div>


                <!-- Modal -->
                <div class="modal fade view-cart" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div id="cartPopup" class="modal-body">

                            </div>
                            <div class="modal-footer d-flex justify-content-between">
                                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">{{__('Cancel')}}</button>
                                <a href="{{route('front.checkout.index')}}" class="btn btn-sm btn-primary">{{__('Go to Checkout')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- screenshot Modal --}}
                <!-- Modal -->
<div class="modal fade" id="example" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">{{ __('Screenshot') }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            @if ($screenshots->count()>0)
             @foreach($screenshots as $screensort)
                    <img src="{{ $screensort->photo ? asset('assets/images/screenshot/'.$screensort->photo):asset('assets/images/noimage.png') }}" class="img-fluid mx-auto" alt="">
                @endforeach
            @else
            <div class="p-3 text-center shadow-lg p-5">
                <h3>{{__("No Screenshot found")}}</h3>
            </div>
            @endif

        </div>

      </div>
    </div>
  </div>

            </div>
        </div>
    </section>
    <!-- ============================ Item Detail Start ================================== -->

@endsection

@section('scripts')
<script>
    "use strict";
	$(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
		var license = 'regular';

		$("input[name='license']").on('change', function() {
			license = $(this).data('type');

			$(".hading-area .price").text("$ " + $(this).val());
		});

		$(".promo-popup").on('click', function() {


            $("#details").show();
    		$("#changeDetails").hide();

            let itemid = $(this).data('itemid');

            let fd = new FormData();
            fd.append('item_id', itemid);
            fd.append('license', license);

            $.ajax({
                url: "{{route('front.addToCart')}}",
                type: 'POST',
                data: fd,
                contentType: false,
                processData: false,
                success: function(data) {

					$(".cart-quantity").html(data.cartLength);

                    let cartItemId = data.cartItem.id;

                    $("#cartPopup").load("{{url('/')}}/load/"+itemid+"/"+cartItemId+"/cartpopup", function(data) {

                    });

                }
            });
        });
	});
</script>
@endsection
