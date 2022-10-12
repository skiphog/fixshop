@extends('layouts.admin')

@section('title', 'Категории')
@section('description', 'Категории')

@section('content')
    <h1>Все категории</h1>
    <div class="mb-3">
        <a class="btn btn-primary" href="{{ route('admin.categories.create') }}">Создать категорию</a>
    </div>

    @include('admin.categories.list', ['list' => \App\Models\Category::tree()])
@endsection