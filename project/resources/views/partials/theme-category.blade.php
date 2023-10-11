<section class="p-0 overlio-top">
    <div class="container">
        <div class="row">
            @foreach ($categories->take(4) as $cat)
                @if ($cat->status==1)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="urip_cated shadow">
                            <div class="urip_cated_avater">
                                <img src="{{  $cat->photo ? asset('assets/images/'.$cat->photo):asset('assets/images/noimage.png') }}" class="img-fluid" alt="" />
                            </div>
                            <div class="urip_cated_caps">
                                <h3 class="cats_urip_title"><a href="{{route('front.item',['category'=>$cat->slug])}}">{{ $cat->name }}</a></h3>
                                <span>{{ DB::table('items')->where('category_id',$cat->id)->count() }} {{ __('Items') }}</span>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>
