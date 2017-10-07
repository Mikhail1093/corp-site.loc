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
                    <li class="active">Frequently Asked Questions</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- / .title -->

<section id="faqs" class="container">
    @if(count($result['faq']) > 0)
        @php
            $i = 0;
        @endphp
        @foreach((array)$result['faq'] as $question)
            @php
                $i++;
            @endphp
            <ul class="faq">
                <li>
                    <span class="number">{{ $i }}</span>
                    <div>
                        <h4>{{ $question['name'] }}</h4>
                        <p>{{ $question['text'] }}</p>
                    </div>
                </li>
            </ul>
        @endforeach
    @endif
    <p>&nbsp;</p>

</section>

@include('main_template.footer')