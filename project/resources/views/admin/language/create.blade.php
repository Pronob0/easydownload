@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="d-sm-flex align-items-center justify-content-between">
    <h5 class=" mb-0 text-gray-800 pl-3">{{ __('Add Language') }} <a class="btn btn-primary btn-rounded btn-sm" href="{{route('admin.lang.index')}}"><i class="fas fa-arrow-left"></i> {{ __('Back') }}</a></h5>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">{{ __('Language Settings') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.lang.index') }}">{{ __('Website Language') }}</a></li>
        <li class="breadcrumb-item"><a href="{{route('admin.lang.create')}}">{{ __('Add Language') }}</a></li>
    </ol>
    </div>
</div>

<div class="row justify-content-center mt-3">
  <div class="col-lg-12">
    <!-- Form Basic -->
    <div class="card mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      </div>

      <div class="card-body">
        
        <form class="geniusform" action="{{route('admin.lang.create')}}" method="POST" enctype="multipart/form-data">
          {{csrf_field()}}
          @include('includes.admin.form-both')

          <div class="row">
            <div class="col-lg-4">
              <div class="left-area">
                  <h6 class="heading float-right">{{ __('Language') }} *</h6>
              </div>
            </div>
            <div class="col-lg-7">
              <input type="text" class="input-field" name="language" placeholder="{{ __('Language') }}" required="" value="English">
            </div>
          </div>


          <div class="row">
            <div class="col-lg-4">
              <div class="left-area">
                  <h6 class="heading float-right">{{ __('Language Direction') }} *</h6>
              </div>
            </div>
            <div class="col-lg-7">
              <select name="rtl" class="input-field" required="">
                <option value="0">{{ __('Left To Right') }}</option>
                <option value="1">{{ __('Right To Left') }}</option>
              </select>
            </div>
          </div>


        <hr>

          <h4 class="text-center">{{ __('SET LANGUAGE KEYS & VALUES') }}</h4>

        <hr>

        <div class="row mb-3">

          <div class="col-lg-2">
            <div class="left-area">
            </div>
          </div>

            <div class="col-lg-4">
              <h5><b>Main Languages</b></h5>
            </div>

            <div class="col-lg-5">
              <h5><b>Translated Languages</b></h5>
            </div>

        </div>


        <div class="row">
          <div class="col-lg-2">
            <div class="left-area">

            </div>
          </div>
         <div class="col-lg-8">
            <div class="featured-keyword-area">
              <div class="lang-tag-top-filds" id="lang-section">



                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Dashboard</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Dashboard</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Manage Categories</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Manage Categories</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Main Categories</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Main Categories</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Subcategories</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Subcategories</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Manage Students</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Manage Students</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Student Lists</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Student Lists</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Enroll History</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Enroll History</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Manage Instructors</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Manage Instructors</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Instructors List</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Instructors List</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Instructors Request</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Instructors Request</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Manage Courses</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Manage Courses</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Course List</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Course List</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Purhchase History</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Purhchase History</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Manage Blog</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Manage Blog</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Categories</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Categories</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Posts</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Posts</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">General Settings</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">General Settings</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Logo</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Logo</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Favicon</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Favicon</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Loader</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Loader</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Breadcumb Banner</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Breadcumb Banner</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Error Banner</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Error Banner</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Website Contents</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Website Contents</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Home Page Settings</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Home Page Settings</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Hero Section</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Hero Section</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Service Section</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Service Section</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Instructor Section</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Instructor Section</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Menu Page Settings</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Menu Page Settings</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">FAQ Page</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">FAQ Page</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Contact Us Page</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Contact Us Page</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Other Pages</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Other Pages</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Email Settings</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Email Settings</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Email Template</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Email Template</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Email Configurations</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Email Configurations</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Group Email</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Group Email</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Payment Settings</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Payment Settings</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Currencies</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Currencies</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Payment Gateways</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Payment Gateways</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Social Settings</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Social Settings</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Social Links</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Social Links</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Facebook Login</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Facebook Login</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Google Login</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Google Login</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Language Settings</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Language Settings</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Website Language</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Website Language</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Admin Panel Language</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Admin Panel Language</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Name</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Name</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Slug</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Slug</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Status</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Status</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Options</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Options</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Update Status</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Update Status</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">You are about to change the status.</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">You are about to change the status.</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Do you want to proceed?</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Do you want to proceed?</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Cancel</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Cancel</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Update</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Update</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Confirm Delete</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Confirm Delete</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">You are about to delete this Category. Every informtation under this category will be deleted.</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">You are about to delete this Category. Every informtation under this category will be deleted.</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Edit Category</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Edit Category</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Delete</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Delete</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Add New Category</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Add New Category</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Add New Category Form</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Add New Category Form</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Preferred Size 600 X 600</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Preferred Size 600 X 600</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Upload Picture</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Upload Picture</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Enter Name</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Enter Name</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Enter Slug</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Enter Slug</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Check if this course is top category</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Check if this course is top category</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Submit</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Submit</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Edit Category Form</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Edit Category Form</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Manage Student</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Manage Student</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Photo</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Photo</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Email</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Email</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Action</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Action</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Close</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Close</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">You are about to delete this Student. Every informtation under this student will be deleted.</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">You are about to delete this Student. Every informtation under this student will be deleted.</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Add New Student</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Add New Student</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Add New Student Form</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Add New Student Form</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Basic Information</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Basic Information</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Login credentials</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Login credentials</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">First Name</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">First Name</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Last Name</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Last Name</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">User image</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">User image</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Next</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Next</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Password</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Password</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Prev</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Prev</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Edit Student</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Edit Student</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Edit Student Form</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Edit Student Form</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">You are about to delete this instructor. Every informtation under this instructor will be deleted.</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">You are about to delete this instructor. Every informtation under this instructor will be deleted.</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Add New Instructor</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Add New Instructor</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Add New Instructor Form</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Add New Instructor Form</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Social information</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Social information</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Instructor Name</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Instructor Name</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Address</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Address</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Phone</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Phone</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Biography</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Biography</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Instructors image</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Instructors image</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Facebook</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Facebook</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Twitter</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Twitter</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Linkedin</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Linkedin</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Provide requirements</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Provide requirements</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Provide outcomes</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Provide outcomes</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Edit Instructor</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Edit Instructor</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Edit Instructor Form</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Edit Instructor Form</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Details</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Details</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Document</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Document</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Applicant details</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Applicant details</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Applicant</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Applicant</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Phone number</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Phone number</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Message</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Message</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Pending</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Pending</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Approve</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Approve</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Price</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Price</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">You are about to delete this Course. Every informtation under this course will be deleted.</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">You are about to delete this Course. Every informtation under this course will be deleted.</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Add New Course</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Add New Course</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Add New Course Form</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Add New Course Form</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Basic</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Basic</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Requirements</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Requirements</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Outcomes</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Outcomes</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Includes</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Includes</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Pricing</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Pricing</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Media</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Media</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Seo</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Seo</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Language</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Language</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Course Title</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Course Title</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Category</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Category</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Select a category</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Select a category</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Level</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Level</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Beginner</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Beginner</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Intermediate</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Intermediate</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Advanced</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Advanced</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Short Description</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Short Description</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Description</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Description</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Check if this course is top course</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Check if this course is top course</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Icon Here</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Icon Here</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Check if this course is free course</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Check if this course is free course</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Course price</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Course price</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Discount price</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Discount price</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Set 0 if you don't want to adddiscount price</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Set 0 if you don't want to adddiscount price</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Course Overview Type</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Course Overview Type</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Youtube</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Youtube</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Vimeo</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Vimeo</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Html5</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Html5</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Course Overview Url</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Course Overview Url</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Course Thumbnail</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Course Thumbnail</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Meta Keywords</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Meta Keywords</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Seperated By Comma(,)</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Seperated By Comma(,)</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Meta Description</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Meta Description</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Edit Course</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Edit Course</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Edit Course Form</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Edit Course Form</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Review the course materials to expand your learning.</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Review the course materials to expand your learning.</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">You got</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">You got</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Out of</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Out of</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Correct.</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Correct.</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Submitted Answers</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Submitted Answers</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Take again</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Take again</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Quiz Title</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Quiz Title</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Get started</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Get started</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Question</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Question</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Check Answers</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Check Answers</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Set Curriculam</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Set Curriculam</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Add Section</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Add Section</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Add Lesson</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Add Lesson</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Add Quiz</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Add Quiz</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Sort Sections</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Sort Sections</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">View On Frontend</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">View On Frontend</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Section</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Section</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Sort Lesson</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Sort Lesson</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Edit Section</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Edit Section</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Delete Section</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Delete Section</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Lesson</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Lesson</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Select File</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Select File</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Duration</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Duration</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Link</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Link</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Attachment</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Attachment</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Must be type of .jpg, .jpeg, .png</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Must be type of .jpg, .jpeg, .png</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Iframe Embed Code</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Iframe Embed Code</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Enter Iframe Embed Code</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Enter Iframe Embed Code</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Option</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Option</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Add New Lesson</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Add New Lesson</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Title</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Title</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Enter Title</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Enter Title</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Iframe</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Iframe</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Image</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Image</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Enter Youtube Video Link</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Enter Youtube Video Link</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Enter Details</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Enter Details</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Add New Quiz</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Add New Quiz</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Select Section</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Select Section</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Add New Question</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Add New Question</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Question title</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Question title</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Number of options</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Number of options</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Edit Question</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Edit Question</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Manage Quiz Questions</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Manage Quiz Questions</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Sort Lessons</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Sort Lessons</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Add New Section</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Add New Section</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Enter Section Title</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Enter Section Title</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">You are about to delete this Section. Every informtation under this section will be deleted.</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">You are about to delete this Section. Every informtation under this section will be deleted.</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Update Sorting</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Update Sorting</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Enter Link</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Enter Link</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Must be type of .jpg, .jpeg, .png, .gif</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Must be type of .jpg, .jpeg, .png, .gif</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Questions of</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Questions of</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">#Order</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">#Order</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Date</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Date</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Payment Type</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Payment Type</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Featured Image</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Featured Image</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Post Title</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Post Title</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Views</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Views</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">You are about to delete this Blog.</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">You are about to delete this Blog.</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Add New Post</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Add New Post</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Post</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Post</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Add New Post Form</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Add New Post Form</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Select Category</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Select Category</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Tags</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Tags</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Source</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Source</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Allow Blog SEO</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Allow Blog SEO</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Meta Tags</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Meta Tags</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Edit Post</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Edit Post</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Edit Post Form</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Edit Post Form</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Website Logo</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Website Logo</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Header Logo</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Header Logo</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Footer Logo</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Footer Logo</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Admin Panel Logo</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Admin Panel Logo</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Website Favicon</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Website Favicon</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Website Loader</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Website Loader</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Activated</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Activated</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Deactivated</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Deactivated</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Activate</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Activate</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Deactivate</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Deactivate</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Admin Loader</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Admin Loader</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Website Contents Form</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Website Contents Form</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Website Title</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Website Title</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Enter Website Title</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Enter Website Title</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Use HTTPS</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Use HTTPS</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Website Color</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Website Color</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Copyright Text</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Copyright Text</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Contact Us</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Contact Us</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Contact Us Email Address</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Contact Us Email Address</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Website</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Website</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Fax</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Fax</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Street Address</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Street Address</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Instructor Section Form</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Instructor Section Form</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Header</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Header</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Footer</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Footer</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">You are about to delete this Page. Every informtation under this page will be deleted.</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">You are about to delete this Page. Every informtation under this page will be deleted.</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Add New Page</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Add New Page</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Add New Page Form</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Add New Page Form</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Edit Page</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Edit Page</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">SEO Tools</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">SEO Tools</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Google Analytics</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Google Analytics</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Website Meta Keywords</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Website Meta Keywords</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Subscribers</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Subscribers</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Email Templates</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Email Templates</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Email Type</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Email Type</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Email Subject</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Email Subject</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">You are about to delete this Email. Everything will be deleted under this Email.</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">You are about to delete this Email. Everything will be deleted under this Email.</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">SMTP</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">SMTP</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Mail Driver</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Mail Driver</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">SENDMAIL</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">SENDMAIL</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Mail Host</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Mail Host</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Mail Port</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Mail Port</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Mail Encryption</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Mail Encryption</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Mail Username</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Mail Username</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Mail Password</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Mail Password</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">From Email</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">From Email</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">From Name</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">From Name</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Edit Template</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Edit Template</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Meaning</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Meaning</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">BB Code</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">BB Code</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Customer Name</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Customer Name</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Order Amount</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Order Amount</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Admin Name</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Admin Name</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Admin Email</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Admin Email</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Order Number</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Order Number</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Email Body</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Email Body</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">(In Any Language)</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">(In Any Language)</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Select User Type</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Select User Type</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Choose User Type</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Choose User Type</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Customers</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Customers</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Vendors</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Vendors</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Manage Currencies</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Manage Currencies</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Currency</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Currency</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Sign</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Sign</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Value</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Value</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">You are about to delete this Currency.</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">You are about to delete this Currency.</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Add New Currency</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Add New Currency</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Main Currency</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Main Currency</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Add New Currency Form</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Add New Currency Form</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Currency Name</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Currency Name</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Enter Currency Name</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Enter Currency Name</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Currency sign</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Currency sign</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Enter Currency Sign</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Enter Currency Sign</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Enter Currency Value</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Enter Currency Value</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Edit Currency</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Edit Currency</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Edit Currency Form</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Edit Currency Form</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">You are about to delete this Payment.</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">You are about to delete this Payment.</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Edit Payment Gateway</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Edit Payment Gateway</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Edit Payment</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Edit Payment</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Edit Payment Form</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Edit Payment Form</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Set Picture</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Set Picture</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Enter Subtitle</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Enter Subtitle</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">App ID</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">App ID</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">(Get Your App ID from developers.facebook.com)</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">(Get Your App ID from developers.facebook.com)</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Enter App Secret</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Enter App Secret</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Website URL</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Website URL</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Valid OAuth Redirect URI</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Valid OAuth Redirect URI</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">(Copy this url and paste it to your Valid OAuth Redirect URI in developers.facebook.com.)</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">(Copy this url and paste it to your Valid OAuth Redirect URI in developers.facebook.com.)</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Enter Site URL</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Enter Site URL</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Client ID</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Client ID</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">(Get Your Client ID from console.cloud.google.com)</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">(Get Your Client ID from console.cloud.google.com)</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Enter Client ID</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Enter Client ID</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Client Secret</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Client Secret</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">(Get Your Client Secret from console.cloud.google.com)</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">(Get Your Client Secret from console.cloud.google.com)</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Enter Client Secret</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Enter Client Secret</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Redirect URL</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Redirect URL</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">(Copy this url and paste it to your Redirect URL in console.cloud.google.com.)</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">(Copy this url and paste it to your Redirect URL in console.cloud.google.com.)</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Google Plus</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Google Plus</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Dribble</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Dribble</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">You are about to delete this Language. Every informtation under this Language will be deleted.</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">You are about to delete this Language. Every informtation under this Language will be deleted.</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Add New Language</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Add New Language</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Edit Language</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Edit Language</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Edit Language Form</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Edit Language Form</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">SET LANGUAGE KEYS &amp; VALUES</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">SET LANGUAGE KEYS &amp; VALUES</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Enter Language Key</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Enter Language Key</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Enter Language Value</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Enter Language Value</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Language Direction</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Language Direction</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Left To Right</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Left To Right</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Right To Left</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Right To Left</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Add More Field</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Add More Field</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Google Analytics Script</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Google Analytics Script</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">#Sl</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">#Sl</textarea>
                    </div>
                  </div>
                </div>


                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Application submit successfully</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Application submit successfully</textarea>
                    </div>
                  </div>
                </div>

                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Become an instructor</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Become an instructor</textarea>
                    </div>
                  </div>
                </div>

                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed velit officiis accusamus tenetur totam magnam sunt eveniet quos porro dignissimos neque, quaerat tempora nostrum.</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed velit officiis accusamus tenetur totam magnam sunt eveniet quos porro dignissimos neque, quaerat tempora nostrum.</textarea>
                    </div>
                  </div>
                </div>

                <div class="lang-area mb-3">
                  <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                  <div class="row">
                    <div class="col-lg-6">
                      <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Become An Instructor</textarea>
                    </div>

                    <div class="col-lg-6">
                      <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Become An Instructor</textarea>
                    </div>
                  </div>
                </div>


              </div>

              <a href="javascript:;" id="lang-btn" class="add-fild-btn d-flex justify-content-center"><i class="icofont-plus"></i> {{__('Add More Field')}}</a>
            </div>
          </div>


          <div class="col-lg-2">
            <div class="left-area">

            </div>
          </div>

        </div>
          <div class="row justify-content-center mt-4">
            <button type="submit" id="submit-btn" class="btn btn-primary">{{ __('Submit') }}</button>
          </div>
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
  <script type="text/javascript">

    function isEmpty(el){
        return !$.trim(el.html())
    }


  $("#lang-btn").on('click', function(){

      $("#lang-section").append(''+
                                  '<div class="lang-area mb-3">'+
                                    '<span class="remove lang-remove"><i class="fas fa-times"></i></span>'+
                                    '<div class="row">'+
                                      '<div class="col-lg-6">'+
                                      '<textarea name="keys[]" class="form-control" placeholder="{{ __('Enter Language Key') }}" required=""></textarea>'+
                                      '</div>'+
                                      '<div class="col-lg-6">'+
                                      '<textarea  name="values[]" class="form-control" placeholder="{{ __('Enter Language Value') }}" required=""></textarea>'+
                                      '</div>'+
                                    '</div>'+
                                  '</div>'+
                              '');

  });

  $(document).on('click','.lang-remove', function(){

      $(this.parentNode).remove();
      if (isEmpty($('#lang-section'))) {

      $("#lang-section").append(''+
                                  '<div class="lang-area">'+
                                    '<span class="remove lang-remove"><i class="fas fa-times"></i></span>'+
                                    '<div class="row">'+
                                      '<div class="col-lg-6">'+
                                      '<textarea name="keys[]" class="form-control" placeholder="{{ __('Enter Language Key') }}" required=""></textarea>'+
                                      '</div>'+
                                      '<div class="col-lg-6">'+
                                      '<textarea  name="values[]" class="form-control" placeholder="{{ __('Enter Language Value') }}" required=""></textarea>'+
                                      '</div>'+
                                    '</div>'+
                                  '</div>'+
                              '');


      }

  });

  </script>
@endsection

