@extends('layouts.admin')

@section('content')
  <div class="card">
    <div class="d-sm-flex align-items-center justify-content-between">
    <h5 class=" mb-0 text-gray-800 pl-3">{{ __('Google Analytics') }}</h5>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">{{ __('SEO Tools') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.seotool.analytics') }}">{{ __('Google Analytics') }}</a></li>
    </ol>
    </div>
  </div>

  <div class="row justify-content-center mt-3">
    <div class="col-lg-10">
      <!-- Form Basic -->
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        </div>

        <div class="card-body">
          <div class="gocover" style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
          <form class="geniusform" action="{{ route('admin.seotool.analytics.update') }}" method="POST" enctype="multipart/form-data">

              @include('includes.admin.form-both')

              {{ csrf_field() }}

              <div class="form-group">
                  <label for="inp-name">{{ __('Google Analytics ID') }} *</label>
                  <textarea name="google_analytics" class="form-control">{{ $tool->google_analytics }}</textarea>
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
