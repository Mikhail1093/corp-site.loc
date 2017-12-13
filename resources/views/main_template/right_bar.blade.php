<aside class="span4">
    <div class="widget search">
        <form>
            <input type="text" class="input-block-level" placeholder="Search">
        </form>
    </div>
    <!-- /.search -->

    <div class="widget ads">
        <div class="row-fluid">
            <div class="span6">
                <a href="#"><img src="/public/static/images/ads/ad1.png" alt=""></a>
            </div>

            <div class="span6">
                <a href="#"><img src="/public/static/images/ads/ad2.png" alt=""></a>
            </div>
        </div>
        <p></p>
        <div class="row-fluid">
            <div class="span6">
                <a href="#"><img src="/public/static/images/ads/ad3.png" alt=""></a>
            </div>

            <div class="span6">
                <a href="#"><img src="/public/static/images/ads/ad4.png" alt=""></a>
            </div>
        </div>
    </div>
    <!-- /.ads -->

    <div class="widget widget-popular">
        <h3>Popular Posts</h3>
        <div class="widget-blog-items">
            <div class="widget-blog-item media">
                <div class="pull-left">
                    <div class="date">
                        <span class="month">Jun</span>
                        <span class="day">24</span>
                    </div>
                </div>
                <div class="media-body">
                    <a href="#"><h5>Duis sed odio sit amet nibh vulputate cursus a sit amet mauris</h5></a>
                </div>
            </div>

            <div class="widget-blog-item media">
                <div class="pull-left">
                    <div class="date">
                        <span class="month">Jun</span>
                        <span class="day">24</span>
                    </div>
                </div>
                <div class="media-body">
                    <a href="#"><h5>Duis sed odio sit amet nibh vulputate cursus a sit amet mauris</h5></a>
                </div>
            </div>

            <div class="widget-blog-item media">
                <div class="pull-left">
                    <div class="date">
                        <span class="month">Jun</span>
                        <span class="day">24</span>
                    </div>
                </div>
                <div class="media-body">
                    <a href="#"><h5>Duis sed odio sit amet nibh vulputate cursus a sit amet mauris</h5></a>
                </div>
            </div>

        </div>
    </div>
    <!-- End Popular Posts -->

    <div class="widget">
        <h3>Категории</h3>
        <div>
            <div class="row-fluid">
                @foreach((array)$categories as $categoryCol)
                    <div class="span6">
                        <ul class="unstyled">
                            @foreach((array)$categoryCol as $category)
                                <li><a href="#">{{ $category['name'] }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
    <!-- End Category Widget -->

    <div class="widget">
        <h3>Теги</h3>
        <ul class="tag-cloud unstyled">
            @foreach((array)$tagCloud as $tag)
                <li><a class="btn btn-mini btn-primary" href="#">{!! $tag !!}</a></li>
            @endforeach
        </ul>
    </div>
    <!-- End Tag Cloud Widget -->

    <div class="widget">
        <h3>Archive</h3>
        <ul class="archive arrow">
            <li><a href="#">May 2013</a></li>
            <li><a href="#">April 2013</a></li>
            <li><a href="#">March 2013</a></li>
            <li><a href="#">February 2013</a></li>
        </ul>
    </div>
    <!-- End Archive Widget -->

</aside>



