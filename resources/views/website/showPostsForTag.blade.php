@extends('index')

@section('title', 'Show Posts')

<!-- PAGE HEADER -->
@section('header')

    <div id="post-header" class="page-header">
        <div class="page-header-bg" style="background-image: url('/website/./img/header-1.jpg');" data-stellar-background-ratio="0.5"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <div class="post-category">
                        <h3 style="color: #c7254e;">{{ $tag->tag }}</h3>
                    </div>
                    <h1>{{ $tag->tag }}</h1>
                    <ul class="post-meta">
                        <li><a href="author.html">John Doe</a></li>
                        <li><i class="fa fa-calculator"></i> {{ $tag->post->count() }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- /PAGE HEADER -->

<!-- SECTION -->
@section('content')
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-8">


                    <!-- post -->
                    <div class="post post-row">
                        <div class="post-body">
                            <div class="post-category">
                            </div>
                            <ul class="post-meta">
                                <li><h3 href="">Tag: {{ $tag->tag }}</h3></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /post -->


                    @if($tag->post->count() == 0)
                        <p style="text-align: center">No posts For Tag: {{ $tag->tag }}</p>
                    @endif

                    @foreach($tag->post as $post)
                    <!-- post -->
                        <div class="post post-row">
                            <a class="post-img" href="{{ route('post.show', ['slug' => $post->slug]) }}"><img src="{{ $post->featured }}" alt=""></a>
                            <div class="post-body">
                                <div class="post-category">
                                    <h3 style="color: #c7254e;" href="">{{ $post->title }}</h3>
                                </div>
                                <ul class="post-meta">
                                    <li><a href="author.html">John Doe</a></li>
                                    <li>{{ $post->created_at->toFormattedDateString() }}</li>
                                </ul>
                                <p>{{ $post->description }}</p>
                            </div>
                        </div>
                        <!-- /post -->
                    @endforeach
                    <div class="section-row loadmore text-center">
                        <a href="#" class="primary-button">Load More</a>
                    </div>
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

                    <!-- category widget -->
                    <div class="aside-widget">
                        <div class="section-title">
                            <h2 class="title">Categories</h2>
                        </div>
                        <div class="category-widget">
                            <ul>
                                <li><a href="#">Lifestyle <span>451</span></a></li>
                                <li><a href="#">Fashion <span>230</span></a></li>
                                <li><a href="#">Technology <span>40</span></a></li>
                                <li><a href="#">Travel <span>38</span></a></li>
                                <li><a href="#">Health <span>24</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /category widget -->

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
@endsection
<!-- /SECTION -->
