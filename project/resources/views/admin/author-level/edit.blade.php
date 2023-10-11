@extends('layouts.admin')

@section('content')
<div class="card">
  <div class="d-sm-flex align-items-center justify-content-between">
  <h5 class=" mb-0 text-gray-800 pl-3">{{ __('Edit Level') }} <a class="btn btn-primary btn-rounded btn-sm" href="{{route('admin.level.index')}}"><i class="fas fa-arrow-left"></i> {{ __('Back') }}</a></h5>
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
      <li class="breadcrumb-item"><a href="javascript:;">{{ __('Author Level') }}</a></li>
      <li class="breadcrumb-item"><a href="{{route('admin.level.index')}}">{{ __('Level') }}</a></li>
      <li class="breadcrumb-item"><a href="{{route('admin.level.edit',$data->id)}}">{{ __('Edit Level') }}</a></li>
  </ol>
  </div>
</div>

<div class="row justify-content-center mt-3">
<div class="col-lg-6">
  <!-- Form Basic -->
  <div class="card mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">{{ __('Edit Post Form') }}</h6>
    </div>

    <div class="card-body">
      <div class="gocover" style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
      <form class="geniusform" action="{{route('admin.level.update',$data->id)}}" method="POST" enctype="multipart/form-data">
          @include('includes.admin.form-both')

          {{ csrf_field() }}
          <div class="form-group">
            <label for="rate">{{ __('Name') }}</label>
            <input type="text" class="form-control" id="name" name="name"  placeholder="{{ __('Enter Name') }}" value="{{ $data->name }}" required>
        </div>
        <div class="form-group">
            <label for="rate">{{ __('Rate') }}</label>
            <input type="number" class="form-control" id="rate" name="rate"  placeholder="{{ __('Enter Rate') }}" value="{{ $data->rate }}" required>
        </div>

        <div class="form-group">
            <label for="amount">{{ __('Amount') }}</label>
            <input type="number" class="form-control" id="amount" name="amount"  placeholder="{{ __('Enter Amount') }}" value="{{ $data->amount }}" required>
        </div>

        <div class="form-group">
            <label>{{ __('Set Picture') }} <small class="small-font">({{ __('Preferred Size 600 X 600') }})</small></label>
            <div class="wrapper-image-preview">
                <div class="box">
                    <div class="back-preview-image" style="background-image: url({{$data->icon ? asset('assets/images/'.$data->icon) : asset('assets/images/placeholder.jpg') }});"></div>
                    <div class="upload-options">
                        <label class="img-upload-label" for="img-upload"> <i class="fas fa-camera"></i> {{ __('Upload Picture') }} </label>
                        <input id="img-upload" type="file" class="image-upload" name="icon" accept="image/*">
                    </div>
                </div>
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
  'use strict';
    if(this.checked) {
        $('.showbox').removeClass('d-none');
    }else{
        $('.showbox').addClass('d-none');
    }
});

</script>

@endsection
