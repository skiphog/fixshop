<?php

/**
 * @var \App\Models\Category[] $categories
 */

?>
@extends('layouts.app')

@section('title', 'Каталог')
@section('description', 'Каталог')

@section('content')
    <h1>Каталог</h1>
    <ul>
        @foreach($categories as $category)
            <li><a href="{{ route('catalog.show', $category) }}">{{ $category->title }}</a></li>
        @endforeach
    </ul>
@endsection