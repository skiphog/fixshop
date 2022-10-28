<?php

/**
 * @var \App\Models\Category[] $categories
 */

?>
@extends('layouts.app')

@section('title', 'Каталог')
@section('description', 'Каталог')

@push('icons')
    @include('catalog.icons')
@endpush

@section('content')
    <div id="catalog">
        <section id="catalog-header" class="catalog-header container mb-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="/">Главная</a></li>
                    <li class="breadcrumb-item active"><span>Каталог</span></li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="fix-section">
                        <h1>Каталог товаров</h1>
                    </div>
                </div>
            </div>
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
                                    <ul class="nav flex-column fs-sm">
                                        @foreach($categories as $category)
                                            <li>
                                                <a class="catalog-link" href="{{ route('catalog.show', $category) }}">{{ $category->nav }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
                <div class="col-lg-8">
                    @include('catalog.categories', compact('categories'))
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/catalog.js') }}"></script>
@endpush