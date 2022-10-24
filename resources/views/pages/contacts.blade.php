@extends('layouts.app')

@section('title', 'Контакты')
@section('description', 'Контакты Усинск - Метизыч')

@push('icons')
    @include('icons')
@endpush

@section('content')
    <div class="col-md-12">
        <div class="text-center fix-section mb-4">
            <h1>Контакты</h1>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card fix-section mb-4 text-center">
            <div class="row">
                <div class="col-md-3">
                    <img class="object-cover" src="/images/operator.jpg" width="100%" height="100%" alt="" >
                </div>
                <div class="col-md-2">
                    <p class="">
                        <svg class="bi" width="1em" height="1em">
                            <use xlink:href="#icon-house"></use>
                        </svg>
                    </p>
                    <p class="">г. Усинск, ул. Нефтяников, 46</p>
                </div>
                <div class="col-md-2">
                    <p class="">
                        <svg class="bi" width="1em" height="1em">
                            <use xlink:href="#icon-phone"></use>
                        </svg>
                    </p>
                    <p>8 (82144) 23-0-27</p>
                    <p>8-912-17-00-113</p>
                </div>
                <div class="col-md-2">
                    <p class="">
                        <svg class="bi" width="1em" height="1em">
                            <use xlink:href="#icon-email"></use>
                        </svg>
                    </p>
                    <p>
                        <a href="#">metiz-11@mail.ru</a>
                    </p>
                </div>
                <div class="col-md-3">
                    <p class="">
                        <svg class="bi" width="1em" height="1em">
                            <use xlink:href="#icon-calendar"></use>
                        </svg>
                    </p>
                    <ul class="list-unstyled mb-0">
                        <li class="pb-1 mb-2">
                            <span class="d-block text-muted mb-1">Пн - Чт</span>
                            <span class="fw-medium">10:00 - 19:00</span>
                        </li>
                        <li class="pb-1 mb-2">
                            <span class="d-block text-muted mb-1">Пт - Сб</span>
                            <span class="fw-medium">10:00 - 18:00</span>
                        </li>
                        <li class="pb-1 mb-2">
                            <span class="d-block text-muted mb-1">Вс</span>
                            <span class="fw-medium">11:00 - 17:00</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="text-center fix-section mb-4">
            <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Ab87b527d43ca277d105d3ab171f333075c1f4991df38f832cd0621659f5f5ce0&amp;width=100%25&amp;height=400&amp;lang=ru_RU&amp;scroll=true"></script>
        </div>
    </div>
@endsection