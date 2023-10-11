@extends('layouts.front')

@section('styles')
  <link href="{{ asset('assets/admin/css/invoice.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
<div class="card">
    <div class="d-sm-flex align-items-center justify-content-between">
        <h5 class=" mb-0 text-gray-800 pl-3">{{ __('Invoice') }} <a class="btn btn-primary btn-rounded btn-sm" href="javascript:history.back();"><i class="fas fa-arrow-left"></i> {{ __('Back') }}</a></h5>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
            <li class="breadcrumb-item"><a href="javascript:;">{{ __('Purchase History') }}</a></li>
            <li class="breadcrumb-item"><a href="javascript:;">{{ __('Invoice') }}</a></li>
        </ol>
    </div>
</div>

<div class="row justify-content-center mt-3">
    <div class="order-table-wrap">
        <div class="invoice-wrap">
            <div class="invoice__title">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="invoice__logo text-center">
                           <img src="{{ asset('assets/images/'.$gs->logo) }}" alt="woo commerce logo">
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="invoice__metaInfo">
                <div class="row" style="width: 100%;">
                    <div class="col-lg-6">
                        <div class="invoice__orderDetails">

                            <p><strong>{{ __('Order Details') }} </strong></p>
                            <span><strong>{{ __('Order ID') }} :</strong> {{$order->order_number}}</span><br>
                            <span><strong>{{ __('Order Date') }} :</strong> {{ date('d-M-Y',strtotime($order->created_at)) }}</span><br>
                            <span class="text-capitalize"> <strong>{{ __('Payment Method') }} :</strong> {{$order->method}}</span><br>
                        </div>
                    </div>

                    <div class="col-lg-6">
                            <div class="invoice__orderDetails d-inline-block float-right">
                                <p><strong>{{ __('Billing Details') }}</strong></p>
                                <span><strong>{{ __('Customer Name') }}</strong>: {{ $order->billing_first_name . ' ' . $order->billing_last_name }}</span><br>
                                <span><strong>{{ __('Address') }}</strong>: {{ $order->billing_address }}</span><br>
                                <span><strong>{{ __('State') }}</strong>: {{ $order->billing_state }}</span><br>
                                <span><strong>{{ __('Country') }}</strong>: {{ $order->billing_country }}</span>
                            </div>
                    </div>
                </div>
            </div>


                <div class="col-lg-12">
                    <div class="invoice_table">
                        <div class="mr-table">
                            <div class="table-responsive">

                                <h5 class="text-center text-uppercase">{{__('Ordered Items')}}</h5>
                                <table class="table table-striped">
                                  <thead>
                                    <tr>

                                      <th scope="col">{{__('Item Name')}}</th>
                                      <th scope="col">{{__('Support')}}</th>
                                      <th scope="col">{{__('License')}}</th>
                                      <th scope="col">{{__('Included Support')}}</th>
                                      <th scope="col">{{__('Extended Support')}}</th>
                                      <th scope="col">{{__('Price')}}</th>
                                    </tr>
                                  </thead>
                                  <tbody>


                                            <td><strong>{{$cart->item->name}}</strong></td>
                                            <td><span class="text-capitalize">{{$cart->support}}</span></td>
                                            <td><span class="text-capitalize">{{$cart->license}}</span></td>
                                            <td>$ {{$cart->included_support}}</td>
                                            <td>$ {{$cart->extended_support}}</td>
                                            <td><strong>$ {{$cart->total_price}}</strong></td>
                                        </tr>

                                      <tr>
                                          <td colspan="4"></td>
                                          <td><strong class="text-danger">{{__('Total')}}:</strong></td>
                                          <td><strong class="text-danger">$ {{round($cart->total_price, 2)}}</strong></td>
                                      </tr>
                                  </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-12 text-center mt-3 mb-3">
                    <a href="{{route('user.invoice.print',$order->id)}}"
                        target="_blank" class="btn btn-primary mx-auto"><i class="fas fa-print"></i>{{ __('Print Invoice') }}</a>
                </div>
        </div>
    </div>
</div>
</div>
@endsection
