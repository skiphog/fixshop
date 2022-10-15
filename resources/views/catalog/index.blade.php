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
            <ul class="list-unstyled">
                <li class="mb-3"><a href="{{ route('catalog.index') }}">Каталог</a></li>
                @foreach($categories as $category)
                    <li><a href="{{ route('catalog.show', $category) }}">{{ $category->nav }}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-8 col-lg-9">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><span>Каталог</span></li>
                </ol>
            </nav>
            <h1>Каталог товаров</h1>
            <div class="row text-center row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-4 mb-5">
                @foreach($categories as $category)
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