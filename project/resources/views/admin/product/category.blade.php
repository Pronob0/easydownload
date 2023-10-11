@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="d-sm-flex align-items-center justify-content-between">
    <h5 class=" mb-0 text-gray-800 pl-3">{{ __('Add New Product') }} <a class="btn btn-primary btn-rounded btn-sm" href="{{route('admin.product.create')}}"><i class="fas fa-arrow-left"></i> {{ __('Back') }}</a></h5>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">{{ __('Manage Categories') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">{{ __('Main Product') }}</a></li>
        <li class="breadcrumb-item"><a href="{{route('admin.product.create')}}">{{ __('Add New Product') }}</a></li>
    </ol>
    </div>
</div>

<div class="row justify-content-center mt-3">
  <div class="col-lg-6">
    <!-- Form Basic -->
    <div class="card mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">{{ __('Select a Category for your uoload:') }}</h6>
      </div>

      <div class="card-body">
        <div class="gocover" style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
        <form action="{{route('admin.product.extended.form')}}" method="get" enctype="multipart/form-data">

            <div class="form-group">
                <label for="inp-name">{{ __('Category') }}</label>
                <select id="cat" class="form-control mb-3" name="category" required="">
                  <option value="">{{ __('Select Category') }}</option>
                  @foreach($cats as $cat)
                  <option value="{{ $cat->slug }}">{{$cat->name}}</option>
                  @endforeach
                </select>
              </div>

            <button type="submit" id="submit-btn" class="btn btn-primary">{{ __('Next') }}</button>

        </form>
      </div>
    </div>

  </div>

</div>
<!--Row-->

@endsection


@section('scripts')

@endsection
