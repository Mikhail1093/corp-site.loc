<section class="title">
    <div class="container">
        <div class="row-fluid">
            <div class="span6">
                <h1>{{ $title }}</h1>
            </div>
            <div class="span6">
                <ul class="breadcrumb pull-right">
                    <li><a href="{{ @route('main_page') }}">Home</a> <span class="divider">/</span></li>
                    <li class="active">{{ $title }}</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- / .title -->