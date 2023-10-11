@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="d-sm-flex align-items-center justify-content-between">
        <h5 class=" mb-0 text-gray-800 pl-3">{{ __('Product Page') }}</h5>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
            <li class="breadcrumb-item"><a href="javascript:;">{{ __('General Settings') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.gs.theme') }}">{{ __('Product Page') }}</a></li>
        </ol>
    </div>
</div>


<div class="row mt-3 d-flex justify-content-center">

    <div class="col-lg-4">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">{{ __('List View') }}</h6>
            </div>

            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="gocover" style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>

                    <form class="" action="{{ route('admin.gs.update') }}" method="POST" enctype="multipart/form-data">

                        @include('includes.admin.form-both')

                        {{ csrf_field() }}

                        <input type="hidden" name="details" value="details-1">
                        <div class="form-group">
                            <div class="wrapper-image-preview-settings">
                                <div class="box-settings">
                                    <div class="back-preview-image" style="background-image: url({{asset('assets/images/list-view.png') }});"></div>
                                </div>
                            </div>
                        </div>

                        @if ($gs->details != 'details-1')
                            <button type="submit" id="submit-btn" class="btn btn-primary btn-block">{{ __('Update') }}</button>
                        @else 
                            <button type="submit" class="btn btn-dark m-auto btn-block" disabled>{{__('Current Product Page')}}</button>
                        @endif
                        
                    </form>
                </div>
            </div>
        </div>
    </div>



    <div class="col-lg-4">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">{{ __('Grid View') }}</h6>
            </div>

            <div class="card-body">
                <div class="row justify-content-center">
                    <form class="" action="{{ route('admin.gs.update') }}" method="POST" enctype="multipart/form-data">

                        @include('includes.admin.form-both')

                        {{ csrf_field() }}
                        <input type="hidden" name="details" value="details-2">


                        <div class="form-group">
                            <div class="wrapper-image-preview-settings">
                                <div class="box-settings">
                                    <div class="back-preview-image" style="background-image: url({{asset('assets/images/grid-view.png') }});"></div>
                                </div>
                            </div>
                        </div>

                        @if ($gs->details != 'details-2')
                            <button type="submit" id="submit-btn" class="btn btn-primary btn-block">{{ __('Update') }}</button>
                        @else 
                            <button type="submit" class="btn btn-dark btn-block m-auto" disabled>{{__('Current Details Page')}}</button>
                        @endif

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Row-->

@endsection
