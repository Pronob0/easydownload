@extends('layouts.admin')

@section('content')
<div class="card">
  <div class="d-sm-flex align-items-center justify-content-between">
  <h5 class=" mb-0 text-gray-800 pl-3">{{ __('Edit Badge') }} <a class="btn btn-primary btn-rounded btn-sm" href="{{route('admin.badge.index')}}"><i class="fas fa-arrow-left"></i> {{ __('Back') }}</a></h5>
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
      <li class="breadcrumb-item"><a href="javascript:;">{{ __('Author Badge') }}</a></li>
      <li class="breadcrumb-item"><a href="{{route('admin.badge.index')}}">{{ __('badge') }}</a></li>
      <li class="breadcrumb-item"><a href="{{route('admin.badge.edit',$data->id)}}">{{ __('Edit Badge') }}</a></li>
  </ol>
  </div>
</div>

<div class="row justify-content-center mt-3">
<div class="col-lg-6">
  <!-- Form Basic -->
  <div class="card mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">{{ __('Edit Badge Form') }}</h6>
    </div>

    <div class="card-body">
      <div class="gocover" style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
      <form class="geniusform" action="{{route('admin.badge.update',$data->id)}}" method="POST" enctype="multipart/form-data">

          @include('includes.admin.form-both')

          {{ csrf_field() }}



        <div class="form-group">
            <label for="name">{{ __('Name') }}</label>
            <input type="text" class="form-control" id="name" name="name"  placeholder="{{ __('Enter Name') }}" value="{{ $data->name }}" required>
        </div>

        <div class="form-group">
            <label for="days">{{ __('Days') }}</label>
            <input type="number" class="form-control" id="days" name="days"  placeholder="{{ __('Enter Days') }}" value="{{ $data->days }}" required>
        </div>
        <div class="form-group">
            <label for="time">{{ __('Times') }}</label>
            <input type="number" class="form-control" id="time" name="time"  placeholder="{{ __('Enter Times yearly (ex: 1)') }}" value="{{ $data->time }}" required>
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
    if(this.checked) {
        $('.showbox').removeClass('d-none');
    }else{
        $('.showbox').addClass('d-none');
    }
});

</script>

@endsection
