@extends('layouts.front')

@section('content')

			<!-- ============================ Dashboard Header Start================================== -->
            @includeIf('includes.user.common')

			<!-- ========================== Dashboard Elements ============================= -->
			<section class="gray-light">
				<div class="container">
          <form id="geniusformdata" action="{{route('user.product.store')}}" enctype="multipart/form-data" method="POST">
              {{csrf_field()}}
              @include('includes.admin.form-both')
					<div class="row">

						<div class="col-lg-8 col-md-12 col-sm-12">
                <div class="lit98_jhy">
                    <div class="extra_ijyu98_head">
                        <h4>{{__('Add New Product Form')}}</h4>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="font-weight-bold" for="title">{{ __('Name') }}*</label>
                        <input type="text" class="form-control" id="name" name="name"  placeholder="{{ __('Enter Name') }}" value="" required>
                        <small>{{__('( Maximum 100 characters. No HTML or emoji allowed. )')}}</small>
                    </div>
                    <input type="hidden" name="category" value="{{$category->id}}">

                    <div class="form-group">
                        <label class="font-weight-bold" for="inp-name">{{ __('Sub Category') }}</label>
                        <select id="subcat" class="form-control mb-3" name="subcategory_id">
                           <option value="">{{ __('Select Sub Category') }}</option>
                          @foreach ($subcategories as $sub)
                           <option data-href="{{ route('user.subcat.load',$sub->id) }}" value="{{ $sub->id }}">{{$sub->name}}</option>
                          @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                      <label class="font-weight-bold" for="inp-name">{{ __('Child Category') }}</label>
                      <select id="childcat" class="form-control mb-3" name="childcategory_id" disabled="">
                        <option value="">{{ __('Select Child Category') }}</option>
                      </select>
                    </div>
                    <div id="catAttributes"></div>

                  <div class="form-group">
                    <label class="font-weight-bold" for="details">{{ __('HTML Description ') }}</label>
                    <textarea class="form-control"  id="description" name="description" required rows="7" placeholder="{{__('Description')}}"></textarea>
                    <p class="mb-0">{{__('HTML or plain text allowed, no emoji.')}}</p>
                    <p>{{__("If you're linking to external images, please mind the page load speed: use few, compress them and host them on a fast server or CDN.")}}</p>
                  </div>

                </div>
                <br>

                {{-- second step --}}
                <div class="lit98_jhy">
                    <div class="extra_ijyu98_head">
                        <h4>{{__('Files')}}</h4>
                    </div>
                    <br>

                    <div class="form-group">
                        <label class="font-weight-bold">{{ __('Set Thumbnail Image') }} </label>
                        <div class="wrapper-image-preview">
                            <div class="box">
                                <div class="back-preview-image" style="background-image: url({{ asset('assets/images/placeholder.jpg') }});"></div>
                                <div class="upload-options">
                                    <label class="img-upload-label" for="img-upload"> <i class="fa fa-camera"></i> {{ __('Upload Picture') }} </label>
                                    <input id="img-upload" type="file" class="image-upload" name="thumbnail_imagename" accept="image/*">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="font-weight-bold">{{ __('Set Preview Image') }} </label>
                        <div class="wrapper-image-preview">
                            <div class="box">
                                <div class="back-preview-image" style="background-image: url({{ asset('assets/images/placeholder.jpg') }});"></div>
                                <div class="upload-options">
                                    <label class="img-upload-label" for="img-upload1"> <i class="fa fa-camera"></i> {{ __('Upload Picture') }} </label>
                                    <input id="img-upload1" type="file" class="image-upload1" name="preview_imagename" accept="image/*">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="main">{{ __('Main File') }}</label>
                        <input type="file" name="main_filename" class="form-control border-0">
                      </div>
                      <div class="form-group">
                        <label for="main">{{ __('Preview Screenshoot') }}</label>
                        <input type="file" name="preview_screenshots_filename[]" class="form-control border-0" id="uploadgallery" accept="image/*" multiple>
                      </div>
                </div>
                <br>

                <div class="lit98_jhy">
                    <div class="extra_ijyu98_head">
                        <h4>{{__('Category & Attributes')}}</h4>
                    </div>
                      <br>
                      @if ($category->fields()->count() > 0)
                        @foreach ($category->fields as $key => $field)
                          @if ($field->type == 1)
                            <div class="form-group">
                              <strong class="mb-2 d-inline-block">{{$field->label}} @if($field->required == 1) <span>**</span> @elseif($field->required == 0) (Optional) @endif</strong>
                              <div class="row mb-4">
                                <div class="col-md-10">
                                  <input type="text" class="form-control" name="{{ $field->name }}" placeholder="{{ $field->placeholder }}" value="{{!empty($attributes["$field->name"]) ? $attributes["$field->name"] : ''}}">
                                </div>
                              </div>

                              @if (!empty($field->note))
                                <p class="label-bottom">{{ $field->note }}</p>
                              @endif
                            </div>

                          @elseif ($field->type == 2)
                          <div class="form-group">
                            <label for="{{ $field->name }}">{{ $field->label }} {{$field->required == 1 ? 'required' : ''}}</label>
                            <select id="{{ $field->name }}" class="form-control mb-3" name="{{ $field->name }}">
                              @if ($field->options()->count() > 0)
                                <option value="" selected disabled>{{ $field->placeholder }}</option>
                                @foreach ($field->options as $key => $opt)
                                  <option value="{{ $opt->name }}" {{!empty($attributes["$field->name"]) && $attributes["$field->name"] == $opt->name ? 'selected' : ''}}>{{ $opt->name }}</option>
                                @endforeach
                              @endif
                            </select>

                            @if (!empty($field->note))
                              <p>{{ $field->note }}</p>
                            @endif
                          </div>


                          @elseif ($field->type == 3)
                          <div class="form-group">
                            <strong class="mb-2 d-inline-block">{{$field->label}} @if($field->required == 1) <span>**</span> @elseif($field->required == 0) (Optional) @endif</strong>
                            <div class="row mb-4">
                              <div class="col-md-10">
                                @foreach ($field->options as $key => $option)
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox{{$option->id}}" name="{{ $field->name }}[]" value="{{ $option->name }}" {{(!empty($attributes["$field->name"]) && in_array($option->name, $attributes["$field->name"])) ? 'checked' : ''}}>
                                    <label class="form-check-label" for="inlineCheckbox{{$option->id}}">{{$option->name}}</label>
                                  </div>
                                @endforeach
                              </div>
                            </div>
                            @if (!empty($field->note))
                              <p>{{ $field->note }}</p>
                            @endif
                          </div>


                          @elseif ($field->type == 4)
                            <div class="form-group">
                              <label for="{{ $field->name }}">{{ $field->label }} {{$field->required == 1 ? '*' : ''}}</label>
                              <textarea class="form-control"  id="{{ $field->name }}" name="{{ $field->name }}" required rows="3" placeholder="{{ $field->placeholder }}"></textarea>
                              @if (!empty($field->note))
                                <p>{{ $field->note }}</p>
                              @endif
                            </div>

                          @elseif ($field->type == 5)
                          <div class="form-group">
                            <strong class="mb-2 d-inline-block">{{$field->label}} @if($field->required == 1) <span>**</span> @elseif($field->required == 0) (Optional) @endif</strong>
                            <div class="row mb-4">
                              <div class="col-md-10">
                                @foreach ($field->options as $key => $option)
                                  <div class="form-check {{ $option->name == 'text_field_type' ? 'mt-3' : '' }}">
                                    @if ($option->name == 'text_field_type')
                                      <input type="text" name="" value="">
                                    @else
                                      <input class="form-check-input" type="radio" id="inlineCheckbox{{$option->id}}" name="{{ $field->name }}[]" value="{{ $option->name }}" {{(!empty($attributes["$field->name"]) && in_array($option->name, $attributes["$field->name"])) ? 'checked' : ''}}>
                                      <label class="form-check-label" for="inlineCheckbox{{$option->id}}">{{$option->name}}</label>
                                    @endif
                                  </div>
                                @endforeach
                              </div>
                            </div>
                          </div>

                          @endif
                        @endforeach
                      @endif
                </div>
              </div>
            {{-- 3rd step --}}

						<div class="col-lg-4 col-md-12 col-sm-12">

                            <div class="lit98_jhy mb-2">
                                <div class="form-check form-check-lg">
                                    <input class="form-check-input" type="checkbox" id="acc_status" name="access_status" value="" >
                                    <label class="form-check-label" for="acc_status">{{__('Free')}}</label>
                                  </div>
                            </div>

                    <div class="lit98_jhy price-section">
                        <div class="extra_ijyu98_head">
                            <h4>{{__('Set Your Price (USD)')}}</h4>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="regular_price">{{ __('Regular Price') }}</label>
                            <input type="number" id="regularPrice" class="form-control" name="regular_price" placeholder="{{ __('Regular Price') }}">
                            <p class="text-center mb-0">+</p>
                            <p class="text-center"><span>$ {{ $category->regular_buyer_fee }} {{__('(Buyer Fee)')}}</span> = <span>$ <span id="totalRegularPrice">{{ $category->regular_buyer_fee }}</span> ({{__('Purchase Price')}})</span></p>
                        </div>
                        <div class="form-group">
                            <label for="extended_price">{{ __('Extended Price *') }}</label>
                            <input type="number" id="extendedPrice" class="form-control" name="extended_price" placeholder="{{ __('Extended Price *') }}">
                            <p class="text-center mb-0">+</p>
                            <p class="text-center"><span>$ {{ $category->extended_buyer_fee }} {{__('(Buyer Fee)')}}</span> = <span>$ <span id="totalExtendedPrice">{{ $category->extended_buyer_fee }}</span> ({{__('Purchase Price')}})</span></p>
                        </div>

                    </div>


              <br>

              <div class="lit98_jhy">
                  <div class="extra_ijyu98_head">
                      <h4>{{__('Set Demo Url & Tags')}}</h4>
                  </div>
                  <br>
                  <div class="form-group">
                      <label for="demo_link">{{ __('Demo Link') }}*</label>
                      <input type="text" class="form-control" id="demo_link" name="demo_link"  placeholder="{{ __('Demo Link') }}" value="" required>
                    </div>

                    <div class="form-group">
                      <label for="tags">{{ __('Tags') }}</label>
                      <textarea class="form-control"  id="tags" name="tags" required rows="3" placeholder="{{__('Tags')}}"></textarea>
                    </div>


              </div>

              <br>

              <div class="lit98_jhy">
                  <div class="extra_ijyu98_head">
                      <h4>{{ __('Outcomes') }}</h4>
                  </div>
                  <br>
                  <div id="outcomes_area">
                      <div class="d-flex">
                          <div class="flex-grow-1 pr-3">
                              <div class="form-group mb-1">
                                  <input type="text" class="input-field form-control" name="outcomes[]" placeholder="{{ __('Provide Outcomes') }}" required>
                              </div>
                          </div>
                          <div class="">
                            <button type="button" class="btn btn-success  add-out"> <i class="fa fa-plus"></i> </button>
                          </div>
                      </div>
                  </div>


              </div>

              <div class="widget_avater_423">
                  <button type="submit" id="submit-btn" class="link_portfolio">{{ __('Submit') }}</button>
              </div>
						</div>

					</div>
        </form>
				</div>
			</section>
			<!-- ========================== Dashboard Elements ============================= -->

			<!-- ============================ Call To Action Start ================================== -->
			@includeIf('partials.theme-newsletter')
			<!-- ============================ Call To Action End ================================== -->

@endsection
@section('scripts')

<script src="{{ asset("assets/user/js/custom.js") }}"></script>


    <script>
  'use strict';
  $(document).ready(function() {
  $("input[name='regular_price']").on('input', function() {
    let regularPrice = parseFloat($(this).val());
    let regular_buyer_fee = '{{ $category->regular_buyer_fee }}';
    let regularBuyeFee = parseFloat(regular_buyer_fee);
    if (regularPrice) {
      $("#totalRegularPrice").html(regularPrice + regularBuyeFee);

    } else if (!regularPrice) {
      $("#totalRegularPrice").html(regularBuyeFee);

    }
  });

  $("input[name='extended_price']").on('input', function() {
    let extendedPrice = parseFloat($(this).val());
    let extended_buyer_fee = '{{ $category->extended_buyer_fee }}';
    let extendedBuyeFee = parseFloat(extended_buyer_fee);
    if (extendedPrice) {
      $("#totalExtendedPrice").html(extendedPrice + extendedBuyeFee);
    } else if (!extendedPrice) {
      $("#totalExtendedPrice").html(extendedBuyeFee);
    }
  });
});




$('.add-out').on('click',function(){

$('#outcomes_area').append(
                    `<div class="d-flex remove-item">
                        <div class="flex-grow-1 pr-3">
                            <div class="form-group mb-1">
                                <input type="text" class="input-field form-control" name="outcomes[]" placeholder="{{ __('Provide outcomes') }}" required>
                            </div>
                        </div>
                        <div>
                            <button type="button" class="btn btn-danger remove-out"> <i class="fa fa-minus"></i> </button>
                        </div>
                    </div>`
                    );

});



$(document).on('click','.remove-out',function(){


    $(this).parent().parent().remove();

});

$(document).on('click','#acc_status',function(){
    var checkBox = document.getElementById("acc_status");
if(checkBox.checked==true){
    $('.price-section').addClass('d-none');
    $('#acc_status').val(1);
}
else{
    $('.price-section').removeClass('d-none');
    $('#acc_status').val(0);
}
});





</script>
@endsection

