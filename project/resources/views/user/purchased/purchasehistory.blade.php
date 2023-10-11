@extends('layouts.front')

@section('content')

@includeIf('includes.user.common')
			<!-- ========================== Dashboard Elements ============================= -->
            @include('includes.admin.form-both')
			<section class="gray-light">
				<div class="container">
					<div class="row">
@if ($orders->count()==0)
<div class="col-lg-12 col-md-12 col-sm-12">
<div class="p-3 text-center shadow-lg p-5">
    <h3>{{__("Please Buy a product First!")}}</h3>
</div>
</div>
@else
<div class="col-lg-8 col-md-12 col-sm-12">
    <div class="table-responsive">
        <table class="table table-lg table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>#{{ __('Order') }}</th>
                    <th>{{ __('Date') }}</th>
                    <th>{{ __('Order Total') }}</th>
                    <th>{{ __('Order Status') }}</th>
                    <th>{{ __('View') }}</th>
                </tr>
            </thead>

            <tbody>
                @foreach($orders as $order)
                @foreach ($order->ordered_items as $item)
                <tr>
                    <td>{{$item->order->order_number}}</td>
                    <td>{{date('d-M-Y',strtotime($item->created_at))}}</td>
                    <td>$ {{$item->total_price}}</td>
                    @if ($item->refund_seen==1 && $item->refund==0)
                    <td><span class="bg-primary btn btn-sm" disabled >{{ __('Refund Pending') }}</span></td>
                    @else
                    @if ($item->refund==0 && $item->refund_seen==0)
                    <td><span class="bg-success btn btn-sm" disabled >{{ __('Completed') }}</span></td>
                    @else
                    <td><span class="btn bg-danger btn-sm" >{{ __('Refunded') }}</span></td>
                    @endif

                    @endif


                    <td><a class="btn btn-primary btn-sm" href="{{ route('user.purchase.details',$item->id) }}">{{ __('view order') }}</a></td>
                </tr>

                @endforeach

                @endforeach

            </tbody>
        </table>
    </div>
    {{$orders->links()}}
</div>

<div class="col-lg-4 col-md-12 col-sm-12">
    <!-- Single Author Info -->
    @include('includes.user.common-sidebar')

</div>
@endif



					</div>
				</div>
			</section>

			<!-- ============================ Call To Action Start ================================== -->
			@includeIf('partials.theme-newsletter')
			<!-- ============================ Call To Action End ================================== -->

@endsection
