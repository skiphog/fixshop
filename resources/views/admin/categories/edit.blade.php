<?php

/**
 * @var \App\Models\Category $category
 */

?>
@extends('layouts.admin')

@section('title', "Редактировать: {$category->title}")
@section('description', "Редактировать: {$category->title}")

@section('content')
    <h1 class="fw-normal">{{ $category->title }}</h1>
    <p><a href="{{ $link = route('catalog.show', $category) }}">{{ $link }}</a></p>
    <nav aria-label="breadcrumb" class="breadcrumb-skip">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Каталог</a></li>
            @foreach($category->breadcrumbs as $item)
                <li class="breadcrumb-item"><a href="{{ route('admin.categories.edit', $item['id']) }}">{{ $item['nav'] }}</a></li>
            @endforeach
            <li class="breadcrumb-item active"><span>{{ $category->nav }}</span></li>
        </ol>
    </nav>

    @include('admin.categories.form')
@endsection