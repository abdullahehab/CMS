@extends('index')


@section('header')

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

@endsection

@section('title', 'User Posts')
<!-- SECTION -->

@section('content')
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-8">
                    @if($posts->count() == 0)
                        <p style="text-align: center; color: #c7254e">No posts</p>
                    @endif

                    @foreach($posts as $post)
                    <!-- post -->
                        <div class="post post-row">
                            <a class="post-img" href="{{ route('post.show', ['slug' => $post->slug]) }}"><img src="{{ $post->featured }}" alt=""></a>
                            <div class="post-body">
                                <div class="post-category">
                                    <h3 style="color: #c7254e;" href="">{{ $post->title }}</h3>
                                    <h4 ></h4>
                                </div>
                                <ul class="post-meta">
                                    <li><a>{{ \Illuminate\Support\Facades\Auth::user()->name }}</a></li>
                                    <li>{{ $post->created_at->toFormattedDateString() }}</li>

                                    <li>
                                        <a href="{{ route('UserPost.edit', ['id' => $post->id]) }}">
                                            <span class="glyphicon glyphicon-edit"></span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{ route('UserPost.destroy', ['id' => $post->id]) }}">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                    </li>
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
                    <!-- category widget -->
                    <div class="aside-widget">
                        <div class="section-title">
                            <h2 class="title">Total Posts</h2>
                        </div>
                        <div class="category-widget">
                            <ul>
                                <li><a href="#">Posts <span>{{ $posts->count() }}</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /category widget -->
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
@endsection

<!-- /SECTION -->
