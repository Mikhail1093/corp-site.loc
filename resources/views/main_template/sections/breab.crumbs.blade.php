<?php
/**
 * @var $title
 * @var array $result
 */
?>
<section class="title">
    <div class="container">
        <div class="row-fluid">
            <div class="span6">
                <h1>{{ $title }}</h1>
            </div>
            <div class="span6">
                <ul class="breadcrumb pull-right">
                    <li><a href="index.html">Home</a> <span class="divider">/</span></li>
                    @foreach((array)$result['bread_crumbs'] as $breadCrumb)
                        <li class="active">
                            <span class="divider">/</span>
                            {{ $breadCrumb['name'] }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>