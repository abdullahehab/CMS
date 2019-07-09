@include('include.header')

    <!-- PAGE HEADER -->
    <div class="page-header">
        <div class="page-header-bg" style="background-image: url({{ $post->featured }});" data-stellar-background-ratio="0.5"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-offset-1 col-md-10 text-center">
                    <h1 class="text-uppercase">{{ $post->title }}</h1>
                    <p class="lead">{{ $post->category->name }}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- /PAGE HEADER -->
<!-- /HEADER -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-8">
                <div class="section-row">
                    <div class="section-title">
                        <h3 class="title">{{ $post->title }}</h3>
                    </div>
                    <h1>{{ $post->created_at->toFormattedDateString() }}</h1>
                    <p>{{ $post->description }}</p>

                    @foreach($post->tags as $tag)
                    <a href="{{ route('tag.show', ['id' => $tag->id]) }}" class="badge badge-info">{{ $tag->tag }}</a>
                    @endforeach

                    <br>
                    @if($next_post)
                        <a href="{{ route('post.show', ['slug' => $next_post->slug]) }}" class="badge badge-info"> Next -> {{ $next_post->title }}</a>
                    @endif

                    @if($prev_post)
                        <a href="{{ route('post.show', ['slug' => $prev_post->slug]) }}" class="badge badge-info"> Prev ->  {{ $prev_post->title }}</a>
                    @endif

                </div>

                <div class="col-md-12">
                    <div class="section-row">
                        <div class="section-title">
                            <h3 class="title">All tags</h3>
                        </div>
                        @foreach($tags as $tag)
                            <a href="{{ route('tag.show', ['id' => $tag->id]) }}" class="badge badge-info">{{ $tag->tag }}</a>
                        @endforeach
                    </div>


                    <div class="section-title"></div>
                    <br>
                </div>

                @include('include.disqus')

            </div>

            <div class="col-md-4">
                <!-- social widget -->
                <div class="aside-widget">
                    <div class="section-title">
                        <h2 class="title">Social Media</h2>
                    </div>
                    <div class="social-widget">
                        <ul>
                            <li>
                                <a href="#" class="social-facebook">
                                    <i class="fa fa-facebook"></i>
                                    <span>21.2K<br>Followers</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="social-twitter">
                                    <i class="fa fa-twitter"></i>
                                    <span>10.2K<br>Followers</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="social-google-plus">
                                    <i class="fa fa-google-plus"></i>
                                    <span>5K<br>Followers</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /social widget -->

                <!-- newsletter widget -->
                <div class="aside-widget">
                    <div class="section-title">
                        <h2 class="title">Newsletter</h2>
                    </div>
                    <div class="newsletter-widget">
                        <form>
                            <p>Nec feugiat nisl pretium fusce id velit ut tortor pretium.</p>
                            <input class="input" name="newsletter" placeholder="Enter Your Email">
                            <button class="primary-button">Subscribe</button>
                        </form>
                    </div>
                </div>
                <!-- /newsletter widget -->
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- FOOTER -->
@include('include.footer')
<!-- /FOOTER -->

<!-- jQuery Plugins -->
@include('include.jQueryPlugins')
