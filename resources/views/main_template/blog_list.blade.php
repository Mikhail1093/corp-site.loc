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
                                    <i class="icon-user"></i> by <a href="#">{{ $post['user']['name'] }}</a> | <i
                                            class="icon-folder-close"></i>
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
                            <a class="btn btn-link" href="#">{{ trans('blog.read_more ') }}<i
                                        class="icon-angle-right"></i></a>
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

@include('main_template.footer')