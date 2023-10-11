@extends('layouts.admin')

@section('content')
  <div class="card">
    <div class="d-sm-flex align-items-center justify-content-between">
      <h5 class=" mb-0 text-gray-800 pl-3">{{ __('Add Language') }} <a class="btn btn-primary btn-rounded btn-sm" href="{{route('admin.tlang.index')}}"><i class="fas fa-arrow-left"></i> {{ __('Back') }}</a></h5>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">{{ __('Language Settings') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.tlang.index') }}">{{ __('Admin Panel Language') }}</a></li>
        <li class="breadcrumb-item"><a href="{{route('admin.tlang.create')}}">{{ __('Add Language') }}</a></li>
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
          
          <form class="geniusform" action="{{route('admin.tlang.create')}}" method="POST" enctype="multipart/form-data">
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
                        <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">New Conversation(s).</textarea>
                      </div>

                      <div class="col-lg-6">
                        <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">New Conversation(s).</textarea>
                      </div>
                    </div>
                  </div>


                  <div class="lang-area mb-3">
                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                    <div class="row">
                      <div class="col-lg-6">
                        <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">You Have a New Message.</textarea>
                      </div>

                      <div class="col-lg-6">
                        <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">You Have a New Message.</textarea>
                      </div>
                    </div>
                  </div>


                  <div class="lang-area mb-3">
                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                    <div class="row">
                      <div class="col-lg-6">
                        <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Product(s) in Low Quantity.</textarea>
                      </div>

                      <div class="col-lg-6">
                        <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Product(s) in Low Quantity.</textarea>
                      </div>
                    </div>
                  </div>


                  <div class="lang-area mb-3">
                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                    <div class="row">
                      <div class="col-lg-6">
                        <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Stock</textarea>
                      </div>

                      <div class="col-lg-6">
                        <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Stock</textarea>
                      </div>
                    </div>
                  </div>


                  <div class="lang-area mb-3">
                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                    <div class="row">
                      <div class="col-lg-6">
                        <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">New Notification(s).</textarea>
                      </div>

                      <div class="col-lg-6">
                        <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">New Notification(s).</textarea>
                      </div>
                    </div>
                  </div>


                  <div class="lang-area mb-3">
                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                    <div class="row">
                      <div class="col-lg-6">
                        <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">A New User Has Registered.</textarea>
                      </div>

                      <div class="col-lg-6">
                        <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">A New User Has Registered.</textarea>
                      </div>
                    </div>
                  </div>


                  <div class="lang-area mb-3">
                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                    <div class="row">
                      <div class="col-lg-6">
                        <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">New Order(s).</textarea>
                      </div>

                      <div class="col-lg-6">
                        <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">New Order(s).</textarea>
                      </div>
                    </div>
                  </div>


                  <div class="lang-area mb-3">
                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                    <div class="row">
                      <div class="col-lg-6">
                        <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">You Have a new order.</textarea>
                      </div>

                      <div class="col-lg-6">
                        <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">You Have a new order.</textarea>
                      </div>
                    </div>
                  </div>


                  <div class="lang-area mb-3">
                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                    <div class="row">
                      <div class="col-lg-6">
                        <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Clear All</textarea>
                      </div>

                      <div class="col-lg-6">
                        <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Clear All</textarea>
                      </div>
                    </div>
                  </div>


                  <div class="lang-area mb-3">
                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                    <div class="row">
                      <div class="col-lg-6">
                        <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">No New Notifications.</textarea>
                      </div>

                      <div class="col-lg-6">
                        <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">No New Notifications.</textarea>
                      </div>
                    </div>
                  </div>


                  <div class="lang-area mb-3">
                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                    <div class="row">
                      <div class="col-lg-6">
                        <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Welcome!</textarea>
                      </div>

                      <div class="col-lg-6">
                        <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Welcome!</textarea>
                      </div>
                    </div>
                  </div>


                  <div class="lang-area mb-3">
                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                    <div class="row">
                      <div class="col-lg-6">
                        <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Edit Profile</textarea>
                      </div>

                      <div class="col-lg-6">
                        <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Edit Profile</textarea>
                      </div>
                    </div>
                  </div>


                  <div class="lang-area mb-3">
                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                    <div class="row">
                      <div class="col-lg-6">
                        <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Change Password</textarea>
                      </div>

                      <div class="col-lg-6">
                        <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Change Password</textarea>
                      </div>
                    </div>
                  </div>


                  <div class="lang-area mb-3">
                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                    <div class="row">
                      <div class="col-lg-6">
                        <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Logout</textarea>
                      </div>

                      <div class="col-lg-6">
                        <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Logout</textarea>
                      </div>
                    </div>
                  </div>


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
                        <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">All Orders</textarea>
                      </div>

                      <div class="col-lg-6">
                        <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">All Orders</textarea>
                      </div>
                    </div>
                  </div>


                  <div class="lang-area mb-3">
                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                    <div class="row">
                      <div class="col-lg-6">
                        <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Pending Orders</textarea>
                      </div>

                      <div class="col-lg-6">
                        <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Pending Orders</textarea>
                      </div>
                    </div>
                  </div>


                  <div class="lang-area mb-3">
                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                    <div class="row">
                      <div class="col-lg-6">
                        <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Processing Orders</textarea>
                      </div>

                      <div class="col-lg-6">
                        <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Processing Orders</textarea>
                      </div>
                    </div>
                  </div>


                  <div class="lang-area mb-3">
                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                    <div class="row">
                      <div class="col-lg-6">
                        <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Completed Orders</textarea>
                      </div>

                      <div class="col-lg-6">
                        <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Completed Orders</textarea>
                      </div>
                    </div>
                  </div>


                  <div class="lang-area mb-3">
                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                    <div class="row">
                      <div class="col-lg-6">
                        <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Declined Orders</textarea>
                      </div>

                      <div class="col-lg-6">
                        <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Declined Orders</textarea>
                      </div>
                    </div>
                  </div>


                  <div class="lang-area mb-3">
                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                    <div class="row">
                      <div class="col-lg-6">
                        <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Products</textarea>
                      </div>

                      <div class="col-lg-6">
                        <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Products</textarea>
                      </div>
                    </div>
                  </div>


                  <div class="lang-area mb-3">
                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                    <div class="row">
                      <div class="col-lg-6">
                        <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Add New Product</textarea>
                      </div>

                      <div class="col-lg-6">
                        <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Add New Product</textarea>
                      </div>
                    </div>
                  </div>


                  <div class="lang-area mb-3">
                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                    <div class="row">
                      <div class="col-lg-6">
                        <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">All Products</textarea>
                      </div>

                      <div class="col-lg-6">
                        <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">All Products</textarea>
                      </div>
                    </div>
                  </div>


                  <div class="lang-area mb-3">
                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                    <div class="row">
                      <div class="col-lg-6">
                        <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Deactivated Product</textarea>
                      </div>

                      <div class="col-lg-6">
                        <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Deactivated Product</textarea>
                      </div>
                    </div>
                  </div>


                  <div class="lang-area mb-3">
                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                    <div class="row">
                      <div class="col-lg-6">
                        <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Affiliate Products</textarea>
                      </div>

                      <div class="col-lg-6">
                        <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Affiliate Products</textarea>
                      </div>
                    </div>
                  </div>


                  <div class="lang-area mb-3">
                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                    <div class="row">
                      <div class="col-lg-6">
                        <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Add Affiliate Product</textarea>
                      </div>

                      <div class="col-lg-6">
                        <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Add Affiliate Product</textarea>
                      </div>
                    </div>
                  </div>


                  <div class="lang-area mb-3">
                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                    <div class="row">
                      <div class="col-lg-6">
                        <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">All Affiliate Products</textarea>
                      </div>

                      <div class="col-lg-6">
                        <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">All Affiliate Products</textarea>
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
                        <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Customers List</textarea>
                      </div>

                      <div class="col-lg-6">
                        <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Customers List</textarea>
                      </div>
                    </div>
                  </div>


                  <div class="lang-area mb-3">
                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                    <div class="row">
                      <div class="col-lg-6">
                        <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Withdraws</textarea>
                      </div>

                      <div class="col-lg-6">
                        <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Withdraws</textarea>
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
                        <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Vendors List</textarea>
                      </div>

                      <div class="col-lg-6">
                        <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Vendors List</textarea>
                      </div>
                    </div>
                  </div>


                  <div class="lang-area mb-3">
                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                    <div class="row">
                      <div class="col-lg-6">
                        <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Vendor Subscriptions</textarea>
                      </div>

                      <div class="col-lg-6">
                        <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Vendor Subscriptions</textarea>
                      </div>
                    </div>
                  </div>


                  <div class="lang-area mb-3">
                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                    <div class="row">
                      <div class="col-lg-6">
                        <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Vendor Subscription Plans</textarea>
                      </div>

                      <div class="col-lg-6">
                        <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Vendor Subscription Plans</textarea>
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
                        <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Main Category</textarea>
                      </div>

                      <div class="col-lg-6">
                        <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Main Category</textarea>
                      </div>
                    </div>
                  </div>


                  <div class="lang-area mb-3">
                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                    <div class="row">
                      <div class="col-lg-6">
                        <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Sub Category</textarea>
                      </div>

                      <div class="col-lg-6">
                        <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Sub Category</textarea>
                      </div>
                    </div>
                  </div>


                  <div class="lang-area mb-3">
                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                    <div class="row">
                      <div class="col-lg-6">
                        <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Child Category</textarea>
                      </div>

                      <div class="col-lg-6">
                        <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Child Category</textarea>
                      </div>
                    </div>
                  </div>


                  <div class="lang-area mb-3">
                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                    <div class="row">
                      <div class="col-lg-6">
                        <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Bulk Product Upload</textarea>
                      </div>

                      <div class="col-lg-6">
                        <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Bulk Product Upload</textarea>
                      </div>
                    </div>
                  </div>


                  <div class="lang-area mb-3">
                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                    <div class="row">
                      <div class="col-lg-6">
                        <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Product Discussion</textarea>
                      </div>

                      <div class="col-lg-6">
                        <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Product Discussion</textarea>
                      </div>
                    </div>
                  </div>


                  <div class="lang-area mb-3">
                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                    <div class="row">
                      <div class="col-lg-6">
                        <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Product Reviews</textarea>
                      </div>

                      <div class="col-lg-6">
                        <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Product Reviews</textarea>
                      </div>
                    </div>
                  </div>


                  <div class="lang-area mb-3">
                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                    <div class="row">
                      <div class="col-lg-6">
                        <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Comments</textarea>
                      </div>

                      <div class="col-lg-6">
                        <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Comments</textarea>
                      </div>
                    </div>
                  </div>


                  <div class="lang-area mb-3">
                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                    <div class="row">
                      <div class="col-lg-6">
                        <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Set Coupons</textarea>
                      </div>

                      <div class="col-lg-6">
                        <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Set Coupons</textarea>
                      </div>
                    </div>
                  </div>


                  <div class="lang-area mb-3">
                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                    <div class="row">
                      <div class="col-lg-6">
                        <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Blog</textarea>
                      </div>

                      <div class="col-lg-6">
                        <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Blog</textarea>
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
                        <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Messages</textarea>
                      </div>

                      <div class="col-lg-6">
                        <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Messages</textarea>
                      </div>
                    </div>
                  </div>


                  <div class="lang-area mb-3">
                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                    <div class="row">
                      <div class="col-lg-6">
                        <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Tickets</textarea>
                      </div>

                      <div class="col-lg-6">
                        <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Tickets</textarea>
                      </div>
                    </div>
                  </div>


                  <div class="lang-area mb-3">
                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                    <div class="row">
                      <div class="col-lg-6">
                        <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Disputes</textarea>
                      </div>

                      <div class="col-lg-6">
                        <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Disputes</textarea>
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
                        <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Pickup Locations</textarea>
                      </div>

                      <div class="col-lg-6">
                        <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Pickup Locations</textarea>
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
                        <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Affiliate Information</textarea>
                      </div>

                      <div class="col-lg-6">
                        <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Affiliate Information</textarea>
                      </div>
                    </div>
                  </div>


                  <div class="lang-area mb-3">
                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                    <div class="row">
                      <div class="col-lg-6">
                        <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Popup Banner</textarea>
                      </div>

                      <div class="col-lg-6">
                        <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Popup Banner</textarea>
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
                        <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Sliders</textarea>
                      </div>

                      <div class="col-lg-6">
                        <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Sliders</textarea>
                      </div>
                    </div>
                  </div>


                  <div class="lang-area mb-3">
                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                    <div class="row">
                      <div class="col-lg-6">
                        <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Services</textarea>
                      </div>

                      <div class="col-lg-6">
                        <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Services</textarea>
                      </div>
                    </div>
                  </div>


                  <div class="lang-area mb-3">
                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                    <div class="row">
                      <div class="col-lg-6">
                        <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Right Side Banner1</textarea>
                      </div>

                      <div class="col-lg-6">
                        <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Right Side Banner1</textarea>
                      </div>
                    </div>
                  </div>


                  <div class="lang-area mb-3">
                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                    <div class="row">
                      <div class="col-lg-6">
                        <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Right Side Banner2</textarea>
                      </div>

                      <div class="col-lg-6">
                        <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Right Side Banner2</textarea>
                      </div>
                    </div>
                  </div>


                  <div class="lang-area mb-3">
                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                    <div class="row">
                      <div class="col-lg-6">
                        <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Top Small Banners</textarea>
                      </div>

                      <div class="col-lg-6">
                        <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Top Small Banners</textarea>
                      </div>
                    </div>
                  </div>


                  <div class="lang-area mb-3">
                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                    <div class="row">
                      <div class="col-lg-6">
                        <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Large Banners</textarea>
                      </div>

                      <div class="col-lg-6">
                        <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Large Banners</textarea>
                      </div>
                    </div>
                  </div>


                  <div class="lang-area mb-3">
                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                    <div class="row">
                      <div class="col-lg-6">
                        <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Bottom Small Banners</textarea>
                      </div>

                      <div class="col-lg-6">
                        <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Bottom Small Banners</textarea>
                      </div>
                    </div>
                  </div>


                  <div class="lang-area mb-3">
                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                    <div class="row">
                      <div class="col-lg-6">
                        <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Reviews</textarea>
                      </div>

                      <div class="col-lg-6">
                        <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Reviews</textarea>
                      </div>
                    </div>
                  </div>


                  <div class="lang-area mb-3">
                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                    <div class="row">
                      <div class="col-lg-6">
                        <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Partners</textarea>
                      </div>

                      <div class="col-lg-6">
                        <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Partners</textarea>
                      </div>
                    </div>
                  </div>


                  <div class="lang-area mb-3">
                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                    <div class="row">
                      <div class="col-lg-6">
                        <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Home Page Customization</textarea>
                      </div>

                      <div class="col-lg-6">
                        <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Home Page Customization</textarea>
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
                        <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Payment Information</textarea>
                      </div>

                      <div class="col-lg-6">
                        <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Payment Information</textarea>
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
                        <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Popular Products</textarea>
                      </div>

                      <div class="col-lg-6">
                        <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Popular Products</textarea>
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
                        <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Manage Staffs</textarea>
                      </div>

                      <div class="col-lg-6">
                        <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Manage Staffs</textarea>
                      </div>
                    </div>
                  </div>


                  <div class="lang-area mb-3">
                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                    <div class="row">
                      <div class="col-lg-6">
                        <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">System Activation</textarea>
                      </div>

                      <div class="col-lg-6">
                        <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">System Activation</textarea>
                      </div>
                    </div>
                  </div>


                  <div class="lang-area mb-3">
                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                    <div class="row">
                      <div class="col-lg-6">
                        <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Activation</textarea>
                      </div>

                      <div class="col-lg-6">
                        <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Activation</textarea>
                      </div>
                    </div>
                  </div>


                  <div class="lang-area mb-3">
                    <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                    <div class="row">
                      <div class="col-lg-6">
                        <textarea name="keys[]" class="form-control" placeholder="Enter Language Key" readonly="">Generate Backup</textarea>
                      </div>

                      <div class="col-lg-6">
                        <textarea name="values[]" class="form-control" placeholder="Enter Language Value" required="">Generate Backup</textarea>
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
