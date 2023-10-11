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
  <h5 class=" mb-0 text-gray-800 pl-3">{{ __('Categories') }} <a class="btn btn-primary btn-rounded btn-sm" href="{{route('admin.cat.index')}}"><i class="fas fa-arrow-left"></i> {{ __('Back') }}</a></h5>
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
      <li class="breadcrumb-item"><a href="javascript:;">{{ __('Categories') }}</a></li>
      <li class="breadcrumb-item"><a href="javascript:;">{{ __('Form Create') }}</a></li>
  </ol>
  </div>
</div>


  <div class="content-area">

    <div class="product-area">
      <div class="row">
        <div class="col-lg-12">
          <div class="py-5" id="app">
            @include('includes.admin.form-flash')
            <div class="add-product-content">
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  @includeif('admin.form.partials.attributes')

                  @includeif('admin.form.partials.create-attribute')

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script>
    'use strict';
    $(document).ready(function() {
      $(".modal-title").html("CREATE FORM");
    });
  </script>

  <script>
    'use strict';
    var app = new Vue({
      el: '#app',
      data: {
        type: {{!empty(old('type')) ? old('type') : 1}},
        placeholdershow: true,
        counter: 0
      },
      mounted() {
        this.typeChange();
      },
      methods: {
        typeChange() {
          if (this.type == 3) {
            this.placeholdershow = false;
          } else if (this.type == 5) {
            this.placeholdershow = false;
          } else {
            this.placeholdershow = true;
          }
          if (this.type == 2 || this.type == 3 || this.type == 5) {
            this.counter = 1;
          } else {
            this.counter = 0;
          }
        },
        addOption() {
          $("#optionarea").addClass('d-block');
          this.counter++;
        },
        removeOption(n) {
          $("#counterrow"+n).remove();
          if ($(".counterrow").length == 0) {
            this.counter = 0;
          }
        }
      }
    })
  </script>
@endsection
