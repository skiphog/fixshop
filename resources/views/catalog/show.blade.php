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
            @include('catalog.menu', ['catalog' => \App\Models\Category::tree(), 'class' => 'list-unstyled'])
        </div>
        <div class="col-md-8 col-lg-9">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('catalog.index') }}">Каталог</a></li>
                    @foreach($category->breadcrumbs as $item)
                        <li class="breadcrumb-item">
                            <a href="{{ route('catalog.show', $item['slug']) }}">{{ $item['nav'] }}</a>
                        </li>
                    @endforeach
                    <li class="breadcrumb-item active"><span>{{ $category->nav }}</span></li>
                </ol>
            </nav>

            <div class="d-flex flex-column flex-sm-row align-items-sm-center p-1 p-sm-3 bg-light mb-3 rounded-3 border shadow-sm">
                <div>
                    <img src="{{ "/images/{$category->img}" }}" width="150" height="100" alt="{{ $category->title }}">
                </div>
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

            @include('catalog.catalog', ['categories' => $category->children])
        </div>
    </div>
@endsection