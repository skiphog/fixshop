<ul>
    @foreach($list as $item)
        <li><?= $item['nav']; ?></li>
        @if(!empty($item['children']))
            {{-- Раскрыть все, кроме последней категории --}}
            {{-- <li><?= $item['nav']; ?></li> --}}
            @include('admin.categories.list', ['list' => $item['children']])
        @endif
    @endforeach
</ul>