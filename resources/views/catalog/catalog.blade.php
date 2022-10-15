<?php

/**
 * @var array                $catalog
 * @var string               $class
 * @var \App\Models\Category $category
 */

?>
<ul class="{{ $class }}">
    @foreach($catalog as $item)
        <li>
            <a class="{{ $category->id === $item['id'] ? 'link-warning': '' }}" href="{{ route('catalog.show', $item['slug']) }}">
                {{ $item['nav'] }}
            </a>
        </li>
        @if(!empty($item['children']) && str_starts_with($category->slug, $item['slug']))
            @include('catalog.catalog', ['catalog' => $item['children'],'class' => ''])
        @endif
    @endforeach
</ul>