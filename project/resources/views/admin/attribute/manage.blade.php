@extends('layouts.admin')

@push('styles')
<style media="screen">
.special-box {
  box-shadow: 0px 1px 6px 0px rgba(208, 208, 208, 0.61);
}
</style>
@endpush

@section('content')
<div class="card">
  <div class="d-sm-flex align-items-center justify-content-between">
  <h5 class=" mb-0 text-gray-800 pl-3">{{__('Manage Attribute')}} 
    <a class="btn btn-primary btn-rounded btn-sm"><i class="fas fa-arrow-left"></i> {{ __('Back') }}</a></h5>
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
      <li class="breadcrumb-item"><a href="javascript:;">{{ __('Manage Attribute') }}</a></li>
      <li class="breadcrumb-item"><a href="javascript:;">{{ __('Edit') }}</a></li>
  </ol>
  </div>
</div>

<div class="row justify-content-center mt-3">
  <div class="col-lg-10">
    <div class="card mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">{{ __('Manage Attribute') }}</h6>
      </div>
      <div class="card-body">
        @if (session()->has('success'))
        <div class="row">
          <div class="col-md-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('success') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>
        </div>
      @endif

      @if ($type == 'subcategory' || $type == 'childcategory')
        @php
          if ($type == 'subcategory') {
            $category = $data->category;
          } elseif ($type == 'childcategory') {
            $category = $data->subcategory->category;
          }
        @endphp

        @if ($category->attributes()->count() > 0)
          @foreach ($category->attributes as $key => $attribute)
            <div class="row">
              <div class="col-lg-3">
                <div class="left-area">
                    <h4 class="heading">{{ __($attribute->name) }} *</h4>
                    <p class="sub-heading">{{ __('(In Any Language)') }}</p>
                </div>
              </div>
              <div class="col-lg-9">
                @foreach ($attribute->attribute_options as $key => $option)
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline{{$option->id}}" name="{{ $attribute->id }}" class="custom-control-input">
                    <label class="custom-control-label" for="customRadioInline{{$option->id}}">{{ $option->name }}</label>
                  </div>
                @endforeach
              </div>
            </div>
            <br>
          @endforeach
        @endif
      @endif

      @if ($type == 'childcategory')
        @if ($data->subcategory->attributes()->count() > 0)
          @foreach ($data->subcategory->attributes as $key => $attribute)
            <div class="row">
              <div class="col-lg-3">
                <div class="left-area">
                    <h4 class="heading">{{ __($attribute->name) }} *</h4>
                    <p class="sub-heading">{{ __('(In Any Language)') }}</p>
                </div>
              </div>
              <div class="col-lg-9">
                @foreach ($attribute->attribute_options as $key => $option)
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline{{$option->id}}" name="{{ $attribute->id }}" class="custom-control-input">
                    <label class="custom-control-label" for="customRadioInline{{$option->id}}">{{ $option->name }}</label>
                  </div>
                @endforeach
              </div>
            </div>
            <br>
          @endforeach
        @endif
      @endif


      @foreach ($data->attributes as $key => $attribute)
        <div class="row">
          <div class="col-lg-3">
            <div class="left-area">
                <h4 class="heading">{{ __($attribute->name) }} *</h4>
                <p class="sub-heading">{{ __('(In Any Language)') }}</p>
            </div>
          </div>
          <div class="col-lg-6">
            @foreach ($attribute->attribute_options as $key => $option)
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline{{$option->id}}" name="{{ $attribute->id }}" class="custom-control-input">
                <label class="custom-control-label" for="customRadioInline{{$option->id}}">{{ $option->name }}</label>
              </div>
            @endforeach
          </div>
          <div class="col-md-3">
            <a href="{{route('admin.attr.edit', $attribute->id)}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
            <form class="d-inline-block" action="{{ route('admin.attr.delete', $attribute->id) }}" method="get">
              <button type="submit" class="btn btn-danger" data-target="#confirm-delete" data-toggle="modal"><i class="fas fa-trash-alt"></i></button>
            </form>
          </div>
        </div>
        <br>
      @endforeach
      </div>
    </div>
  </div>
</div>



  <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="modal1" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
           <div class="submit-loader">
              <img  src="{{asset('assets/images/'.$gs->admin_loader)}}" alt="">
           </div>
           <div class="modal-header">
              <h5 class="modal-title"></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
           </div>
           <div class="modal-body">
           </div>
           <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
           </div>
        </div>
     </div>
  </div>


@endsection
