@include('main_template.header')
<section class="title">
    <div class="container">
        <div class="row-fluid">
            <div class="span6">
                <h1>About Us</h1>
            </div>
            <div class="span6">
                <ul class="breadcrumb pull-right">
                    <li><a href="index.html">Home</a> <span class="divider">/</span></li>
                    <li class="active">About Us</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- / .title -->

<section id="about-us" class="container main">
    <div class="row-fluid">
        <div class="span6">
            <h2>What we are</h2>
            <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit
                consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet
                mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris
                vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia
                nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit
                amet a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc. Etiam
                pharetra, erat sed fermentum feugiat, velit mauris egestas quam, ut aliquam massa nisl quis neque.
                Suspendisse in orci enim.</p>
        </div>
        <div class="span6">
            <h2>Our Skills</h2>
            <div>
                @if(count($result['our_skills'] > 0))
                    @foreach((array)$result['our_skills'] as $skill)
                        <div class="progress {{ $skill['color_class'] }}">
                            <div class="bar"
                                 style="width: {{ $skill['progress_percent'] }}%; text-align:left; padding-left:10px;">
                                {{ $skill['name'] }}
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <hr>

    <!-- Meet the team -->
    <h1 class="center">Meet the Team</h1>

    <hr>

    <div class="row-fluid">
        @if(count($result['team'] > 0))
            @foreach((array)$result['team'] as $person)
                <div class="span3">
                    <div class="box">
                        <p><img src="{{ $person['image'] }}" alt="{{ $person['name'] }}"></p>
                        <h5>{{ $person['name'] }}</h5>
                        <p>{{ $person['text'] }}</p>
                        <a class="btn btn-social btn-facebook" href="{{ $person['fb_link'] }}">
                            <i class="icon-facebook"></i>
                        </a>
                        <a class="btn btn-social btn-google-plus" href="{{ $person['g_plus_link'] }}">
                            <i class="icon-google-plus"></i>
                        </a>
                        <a class="btn btn-social btn-twitter" href="{{ $person['twitter_link'] }}">
                            <i class="icon-twitter"></i>
                        </a>
                        <a class="btn btn-social btn-linkedin" href="{{ $person['vk_link'] }}">
                            <i class="icon-linkedin"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        @endif

    </div>
    <p>&nbsp;</p>
    <p></p>
    <hr>

    <div class="row-fluid">
        <div class="span6">
            <h3>Why Choose Us?</h3>
            <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit
                consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet
                mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris
                vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia
                nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit
                amet a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc. Etiam
                pharetra, erat sed fermentum feugiat, velit mauris egestas quam, ut aliquam massa nisl quis neque.
                Suspendisse in orci enim.</p>
        </div>
        <div class="span6">
            <h3>Our Services</h3>
            <div class="accordion" id="accordion2">
                @if(count($result['our_services'] > 0))
                    @foreach((array)$result['our_services'] as $service)
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2"
                                   href="#collapse{{ $service['id'] }}">
                                    {{ $service['name'] }}
                                </a>
                            </div>
                            <div id="collapse{{ $service['id'] }}" class="accordion-body collapse">
                                <div class="accordion-inner">{{ $service['text'] }}</div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</section>

@include('main_template.footer')