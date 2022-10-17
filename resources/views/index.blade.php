@extends('layouts.app')

@section('title', 'Главная страница')
@section('description', 'Главная страница')

@push('icons')
    @include('icons')
@endpush

@section('content')
    <div class="text-center mb-5">
        <h1>{{ config('app.name') }}</h1>
        <h2 class="text-muted">Крепёж по оптовым ценам</h2>
        <p class="lead">Вы всегда найдете крепеж у нас в ассортименте</p>
    </div>

    <div class="mb-5">
        <div class="row gy-3 text-center">
            <div class="col-12 col-sm-4">
                <a class="card text-decoration-none fix-shadow-hover" href="{{ route('catalog.index') }}">
                    <img class="img-fluid" src="/images/baza/gvozdi.jpg" width="640" height="480" alt="Крепёж">
                    <div class="card-body">
                        <h5 class="card-title text-muted">Крепёж</h5>
                    </div>
                </a>
            </div>
            <div class="col-12 col-sm-4">
                <a class="card text-decoration-none fix-shadow-hover" href="{{ url('/catalog/furnitura-dlya-okon-i-dverej') }}">
                    <img class="img-fluid" src="/images/baza/l2.jpg" width="640" height="480" alt="Фурнитура">
                    <div class="card-body">
                        <h5 class="card-title text-muted">Фурнитура</h5>
                    </div>
                </a>
            </div>
            <div class="col-12 col-sm-4">
                <a class="card text-decoration-none fix-shadow-hover" href="{{ url('/catalog/instrument') }}">
                    <img class="img-fluid" src="/images/baza/instrum.jpg" width="640" height="480" alt="Инструмент">
                    <div class="card-body">
                        <h5 class="card-title text-muted">Инструмент</h5>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="mb-5">
        <div class="g-4 row row-cols-1 row-cols-md-2">
            <div class="col d-flex align-items-start">
                <div class="icon-square text-bg-success d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                    <svg class="bi" width="1em" height="1em">
                        <use xlink:href="#icon-search"></use>
                    </svg>
                </div>
                <div>
                    <h4>Вы найдете у нас именно то, что Вам нужно!</h4>
                    <p>Наш ассортимент удовлетворяет практически любые запросы.
                        <strong>10 000</strong> наименований позиций в прайсе
                        соответствует наличию складским запасам на <strong>98%</strong>.</p>
                </div>
            </div>
            <div class="col d-flex align-items-start">
                <div class="icon-square text-bg-success d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                    <svg class="bi" width="1em" height="1em">
                        <use xlink:href="#icon-scales"></use>
                    </svg>
                </div>
                <div>
                    <h4>Удобная фасовка для магазинов, организаций!</h4>
                    <p>От промкоробок и до любой, наиболее выгодной для Вас упаковки.</p>
                </div>
            </div>
            <div class="col d-flex align-items-start">
                <div class="icon-square text-bg-success d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                    <svg class="bi" width="1em" height="1em">
                        <use xlink:href="#icon-check"></use>
                    </svg>
                </div>
                <div>
                    <h4>Вам больше не нужно искать спец крепеж!</h4>
                    <p>Доверьте это нам! Более
                        <strong>десяти</strong> лет опыта работы с крепежом позволяет эффективно ориентироваться
                        на метизном рынке. Мы найдем для Вас любой крепеж и привезем его в течение недели.</p>
                </div>
            </div>
            <div class="col d-flex align-items-start">
                <div class="icon-square text-bg-success d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                    <svg class="bi" width="1em" height="1em">
                        <use xlink:href="#icon-ruble"></use>
                    </svg>
                </div>
                <div>
                    <h4>Вы можете рассчитывать на низкие цены!</h4>
                    <p>Мы следим за тем, что бы наши цены оставались адекватными. Но! Даже если Вы нашли где-то дешевле,
                        <strong>ЗВОНИТЕ!</strong> - договоримся...</p>
                </div>
            </div>
            <div class="col d-flex align-items-start">
                <div class="icon-square text-bg-success d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                    <svg class="bi" width="1em" height="1em">
                        <use xlink:href="#icon-clock"></use>
                    </svg>
                </div>
                <div>
                    <h4>Вы экономите не только деньги, но и время!</h4>
                    <p>Моментальное обслуживание, начиная с выписки и оканчивая получением товара. Офис и склад
                        находятся <strong>в одном месте</strong>.</p>
                </div>
            </div>
            <div class="col d-flex align-items-start">
                <div class="icon-square text-bg-success d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                    <svg class="bi" width="1em" height="1em">
                        <use xlink:href="#icon-truck"></use>
                    </svg>
                </div>
                <div>
                    <h4>Вам не нужно беспокоиться о доставке!</h4>
                    <p>Мы скомплектуем товар и доставим его до вашего склада.
                        Доставка по России осуществляется транспортными компаниями.</p>
                </div>
            </div>
        </div>
    </div>

@endsection