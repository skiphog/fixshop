@extends('layouts.admin')

@section('title', 'Категории')
@section('description', 'Категории')

@section('content')
    <h1>Категории</h1>
    @include('admin.categories.list', ['list' => \App\Models\Category::tree()])
@endsection