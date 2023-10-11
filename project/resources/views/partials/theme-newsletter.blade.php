    <!-- ============================ Call To Action Start ================================== -->
    <section class="call-to-act" style="background:{{ $homepage->newsletter_bg }} url({{ $homepage->newsletter_photo ? asset('assets/images/'.$homepage->newsletter_photo) : asset('assets/images/placeholder.jpg') }}) no-repeat">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-lg-7 col-md-8">
                    <div class="clt-caption text-center mb-4">
                        <h3>{{ $homepage->newsletter_title }}</h3>
                        <p>{{ $homepage->newsletter_text }}</p>
                    </div>
                    <div class="inner-flexible-box subscribe-box">
                        <form  id="subForm" action="{{route('front.subscribe')}}" method="POST" class="subscribe-form">
                            {{ csrf_field() }}
                        <div class="input-group">
                            <input  type="email" name="email" class="form-control subEmail" placeholder="Enter your mail here">
                            <button class="btn btn-subscribe subBtn" type="submit"><i class="fa fa-arrow-right"></i></button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ============================ Call To Action End ================================== -->