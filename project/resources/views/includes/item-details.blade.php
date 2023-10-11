
<div class="item-details d-flex justify-content-between p-3">
    <div class="thumb"><img src="{{asset("assets/images/".$item->thumbnail_imagename)}}" alt="" class="img-fluid w-100"></div>
    <div class="content ml-2">
        <h4 class="title">{{$item->name}}</h4>
        @if ($item->user->username)
            <span>{{__('by')}} {{$item->user->username}}</span>
        @else 
            <span>{{__('by')}} {{__('admin')}}</span>
        @endif
        <h3 class="price">{{$item->cartPrice($cartItem["total_price"]) }}</h3>
        <p style="text-transform: capitalize"><strong>{{__('License')}}:</strong> {{$cartItem['license']}}</p>
        <p style="text-transform: capitalize"><strong>{{__('Support')}}:</strong> {{$cartItem['support']}} {{__('support')}}</p>
    </div>
</div>