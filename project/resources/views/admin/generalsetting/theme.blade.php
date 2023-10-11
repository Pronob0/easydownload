@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="d-sm-flex align-items-center justify-content-between">
        <h5 class=" mb-0 text-gray-800 pl-3">{{ __('Website Theme') }}</h5>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
            <li class="breadcrumb-item"><a href="javascript:;">{{ __('General Settings') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.gs.theme') }}">{{ __('Website Theme') }}</a></li>
        </ol>
    </div>
</div>


<div class="row mt-3">

    <div class="col-lg-4">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">{{ __('Theme 1') }}</h6>
            </div>

            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="gocover" style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>

                    <form class="" action="{{ route('admin.gs.update') }}" method="POST" enctype="multipart/form-data">

                        @include('includes.admin.form-both')

                        {{ csrf_field() }}

                        <input type="hidden" name="theme" value="theme1">
                        <div class="form-group">
                            <div class="wrapper-image-preview-settings">
                                <div class="box-settings">
                                    <div class="back-preview-image" style="background-image: url({{asset('assets/images/theme-1.png') }});"></div>
                                </div>
                            </div>
                        </div>

                        @if ($gs->theme != 'theme1')
                            <button type="submit" id="submit-btn" class="btn btn-primary btn-block">{{ __('Update') }}</button>
                        @else 
                            <button type="submit" class="btn btn-dark m-auto btn-block" disabled>{{__('Current Theme')}}</button>
                        @endif
                        
                    </form>
                </div>
            </div>
        </div>
    </div>



    <div class="col-lg-4">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">{{ __('Theme 2') }}</h6>
            </div>

            <div class="card-body">
                <div class="row justify-content-center">
                    <form class="" action="{{ route('admin.gs.update') }}" method="POST" enctype="multipart/form-data">

                        @include('includes.admin.form-both')

                        {{ csrf_field() }}
                        <input type="hidden" name="theme" value="theme2">


                        <div class="form-group">
                            <div class="wrapper-image-preview-settings">
                                <div class="box-settings">
                                    <div class="back-preview-image" style="background-image: url({{asset('assets/images/theme-2.png') }});"></div>
                                </div>
                            </div>
                        </div>

                        @if ($gs->theme != 'theme2')
                            <button type="submit" id="submit-btn" class="btn btn-primary btn-block">{{ __('Update') }}</button>
                        @else 
                            <button type="submit" class="btn btn-dark m-auto btn-block" disabled>{{__('Current Theme')}}</button>
                        @endif

                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="col-lg-4">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">{{ __('Theme 3') }}</h6>
            </div>

            <div class="card-body">
                <div class="row justify-content-center">
                    <form class="" action="{{ route('admin.gs.update') }}" method="POST" enctype="multipart/form-data">

                        @include('includes.admin.form-both')

                        {{ csrf_field() }}
                        <input type="hidden" name="theme" value="theme3">
                        <div class="form-group">
                            <div class="wrapper-image-preview-settings">
                                <div class="box-settings">
                                    <div class="back-preview-image" style="background-image: url({{asset('assets/images/theme-3.png') }});"></div>
                                </div>
                            </div>
                        </div>

                        @if ($gs->theme != 'theme3')
                            <button type="submit" id="submit-btn" class="btn btn-primary btn-block">{{ __('Update') }}</button>
                        @else 
                            <button type="submit" class="btn btn-dark m-auto" disabled>{{__('Current Theme')}}</button>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
<!--Row-->

@endsection
