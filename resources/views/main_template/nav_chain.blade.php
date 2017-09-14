<section class="title">
    <div class="container">
        <div class="row-fluid">
            <div class="span6">
                <h1>@if(isset($chainResult['page_name'])) {!! $chainResult['page_name'] !!} @else  Title @endif</h1>
            </div>
            <div class="span6">
                <ul class="breadcrumb pull-right">
                    <li><a href="index.html">Home</a> <span class="divider">/</span></li>
                    <li><a href="#">Pages</a> <span class="divider">/</span></li>
                    <li class="active">Blog Item</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- / .title -->