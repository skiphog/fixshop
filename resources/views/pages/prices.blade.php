@extends('layouts.app')

@section('title', 'Прайс-листы')
@section('description', 'Прайс-листы Усинск - Метизыч')

@push('icons')
    @include('icons')
@endpush

@section('content')
    <section id="prices-header" class="prices-header container mb-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-decoration-none" href="/">Главная</a></li>
                <li class="breadcrumb-item active" aria-current="page">Прайс-листы</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="fix-section">
                    <h1>Скачать прайс-листы</h1>
                </div>
            </div>
        </div>
    </section>
    <section id="prices" class="prices container mb-4">
        <div class="row">
            <div class="col-md-12">
                <div class="fix-section">
                    <table class="table table-hover caption-top">
                        <caption>Цены действительны на</caption>
                        <thead>
                        <tr>
                            <th scope="col">Название файла</th>
                            <th scope="col">Описание</th>
                            <th scope="col">Размер</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(array_fill(0, 5, '') as $item)
                            <tr>
                                <th scope="row">
                                    <a class="text-decoration-none" href="#" target="_blank" download>
                                        <svg class="bi" width="1em" height="1em">
                                            <use xlink:href="#icon-file-table"></use>
                                        </svg>
                                        file.xls
                                    </a>
                                </th>
                                <td>Очень крутое описание</td>
                                <td>5 Мб</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection