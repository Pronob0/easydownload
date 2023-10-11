@extends('layouts.admin')

@section('content')
<div class="card">
  <div class="d-sm-flex align-items-center justify-content-between">
  <h5 class=" mb-0 text-gray-800 pl-3">{{ __('Product Name: ') }}<b>{{ $data->name }}</b> </h5>
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
      <li class="breadcrumb-item"><a href="javascript:;">{{ __('Manage Categories') }}</a></li>
      <li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">{{ __('Main Product') }}</a></li>
      <li class="breadcrumb-item"><a>{{ __('View Product') }}</a></li>
  </ol>
  </div>
</div>
<div class="card mt-3" id="input">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-6">
                <h5 class="text-dark font-weight-bolder pb-1">{{ __('Product Image:') }}</h5>
                <img class="img-fluid" src="{{ $data->preview_imagename ? asset('assets/images/'.$data->preview_imagename) : asset('assets/images/placeholder.jpg') }}" alt="">
                <br>
                <br>
                <h6 class=" mb-0 text-gray-800 pl-3">{{ __('Author Name:') }} <a href="{{ route('author.portfolio',str_replace(' ','-',$data->user->username)) }}" target="_blank"><b>{{ $data->user->name }}</b></a>  </h6>


            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <h6 class="text-dark font-weight-bolder pb-1" for="title">{{ __('Name') }}*</h6>
                    <input type="text" class="form-control"    value="{{$data->name}}" required>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <h6 class="text-dark font-weight-bolder pb-1" for="title">{{ __('Category') }}*</h6>
                            <input type="text" class="form-control"    value="{{$data->category->name}}" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <h6 class="text-dark font-weight-bolder pb-1" for="title">{{ __('Subcategories') }}*</h6>
                            @if ($data->subcategory_id!=NULL)
                            
                            <input type="text" class="form-control"    value="{{$subcategories->name}}" required>
                      
                        @else
                        <input type="text" class="form-control"    value="NULL" required>
                        @endif
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <h6 class="text-dark font-weight-bolder pb-1" for="title">{{ __('Demo Link') }}*</h6>
                    <input type="text" class="form-control"    value="{{$data->demo_link}}" required>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <h6 class="text-dark font-weight-bolder pb-1" for="title">{{ __('Regular Price') }} <small><b>( {{ $sign->name }} )</b></small></h6>
                            <input type="text" class="form-control"    value="{{round($data->regular_price*$sign->value,2)}}" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <h6 class="text-dark font-weight-bolder pb-1" for="title">{{ __('Extended Price') }} <small><b>( {{ $sign->name }} )</b></small></h6>
                            <input type="text" class="form-control"    value="{{round($data->extended_price*$sign->value,2)}}" required>
                        </div>
                    </div>
                </div>
                
                
                <div>
                    <h3 class="mb-0 pb-0">Preview Screensorts</h3>
                    @foreach($data->screenshots as $screensort)
                        <a href="{{asset('assets/images/screenshot/'.$screensort->photo)}}" target="_blank"><img src="{{asset('assets/images/screenshot/'.$screensort->photo)}}" width="100"/></a>
                    @endforeach
                </div>


            </div>
        </div>

    </div>
</div>

<div class="row" >
    <div class="col-lg-8" >
         <div class="card mt-3 mb-3" id="input">
            <div class="card-body">
            <h5 class="text-primary font-weight-bolder pb-3" for="title">{{ __('Attributes') }}*</h5>
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
          </div>
          <div class="col-lg-4">
              <div class="card mt-3">
                  <div class="card-body">
                    <h5 class="m-0 pb-3 font-weight-bold text-primary">{{ __('Outcomes') }}</h5>
                    <div id="outcomes_area">
                        @foreach(explode(',,,', $data->outcome) as $ot)
                          <div class="d-flex">
                              <div class="flex-grow-1 pr-3">
                                  <div class="form-group mb-1">
                                      <input type="text" class="input-field" name="outcomes[]" placeholder="{{ __('Provide Outcomes') }}" value="{{ $ot }}" required>
                                  </div>
                              </div>

                          </div>
                        @endforeach
                          </div>
                  </div>
              </div>
              <div class="card mt-3">
                <div class="card-body">
                  <h5 class="m-0 pb-3 font-weight-bold text-primary">{{ __('Tags') }}</h5>
                  <div class="form-group">

                    <textarea class="form-control" rows="3" placeholder="{{__('Tags')}}">{{$data->tags}}</textarea>
                  </div>
                </div>
            </div>


          </div>
       </div>
       <div class="card mb-5">
        <div class="card-body">
           <div class="row">
               <div class="col-lg-12">
                <h5 class="m-0 pb-3 font-weight-bold text-primary">{{ __('Description') }}</h5>
                <textarea class="form-control"  id="description" name="description" required rows="7" placeholder="{{__('Description')}}">{{$data->description}}</textarea>
               </div>
           </div>
        </div>
    </div>

    </div>


</div>




@endsection
@section('scripts')

<script>

 $("* :input").attr("disabled", true);

</script>


@endsection
