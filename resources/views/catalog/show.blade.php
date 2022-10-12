<?php

/**
 * @var \App\Models\Category $category
*/

?>
@extends('layouts.app')

@section('title', $category->title)
@section('description', $category->title)

@section('content')
    <nav aria-label="breadcrumb" class="breadcrumb-skip">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('catalog.index') }}">Каталог</a></li>
            @foreach($category->breadcrumbs as $item)
                <li class="breadcrumb-item"><a href="{{ route('catalog.show', $item['slug']) }}">{{ $item['nav'] }}</a></li>
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

    <ul class="mb-3">
        @foreach($category->children as $child)
            <li><a href="{{ route('catalog.show', $child) }}">{{ $child->title }}</a></li>
        @endforeach
    </ul>

@endsection