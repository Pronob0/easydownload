<section class="min-sec">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-9">
                <div class="sec-heading">
                    <h2>{{ $homepage->blog_section_title }}</h2>
                    <p>{{ $homepage->blog_section_text }}</p>
                </div>
            </div>
        </div>

        <div class="row">

            <!-- Single Slide -->
            @foreach ($blogs->take(3) as $key=>$blog)
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <a href="http://" target="_blank" rel="noopener noreferrer">
                        <div class="articles_grid_style style-2">
                            <div class="articles_grid_thumb">
                                <a href="{{route('blog.details',$blog->slug)}}"><img src="{{asset('assets/images/'.$blog->photo)}}" class="img-fluid" alt=""></a>
                            </div>

                            <div class="articles_grid_caption">
                                <div class="mpd-date-wraps">
                                    <span class="mpd-meta-date">{{ $blog->created_at->format('d')}}</span>
                                    <span class="mpd-meta-month">{{ $blog->created_at->format('F')}}</span>
                                </div>
                                <div class="blog-grid-cat" style="background-color: {{ $blog->category->colors}}">{{ $blog->category->name }}</div>
                                <br>
                                <a href="{{route('blog.details',$blog->slug)}}"><h4>{{strlen($blog->title)>47 ? substr($blog->title,0,46) : $blog->title}}</h4></a>
                                <div class="articles_grid_desc">
                                    <p>{{ strlen($blog->details)>200 ? substr($blog->details,0,200) : $blog->details }}....</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
