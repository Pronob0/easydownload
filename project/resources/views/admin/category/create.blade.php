@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="d-sm-flex align-items-center justify-content-between">
    <h5 class=" mb-0 text-gray-800 pl-3">{{ __('Add New Category') }} <a class="btn btn-primary btn-rounded btn-sm" href="{{route('admin.cat.index')}}"><i class="fas fa-arrow-left"></i> {{ __('Back') }}</a></h5>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">{{ __('Manage Categories') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.cat.index') }}">{{ __('Main Categories') }}</a></li>
        <li class="breadcrumb-item"><a href="{{route('admin.cat.create')}}">{{ __('Add New Category') }}</a></li>
    </ol>
    </div>
</div>

<div class="row justify-content-center mt-3">
  <div class="col-lg-6">
    <!-- Form Basic -->
    <div class="card mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">{{ __('Add New Category Form') }}</h6>
      </div>

      <div class="card-body">
        <div class="gocover" style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
        <form class="geniusform" action="{{route('admin.cat.store')}}" method="POST" enctype="multipart/form-data">

            @include('includes.admin.form-both')

            {{ csrf_field() }}


            <div class="form-group" id="set-picture">
                <label>{{ __('Set Picture') }} <small class="small-font">({{ __('Maximum size is 2 MB.') }})</small></label>
                <div class="wrapper-image-preview">
                    <div class="box">
                        <div class="back-preview-image" style="background-image: url({{ asset('assets/images/placeholder.jpg') }});"></div>
                        <div class="upload-options">
                            <label class="img-upload-label" for="img-upload"> <i class="fas fa-camera"></i> {{ __('Upload Picture') }} </label>
                            <input id="img-upload" type="file" class="image-upload" name="photo" accept="image/*">
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="inp-name">{{ __('Name') }}</label>
                <input type="text" class="form-control" id="inp-name" name="name"  placeholder="{{ __('Enter Name') }}" value="" required>
            </div>

            <div class="form-group">
                <label for="inp-slug">{{ __('Slug') }}</label>
                <input type="text" class="form-control" id="inp-slug" name="slug"  placeholder="{{ __('Enter Slug') }}" value="" required>
            </div>

            <div class="form-group">
              <label for="inp-regular">{{ __('Regular Buyer Fee') }}</label>
              <input type="number" class="form-control" id="inp-regular" name="regular_buyer_fee"  placeholder="{{ __('Regular Buyer Fee') }}" value="" required>
            </div>

            <div class="form-group">
              <label for="inp-extented">{{ __('Extended Buyer Fee') }}</label>
              <input type="number" class="form-control" id="inp-extented" name="extended_buyer_fee"  placeholder="{{ __('Extended Buyer Fee') }}" value="" required>
            </div>


            <div class="form-group">
              <label class="mr-2">
                {{ __('Demo URL Needed') }}
              </label>

                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="demo_url_status" id="inlineRadio1" value="1">
                  <label class="form-check-label" for="inlineRadio1">{{__('Yes')}}</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="demo_url_status" id="inlineRadio2" value="0">
                  <label class="form-check-label" for="inlineRadio2">{{__('No')}}</label>
                </div>
            </div>

            <div class="form-group">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" name="is_featured" class="custom-control-input" id="is_featured">
                <label class="custom-control-label" for="is_featured">
                    {{ __('Allow Featured Category') }}
                </label>
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

$(document).ready(function() {

});

</script>

@endsection
