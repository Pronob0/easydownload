
@extends('layouts.front')

@section('content')

@includeIf('includes.user.common')
			<!-- ========================== Dashboard Elements ============================= -->
            @include('includes.admin.form-both')
			<section class="gray-light">
				<div class="container">
					<div class="row">


<div class="col-lg-8 col-md-12 col-sm-12">
    <div class="user-profile-details">
        <div class="order-history">
            <div class="header-area">

                <h4 class="title">
                    {{ __('Subject:') }} {{$conv->subject}} <a  class="ticket-btn btn-rounded" href="{{ url()->previous() }}"> <i class="fas fa-arrow-left"></i> {{ __('Back') }}</a>
                </h4>
            </div>


<div class="support-ticket-wrapper ">
<div class="panel panel-primary">
      <div class="gocover" style="background: url({{ asset('assets/images/'.$gs->loader) }}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
    <div class="panel-body" id="messages">
      @foreach($conv->messages as $message)
        @if($message->user_id != 0)
        <div class="single-reply-area user">
            <div class="row">
                <div class="col-lg-12">
                    <div class="reply-area">
                        <div class="left">
                            <p>{{$message->message}}</p>
                        </div>
                        <div class="right">
                            @if($message->conversation->user->is_provider == 1)
                            <img class="img-circle" src="{{$message->conversation->user->photo != null ? $message->conversation->user->photo : asset('assets/images/noimage.png')}}" alt="">
                            @else

                            <img class="img-circle" src="{{$message->conversation->user->photo != null ? asset('assets/images/'.$message->conversation->user->photo) : asset('assets/images/noimage.png')}}" alt="">

                            @endif
                            <p class="ticket-date">{{$message->conversation->user->name}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        @else
        <div class="single-reply-area admin">
            <div class="row">
                <div class="col-lg-12">
                    <div class="reply-area">
                        <div class="left">
                            <img class="img-circle" src="{{ $admin->photo ? asset('assets/images/'.$admin->photo ):asset('assets/images/noimage.png') }}" alt="">
                            <p class="ticket-date"> {{ __('Admin ') }}</p>
                        </div>
                        <div class="right">
                            <p>{{$message->message}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        @endif
        @endforeach

    </div>
    <div class="panel-footer">
        <form id="messageform" data-href="{{ route('user.message.load',$conv->id) }}" action="{{route('user.message.store')}}" method="POST">
            {{csrf_field()}}
            <div class="form-group">
                <input type="hidden" name="conversation_id" value="{{$conv->id}}">
                <input type="hidden" name="user_id" value="{{$conv->user->id}}">
                <textarea class="form-control" name="message" id="wrong-invoice" rows="5" style="resize: vertical;" required="" placeholder="{{ ('Message') }}"></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-update">
                    {{ ('ADD REPLY') }}
                </button>
            </div>
        </form>
    </div>
</div>


        </div>
    </div>
</div>
</div>
<div class="col-lg-4 col-md-12 col-sm-12">
    <!-- Single Author Info -->
    @include('includes.user.common-sidebar')

    <!-- Contact Author -->
    <div class="urip_widget_wrap shadow_0 mb-4">

        <div class="urip_widget_header bg__2">
    <h4>{{ __('Contact Author') }}</h4>
            <span>{{ __('Drop a message to author') }}</span>
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
				</div>
			</section>
			<!-- ========================== Dashboard Elements ============================= -->

			<!-- ============================ Call To Action Start ================================== -->
			@includeIf('partials.theme-newsletter')
			<!-- ============================ Call To Action End ================================== -->

@endsection
@section('scripts')

<script src="{{ asset("assets/user/js/custom.js") }}"></script>




@endsection
