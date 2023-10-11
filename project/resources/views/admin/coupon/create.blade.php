@extends('layouts.admin')
@section('styles')

<link href="{{asset('assets/admin/css/jquery-ui.css')}}" rel="stylesheet" type="text/css">

@endsection
@section('content')

<div class="card">
  <div class="d-sm-flex align-items-center justify-content-between">
  <h5 class=" mb-0 text-gray-800 pl-3">{{ __('Add New Coupon') }} <a class="btn btn-primary btn-rounded btn-sm" href="{{route('admin.currency.index')}}"><i class="fas fa-arrow-left"></i> {{ __('Back') }}</a></h5>
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
      <li class="breadcrumb-item"><a href="javascript:;">{{ __('Payment Settings') }}</a></li>
      <li class="breadcrumb-item"><a href="{{ route('admin.coupon.index') }}">{{ __('Coupons') }}</a></li>
      <li class="breadcrumb-item"><a href="{{route('admin.coupon.create')}}">{{ __('Add New Coupon') }}</a></li>
  </ol>
  </div>
</div>

<div class="row justify-content-center mt-3">
  <div class="col-lg-6">
    <!-- Form Basic -->
    <div class="card mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">{{ __('Add New Coupon Form') }}</h6>
      </div>

      <div class="card-body">
        <div class="gocover" style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
        <form class="geniusform" action="{{route('admin.coupon.store')}}" method="POST" enctype="multipart/form-data">

            @include('includes.admin.form-both')

            {{ csrf_field() }}

            <div class="form-group">
                <label class="heading" for="c-name">{{ __('Code') }}</label>
                <input type="text" class="form-control" name="code" placeholder="{{ __('Enter Code') }}" required="" value="">
            </div>

            <div class="form-group">
              <label class="heading">{{ __('Type') }}</label>
              <select class="form-control mb-3" id="type" name="type" required="">
                  <option value="">{{ __('Choose a type') }}</option>
                  <option value="0">{{ __('Discount By Percentage') }}</option>
                  <option value="1">{{ __('Discount By Amount') }}</option>
              </select>
            </div>



          <div class="form-group d-none">
            <input type="text" class="form-control" name="price" placeholder="" required="" value=""><span></span>
          </div>

          <div class="form-group">
              <label class="heading" for="inp-name">{{ __('Quantity') }}</label>
              <select id="times" class="form-control mb-3"  required="">
                  <option value="0">{{ __('Unlimited') }}</option>
                  <option value="1">{{ __('Limited') }}</option>
              </select>
            </div>

            <div class="form-group d-none">
                <input type="text" class="form-control" name="times" placeholder="{{ __('Enter Value') }}" value=""><span></span>
            </div>

            <div class="form-group">
              <label class="heading" for="inp-value">{{ __('Start Date') }}</label>
              <input type="text" class="form-control" name="start_date" id="from" placeholder="{{ __('Select a Date') }}" required="" value="">
          </div>
          <div class="form-group">
              <label class="heading" for="inp-value">{{ __('End Date') }}</label>
              <input type="text" class="form-control" name="end_date" id="to" placeholder="{{ __('Select a Date') }}" required="" value="">
          </div>

            <button type="submit" id="submit-btn" class="btn btn-primary">{{ __('Submit') }}</button>

        </form>
      </div>
    </div>

    <!-- Form Sizing -->

    <!-- Horizontal Form -->

  </div>
</div>

@endsection

@section('scripts')

<script type="text/javascript">
  'use strict';

    $('#type').on('change', function() {
      var val = $(this).val();
      var selector = $(this).parent().next();
      if(val == "")
      {
        selector.hide();
      }
      else {
        if(val == 0)
        {
          selector.find('.heading').html('{{ __('Percentage') }} *');
          selector.find('input').attr("placeholder", "{{ __('Enter Percentage') }}").next().html('%');
          selector.css('display','flex');
          selector.removeClass('d-none');
        }
        else if(val == 1){
          selector.find('.heading').html('{{ __('Amount') }} *');
          selector.find('input').attr("placeholder", "{{ __('Enter Amount') }}").next().html('$');
          selector.css('display','flex');
          selector.removeClass('d-none');
        }
      }
    });



  $(document).on("change", "#times" , function(){
    var val = $(this).val();
    var selector = $(this).parent().next();
    if(val == 1){
      selector.css('display','flex');
      selector.removeClass('d-none');
    }
    else{
      selector.find('input').val("");
      selector.addClass('d-none');

    }
});

</script>

<script>
  'use strict';
  var today = new Date();

  $("#from").datepicker({
      autoclose: true,
      endDate : today,
      todayHighlight: true
  });

  $("#to").datepicker({
      autoclose: true,
      startDate : today,
      todayHighlight: true
  });
</script>

@endsection
