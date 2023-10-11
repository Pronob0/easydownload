@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="d-sm-flex align-items-center justify-content-between">
    <h5 class=" mb-0 text-gray-800 pl-3">{{ __('Payment Information') }}</h5>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">{{ __('Payment Settings') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.payment.info') }}">{{ __('Payment Information') }}</a></li>
    </ol>
    </div>
</div>

<div class="row justify-content-center mt-3">
    <div class="col-lg-6">
      <!-- Form Basic -->
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">{{ __('Payment Information Form') }}</h6>
        </div>

        <div class="card-body">

          <form class="geniusform" action="{{ route('admin.gs.update') }}" method="POST" enctype="multipart/form-data">

              @include('includes.admin.form-both')
              {{ csrf_field() }}

              <div class="form-group">
                <label for="inp-pc">{{  __('Tax')  }} (%)</label>
                <input type="text" class="form-control" id="inp-pc" placeholder="{{  __('Tax')  }}" name="tax"  value="{{ $gs->tax }}" required>
            </div>

              <div class="form-group">
                  <label for="inp-Fee">{{  __('Withdraw Fee')  }} <small>({{__('Leave 0 if you don\'t want to add')}})</small></label>
                  <input type="text" class="form-control" id="inp-Fee" placeholder="{{  __('Withdraw Fee')  }}" name="withdraw_fee"  value="{{ $gs->withdraw_fee }}" required>
              </div>
              <div class="form-group">
                  <label for="inp-charge">{{  __('Withdraw Charge')  }} <small>({{__('Leave 0 if you don\'t want to add')}})</small></label>
                  <input type="text" class="form-control" id="inp-charge" placeholder="{{  __('Withdraw Charge')  }}" name="withdraw_charge" value="{{ $gs->withdraw_charge }}" required>
              </div>
              <div class="form-group">
                <label for="inp-charge">{{  __('Refund Time Limit')  }} <small>({{__('Time limit in days')}})</small></label>
                <input type="text" class="form-control" id="inp-charge" placeholder="{{  __('Refund Time Limit')  }}" name="refund_time_limit" value="{{ $gs->refund_time_limit }}" required>
            </div>
              <button type="submit" id="submit-btn" class="btn btn-primary">{{ __('Update') }}</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!--Row-->

@endsection
