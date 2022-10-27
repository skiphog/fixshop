<?php

/**
 * @var \App\Models\Category   $category
 * @var \App\Models\CartItem[] $items
 */

?>
@extends('layouts.app')

@section('title', $category->title)
@section('description', $category->title)

@push('icons')
    @include('catalog.icons')
@endpush

@section('content')
    <section id="catalog-header" class="catalog-header container mb-4">
        @include('catalog.breadcrumbs')
    </section>
    <section id="catalog" class="catalog container mb-4">
        @include('catalog.catalog')
    </section>
@endsection

@push('scripts')
    <script src="{{ asset('js/catalog.js') }}"></script>
@endpush