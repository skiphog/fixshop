@extends('layouts.admin')

@section('title', 'Админка')
@section('description', 'Админка')

@section('content')
    <h1>Админка</h1>
    @include('admin.categories.list', ['list' => \App\Models\Category::tree()])
@endsection