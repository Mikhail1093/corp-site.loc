@if(count($result) > 0)
    <div id="{{ $block_id }}" class="span3">
        <h4>{{ $title }}</h4>
        <div>
            <ul class="arrow">
                @foreach((array)$result as $item)
                    <li><a href="{{ $item['path'] }}">{{ $item['name'] }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
