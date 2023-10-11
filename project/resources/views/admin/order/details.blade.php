@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="d-sm-flex align-items-center justify-content-between">
        <h5 class=" mb-0 text-gray-800 pl-3">{{ __('Purchase Details') }} <a class="btn btn-primary btn-rounded btn-sm" href="{{route('admin.order.index')}}"><i class="fas fa-arrow-left"></i> {{ __('Back') }}</a></h5>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
            <li class="breadcrumb-item"><a href="javascript:;">{{ __('Purchase History') }}</a></li>
            <li class="breadcrumb-item"><a href="javascript:;">{{ __('Order Details') }}</a></li>
        </ol>
    </div>
</div>

<div class="row mt-3">
    <div class="col-lg-12">
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
                                <td class="45%" width="45%">{{$order->order_number}}</td>
                            </tr>
                            <tr>
                                <th width="45%">{{__('Total Product')}}</th>
                                <td width="10%">:</td>
                                <td width="45%">{{$order->ordered_items()->count()}}</td>
                            </tr>
                            <tr>
                                <th width="45%">{{__('Total Cost')}}</th>
                                <td width="10%">:</td>
                                <td width="45%">$ {{$order->ordered_items()->sum('total_price')}}</td>
                            </tr>
                            <tr>
                                <th width="45%">{{__('Ordered Date')}}</th>
                                <td width="10%">:</td>
                                <td width="45%">{{date('d-M-Y H:i:s a',strtotime($order->created_at))}}</td>
                            </tr>
                            <tr>
                                <th width="45%">{{__('Payment Method')}}</th>
                                <td width="10%">:</td>
                                <td width="45%">{{$order->method}}</td>
                            </tr>

                            @if(!empty($order->order_note))
                                <th width="45%">{{__('Order Note')}}</th>
                                <th width="10%">:</th>
                                <td width="45%">{{$order->order_note}}</td>
                            @endif

                            </tbody>
                        </table>
                    </div>
                    <div class="footer-area">
                        <a href="{{ route('admin.order.invoice',$order->id) }}" class="btn btn-primary"><i class="fas fa-eye"></i> {{__('View Invoice')}}</a>
                    </div>
                </div>
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
                                        <td width="45%">{{$order->billing_first_name}} {{$order->billing_last_name}}</td>
                                    </tr>
                                    <tr>
                                        <th width="45%">{{__('Email')}}</th>
                                        <th width="10%">:</th>
                                        <td width="45%">{{$order->billing_email_address}}</td>
                                    </tr>
                                    <tr>
                                        <th width="45%">{{__('Address')}}</th>
                                        <th width="10%">:</th>
                                        <td width="45%">{{$order->billing_address}}</td>
                                    </tr>
                                    <tr>
                                        <th width="45%">{{__('Postal Code')}}</th>
                                        <th width="10%">:</th>
                                        <td width="45%">{{$order->billing_zipcode}}</td>
                                    </tr>
                                    <tr>
                                        <th width="45%">{{__('State')}}</th>
                                        <th width="10%">:</th>
                                        <td width="45%">{{$order->billing_state}}</td>
                                    </tr>
                                    <tr>
                                        <th width="45%">{{__('Country')}}</th>
                                        <th width="10%">:</th>
                                        <td width="45%">{{$order->billing_country}}</td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 order-details-table">
                <div class="mr-table">
                    <h4 class="title">{{ __('Products Ordered') }}</h4>
                    <div class="table-responsiv">
                            <table id="example2" class="table table-hover dt-responsive" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>{{ __('Product ID#') }}</th>
                                        <th>{{ __('Product Title') }}</th>
                                        <th>{{ __('Author') }}</th>
                                        <th>{{ __('License') }}</th>
                                        <th>{{ __('Support') }}</th>
                                        <th>{{ __('Total Price') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                             
                                    @foreach($cart as $key => $oi)
                                        @php
                                            $item = json_decode($oi->item_info,true);
                                            $user = json_decode($oi->author_info,true);
                                        @endphp
                                        <tr>
                                            <td><input type="hidden" value="{{$key}}">{{ $item['id'] }}</td>
                                            <td>
                                                <a target="_blank" href="{{ route('item.details',$item['slug']) }}" style="display: block; margin-bottom: 5px;">
                                                    <p class="text-header">{{strlen($item['name']) > 40 ? substr($item['name'], 0, 40) . '...' : $item['name']}}</p>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('author.portfolio',str_replace(' ','-',$user['username'])) }}" target="_blank">{{$user['username']}}</a>
                                            </td>
                                            <td>
                                                {{$oi->license}}
                                            </td>

                                            <td>
                                                {{$oi->support}}
                                            </td>

                                            <td>
                                                $ {{$oi->total_price}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    </div>

                </div>
            </div>
            <div class="col-lg-12 text-center mt-5">
                <a class="btn btn-primary  add-newProduct-btn print" href="{{route('admin.order.print',$order->id)}}"
                target="_blank"><i class="fa fa-print"></i> {{ __('Print Invoice') }}</a>
            </div>
        </div>
    </div>
</div>


    {{-- <section class="success">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-invoice">
                        <main class="columns">
                            <div class="inner-container">

                            <div class="table-responsive">
                                <table class="table invoice">
                                    <tbody>
                                    <tr class="header">
                                        <td class="">
                                            <img src="{{ asset('assets/images/'.$gs->logo) }}" alt="Company Name">
                                        </td>
                                        <td class="align-right">
                                        <h2>{{ __('Invoice') }}</h2>
                                        </td>
                                    </tr>
                                    <tr class="intro">
                                        <td class="">
                                            <strong>{{ __('Name') }}:</strong> {{ $order->user->showName() }}<br>
                                            <strong>{{ __('Email') }}:</strong> {{ $order->user->email }}
                                        </td>
                                        <td class="text-right">
                                            <strong>{{ __('Order Number') }}:</strong> {{ $order->order_number }}<br>
                                            <strong>{{ __('Purchase Date') }}:</strong> {{ date('l m, Y', strtotime($order->created_at))  }}
                                        </td>
                                    </tr>
                                    <tr class="details">
                                        <td colspan="2">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            {{ __('Course Name') }}
                                                        </th>
                                                        <th>
                                                            {{ __('Total') }}
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($cart['items'] as $course)
                                                        <tr class="item">
                                                            <td>
                                                                {{ $course['item']['title'] }}
                                                            </td>
                                                            <td>
                                                                {{ $order->currency_sign }}{{ round(($course['price'] * $order->currency_value),2) }}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr class="totals">
                                        <td></td>
                                        <td>
                                            <table class="table">
                                                <tbody>

                                                    @if($order->discount != 0)
                                                    <tr class="subtotal">
                                                        <td class="label text-right">{{ __('Discount') }}</td>
                                                        <td id="padding-right-11" class="num">{{ $order->currency_sign }}{{ round(($order->discount * $order->currency_value),2) }}</td>
                                                    </tr>
                                                    @endif

                                                    <tr class="total">
                                                        <td class="label text-right">{{__('Total')}}</td>
                                                        <td class="num">{{ $order->currency_sign }}{{ round(($order->pay_amount * $order->currency_value),2) }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </main>
                    </div>
                </div>
            </div>
        </div>

    </section> --}}
@endsection
