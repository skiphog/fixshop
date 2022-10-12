<ul>
    @foreach($list as $item)
        <li><a href="{{ route('admin.categories.edit', ['category' => $item['id']]) }}">{{ $item['nav'] }}</a></li>
        @if(!empty($item['children']))
            {{-- Раскрыть все, кроме последней категории --}}
            {{-- <li><?= $item['nav']; ?></li> --}}
            @include('admin.categories.list', ['list' => $item['children']])
        @endif
    @endforeach
</ul>