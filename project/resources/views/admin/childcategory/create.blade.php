@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="d-sm-flex align-items-center justify-content-between">
    <h5 class=" mb-0 text-gray-800 pl-3">{{ __('Add New ChildCategory') }} <a class="btn btn-primary btn-rounded btn-sm" href="{{route('admin.childcat.index')}}"><i class="fas fa-arrow-left"></i> {{ __('Back') }}</a></h5>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">{{ __('Manage Categories') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.subcat.index') }}">{{ __('Main ChildCategories') }}</a></li>
        <li class="breadcrumb-item"><a href="{{route('admin.childcat.create')}}">{{ __('Add New ChildCategory') }}</a></li>
    </ol>
    </div>
</div>

<div class="row justify-content-center mt-3">
  <div class="col-lg-6">
    <!-- Form Basic -->
    <div class="card mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">{{ __('Add New ChildCategory Form') }}</h6>
      </div>

      <div class="card-body">
        <div class="gocover" style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
        <form class="geniusform" action="{{route('admin.childcat.store')}}" method="POST" enctype="multipart/form-data">

            @include('includes.admin.form-both')

            {{ csrf_field() }}


            <div class="form-group">
              <label for="inp-category">{{ __('Category') }}</label>
              <select id="cat" required="" class="form-control" name="category_id">
                <option value="">{{ __('Select Category') }}</option>
                  @foreach($cats as $cat)
                    <option data-href="{{ route('admin.subcat.load',$cat->id) }}" value="{{ $cat->id }}">{{ $cat->name }}</option>
                  @endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="inp-category">{{ __('Sub Category') }}</label>
                <select id="subcat" name="subcategory_id"  class="form-control" disabled="">

                </select>
            </div>

            <div class="form-group">
              <label for="inp-name">{{ __('Name') }}</label>
              <input type="text" class="form-control" id="inp-name" name="name"  placeholder="{{ __('Enter Name') }}" value="" required>
            </div>

            <div class="form-group">
              <label for="inp-slug">{{ __('Slug') }}</label>
              <input type="text" class="form-control" id="inp-slug" name="slug"  placeholder="{{ __('Enter Slug') }}" value="" required>
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

@endsection
