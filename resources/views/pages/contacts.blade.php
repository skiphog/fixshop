@extends('layouts.app')

@section('title', 'Контакты')
@section('description', 'Контакты Усинск - Метизыч')

@push('icons')
    @include('icons')
@endpush

@section('content')
    <section id="contacts-header" class="contacts-header container mb-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-decoration-none" href="/">Главная</a></li>
                <li class="breadcrumb-item active" aria-current="page">Контакты</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="fix-section">
                    <h1>Контакты</h1>
                </div>
            </div>
        </div>
    </section>
    <section id="contacts" class="contacts container mb-4">
        <div class="row">
            <div class="col-md-12">
                <div class="fix-section px-0 py-0 overflow-hidden">
                    <div class="row g-0 align-items-center">
                        <div class="col-md-3 mb-4 mb-md-0">
                            <img class="object-cover w-100 h-auto" src="/images/operator.jpg" width="280" height="280" alt="">
                        </div>
                        <div class="col-md-9 text-center">
                            <div class="row g-0">
                                <div class="col-md-3 mb-4 mb-md-0">
                                    <div class="p-4">
                                        <div class="icon-square text-bg-primary d-flex align-items-center justify-content-center fs-4 m-auto mb-4">
                                            <svg class="bi" width="1em" height="1em">
                                                <use xlink:href="#icon-house"></use>
                                            </svg>
                                        </div>
                                        <h5>Адрес</h5>
                                        <p class="">г. Нижний Новгород, ул. Ленина, 46</p>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-4 mb-md-0">
                                    <div class="p-4">
                                        <div class="icon-square text-bg-primary d-flex align-items-center justify-content-center fs-4 m-auto mb-4">
                                            <svg class="bi" width="1em" height="1em">
                                                <use xlink:href="#icon-phone"></use>
                                            </svg>
                                        </div>
                                        <h5>Телефон</h5>
                                        <p class="mb-1">
                                            <a class="text-decoration-none" href="tel:+783120xxxxx">+7 (831) 20x‑xx‑xx</a>
                                        </p>
                                        <p>
                                            <a class="text-decoration-none" href="tel:+7831211xxxx">+7 (831) 211‑xx‑xx</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-4 mb-md-0">
                                    <div class="p-4">
                                        <div class="icon-square text-bg-primary d-flex align-items-center justify-content-center fs-4 m-auto mb-4">
                                            <svg class="bi" width="1em" height="1em">
                                                <use xlink:href="#icon-email"></use>
                                            </svg>
                                        </div>
                                        <h5>Электронная почта</h5>
                                        <p class="mb-1">
                                            <a class="text-decoration-none" href="mailto:fixshop@mail.ru">fixshop@mail.ru</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-4 mb-md-0">
                                    <div class="p-4">
                                        <div class="icon-square text-bg-primary d-flex align-items-center justify-content-center fs-4 m-auto mb-4">
                                            <svg class="bi" width="1em" height="1em">
                                                <use xlink:href="#icon-calendar"></use>
                                            </svg>
                                        </div>
                                        <h5>Режим работы</h5>
                                        <ul class="list-unstyled d-flex flex-column mb-0">
                                            <li class="mb-2">
                                                <p class="m-0">
                                                    <span class="fw-bold">Пн - Чт</span> 10:00 - 19:00
                                                </p>
                                            </li>
                                            <li class="mb-2">
                                                <p class="m-0">
                                                    <span class="fw-bold">Пт - Сб</span> 10:00 - 18:00
                                                </p>
                                            </li>
                                            <li class="mb-2">
                                                <p class="m-0">
                                                    <span class="fw-bold">Вс</span> 11:00 - 17:00
                                                </p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="map" class="map container mb-4">
        <div class="row">
            <div class="col-md-12">
                <div class="fix-section px-0 py-0">
                    <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Ab87b527d43ca277d105d3ab171f333075c1f4991df38f832cd0621659f5f5ce0&amp;width=100%25&amp;height=400&amp;lang=ru_RU&amp;scroll=true"></script>
                </div>
            </div>
        </div>
    </section>
@endsection