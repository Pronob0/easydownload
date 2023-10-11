@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="d-sm-flex align-items-center justify-content-between">
    <h5 class=" mb-0 text-gray-800 pl-3">{{ __('Captcha Settings') }}</h5>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">{{ __('General Settings') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.gs.captcha') }}">{{ __('Captcha Settings') }}</a></li>
    </ol>
    </div>
</div>

<div class="row justify-content-center mt-3">
<div class="col-lg-6">
  <!-- Form Basic -->
  <div class="card mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">{{ __('Captcha Setting') }}</h6>
    </div>

    <div class="card-body">
      <div class="gocover" style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
      <form class="geniusform" action="{{ route('admin.gs.update') }}" method="POST" enctype="multipart/form-data">

          @include('includes.admin.form-both')

          {{ csrf_field() }}

          <div class="form-group">
            <label for="site_key">{{ __('Captcha Site Key') }}</label>
            <input type="text" class="form-control" id="site_key" name="captacha_site_key"  placeholder="{{ __('Captcha Site Key') }}" value="{{ $gs->captacha_site_key }}" required>
          </div>

          <div class="form-group">
            <label for="secret_key">{{ __('Captcha Secret Key') }}</label>
            <input type="text" class="form-control" id="secret_key" name="captcha_secret_key"  placeholder="{{ __('Captcha Secret Key') }}" value="{{ $gs->captcha_secret_key }}" required>
          </div>

          <div class="form-group">
            <label for="captcha_url">{{ __('Captcha Verification URL') }}</label>
            <input type="text" class="form-control" id="captcha_url" name="captcha_url"  placeholder="{{ __('Captcha URL') }}" value="{{ $gs->captcha_url }}" required>
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
