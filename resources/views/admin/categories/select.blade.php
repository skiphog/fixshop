<?php

/**
 * @var array $categories
 * @var int   $shift
 * @var int   $parent_id
 * @var \App\Models\Category $category
 */

$crarr = str_repeat('&nbsp;&nbsp;&nbsp;', $shift) . str_repeat('&crarr;', $shift);

?>
@foreach($categories as $child)
    @if(!$category->id || $category->id !== $child['id'])
        <option value="{{ $child['id'] }}" @selected($parent_id === $child['id'])>{!! $crarr !!} {{ $child['nav'] }}</option>

        @if(!empty($child['children']))
            @include('admin.categories.select', ['categories' => $child['children'], 'shift' => $shift + 1])
        @endif
    @endif
@endforeach