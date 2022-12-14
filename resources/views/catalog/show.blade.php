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
    <div id="catalog">
        @include('catalog.catalog')
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/catalog.js') }}"></script>
@endpush