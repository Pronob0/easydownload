@extends('layouts.admin')

@section('content')
<div class="card">
  <div class="d-sm-flex align-items-center justify-content-between">
  <h5 class=" mb-0 text-gray-800 pl-3">{{ __('Edit Post') }} <a class="btn btn-primary btn-rounded btn-sm" href="{{route('admin.blog.index')}}"><i class="fas fa-arrow-left"></i> {{ __('Back') }}</a></h5>
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
      <li class="breadcrumb-item"><a href="javascript:;">{{ __('Blog') }}</a></li>
      <li class="breadcrumb-item"><a href="{{route('admin.blog.index')}}">{{ __('Post') }}</a></li>
      <li class="breadcrumb-item"><a href="{{route('admin.blog.edit',$data->id)}}">{{ __('Edit Post') }}</a></li>
  </ol>
  </div>
</div>

<div class="row justify-content-center mt-3">
<div class="col-lg-6">
  <!-- Form Basic -->
  <div class="card mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">{{ __('Edit Post Form') }}</h6>
    </div>

    <div class="card-body">
      <div class="gocover" style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
      <form class="geniusform" action="{{route('admin.blog.update',$data->id)}}" method="POST" enctype="multipart/form-data">

          @include('includes.admin.form-both')

          {{ csrf_field() }}

          <div class="form-group">
            <label for="title">{{ __('Title') }}</label>
            <input type="text" class="form-control" id="title" name="title"  placeholder="{{ __('Enter Title') }}" value="{{$data->title}}" required>
        </div>
        <div class="form-group">
            <label for="title">{{ __('SLUG') }}</label>
            <input type="text" class="form-control" id="slug" name="slug"  placeholder="{{ __('Enter Slug') }}" value="{{$data->slug}}" required>
        </div>

        <div class="form-group">
          <label for="inp-name">{{ __('Category') }}</label>
          <select class="form-control mb-3" name="category_id">
            <option value="" selected>{{__('Select Category')}}</option>
            @foreach ($cats as $cat)
            <option value="{{$cat->id}}" {{$data->category_id == $cat->id ? 'selected' : ''}}>{{$cat->name}}</option>
            @endforeach
          </select>
      </div>



          <div class="form-group">
              <label>{{ __('Set Picture') }} <small class="small-font">({{ __('Preferred Size 600 X 600') }})</small></label>
              <div class="wrapper-image-preview">
                  <div class="box">
                      <div class="back-preview-image" style="background-image: url({{$data->photo ? asset('assets/images/'.$data->photo) : asset('assets/images/placeholder.jpg') }});"></div>
                      <div class="upload-options">
                          <label class="img-upload-label" for="img-upload"> <i class="fas fa-camera"></i> {{ __('Upload Picture') }} </label>
                          <input id="img-upload" type="file" class="image-upload" name="photo" accept="image/*">
                      </div>
                  </div>
              </div>
          </div>



          <div class="form-group">
              <label for="details">{{ __('Description') }}</label>
                <textarea class="form-control "  id="details" required name="details" rows="3" placeholder="{{__('Description')}}">{{$data->details}}</textarea>
          </div>

          <div class="form-group">
              <label for="tags">{{ __('Tags') }}</label>
              <input type="text" class="form-control" id="tags" name="tags" placeholder="{{ __('Tags') }}">
          </div>


          <div class="form-group">
              <label for="source">{{ __('Source') }}</label>
              <input type="text" class="form-control" id="source" name="source"  placeholder="{{ __('Source') }}" value="{{$data->source}}" required>
          </div>

          <div class="form-group">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" name="secheck" class="custom-control-input" {{ $data->meta_tag != null || $data->meta_description != null ? 'checked' : '' }} id="seo">
              <label class="custom-control-label" for="seo"> {{__('Allow Blog SEO')}}</label>
            </div>
          </div>

          <div class="showbox d-none">
            <div class="form-group">
                <label for="meta_tag">{{ __('Meta Tags') }}</label>
                <input type="text" class="form-control" id="meta_tag" name="meta_tag" placeholder="{{ __('Meta Tags') }}">
            </div>

            <div class="form-group">
                <label for="meta_description">{{ __('Meta Description') }}</label>
                <textarea class="form-control"  id="meta_description" name="meta_description"  placeholder="{{__('Meta Description')}}" rows="3"></textarea>
            </div>
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

<script>

$("#seo").change(function() {
    if(this.checked) {
        $('.showbox').removeClass('d-none');
    }else{
        $('.showbox').addClass('d-none');
    }
});

</script>

@endsection
