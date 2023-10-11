@extends('layouts.admin')
@section('content')


<div class="card">
    <div class="d-sm-flex align-items-center justify-content-between">
    <h5 class=" mb-0 text-gray-800 pl-3">{{ __('Website Logo') }}</h5>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">{{ __('General Settings') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.gs.logo') }}">{{ __('Website Logo') }}</a></li>
    </ol>
    </div>
</div>


          <div class="row mt-3">

              <div class="col-lg-4">

                <div class="card mb-4">
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">{{ __('Header Logo') }}</h6>
                  </div>

                  <div class="card-body">
                    <div class="row justify-content-center">

                    <div class="gocover" style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>

                    <form class="geniusform" action="{{ route('admin.gs.update') }}" method="POST" enctype="multipart/form-data">

                        @include('includes.admin.form-both')

                        {{ csrf_field() }}

                        <div class="form-group">
                            <div class="wrapper-image-preview-settings">
                                <div class="box-settings">
                                    <div class="back-preview-image" style="background-image: url({{ $gs->logo ? asset('assets/images/'.$gs->logo):asset('assets/images/placeholder.jpg') }});"></div>
                                    <div class="upload-options-settings">
                                        <label class="img-upload-label" for="img-upload-1">
                                             <i class="fas fa-camera"></i> {{ __('Upload Picture') }}
                                             <br>
                                             <small class="small-font">{{ __('600 X 600') }}</small>
                                        </label>
                                        <input id="img-upload-1" type="file" class="image-upload" name="logo" accept="image/*">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" id="submit-btn" class="btn btn-primary btn-block">{{ __('Submit') }}</button>

                    </form>
                  </div>
                  </div>
                </div>

              </div>



              <div class="col-lg-4">

                <div class="card mb-4">
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">{{ __('Footer Logo') }}</h6>
                  </div>

                  <div class="card-body">
                    <div class="row justify-content-center">

                    <form class="geniusform" action="{{ route('admin.gs.update') }}" method="POST" enctype="multipart/form-data">

                        @include('includes.admin.form-both')

                        {{ csrf_field() }}

                        <div class="form-group">
                            <div class="wrapper-image-preview-settings">
                                <div class="box-settings">
                                    <div class="back-preview-image" style="background-image: url({{ $gs->footer_logo ? asset('assets/images/'.$gs->footer_logo):asset('assets/images/placeholder.jpg') }});"></div>
                                    <div class="upload-options-settings">
                                        <label class="img-upload-label" for="img-upload-2">
                                             <i class="fas fa-camera"></i> {{ __('Upload Picture') }}
                                             <br>
                                             <small class="small-font">{{ __('600 X 600') }}</small>
                                        </label>
                                        <input id="img-upload-2" type="file" class="image-upload" name="footer_logo" accept="image/*">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" id="submit-btn" class="btn btn-primary btn-block">{{ __('Submit') }}</button>

                    </form>
                  </div>
                  </div>
                </div>

              </div>


              <div class="col-lg-4">

                <div class="card mb-4">
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">{{ __('Admin Panel Logo') }}</h6>
                  </div>

                  <div class="card-body">
                    <div class="row justify-content-center">

                    <form class="geniusform" action="{{ route('admin.gs.update') }}" method="POST" enctype="multipart/form-data">

                        @include('includes.admin.form-both')

                        {{ csrf_field() }}

                        <div class="form-group">
                            <div class="wrapper-image-preview-settings">
                                <div class="box-settings">
                                    <div class="back-preview-image" style="background-image: url({{ $gs->invoice_logo ? asset('assets/images/'.$gs->invoice_logo):asset('assets/images/placeholder.jpg') }});"></div>
                                    <div class="upload-options-settings">
                                        <label class="img-upload-label" for="img-upload-3">
                                             <i class="fas fa-camera"></i> {{ __('Upload Picture') }}
                                             <br>
                                             <small class="small-font">{{ __('600 X 600') }}</small>
                                        </label>
                                        <input id="img-upload-3" type="file" class="image-upload" name="invoice_logo" accept="image/*">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" id="submit-btn" class="btn btn-primary btn-block">{{ __('Submit') }}</button>

                    </form>
                  </div>
                  </div>
                </div>

              </div>


          </div>
          <!--Row-->

@endsection
