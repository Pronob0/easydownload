<option data-href="" value="">{{__('Select Sub Category')}}</option>
@foreach($cat->subs as $sub)
    <option data-href="{{ route('user.childcat.load',$sub->id) }}" value="{{ $sub->id }}">{{ $sub->name }}</option>
@endforeach