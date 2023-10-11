<div class="special-box pb-1">
  <div class="heading-area">
      <h4 class="title">
        {{__('Attributes of')}} (<strong>{{ $category->name }}</strong>)
      </h4>
  </div>
 @if ($category->fields()->count() == 0)
   <h4 class="text-center">{{__('NO FIELDS ADDED')}}</h4><br>
 @elseif ($category->fields()->count() > 0)
    @foreach ($category->fields as $key => $field)
      @if ($field->type == 1)
        <form class="px-5" action="{{route('admin.field.delete')}}" method="post">
          {{csrf_field()}}
          <input type="hidden" name="field_id" value="{{$field->id}}">
          <div class="form-group">
            <strong class="mb-2 d-inline-block">{{$field->label}} @if($field->required == 1) <span>**</span> @elseif($field->required == 0) (Optional) @endif</strong>
            <div class="row mb-4">
              <div class="col-md-10">
                <input class="form-control" type="text" name="" value="" placeholder="{{$field->placeholder}}">
              </div>
              <div class="col-md-1">
                <a class="btn btn-warning" href="{{route('admin.form.edit', $field->id)}}">
                  <i class="fas fa-edit"></i>
                </a>
              </div>
              <div class="col-md-1">
                <button class="btn btn-danger" type="submit">
                  <i class="fa fa-times"></i>
                </button>
              </div>
            </div>
          </div>
          <p><strong>@if(!empty($field->note)) {{__('NB')}}: @endif </strong> {{$field->note}}</p>
        </form>
      @elseif ($field->type == 2)
        <form class="px-5" action="{{route('admin.field.delete')}}" method="post">
          {{csrf_field()}}
          <input type="hidden" name="field_id" value="{{$field->id}}">
          <div class="form-group">
            <strong class="mb-2 d-inline-block">{{$field->label}} @if($field->required == 1) <span>**</span> @elseif($field->required == 0) (Optional) @endif</strong>
            <div class="row mb-4">
              <div class="col-md-10">
                <select class="form-control" name="">
                  <option value="" selected disabled>{{$field->placeholder}}</option>
                  @foreach ($field->options as $key => $option)
                    <option value="">{{$option->name}}</option>
                  @endforeach
                </select>
              </div>

              <div class="col-md-1">
                <a class="btn btn-warning" href="{{route('admin.form.edit', $field->id)}}">
                  <i class="fas fa-edit"></i>
                </a>
              </div>
              <div class="col-md-1">
                <button class="btn btn-danger" type="submit">
                  <i class="fa fa-times"></i>
                </button>
              </div>
            </div>
          </div>
          <p><strong>@if(!empty($field->note)) {{__('NB')}}: @endif </strong> {{$field->note}}</p>
        </form>
      @elseif ($field->type == 3)
        <form class="px-5" action="{{route('admin.field.delete')}}" method="post">
          {{csrf_field()}}
          <input type="hidden" name="field_id" value="{{$field->id}}">
          <div class="form-group">
            <strong class="mb-2 d-inline-block">{{$field->label}} @if($field->required == 1) <span>**</span> @elseif($field->required == 0) (Optional) @endif</strong>
            <div class="row mb-4">
              <div class="col-md-10">
                @foreach ($field->options as $key => $option)
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox{{$option->id}}" value="option1">
                    <label class="form-check-label" for="inlineCheckbox{{$option->id}}">{{$option->name}}</label>
                  </div>
                @endforeach
              </div>
              <div class="col-md-1">
                <a class="btn btn-warning" href="{{route('admin.form.edit', $field->id)}}">
                  <i class="fas fa-edit"></i>
                </a>
              </div>
              <div class="col-md-1">
                <button type="submit" class="btn btn-danger">
                  <i class="fa fa-times"></i>
                </button>
              </div>
            </div>
          </div>
          <p><strong>@if(!empty($field->note)) {{__('NB')}}: @endif </strong> {{$field->note}}</p>
        </form>
      @elseif ($field->type == 4)
        <form class="px-5" action="{{route('admin.field.delete')}}" method="post">
          {{csrf_field()}}
          <input type="hidden" name="field_id" value="{{$field->id}}">
          <div class="form-group">
            <strong class="mb-2 d-inline-block">{{$field->label}} @if($field->required == 1) <span>**</span> @elseif($field->required == 0) (Optional) @endif</strong>
            <div class="row mb-4">
              <div class="col-md-10">
                <textarea class="form-control" name="" rows="5" cols="80" placeholder="{{$field->placeholder}}"></textarea>
              </div>
              <div class="col-md-1">
                <a class="btn btn-warning" href="{{route('admin.form.edit', $field->id)}}">
                  <i class="fas fa-edit"></i>
                </a>
              </div>
              <div class="col-md-1">
                <button type="submit" class="btn btn-danger">
                  <i class="fa fa-times"></i>
                </button>
              </div>
            </div>
          </div>
          <p><strong>@if(!empty($field->note)) {{__('NB')}}: @endif </strong> {{$field->note}}</p>
        </form>
      @elseif ($field->type == 5)
        <form class="px-5" action="{{route('admin.field.delete')}}" method="post">
          {{csrf_field()}}
          <input type="hidden" name="field_id" value="{{$field->id}}">
          <div class="form-group">
            <strong class="mb-2 d-inline-block">{{$field->label}} @if($field->required == 1) <span>**</span> @elseif($field->required == 0) (Optional) @endif</strong>
            <div class="row mb-4">
              <div class="col-md-10">
                @foreach ($field->options as $key => $option)
                  <div class="form-check {{ $option->name == 'text_field_type' ? 'mt-3' : '' }}">
                    @if ($option->name == 'text_field_type')
                      <input type="text" name="" value="">
                    @else
                      <input name="{{$field->name}}" class="form-check-input" type="radio" id="inlineCheckbox{{$option->id}}" value="{{$option->id}}">
                      <label class="form-check-label" for="inlineCheckbox{{$option->id}}">{{$option->name}}</label>
                    @endif
                  </div>
                @endforeach
              </div>
              <div class="col-md-1">
                <a class="btn btn-warning" href="{{route('admin.form.edit', $field->id)}}">
                  <i class="fas fa-edit"></i>
                </a>
              </div>
              <div class="col-md-1">
                <button type="submit" class="btn btn-danger">
                  <i class="fa fa-times"></i>
                </button>
              </div>
            </div>
          </div>
          <p><strong>@if(!empty($field->note)) {{__('NB')}}: @endif </strong> {{$field->note}}</p>
        </form>
      @endif
    @endforeach
  @endif
</div>
