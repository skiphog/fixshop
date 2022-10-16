<?php

/**
 * @var \App\Models\Category[]|\Illuminate\Database\Eloquent\Collection $categories
 */

?>
@if($categories->isNotEmpty())
    <div class="row text-center row-cols-2 row-cols-lg-3 row-cols-xl-4 g-4 mb-5">
        @foreach($categories as $category)
            <div class="col">
                <a class="card align-items-center h-100 p-2 text-decoration-none fix-shadow-hover"
                        href="{{ route('catalog.show', $category) }}">
                    <img class="img-fluid" src="{{ asset($category->img) }}" width="150" height="100" alt="{{ $category->title }}">
                    <div class="card-body d-flex flex-column px-1 pt-3 pb-1">
                        <h6 class="text-dark">{{ $category->title }}</h6>
                        <div class="mt-auto text-muted">{{ $category->standard }}</div>
                        <small class="text-black-50">{{ $category->extra }}</small>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endif
