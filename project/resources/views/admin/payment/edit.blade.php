@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="d-sm-flex align-items-center justify-content-between">
    <h5 class=" mb-0 text-gray-800 pl-3">{{ __('Edit Payment Gateway') }} <a class="btn btn-primary btn-rounded btn-sm" href="{{route('admin.payment.index')}}"><i class="fas fa-arrow-left"></i> {{ __('Back') }}</a></h5>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.payment.index') }}">{{ __('Payment Gateways') }}</a></li>
        <li class="breadcrumb-item"><a href="{{route('admin.payment.edit',$data->id)}}">{{ __('Edit Payment') }}</a></li>
    </ol>
    </div>
</div>

<div class="row justify-content-center mt-3">
  <div class="col-lg-6">
    <!-- Form Basic -->
    <div class="card mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">{{ __('Edit Payment Form') }}</h6>
      </div>

      <div class="card-body">
        
        <form class="geniusform"  action="{{route('admin.payment.update',$data->id)}}" method="POST" enctype="multipart/form-data">

            @include('includes.admin.form-both')

            {{ csrf_field() }}


            @if($data->type == 'automatic')


            <div class="form-group">
              <label for="inp-name">{{ __('Name') }}</label>
              <input type="text" class="form-control" id="inp-name" name="name"  placeholder="{{ __('Enter Name') }}" value="{{ $data->name }}" required>
            </div>


            @if($data->information != null)

              @foreach($data->convertAutoData() as $pkey => $pdata)

              @if($pkey == 'sandbox_check')

                <div class="form-group">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="pkey[{{ __($pkey) }}]" class="custom-control-input" {{ $pdata == 1  ? 'checked' : '' }} id="{{ $pkey }}">
                    <label class="custom-control-label" for="{{ $pkey }}">
                      {{ __( $data->name.' '.ucwords(str_replace('_',' ',$pkey)) ) }}
                    </label>
                  </div>
                </div>

              {{-- @elseif($pkey == 'text') --}}
                {{-- <div class="form-group">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="pkey[{{ __($pkey) }}]" class="custom-control-input" id="{{ $pkey }}">
                    <label class="custom-control-label" for="{{ $pkey }}">
                      {{ __( $data->name.' '.ucwords(str_replace('_',' ',$pkey)) ) }}
                    </label>
                  </div>
                </div> --}}
                {{-- <div class="form-group">
                  <label>{{ __('Set Picture') }}</label>
                  <div class="wrapper-image-preview">
                      <div class="box">
                          <div class="back-preview-image" style="background-image: url({{ $pdata ? asset('assets/images/'.$pdata) : asset('assets/images/placeholder.jpg') }});"></div>
                          <div class="upload-options">
                              <label class="img-upload-label" for="img-upload"> <i class="fas fa-camera"></i> {{ __('Upload Picture') }} </label>
                              <input id="img-upload" type="file" class="image-upload" name="photo" accept="image/*">
                          </div>
                      </div>
                  </div>
                </div> --}}

              @else

              <div class="form-group">
                <label for="inp-{{ __($pkey) }}">{{ __( $data->name.' '.ucwords(str_replace('_',' ',$pkey)) ) }}</label>
                <input type="text" class="form-control" id="inp-{{ __($pkey) }}" name="pkey[{{ __($pkey) }}]"  placeholder="{{ __( $data->name.' '.ucwords(str_replace('_',' ',$pkey)) ) }}" value="{{ $pdata }}" required>
              </div>


              @endif

              @endforeach

            @endif

            @else

              <div class="form-group">
                <label for="inp-title">{{ __('Name') }}</label>
                <input type="text" class="form-control" id="inp-title" name="title"  placeholder="{{ __('Enter Name') }}" value="{{ $data->title }}" required>
              </div>

              <div class="form-group">
                <label for="inp-subtitle">{{ __('Subtitle') }}</label>
                <input type="text" class="form-control" id="inp-subtitle" name="subtitle"  placeholder="{{ __('Enter Subtitle') }}" value="{{ $data->subtitle }}" required>
              </div>

              @if($data->keyword == null)


              <div class="form-group">
                <label for="inp-details">{{ __('Description') }}</label>
                <textarea name="details" class="form-control " id="inp-details" cols="30" rows="10" >{{ $data->details }}</textarea>
              </div>

              @endif


            @endif





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

