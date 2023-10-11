        @if ($Partners->count()>0)
        <section class="gray-light min-sec">
            <div class="container">

                <div class="row justify-content-center">
                    <div class="col-lg-7 col-md-9">
                        <div class="sec-heading">
                            <h2>{{ __('Our partners &') }}<br>{{ __('Featured Running Brands') }}</h2>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                        @foreach ($Partners->take(9) as $partner)
                        <!-- Single -->
                        <div class="col-lg-2 col-md-3 col-sm-4">
                            <div class="card">
                                <div class="card-body py-0">
                                    <div class="royh9">
                                        <img src="{{$partner->photo ? asset('assets/images/'.$partner->photo) : '' }}" class="img-fluid" alt="">
                                    </div>
                                </div>

                            </div>
                        </div>

                        @endforeach
                </div>
            </div>
        </section>
        @endif
