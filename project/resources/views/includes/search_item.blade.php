<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="_filt_tag786">
            <div class="_tag782">
                <div class="_tag780">{{$items->count()}} {{__('Items found')}}</div>
            </div>
            <div class="_tag785">
                <div class="_g78juy">
                    <select class="form-control" id="search_orderby_item">
                        <option value="date_desc" {{ isset(request()->input()['sortby']) && request()->input()['sortby'] == 'date_desc' ? 'selected' : ''}}>{{__('Date: Newest on top')}}</option>
                        <option value="date_asc" {{ isset(request()->input()['sortby']) && request()->input()['sortby'] == 'date_asc' ? 'selected' : ''}}>{{__('Date: Oldest on top')}}</option>
                        <option value="price_desc" {{ isset(request()->input()['sortby']) && request()->input()['sortby'] == 'price_desc' ? 'selected' : ''}}>{{__('Price: High to Low')}}</option>
                        <option value="price_asc" {{ isset(request()->input()['sortby']) && request()->input()['sortby'] == 'price_asc' ? 'selected' : ''}}>{{__('Price: Low to High')}}</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>

@if ($gs->details == 'details-1')
    @includeIf('partials.product-details-1')
@endif

@if ($gs->details == 'details-2')
    @includeIf('partials.product-details-2')
@endif

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        {{$items->links()}}
    </div>
</div>

