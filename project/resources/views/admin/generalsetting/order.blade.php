@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="d-sm-flex align-items-center justify-content-between">
    <h5 class=" mb-0 text-gray-800 pl-3">{{ __('Order Settings') }}</h5>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">{{ __('General Settings') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.gs.order') }}">{{ __('Order Settings') }}</a></li>
    </ol>
    </div>
</div>

<div class="row justify-content-center mt-3">
<div class="col-lg-6">
  <!-- Form Basic -->
  <div class="card mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">{{ __('Order Setting') }}</h6>
    </div>

    <div class="card-body">
      <div class="gocover" style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
      <form class="geniusform" action="{{ route('admin.gs.update') }}" method="POST" enctype="multipart/form-data">

          @include('includes.admin.form-both')

          {{ csrf_field() }}

          <div class="form-group">
            <label for="support_duration">{{ __('Free Support Duration') }} <small>({{ ('In months') }})</small> </label>
            <input type="number" class="form-control" id="support_duration" name="support_duration"  placeholder="{{ __('Support Duration') }}" value="{{ $gs->support_duration }}" required>
          </div>

          <div class="form-group">
            <label for="support_script">{{ __('Support Script') }} <small>{{ 'In Percentage ( Extended Price ) ' }}</small> </label>
            <input type="number" class="form-control" id="support_script" name="support_script"  placeholder="{{ __('Support Script') }}" value="{{ $gs->support_script }}" required>
          </div>

        </div>

        <button type="submit" id="submit-btn" class="btn btn-primary">{{ __('Submit') }}</button>
      </form>
    </div>
  </div>

  <!-- Form Sizing -->

  <!-- Horizontal Form -->

</div>

</div>
<!--Row-->


@endsection

@section('scripts')

<script>
'use strict';
$("#seo").change(function() {
    if(this.checked) {
        $('.showbox').removeClass('d-none');
    }else{
        $('.showbox').addClass('d-none');
    }
});

</script>

@endsection
