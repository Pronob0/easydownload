@extends('layouts.admin')

@section('content')
<div class="card">
  <div class="d-sm-flex align-items-center justify-content-between">
  <h5 class=" mb-0 text-gray-800 pl-3">{{ __('Update Trending Info') }} <a class="btn btn-primary btn-rounded btn-sm" href="{{route('admin.dashboard')}}"><i class="fas fa-arrow-left"></i> {{ __('Back') }}</a></h5>
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
      <li class="breadcrumb-item"><a href="javascript:;">{{ __('Author Level') }}</a></li>
      <li class="breadcrumb-item"><a href="{{route('admin.trending.index')}}">{{ __('Trending') }}</a></li>

  </ol>
  </div>
</div>

<div class="row justify-content-center mt-3">
<div class="col-lg-6">
  <!-- Form Basic -->
  <div class="card mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">{{ __('Updating Trending Form') }}</h6>
    </div>

    <div class="card-body">
      <div class="gocover" style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
      <form class="geniusform" action="{{route('admin.trending.update')}}" method="POST" enctype="multipart/form-data">

          @include('includes.admin.form-both')

          {{ csrf_field() }}

          <div class="form-group">
            <label for="inp-title">{{  __('Trending Status')  }}</label>
            <div class="frm-btn btn-group mb-1">
                <button type="button" class="btn btn-sm btn-rounded dropdown-toggle btn-{{ $trend->status == 1 ? 'success' : 'danger' }}" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  {{ $trend->status == 1 ? __('Activated') : __('Deactivated')}}
                </button>
                <div class="dropdown-menu">

                  <a class="dropdown-item drop-change" href="javascript:;" data-status="1" data-val="{{ __('Activated') }}" data-href="{{ route('admin.trend.status',['id'=>1]) }}">{{ __('Activate') }}</a>
                  <a class="dropdown-item drop-change" href="javascript:;" data-status="0" data-val="{{ __('Deactivated') }}" data-href="{{ route('admin.trend.status',['id'=>0]) }}">{{ __('Deactivate') }}</a>
                </div>
              </div>
        </div>

        <div class="form-group">
            <label for="name">{{ __('Name') }}</label>
            <input type="text" class="form-control" id="name" name="name"  placeholder="{{ __('Enter Name') }}" value="{{ $trend->name }}" required>
        </div>
        <div class="form-group">
            <label>{{ __('Set Picture') }} <small class="small-font">({{ __('Preferred Size 50 X 50') }})</small></label>
            <div class="wrapper-image-preview">
                <div class="box">
                    <div class="back-preview-image" style="background-image: url({{$trend->icon ? asset('assets/images/'.$trend->icon): asset('assets/images/placeholder.jpg') }});"></div>
                    <div class="upload-options">
                        <label class="img-upload-label" for="img-upload"> <i class="fas fa-camera"></i> {{ __('Upload Picture') }} </label>
                        <input id="img-upload" type="file" class="image-upload" name="icon" accept="image/*">
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="days">{{ __('Days') }}</label>
            <input type="number" class="form-control" id="days" name="day"  placeholder="{{ __('Enter Days') }}" value="{{ $trend->day }}" required>
        </div>
        <div class="form-group">
            <label for="days">{{ __('Sell Quantity') }}</label>
            <input type="number" class="form-control" id="sell" name="sell"  placeholder="{{ __('Enter Sell Quantity') }}" value="{{ $trend->sell }}" required>
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

$("#seo").change(function() {
    if(this.checked) {
        $('.showbox').removeClass('d-none');
    }else{
        $('.showbox').addClass('d-none');
    }
});

</script>

@endsection
