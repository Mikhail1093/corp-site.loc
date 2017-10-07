@include('main_template.header')
{!! $navChain !!}

<section id="about-us" class="container main">
    <div class="row-fluid">
        <div class="span8">
            <div class="blog">
                @if(count($result['posts']) > 0)
                    @foreach((array)$result['posts'] as $post)
                        <div class="blog-item well">
                            <a href="{{ route('blog_single', [$post['code']], false)  }}">
                                <h2>{{ $post['name'] }}</h2>
                            </a>
                            <div class="blog-meta clearfix">
                                <p class="pull-left">
                                    <i class="icon-user"></i> by <a href="#">{{ $post['user']['name'] }}</a> | <i class="icon-folder-close"></i>
                                    Category <a href="#">{{ $post['blog_catigorie']['name'] }}
                                    </a> | <i class="icon-calendar"></i> {{ $post['created_at'] }}
                                </p>
                                <p class="pull-right"><i class="icon-comment pull"></i>
                                    <a href="blog-item.html#comments">
                                        {{ $post['comment'] }} {{ trans_choice('blog.comment', $post['comment']) }}
                                    </a></p>
                            </div>
                            <p><img src="{{ $post['preview_picture'] }}" width="100%" alt=""/></p>
                            <p>{{ $post['preview_text'] }}</p>
                            <a class="btn btn-link" href="#">{{ trans('blog.read_more ') }}<i class="icon-angle-right"></i></a>
                        </div>
                    @endforeach
                @endif
                <!-- End Blog Item -->

                <div class="gap"></div>

                <!-- Paginationa -->
                <div class="pagination">
                    <ul>
                        <li><a href="#"><i class="icon-angle-left"></i></a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#"><i class="icon-angle-right"></i></a></li>
                    </ul>
                </div>


            </div>
        </div>

        {{--rigth bar--}}
        {!! $rightBar !!}

    </div>

</section>

<!--Bottom-->
<section id="bottom" class="main">
    <!--Container-->
    <div class="container">

        <!--row-fluids-->
        <div class="row-fluid">

            <!--Contact Form-->
            <div class="span3">
                <h4>ADDRESS</h4>
                <ul class="unstyled address">
                    <li>
                        <i class="icon-home"></i><strong>Address:</strong> 1032 Wayback Lane, Wantagh<br>NY 11793
                    </li>
                    <li>
                        <i class="icon-envelope"></i>
                        <strong>Email: </strong> support@email.com
                    </li>
                    <li>
                        <i class="icon-globe"></i>
                        <strong>Website:</strong> www.domain.com
                    </li>
                    <li>
                        <i class="icon-phone"></i>
                        <strong>Toll Free:</strong> 631-409-3105
                    </li>
                </ul>
            </div>
            <!--End Contact Form-->

            <!--Important Links-->
            <div id="tweets" class="span3">
                <h4>OUR COMPANY</h4>
                <div>
                    <ul class="arrow">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Support</a></li>
                        <li><a href="#">Terms of Use</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Copyright</a></li>
                        <li><a href="#">We are hiring</a></li>
                        <li><a href="#">Clients</a></li>
                        <li><a href="#">Blog</a></li>
                    </ul>
                </div>
            </div>
            <!--Important Links-->

            <!--Archives-->
            <div id="archives" class="span3">
                <h4>ARCHIVES</h4>
                <div>
                    <ul class="arrow">
                        <li><a href="#">December 2012 (1)</a></li>
                        <li><a href="#">November 2012 (5)</a></li>
                        <li><a href="#">October 2012 (8)</a></li>
                        <li><a href="#">September 2012 (10)</a></li>
                        <li><a href="#">August 2012 (29)</a></li>
                        <li><a href="#">July 2012 (1)</a></li>
                        <li><a href="#">June 2012 (31)</a></li>
                    </ul>
                </div>
            </div>
            <!--End Archives-->

            <div class="span3">
                <h4>FLICKR GALLERY</h4>
                <div class="row-fluid first">
                    <ul class="thumbnails">
                        <li class="span3">
                            <a href="http://www.flickr.com/photos/76029035@N02/6829540293/"
                               title="01 (254) by Victor1558, on Flickr"><img
                                        src="http://farm8.staticflickr.com/7003/6829540293_bd99363818_s.jpg" width="75"
                                        height="75" alt="01 (254)"></a>
                        </li>
                        <li class="span3">
                            <a href="http://www.flickr.com/photos/76029035@N02/6829537417/"
                               title="01 (196) by Victor1558, on Flickr"><img
                                        src="http://farm8.staticflickr.com/7013/6829537417_465d28e1db_s.jpg" width="75"
                                        height="75" alt="01 (196)"></a>
                        </li>
                        <li class="span3">
                            <a href="http://www.flickr.com/photos/76029035@N02/6829527437/"
                               title="01 (65) by Victor1558, on Flickr"><img
                                        src="http://farm8.staticflickr.com/7021/6829527437_88364c7ec4_s.jpg" width="75"
                                        height="75" alt="01 (65)"></a>
                        </li>
                        <li class="span3">
                            <a href="http://www.flickr.com/photos/76029035@N02/6829524451/"
                               title="01 (6) by Victor1558, on Flickr"><img
                                        src="http://farm8.staticflickr.com/7148/6829524451_a725793358_s.jpg" width="75"
                                        height="75" alt="01 (6)"></a>
                        </li>
                    </ul>
                </div>
                <div class="row-fluid">
                    <ul class="thumbnails">
                        <li class="span3">
                            <a href="http://www.flickr.com/photos/76029035@N02/6829524451/"
                               title="01 (6) by Victor1558, on Flickr"><img
                                        src="http://farm8.staticflickr.com/7148/6829524451_a725793358_s.jpg" width="75"
                                        height="75" alt="01 (6)"></a>
                        </li>
                        <li class="span3">
                            <a href="http://www.flickr.com/photos/76029035@N02/6829540293/"
                               title="01 (254) by Victor1558, on Flickr"><img
                                        src="http://farm8.staticflickr.com/7003/6829540293_bd99363818_s.jpg" width="75"
                                        height="75" alt="01 (254)"></a>
                        </li>
                        <li class="span3">
                            <a href="http://www.flickr.com/photos/76029035@N02/6829537417/"
                               title="01 (196) by Victor1558, on Flickr"><img
                                        src="http://farm8.staticflickr.com/7013/6829537417_465d28e1db_s.jpg" width="75"
                                        height="75" alt="01 (196)"></a>
                        </li>
                        <li class="span3">
                            <a href="http://www.flickr.com/photos/76029035@N02/6829527437/"
                               title="01 (65) by Victor1558, on Flickr"><img
                                        src="http://farm8.staticflickr.com/7021/6829527437_88364c7ec4_s.jpg" width="75"
                                        height="75" alt="01 (65)"></a>
                        </li>
                    </ul>
                </div>

            </div>

        </div>
        <!--/row-fluid-->
    </div>
    <!--/container-->

</section>
<!--/bottom-->

@include('main_template.footer')