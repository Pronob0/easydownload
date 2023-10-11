@extends('layouts.admin')

@section('content')


<div class="card">
    <div class="d-sm-flex align-items-center justify-content-between">
    <h5 class=" mb-0 text-gray-800 pl-3">{{ __('Register Bonus') }}</h5>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">{{ __('Users') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.user.bonus') }}">{{ __('Register Bonus') }}</a></li>
    </ol>
    </div>
</div>

<div class="row justify-content-center mt-3">
    <div class="col-lg-6">
      <!-- Form Basic -->
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">{{ __('Register Bonus') }}</h6>
        </div>

        <div class="card-body">

          <form class="geniusform" action="{{ route('admin.bonus.update') }}" method="POST" enctype="multipart/form-data">

              @include('includes.admin.form-both')
              {{ csrf_field() }}
              <div class="form-group">
                  <label for="inp-Fee">{{  __('Bonus Amount In USD')  }} <small>({{__('Leave 0 if you don\'t want to add')}})</small></label>
                  <input type="text" class="form-control" id="inp-Fee" placeholder="{{  __('Bonus Amount')  }}" name="bonus"  value="{{ $bonus->bonus }}" required>
              </div>

              <div class="form-group">
                <label for="inp-charge">{{  __('Status')  }}</label>
                <select class="form-control" name="status" >
                    <option value="" >{{ __('Select Status') }}</option>
                    <option value="1" {{ $bonus->status==1 ? 'selected':'' }}>{{ __('Active') }}</option>
                    <option value="0"{{ $bonus->status==0 ? 'selected':'' }}>{{ __('Deactive') }}</option>

                  </select>

            </div>
              <button type="submit" id="submit-btn" class="btn btn-primary">{{ __('Update') }}</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!--Row-->

@endsection
