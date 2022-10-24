@extends('layouts.app')

@section('title', 'Прайс-листы')
@section('description', 'Прайс-листы Усинск - Метизыч')

@push('icons')
    @include('icons')
@endpush

@section('content')
    <div class="col-md-12">
        <div class="text-center fix-section mb-4">
            <h1>Скачать прайс-листы</h1>
        </div>
    </div>
    <div class="col-md-12 fix-section mb-4">
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
@endsection