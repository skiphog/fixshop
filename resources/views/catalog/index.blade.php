<?php

/**
 * @var \App\Models\Category[] $categories
 */

?>
@extends('layouts.app')

@section('title', 'Каталог')
@section('description', 'Каталог')

@section('content')
    <div class="row">
        <div class="col-md-4 col-lg-3 d-none d-md-block">
            <div class="fix-menu">
                <ul class="list-unstyled">
                    @foreach($categories as $category)
                        <li><a href="{{ route('catalog.show', $category) }}">{{ $category->nav }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-md-8 col-lg-9">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><span>Каталог</span></li>
                </ol>
            </nav>
            <h1>Каталог товаров</h1>
            @include('catalog.categories', compact('categories'))
        </div>
    </div>

@endsection