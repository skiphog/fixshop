<?php

/**
 * @var \App\Models\Category $category
 */

?>
@extends('layouts.app')

@section('title', $category->title)
@section('description', $category->title)

@section('content')
    <div class="row">
        <div class="col-md-4 col-lg-3 d-none d-md-block">
            @include('catalog.catalog', ['catalog' => \App\Models\Category::tree(), 'class' => 'list-unstyled'])
        </div>
        <div class="col-md-8 col-lg-9">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('catalog.index') }}">Каталог</a></li>
                    @foreach($category->breadcrumbs as $item)
                        <li class="breadcrumb-item">
                            <a href="{{ route('catalog.show', $item['slug']) }}">{{ $item['nav'] }}</a></li>
                    @endforeach
                    <li class="breadcrumb-item active"><span>{{ $category->nav }}</span></li>
                </ol>
            </nav>

            <h1>{{ $category->title }}</h1>
            @if(!empty($category->standard))
                <p>{{ $category->standard }}</p>
            @endif
            @if(!empty($category->extra))
                <p>{{ $category->extra }}</p>
            @endif

            <div class="mb-3">
                {!! $category->content !!}
            </div>

            <div class="row text-center row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-4 mb-5">
                @foreach($category->children as $category)
                    <div class="col">
                        <a class="card align-items-center h-100 p-1" href="{{ route('catalog.show', $category) }}">
                            <img class="img-fluid" src="{{ "/images/{$category->img}" }}" width="150" height="100" alt="{{ $category->title }}">
                            <div class="card-body">
                                <h6 class="card-subtitle text-muted">{{ $category->title }}</h6>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection