@extends('layouts.admin')

@section('content')

@include('includes.form-success')
    <div class="card">
        <div class="d-sm-flex align-items-center justify-content-between">
        <h5 class=" mb-0 text-gray-800 pl-3">{{ __('Purchase History') }}</h5>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
            <li class="breadcrumb-item"><a href="javascript:;">{{ __('All Purchase') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.order.index') }}">{{ __('Purchase History') }}</a></li>
        </ol>
        </div>
    </div>


    <!-- Row -->
    <div class="row mt-3">
      <!-- Datatables -->

      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="row">

            <div class="col-lg-6">
                <div class="special-box">
                    <div class="heading-area">
                        <h4 class="title">
                        {{__('Order Details')}}
                        </h4>
                    </div>
                    <div class="table-responsive-sm">
                        <table class="table">
                            <tbody>
                            <tr>
                                <th class="45%" width="45%">{{__('Order ID')}}</th>
                                <td width="10%">:</td>
                                <td class="45%" width="45%">{{$order->order->order_number}}</td>
                            </tr>
                            <tr>
                                <th width="45%">{{__('Product name')}}</th>
                                <td width="10%">:</td>
                                <td width="45%">{{$order->item->name}}</td>
                            </tr>
                            <tr>
                                <th width="45%">{{__('Total Cost')}}</th>
                                <td width="10%">:</td>
                                <td width="45%">$ {{$order->total_price}}</td>
                            </tr>
                            <tr>
                                <th width="45%">{{__('Ordered Date')}}</th>
                                <td width="10%">:</td>
                                <td width="45%">{{date('d-M-Y H:i:s a',strtotime($order->created_at))}}</td>
                            </tr>
                            <tr>
                                <th width="45%">{{__('Payment Method')}}</th>
                                <td width="10%">:</td>
                                <td width="45%">{{$order->order->method}}</td>
                            </tr>

                            @if(!empty($order->order_note))
                                <th width="45%">{{__('Order Note')}}</th>
                                <th width="10%">:</th>
                                <td width="45%">{{$order->order_note}}</td>
                            @endif

                            </tbody>
                        </table>
                    </div>



                </div>
                @if ($order->refund==0)
                <a href="{{ route('admin.refund.approve',$order->id) }}" class="btn btn-success"><i class="fas fa-eye"></i> {{__('Approve')}}</a> Or <a href="{{ route('admin.refund.decline',$order->id) }}" class="btn btn-danger"><i class="fas fa-eye"></i> {{__('Decline')}}</a>

                @endif

            </div>
            <div class="col-lg-6">
                <div class="special-box">
                    <div class="heading-area">
                        <h4 class="title">
                        {{__('Billing Details')}}
                        </h4>
                    </div>
                    <div class="table-responsive-sm">
                        <table class="table">
                            <tbody>
                                    <tr>
                                        <th width="45%">{{__('Name')}}</th>
                                        <th width="10%">:</th>
                                        <td width="45%">{{$order->order->billing_first_name}} {{$order->order->billing_last_name}}</td>
                                    </tr>
                                    <tr>
                                        <th width="45%">{{__('Email')}}</th>
                                        <th width="10%">:</th>
                                        <td width="45%">{{$order->order->billing_email_address}}</td>
                                    </tr>
                                    <tr>
                                        <th width="45%">{{__('Address')}}</th>
                                        <th width="10%">:</th>
                                        <td width="45%">{{$order->order->billing_address}}</td>
                                    </tr>
                                    <tr>
                                        <th width="45%">{{__('Postal Code')}}</th>
                                        <th width="10%">:</th>
                                        <td width="45%">{{$order->order->billing_zipcode}}</td>
                                    </tr>
                                    <tr>
                                        <th width="45%">{{__('State')}}</th>
                                        <th width="10%">:</th>
                                        <td width="45%">{{$order->order->billing_state}}</td>
                                    </tr>
                                    <tr>
                                        <th width="45%">{{__('Country')}}</th>
                                        <th width="10%">:</th>
                                        <td width="45%">{{$order->order->billing_country}}</td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


<br>

      <!-- DataTable with Hover -->

    </div>
    </div>
         {{-- Review Section Start --}}
         <div>
            <div class="heading-area">
                <h4 class="title">
                   {{ __('Refund Messages') }}
                </h4>
                <br>

             </div>
             <div id="replay-area">
                <div id="reviews-section">
                   @if(count($disputes) > 0)
                   <ul class="all-replay">
                      @foreach($disputes as $dispute)
                      <li>
                         <div class="single-review">
                             @if ($dispute->is_buyer==1)
                             <div class="left-area">
                                <img class="dispute-img" src="{{ $dispute->user->photo ? asset('assets/images/'.$dispute->user->photo):asset('assets/images/placeholder.jpg') }}"
                                   alt="">
                                @if ($dispute->created_at)
                                <p class="date">
                                 {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$dispute->created_at)->diffForHumans() }}
                              </p>
                                @endif
                             </div>
                             <div class="right-area">
                                <div class="review-body">
                                    <h5 class="name">{{  $dispute->user->username }} <small>({{ __('buyer') }})</small></h5>
                                    <br>
                                   <p>
                                      {{$dispute->text}}
                                   </p>

                                </div>
                             </div>

                             @elseif($dispute->is_seller==1)

                             <div class="left-area">
                                <img class="dispute-img" src="{{ $dispute->user->photo ? asset('assets/images/'. $dispute->user->photo):asset('assets/images/placeholder.jpg') }}"
                                   alt="">
                                @if ($dispute->created_at)
                                <p class="date">
                                 {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$dispute->created_at)->diffForHumans() }}
                                 @endif
                              </p>
                             </div>
                             <div class="right-area">
                                <div class="review-body">
                                    <h5 class="name">{{ $dispute->user->username }} <small>({{ __('Seller') }})</small></h5>
                                    <br>
                                   <p>
                                      {{$dispute->text}}
                                   </p>

                                </div>
                             </div>
                               @endif

                               @endforeach

                             @endif


                         </div>

                      </li>
                   </ul>

                </div>
             </div>
        </div>

    <!--Row-->

{{-- STATUS MODAL --}}

<div class="modal fade confirm-modal" id="details" tabindex="-1" role="dialog" aria-labelledby="statusModalTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{ __("Purchase details") }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <a href="javascript:;" class="btn btn-secondary" data-dismiss="modal">{{ __("Back") }}</a>
      </div>
    </div>
	</div>
</div>

{{-- STATUS MODAL ENDS --}}


@endsection


@section('scripts')


@endsection
