@include('main_template.header')

<section class="title">
    <div class="container">
        <div class="row-fluid">
            <div class="span6">
                <h1>{{ $title }}</h1>
            </div>
            <div class="span6">
                <ul class="breadcrumb pull-right">
                    <li><a href="index.html">Home</a> <span class="divider">/</span></li>
                    <li><a href="#">Pages</a> <span class="divider">/</span></li>
                    <li class="active">Portfolio</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- / .title -->

<section id="portfolio" class="container main">
    <ul class="gallery col-4">
        {{--todo в один шаблон с главной--}}
        @foreach((array)$result['portfolio'] as $work)
            <li>
                <div class="preview">
                    <img alt=" " src="{{ $work['image'] }}">
                    <div class="overlay">
                    </div>
                    <div class="links">
                        <a data-toggle="modal" href="#modal-{{ $work['id'] }}"><i class="icon-eye-open"></i></a>
                        <a href="#"><i
                                    class="icon-link"></i></a>
                    </div>
                </div>
                <div class="desc">
                    <h5>{{ $work['name'] }}</h5>
                </div>
                <div id="modal-{{ $work['id'] }}" class="modal hide fade">
                    <a class="close-modal" href="javascript:;" data-dismiss="modal" aria-hidden="true"><i
                                class="icon-remove"></i></a>
                    <div class="modal-body">
                        <img src="{{ $work['detail_picture'] }}" alt=" " width="100%"
                             style="max-height:400px">
                    </div>
                </div>
            </li>
        @endforeach
    </ul>

</section>




@include('main_template.footer')