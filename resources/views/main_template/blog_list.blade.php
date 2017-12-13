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
                            <a class="btn btn-link" href="{{ route('blog_single', [$post['code']], false)  }}">{{ trans('blog.read_more ') }}<i
                                        class="icon-angle-right"></i></a>
                        </div>
                @endforeach
            @endif
            <!-- End Blog Item -->
                <div class="gap"></div>

                <!-- Paginationa -->
                <div class="pagination">
                    {!! $pager !!}
                </div>
            </div>
        </div>
        {{--rigth bar--}}
        {!! $rightBar !!}
    </div>
</section>

@include('main_template.footer')