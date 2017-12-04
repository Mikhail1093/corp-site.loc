<?php
/**
 * @var array $chainResult
 */
?>
@if(isset($chainResult))
    <section class="title">
        <div class="container">
            <div class="row-fluid">
                <div class="span6">
                    <h1>@if(isset($chainResult['page_name'])) {!! $chainResult['page_name'] !!} @else  Title @endif</h1>
                </div>
                @if(isset($chainResult['breadCrumbs']))
                    <div class="span6">
                        <ul class="breadcrumb pull-right">
                            <li><a href="/">Главная</a> <span class="divider">/</span></li>
                            @foreach((array)$chainResult['breadCrumbs'] as $key => $breadCrumb)
                                @if('#' === $breadCrumb['path'] || $key === count($chainResult['breadCrumbs']) - 1)
                                    <li class="active"> {{ $breadCrumb['name'] }}</li>
                                @else
                                    <li>
                                        <a href="{{ $breadCrumb['path'] }}">{{ $breadCrumb['name'] }}</a>
                                        <span class="divider">/</span>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endif
<!-- / .title -->