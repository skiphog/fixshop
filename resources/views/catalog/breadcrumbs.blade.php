<?php

/**
 * @var \App\Models\Category   $category
 * @var \App\Models\CartItem[] $items
 */

?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('catalog.index') }}">Каталог</a></li>
        @foreach($category->breadcrumbs as $item)
            <li class="breadcrumb-item">
                <a class="catalog-link" href="{{ route('catalog.show', $item['slug']) }}">{{ $item['nav'] }}</a>
            </li>
        @endforeach
        <li class="breadcrumb-item active"><span>{{ $category->nav }}</span></li>
    </ol>
</nav>
<div class="row">
    <div class="col-md-12 text-center">
        <div class="fix-section">
            <h1>Каталог товаров</h1>
        </div>
    </div>
</div>