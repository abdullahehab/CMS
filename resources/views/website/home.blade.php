@extends('index')


@section('head')
        <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial./img/hot-post-1.jpg-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Callie HTML Template</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CMuli:400,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="website/css/bootstrap.min.css" />
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="website/css/font-awesome.min.css">
    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="website/css/style.css" />
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

@endsection


@section('content')
    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div id="hot-post" class="row hot-post">
                <div class="col-md-8 hot-post-left">
                    <!-- post -->
                    <div class="post post-thumb">
                        <a class="post-img" href="{{ route('post.show', ['slug' => $first_post->slug]) }}"><img src="{{ $first_post->featured }}" alt=""></a>
                        <div class="post-body">
                            <div class="post-category">
                                <a href="category.html">{{ $first_post->title }}</a>
                                <br>
                                <a href="category.html">{{ $first_post->category->name }}</a>
                            </div>
                            <h3 class="post-title title-lg"><a href="blog-post.html">{{ $first_post->description }}</a></h3>
                            <ul class="post-meta">
                                <li><a href="author.html">John Doe</a></li>
                                <li>{{ $first_post->created_at->diffForHumans() }}</li>
                            </ul>
                        </div>
                    </div>
                    <!-- /post -->
                </div>

                <div class="col-md-4 hot-post-right">
                    <!-- post -->
                    <div class="post post-thumb">
                        <a class="post-img" href="blog-post.html"><img src="{{ $second_post->featured }}" alt=""></a>
                        <div class="post-body">
                            <div class="post-category">
                                <a href="category.html">{{ $second_post->title }}</a>
                                <br>
                                <a href="category.html">{{ $second_post->category->name }}</a>
                            </div>
                            <h3 class="post-title"><a href="blog-post.html">{{ $second_post->description }}</a></h3>
                            <ul class="post-meta">
                                <li><a href="author.html">John Doe</a></li>
                                <li>{{ $second_post->created_at->diffForHumans() }}</li>
                            </ul>
                        </div>
                    </div>
                    <!-- /post -->

                    <!-- post -->
                    <div class="post post-thumb">
                        <a class="post-img" href="blog-post.html"><img src="{{ $third_post->featured }}" alt=""></a>
                        <div class="post-body">
                            <div class="post-category">
                                <a href="category.html">{{ $third_post->title }}</a><br>
                                <a href="category.html">{{ $third_post->category->name }}</a>
                            </div>
                            <h3 class="post-title"><a href="blog-post.html">{{ $third_post->description }}</a></h3>
                            <ul class="post-meta">
                                <li><a href="author.html">John Doe</a></li>
                                <li>{{ $third_post->created_at->diffForHumans() }}</li>
                            </ul>
                        </div>
                    </div>
                    <!-- /post -->
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-8">
                    @foreach($categories as $category)
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section-title">
                                    <h2 class="title">{{ $category->name }}</h2>
                                </div>
                            </div>
                        @foreach($category->posts()->orderBy('created_at', 'desc')->take(3)->get() as $post)
                            {{--                            @if($post->count() == 0)--}}
                            {{--                                <div class="col-md-12">--}}
                            {{--                                    <h3>No Posts yet for {{ $post->title }}</h3>--}}
                            {{--                                </div>--}}
                            {{--                            @endif--}}
                            <!-- post -->
                                <div class="col-md-4">
                                    <div class="post post-sm">
                                        <a class="post-img" href="blog-post.html"><img src="{{ $post->featured }}" alt=""></a>
                                        <div class="post-body">
                                            <div class="post-category">
                                                <a href="category.html">{{ $post->title }}</a>
                                            </div>
                                            <h3 class="post-title title-sm"><a href="blog-post.html">{{ $post->description }}</a></h3>
                                            <ul class="post-meta">
                                                <li><a href="author.html">John Doe</a></li>
                                                <li>{{ $post->created_at->diffForHumans() }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                    <!-- /post -->
                            @endforeach
                        </div>
                    @endforeach
                </div>
                <div class="col-md-4">
                    <!-- ad widget-->
                    <div class="aside-widget text-center">
                        <a href="#" style="display: inline-block;margin: auto;">
                            <img class="img-responsive" src="website/./img/ad-3.jpg" alt="">
                        </a>
                    </div>
                    <!-- /ad widget -->

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
                                @foreach($categories as $category)
                                    <li><a href="#">{{ $category->name }} <span>{{ $category->posts()->count() }}</span></a></li>
                                @endforeach
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

                    <!-- post widget -->
                    <div class="aside-widget">
                        <div class="section-title">
                            <h2 class="title">Popular Posts</h2>
                        </div>
                        <!-- post -->
                        <div class="post post-widget">
                            <a class="post-img" href="blog-post.html"><img src="website/./img/widget-4.jpg" alt=""></a>
                            <div class="post-body">
                                <div class="post-category">
                                    <a href="category.html">Health</a>
                                </div>
                                <h3 class="post-title"><a href="blog-post.html">Postea senserit id eos, vivendo periculis ei qui</a></h3>
                            </div>
                        </div>
                        <!-- /post -->

                        <!-- post -->
                        <div class="post post-widget">
                            <a class="post-img" href="blog-post.html"><img src="website/./img/widget-5.jpg" alt=""></a>
                            <div class="post-body">
                                <div class="post-category">
                                    <a href="category.html">Health</a>
                                    <a href="category.html">Lifestyle</a>
                                </div>
                                <h3 class="post-title"><a href="blog-post.html">Sed ut perspiciatis, unde omnis iste natus error sit</a></h3>
                            </div>
                        </div>
                        <!-- /post -->
                    </div>
                    <!-- /post widget -->
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- ad -->
                <div class="col-md-12 section-row text-center">
                    <a href="#" style="display: inline-block;margin: auto;">
                        <img class="img-responsive" src="website/./img/ad-2.jpg" alt="">
                    </a>
                </div>
                <!-- /ad -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-4">
                    <div class="section-title">
                        <h2 class="title">Lifestyle</h2>
                    </div>
                    <!-- post -->
                    <div class="post">
                        <a class="post-img" href="blog-post.html"><img src="website/./img/post-6.jpg" alt=""></a>
                        <div class="post-body">
                            <div class="post-category">
                                <a href="category.html">Fsashion</a>
                                <a href="category.html">Lifestyle</a>
                            </div>
                            <h3 class="post-title"><a href="blog-post.html">Postea senserit id eos, vivendo periculis ei qui</a></h3>
                            <ul class="post-meta">
                                <li><a href="author.html">John Doe</a></li>
                                <li>20 April 2018</li>
                            </ul>
                        </div>
                    </div>
                    <!-- /post -->
                </div>
                <div class="col-md-4">
                    <div class="section-title">
                        <h2 class="title">Fashion</h2>
                    </div>
                    <!-- post -->
                    <div class="post">
                        <a class="post-img" href="blog-post.html"><img src="website/./img/post-5.jpg" alt=""></a>
                        <div class="post-body">
                            <div class="post-category">
                                <a href="category.html">Lifestyle</a>
                            </div>
                            <h3 class="post-title"><a href="blog-post.html">Sed ut perspiciatis, unde omnis iste natus error sit</a></h3>
                            <ul class="post-meta">
                                <li><a href="author.html">John Doe</a></li>
                                <li>20 April 2018</li>
                            </ul>
                        </div>
                    </div>
                    <!-- /post -->
                </div>
                <div class="col-md-4">
                    <div class="section-title">
                        <h2 class="title">Health</h2>
                    </div>
                    <!-- post -->
                    <div class="post">
                        <a class="post-img" href="blog-post.html"><img src="website/./img/post-9.jpg" alt=""></a>
                        <div class="post-body">
                            <div class="post-category">
                                <a href="category.html">Lifestyle</a>
                            </div>
                            <h3 class="post-title"><a href="blog-post.html">Mel ut impetus suscipit tincidunt. Cum id ullum laboramus persequeris.</a></h3>
                            <ul class="post-meta">
                                <li><a href="author.html">John Doe</a></li>
                                <li>20 April 2018</li>
                            </ul>
                        </div>
                    </div>
                    <!-- /post -->
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-8">
                    <!-- post -->
                    <div class="post post-row">
                        <a class="post-img" href="blog-post.html"><img src="website/./img/post-13.jpg" alt=""></a>
                        <div class="post-body">
                            <div class="post-category">
                                <a href="category.html">Travel</a>
                                <a href="category.html">Lifestyle</a>
                            </div>
                            <h3 class="post-title"><a href="blog-post.html">Mel ut impetus suscipit tincidunt. Cum id ullum laboramus persequeris.</a></h3>
                            <ul class="post-meta">
                                <li><a href="author.html">John Doe</a></li>
                                <li>20 April 2018</li>
                            </ul>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
                        </div>
                    </div>
                    <!-- /post -->

                    <!-- post -->
                    <div class="post post-row">
                        <a class="post-img" href="blog-post.html"><img src="website/./img/post-1.jpg" alt=""></a>
                        <div class="post-body">
                            <div class="post-category">
                                <a href="category.html">Travel</a>
                            </div>
                            <h3 class="post-title"><a href="blog-post.html">Sed ut perspiciatis, unde omnis iste natus error sit</a></h3>
                            <ul class="post-meta">
                                <li><a href="author.html">John Doe</a></li>
                                <li>20 April 2018</li>
                            </ul>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
                        </div>
                    </div>
                    <!-- /post -->

                    <!-- post -->
                    <div class="post post-row">
                        <a class="post-img" href="blog-post.html"><img src="website/./img/post-5.jpg" alt=""></a>
                        <div class="post-body">
                            <div class="post-category">
                                <a href="category.html">Lifestyle</a>
                            </div>
                            <h3 class="post-title"><a href="blog-post.html">Postea senserit id eos, vivendo periculis ei qui</a></h3>
                            <ul class="post-meta">
                                <li><a href="author.html">John Doe</a></li>
                                <li>20 April 2018</li>
                            </ul>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
                        </div>
                    </div>
                    <!-- /post -->

                    <div class="section-row loadmore text-center">
                        <a href="#" class="primary-button">Load More</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- galery widget -->
                    <div class="aside-widget">
                        <div class="section-title">
                            <h2 class="title">Instagram</h2>
                        </div>
                        <div class="galery-widget">
                            <ul>
                                @foreach($posts as $post)
                                    <li><a href="#"><img src="{{ $post->featured }}" alt=""></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- /galery widget -->

                    <!-- Ad widget -->
                    <div class="aside-widget text-center">
                        <a href="#" style="display: inline-block;margin: auto;">
                            <img class="img-responsive" src="website/./img/ad-1.jpg" alt="">
                        </a>
                    </div>
                    <!-- /Ad widget -->
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

@endsection