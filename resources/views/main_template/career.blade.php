@include('main_template.header')

{!! $navChain !!}
<!-- / .title -->

<!-- Career -->
<section id="career" class="container">
    <div class="center">
        <h2>Pellentesque habitant morbi tristique senectus et netus</h2>
        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum
            tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas
            semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
    </div>
    <hr>
    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor
        quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean
        ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra.
        Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget
        tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis
        pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu
        vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis
        luctus, metus</p>

    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor
        quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean
        ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra.
        Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet</p>

    <hr>

    <p>&nbsp;</p>
    <div class="row-fluid">
        @if(count($result['vacancy'] > 0))
            @foreach((array)$result['vacancy'] as $vacancyColumn)
                <div class="span6">
                    @if(count($vacancyColumn) > 0)
                        @foreach((array)$vacancyColumn as $vacancy)
                            <h3>{{ $vacancy['name'] }}</h3>
                            <p>{{ $vacancy['text'] }}</p>

                            @if(count($vacancy['vacancy_requirement']) > 0)
                                <h4>Requirements</h4>
                                <ul class="arrow">
                                    @foreach((array)$vacancy['vacancy_requirement'] as $vacancyRequirement)
                                        <li>{{ $vacancyRequirement['name'] }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            <hr>
                        @endforeach
                    @endif
                </div>
            @endforeach
        @endif
    </div>

</section>
<!-- /Career -->

@include('main_template.footer')