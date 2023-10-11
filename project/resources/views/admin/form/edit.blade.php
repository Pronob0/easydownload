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
      <li class="breadcrumb-item"><a href="javascript:;">{{ __('Category Management') }}</a></li>
      <li class="breadcrumb-item"><a href="javascript:;">{{ __('Edit Form') }}</a></li>
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
                <div class="col-md-6 offset-md-3">

                  <form class="" action="{{route('admin.form.update')}}" method="post" enctype="multipart/form-data">
                      {{csrf_field()}}
                      <input type="hidden" name="field_id" value="{{$field->id}}">
                      <input type="hidden" name="category_id" value="{{$field->category->id}}">
                      <input type="hidden" name="type" value="{{$field->type}}">

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                               <label for=""><strong>Required</strong></label>
                               <div class="">
                                 <input type="radio" name="required" {{$field->required == 1 ? 'checked' : ''}} value="1"> Yes
                                 <input class="ml-2" type="radio" name="required" {{$field->required == 0 ? 'checked' : ''}} value="0"> No
                               </div>
                               @if ($errors->has('required'))
                                 <p class="text-danger mb-0">{{$errors->first('required')}}</p>
                               @endif
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                               <label for=""><strong>Label Name</strong></label>
                               <div class="">
                                 <input type="text" class="form-control" name="label" value="{{$field->label}}" placeholder="Enter Label Name">
                               </div>
                               @if ($errors->has('label'))
                                 <p class="text-danger mb-0">{{$errors->first('label')}}</p>
                               @endif
                          </div>
                        </div>
                      </div>

                      @if ($field->type != 3 && $field->type != 5)
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                                 <label for=""><strong>Placeholder</strong></label>
                                 <div class="">
                                   <input type="text" class="form-control" name="placeholder" value="{{$field->placeholder}}" placeholder="Enter Placeholder">
                                 </div>
                                 @if ($errors->has('placeholder'))
                                   <p class="text-danger mb-0">{{$errors->first('placeholder')}}</p>
                                 @endif
                            </div>
                          </div>
                        </div>
                      @endif

                      @if ($field->type == 2 || $field->type == 3 || $field->type == 5)
                      <div class="row" id="optionarea">
                        <div class="col-md-12">
                          <div class="form-group">
                               <label for=""><strong>Options</strong></label>
                               <div class="row mb-2 counterrow" v-for="n in counter" :id="'counterrow'+n">
                                 <div class="col-md-9">
                                   <input :id="'optionfield'+n" class="form-control optionin" :type="names[n-1] == 'text_field_type' ? 'hidden' : 'text'" name="options[]" :value="names[n-1]" placeholder="Option label">
                                 </div>
                                 <div class="col-md-1">
                                   <button type="button" class="btn btn-danger text-white" @click="removeOption(n)"><i class="fa fa-times"></i></button>
                                 </div>
                               </div>
                               <button type="button" class="btn btn-success text-white" @click="addOption()"><i class="fa fa-plus"></i> Add Option</button>
                               @if ($errors->has('options.*') || $errors->has('options'))
                                 <p class="text-danger mb-0">{{$errors->first('options.*')}}</p>
                                 <p class="text-danger mb-0">{{$errors->first('options')}}</p>
                               @endif
                          </div>
                        </div>
                      </div>
                      @endif

                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                               <label for=""><strong>Note (Optional)</strong></label>
                               <div class="">
                                 <textarea class="form-control" name="note" placeholder="Enter Note" rows="3" cols="80">{{$field->note}}</textarea>
                               </div>
                               @if ($errors->has('note'))
                                 <p class="mb-0 text-danger">{{ $errors->first('note') }}</p>
                               @endif
                          </div>
                        </div>
                      </div>

                      <div class="text-left">
                        <button type="submit" class="btn btn-primary">UPDATE FIELD</button>
                      </div>
                  </form>

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
    var app = new Vue({
      el: '#app',
      data: {
        counter: parseInt('{{$counter}}'),
        names: []
      },
      created() {
        $.get("{{route('admin.field.options', $field->id)}}", (data) => {
          for (var i = 0; i < data.length; i++) {
            this.names.push(data[i].name);
          }
        });
      },
      methods: {
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
