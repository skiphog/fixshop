@extends('layouts.app')

@section('title', 'Сертификаты')
@section('description', 'Скачать сертификаты на метизную продукцию')

@push('icons')
    @include('icons')
@endpush

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/lightbox.min.css') }}">
@endpush

@section('content')
    <section id="certificates-header" class="certificates-header container mb-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-decoration-none" href="/">Главная</a></li>
                <li class="breadcrumb-item active" aria-current="page">Сертификаты</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="fix-section">
                    <h1>Сертификаты</h1>
                </div>
            </div>
        </div>
    </section>
    <section id="certificates" class="certificates container mb-4">
        <div class="row">
            @foreach(array_fill(0, 5, '') as $item)
                <div class="col-md-6 d-flex text-center">
                    <div class="fix-section w-100 mb-4 p-4">
                        <h4>Анкерная техника</h4>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <a href="/images/test-cert.jpg" data-lightbox="roadtrip">
                                        <img class="object-cover img-fluid" src="/images/test-cert.jpg" width="180" height="250" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <a href="/images/test-cert.jpg" data-lightbox="roadtrip">
                                        <img class="object-cover img-fluid" src="/images/test-cert.jpg" width="180" height="250" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <a href="/images/test-cert.jpg" data-lightbox="roadtrip">
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
    </section>
@endsection
@push('scripts')
    <script src="{{ asset('js/lightbox.min.js') }}"></script>
@endpush