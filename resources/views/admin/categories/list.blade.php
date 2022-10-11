<ul>
    @foreach($list as $item)
        @if(!empty($item['children']))
            <li><?= $item['nav']; ?></li>
            @include('admin.categories.list', ['list' => $item['children']])
        @endif
    @endforeach
</ul>