@include('main_template.header')

{!! $navChain !!}
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