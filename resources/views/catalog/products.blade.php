<?php

/**
 * @var \App\Models\Product[]|\Illuminate\Database\Eloquent\Collection  $products
 * @var \App\Models\CartItem[]|\Illuminate\Database\Eloquent\Collection $items
 */

?>

@if($products->isNotEmpty())
    <div class="container-lg bg-light rounded-3 border shadow-sm">
        @foreach($products as $product)
            <div class="product-wrapper p-4 p-lg-1 bg-white my-2 rounded-3 border shadow-sm">
                <div class="product row gy-3 gy-lg-0 align-items-center">
                    <div class="col-lg-2 col-xxl-1">
                        <img src="{{ $product->img }}" width="70" loading="lazy" alt="{{ $product->title }}">
                    </div>
                    <div class="col-lg-3 col-xl-4 col-xxl-5">
                        <span class="text-break">{{ $product->title }}</span>
                    </div>
                    <div class="col-lg-3">
                        <span class="fw-bold text-muted">{{ $product->price_format }}</span>
                        <span>р.</span>
                        <span class="text-nowrap">{{ $product->unit }}</span>
                    </div>
                    <div class="col-lg-2">
                        <label>
                            @if($has = $items->has($product->id))
                                <input class="form-control" type="number" min="0"
                                        value="{{ $items[$product->id]->quantity }}"
                                        data-input="{{ $items[$product->id]->quantity }}">
                            @else
                                <input class="form-control" type="number" min="0" data-input="0">
                            @endif
                        </label>
                    </div>
                    <div class="col-lg-2 col-xl-1">
                        @if($has)
                            <button type="button" class="btn btn-success" data-product="{{ $product->id }}">
                                <svg class="bi" width="16" height="16">
                                    <use xlink:href="#icon-basket"></use>
                                </svg>
                            </button>
                        @else
                            <button type="button" class="btn btn-primary" data-product="{{ $product->id }}" disabled>
                                <svg class="bi" width="16" height="16">
                                    <use xlink:href="#icon-basket"></use>
                                </svg>
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
