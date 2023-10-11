<div class="special-box">
  <div class="heading-area">
      <h4 class="title">
        {{__('Create Attribute for')}} (<strong>{{ $category->name }}</strong>)
      </h4>
  </div>

  <form class="px-5 pb-4" action="{{route('admin.form.store')}}" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-lg-12">
          <p class="text-danger">{{__('NB')}}: {{__('If you need a')}} <strong>{{__('live demo')}}</strong> feature. Then create a <strong>text field</strong> named (Label Name) <strong>'Demo URL'</strong></p>
        </div>
      </div>
      {{ csrf_field() }}

      <input type="hidden" name="category_id" value="{{$category->id}}">
      
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
               <label for=""><strong>{{__('Field Type')}}</strong></label>
               <div class="">
                 <div class="form-check form-check-inline">
                   <input name="type" class="form-check-input" type="radio" id="inlineRadio1" value="1" v-model="type" @change="typeChange()" {{old('type') == 1 || empty(old('type')) ? 'checked' : ''}}>
                   <label class="form-check-label" for="inlineRadio1">{{__('Text Field')}}</label>
                 </div>
                 <div class="form-check form-check-inline">
                   <input name="type" class="form-check-input" type="radio" id="inlineRadio2" value="2" v-model="type" @change="typeChange()" {{old('type') == 2 ? 'checked' : ''}}>
                   <label class="form-check-label" for="inlineRadio2">{{__('Select')}}</label>
                 </div>
                 <div class="form-check form-check-inline">
                   <input name="type" class="form-check-input" type="radio" id="inlineRadio3" value="3" v-model="type" @change="typeChange()" {{old('type') == 3 ? 'checked' : ''}}>
                   <label class="form-check-label" for="inlineRadio3">{{__('Checkbox')}}</label>
                 </div>
                 <div class="form-check form-check-inline">
                   <input name="type" class="form-check-input" type="radio" id="inlineRadio4" value="4" v-model="type" @change="typeChange()" {{old('type') == 4 ? 'checked' : ''}}>
                   <label class="form-check-label" for="inlineRadio4">{{__('Textarea')}}</label>
                 </div>
                 <div class="form-check form-check-inline">
                   <input name="type" class="form-check-input" type="radio" id="inlineRadio5" value="5" v-model="type" @change="typeChange()" {{old('type') == 5 ? 'checked' : ''}}>
                   <label class="form-check-label" for="inlineRadio5">{{__('Radio')}}</label>
                 </div>
               </div>
               @if ($errors->has('type'))
                 <p class="mb-0 text-danger">{{ $errors->first('type') }}</p>
               @endif
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
               <label for=""><strong>Required</strong></label>
               <div class="">
                 <div class="form-check form-check-inline">
                   <input class="form-check-input" type="radio" name="required" id="required1" value="1">
                   <label class="form-check-label" for="required1">{{__('Yes')}}</label>
                 </div>
                 <div class="form-check form-check-inline">
                   <input class="form-check-input" type="radio" name="required" id="required2" value="0" checked>
                   <label class="form-check-label" for="required2">{{__('No')}}</label>
                 </div>
               </div>
               @if ($errors->has('required'))
                 <p class="mb-0 text-danger">{{ $errors->first('required') }}</p>
               @endif
          </div>
        </div>
      </div>


      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
               <label for=""><strong>{{__('Label Name')}}</strong></label>
               <div class="">
                 <input type="text" class="form-control" name="label" value="{{old('label')}}" placeholder="{{__('Enter Label Name')}}">
               </div>
               @if ($errors->has('label'))
                 <p class="mb-0 text-danger">{{ $errors->first('label') }}</p>
               @endif
          </div>
        </div>
      </div>

      <div class="row" v-if="placeholdershow">
        <div class="col-md-12">
          <div class="form-group">
               <label for=""><strong>{{__('Placeholder')}}</strong></label>
               <div class="">
                 <input type="text" class="form-control" name="placeholder" value="{{old('placeholder')}}" placeholder="{{__('Enter Placeholder')}}">
               </div>
               @if ($errors->has('placeholder'))
                 <p class="mb-0 text-danger">{{ $errors->first('placeholder') }}</p>
               @endif
          </div>
        </div>
      </div>


      <div class="row" v-if="counter > 0" id="optionarea">
        <div class="col-md-12">
          <div class="form-group">
               <label for=""><strong>{{__('Options')}}</strong></label>
               <div class="row mb-2 counterrow" v-for="n in counter" :id="'counterrow'+n">
                 <div class="col-md-9">
                   <input :id="'optionfield'+n" type="text" class="form-control" name="options[]" value="" placeholder="{{__('Option label')}}">
                 </div>
                 <div class="col-md-1">
                   <button type="button" class="btn btn-danger text-white" @click="removeOption(n)"><i class="fa fa-times"></i></button>
                 </div>
               </div>
               @if ($errors->has('options.*'))
                 <p class="mb text-danger">{{ $errors->first('options.*') }}</p>
               @endif
               <button type="button" class="btn btn-success text-white" @click="addOption()"><i class="fa fa-plus"></i> {{__('Add Option')}}</button>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
               <label for=""><strong>{{__('Note')}} {{__('(Optional)')}}</strong></label>
               <div class="">
                 <textarea class="form-control" name="note" placeholder="{{__('Enter Note')}}" rows="3" cols="80">{{old('note')}}</textarea>
               </div>
               @if ($errors->has('note'))
                 <p class="mb-0 text-danger">{{ $errors->first('note') }}</p>
               @endif
          </div>
        </div>
      </div>

      <div class="text-left">
        <button type="submit" class="btn btn-primary">{{__('ADD ATTRIBUTE')}}</button>
      </div>
  </form>
</div>
