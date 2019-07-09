 <!-- PAGE HEADER -->
 @include('include.header')

 <!-- PAGE HEADER -->
 <div id="post-header" class="page-header">
     <div class="page-header-bg" style="background-image: url('/website/./img/header-1.jpg');" data-stellar-background-ratio="0.5"></div>
     <div class="container">
         <div class="row">
             <div class="col-md-10">
                 <div class="post-category">
                     <h3 style="color: #c7254e;">{{ $category->name }}</h3>
                 </div>
                 <h1>Mel ut impetus suscipit tincidunt. Cum id ullum laboramus persequeris.</h1>
                 <ul class="post-meta">
                     <li><a href="author.html">John Doe</a></li>
                     <li>{{$category->created_at->toFormattedDateString()}}</li>
                     <li><i class="fa fa-comments"></i> 3</li>
                     <li><i class=""></i> {{ $category->posts->count() }}</li>
                 </ul>
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

                @if($posts->count() == 0)
                    <p style="text-align: center; color: #c7254e">No posts For: {{ $category->name }}</p>
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
<!-- /SECTION -->

<!-- FOOTER -->
@include('include.footer')
 <!-- /FOOTER -->

<!-- jQuery Plugins -->
@include('include.jQueryPlugins')

</body>

</html>
