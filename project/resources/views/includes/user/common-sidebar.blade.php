<div class="urip_widget_wrap shadow_0 large mb-4">
    <div class="urip_widget_avater">
        <a href="{{ route('user.portfolio',str_replace(' ','-',Auth::user()->username)) }}"><img src="{{  Auth::user()->photo ? asset('assets/images/'.Auth::user()->photo):asset('assets/images/placeholder.jpg') }}" class="img-fluid circle" alt=""></a>
        <div class="veryfied_author"><img src="assets/img/verified.svg" class="img-fluid" width="15" alt=""></div>
    </div>
    <div class="widget_avater_124">
        <h4 class="avater_name_214"><a href="{{ route('user.portfolio',str_replace(' ','-',Auth::user()->username)) }}">{{ Auth::user()->username }}</a></h4>
        <span>{{ Auth::user()->created_at->format('F jS, Y') }}</span>
    </div>
    <div class="widget_avater_124">
        <ul class="auhor_list_badges">
            @foreach ($badges as $badge)
            @php
            $date = Carbon\Carbon::parse(Auth::user()->email_verified_at);
            $now = Carbon\Carbon::now();
                $time=($badge->time*365)+$badge->days;
            @endphp
            @if ($date->diffInDays($now)>=$time)
            <li><img title="{{ $badge->name }}" src="{{$badge->icon ? asset('assets/images/'.$badge->icon): ''}}" class="img-avater rounded" width="40" alt=""></li>
            @endif
            @endforeach
        </ul>
    </div>
    <div class="widget_lkpi">
        <ul class="auhor_info_list_215">
            <li><div class="urip_jbl"><span class="count">{{ DB::table('items')->where('user_id', Auth::user()->id)->sum('sell')}}</span></div><span class="smallest">Sales</span></li>
            @if (App\Models\Item::where('user_id',Auth::user()->id)->count()>0)
            @foreach (App\Models\Item::where('user_id',Auth::user()->id)->get() as $item)
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

</div>

<!-- Social Profiles -->
@if(!Auth::user()->f_url && !Auth::user()->t_url && !Auth::user()->l_url && !Auth::user()->g_url)
@else
<div class="lit98_jhy">
    <ul class="socil_uyh">
        @if (Auth::user()->f_url)
        <li><a href="{{ Auth::user()->f_url }}" class="fb"><i class="fa fa-facebook"></i></a></li>
        @endif
        @if (Auth::user()->t_url)
        <li><a href="{{Auth::user()->t_url}}" class="twt"><i class="fa fa-twitter"></i></a></li>
        @endif
        @if (Auth::user()->l_url)
        <li><a href="{{ Auth::user()->l_url }}" class="pin"><i class="fa fa-linkedin"></i></a></li>
        @endif
        @if (Auth::user()->g_url)
        <li><a href="{{ Auth::user()->g_url }}" class="gp"><i class="fa fa-google-plus"></i></a></li>
        @endif




    </ul>
</div>

@endif

