@extends('layouts.app')

@section('title', 'Сертификаты')
@section('description', 'Скачать сертификаты на метизную продукцию')

@push('icons')
    @include('icons')
@endpush

@section('content')
    <div class="col-md-12">
        <div class="text-center fix-section mb-4">
            <h1>Сертификаты</h1>
        </div>
    </div>
    <div class="row">
        @foreach(array_fill(0, 5, '') as $item)
            <div class="col-md-6 d-flex">
                <div class="fix-section card w-100 mb-4 p-4 text-center">
                    <h4>Анкерная техника</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-4">
                                <a href="#">
                                    <img class="object-cover img-fluid" src="/images/test-cert.jpg" width="180" height="250" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-4">
                                <a href="#">
                                    <img class="object-cover img-fluid" src="/images/test-cert.jpg" width="180" height="250" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-4">
                                <a href="#">
                                    <img class="object-cover img-fluid" src="/images/test-cert.jpg" width="180" height="250" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <a class="text-decoration-file" href="#" target="_blank" download>
                        <svg class="bi" width="1em" height="1em">
                            <use xlink:href="#icon-file-mixed"></use>
                        </svg>
                        file.xls
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection