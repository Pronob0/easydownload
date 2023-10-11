@extends('layouts.front')
@section('content')

@includeIf('includes.user.common')
        <!-- ========================== Dashboard Elements ============================= -->
        <section class="gray-light">
            <div class="container">
                <div class="row">

                    <div class="col-lg-8 col-md-12 col-sm-12">
                        <div class="_the_capt5t">

                            @foreach ($item as $it)
                             <!-- Single Reviews -->
                             @foreach ($it->ratings as $itemrating)
                             <div class="single_re457">
                                <div class="s98_re457">
                                    <div class="s98_re452">
                                        <a href="item-detail.html" class="_il64gt">{{ $it->name }}</a>
                                    </div>

                                </div>

                                <div class="s98_re457_reply">
                                    <div class="urip_widget_avater">
                                        <a href="{{ route('author.portfolio',str_replace(' ','-',$itemrating->user->username)) }}"><img src="{{ $itemrating->user->photo ? asset('assets/images/'.$itemrating->user->photo):asset('assets/images/placeholder.jpg') }}" class="img-fluid circle" alt=""></a>
                                        <div class="veryfied_author"><img src="assets/img/verified.svg" class="img-fluid" width="15" alt=""></div>
                                    </div>
                                    <div class="_reply9iu7">
                                        <h4 class="_8ujh64">{{ $itemrating->user->name }}</h4>
                                        <p></p>
                                        <p>{{ $itemrating->review }}</p>
                                    </div>
                                    <div class="_iju7_reviw">
                                        @if ($itemrating->rating==5)
                                        <i class="fa fa-star filled"></i>
                                        <i class="fa fa-star filled"></i>
                                        <i class="fa fa-star filled"></i>
                                        <i class="fa fa-star filled"></i>
                                        <i class="fa fa-star filled"></i>
                                        @elseif($itemrating->rating==4)
                                        <i class="fa fa-star filled"></i>
                                        <i class="fa fa-star filled"></i>
                                        <i class="fa fa-star filled"></i>
                                        <i class="fa fa-star filled"></i>
                                        @elseif($itemrating->rating==3)
                                        <i class="fa fa-star filled"></i>
                                        <i class="fa fa-star filled"></i>
                                        <i class="fa fa-star filled"></i>
                                        @elseif($itemrating->rating==2)
                                        <i class="fa fa-star filled"></i>
                                        <i class="fa fa-star filled"></i>
                                        @else
                                        <i class="fa fa-star filled"></i>

                                        @endif

                                    </div>
                                </div>
                            </div>

                             @endforeach


                            @endforeach
{{ $item->links() }}

                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <!-- Single Author Info -->
                        @include('includes.user.common-sidebar')
                    </div>

                </div>
            </div>
        </section>
        <!-- ========================== Dashboard Elements ============================= -->

        <!-- ============================ Call To Action Start ================================== -->
        @includeIf('partials.theme-newsletter')
        <!-- ============================ Call To Action End ================================== -->

@endsection
