@extends('layouts.app')

@section('title', 'Главная страница')
@section('description', 'Главная страница')

@section('content')

    <h1>FUCK YOU! TO</h1>
    <ul>
        <li><a href="{{ route('admin.index') }}">Админка</a></li>
        <li><a href="{{ route('catalog.index') }}">Каталог на сайте</a></li>
    </ul>
    
@endsection