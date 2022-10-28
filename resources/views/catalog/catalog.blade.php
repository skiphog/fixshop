<?php

/**
 * @var \App\Models\Category   $category
 * @var \App\Models\CartItem[] $items
 */

?>
<section id="catalog-header" class="catalog-header container mb-4">
    @include('catalog.breadcrumbs')
</section>
<section class="catalog container mb-4">
    <div class="row">
        <aside class="col-lg-4">
            <button class="btn btn-sm btn-primary fixed-bottom d-lg-none w-100 rounded-0"
                    type="button"
                    data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasResponsive"
                    aria-controls="offcanvasResponsive">
                Все категории
            </button>
            <div class="offcanvas-lg offcanvas-end" tabindex="-1" id="offcanvasResponsive" aria-labelledby="offcanvasResponsiveLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasResponsiveLabel">Категории</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasResponsive" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <div class="card card-body fix-section overflow-hidden mb-4">
                        <h3 class="h5">Категории</h3>
                        <div class="fix-menu">
                            @include('catalog.menu', ['catalog' => \App\Models\Category::tree(), 'class' => 'nav flex-column fs-sm'])
                        </div>
                    </div>
                </div>
            </div>
        </aside>
        <div class="col-lg-8">
            <div class="d-flex flex-column flex-sm-row align-items-sm-center p-1 p-sm-3 bg-light mb-3 rounded-3 border shadow-sm">
                <img src="{{ asset($category->img) }}" width="150" height="100" alt="{{ $category->title }}">
                <div class="p-1 p-sm-3">
                    <h1>{{ $category->title }}</h1>
                    @if(!empty($category->standard))
                        <h5 class="text-muted">{{ $category->standard }}</h5>
                    @endif
                    @if(!empty($category->extra))
                        <p class="text-black-50"><small>{{ $category->extra }}</small></p>
                    @endif
                    <div class="mb-3">
                        {!! $category->content !!}
                    </div>
                </div>
            </div>
            @include('catalog.categories', ['categories' => $category->children])
            @include('catalog.products', ['products' => $category->products, 'items' => $items])
        </div>
    </div>
</section>