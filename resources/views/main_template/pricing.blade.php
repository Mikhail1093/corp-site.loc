@include('main_template.header')

{!! $navChain !!}
<!-- / .title -->

<section id="pricing-table" class="container">
    <div class="center">
        <h2>Pellentesque habitant morbi tristique senectus et netus</h2>
        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum
            tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas
            semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
    </div>

    <div class="big-gap"></div>

    <div class="row-fluid center clearfix">
        @if(count($result['pricing']) > 0)
            @foreach((array)$result['pricing'] as $priceItem)
                <div class="span3">
                    <ul class="plan {{ $priceItem['tariff_plan_style_class'] }}">
                        <li class="plan-name">
                            <h3>{{ $priceItem['name'] }}</h3>
                        </li>
                        @if(count($priceItem['description']) > 0)
                            @foreach((array)$priceItem['description'] as $descriptionItem)
                                <li class="plan-price">
                                    <strong>{{ $descriptionItem[0] }}</strong> / {{ $descriptionItem[1] }}
                                </li>
                            @endforeach
                        @endif
                        <li class="plan-action">
                            <a href="#" class="btn btn-transparent">Signup Now!</a>
                        </li>
                    </ul>
                </div>
            @endforeach
        @endif
    </div>
    <p>&nbsp;</p>
</section>

@include('main_template.footer')