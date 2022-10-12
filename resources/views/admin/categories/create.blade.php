<?php

/**
 * @var \App\Models\Category $category
 */

?>
@extends('layouts.admin')

@section('title', 'Создать категорию')
@section('description', 'Создать категорию')

@section('content')
    <h1>Создать категорию</h1>

    @include('admin.categories.form')
@endsection