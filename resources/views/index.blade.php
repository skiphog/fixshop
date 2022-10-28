<?php

/**
 * @var \App\Models\Category[] $categories
 */

?>
@extends('layouts.app')

@section('title', 'Главная страница')
@section('description', 'Главная страница')

@push('icons')
    @include('icons')
@endpush

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css">
@endpush

@section('content')
    <section id="promotion" class="promotion container mb-4">
        <div class="row">
            <div class="col-md-12">
                <img class="img-fluid w-100 object-cover shadow-sm rounded" src="/images/banner.jpg" width="1130" height="300" alt="Акции">
            </div>
        </div>
    </section>
    <section id="question" class="question container mb-4">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="fix-section">
                    <h1>Ищете крепёж по оптовым ценам?</h1>
                </div>
            </div>
        </div>
    </section>
    <section id="motivation" class="motivation container mb-4">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="fix-section">
                    <p class="lead">{{ config('app.name') }}</p>
                    <p>Вы всегда найдёте крепёж у нас в ассортименте</p>
                </div>
            </div>
        </div>
    </section>
    <section id="assortment" class="assortment container mb-4">
        <div class="row">
            <div class="col-4 text-center">
                <div class="card">
                    <img class="img-fluid w-100" src="/images/baza/gvozdi.jpg" width="640" height="480" alt="Крепёж">
                    <div class="card-body d-flex flex-column align-items-center">
                        <h5 class="card-title">Крепёж</h5>
                        <p class="card-text d-none d-sm-block">Анкеры, саморезы, метрический крепёж</p>
                    </div>
                </div>
            </div>
            <div class="col-4 text-center">
                <div class="card">
                    <img class="img-fluid w-100" src="/images/baza/l2.jpg" width="640" height="480" alt="Фурнитура">
                    <div class="card-body d-flex flex-column align-items-center">
                        <h5 class="card-title">Фурнитура</h5>
                        <p class="card-text d-none d-sm-block">Мебельная и дверная</p>
                    </div>
                </div>
            </div>
            <div class="col-4 text-center">
                <div class="card">
                    <img class="img-fluid w-100" src="/images/baza/instrum.jpg" width="640" height="480" alt="Инструмент">
                    <div class="card-body d-flex flex-column align-items-center">
                        <h5 class="card-title">Инструмент</h5>
                        <p class="card-text d-none d-sm-block">От отвёртки до бензопилы</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="slider" class="slider container mb-4">
        <div class="row">
            <div class="col-md-12">
                <div class="fix-section">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            @foreach($categories as $category)
                                <div class="swiper-slide">
                                    <div class="d-flex justify-content-center">
                                        <img class="img-fluid" src="{{ asset($category->img) }}" width="150" height="50" alt="{{ $category->title }}">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="partners" class="partners container mb-4">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="fix-section">
                    <h5>Купить крепёж просто!</h5>
                    <p>
                        <span class="text-black">Мы поможем сократить Вам денежные расходы и время!</span>
                        <br>Предлагаем строительный крепёж и инструмент от производителей и наших партнёров.
                    </p>
                    <div class="row g-0">
                        <div class="col-3">
                            <img class="img-fluid" src="/images/partners/tech-krep.jpg" width="180" height="65" alt="Технокрепёж">
                        </div>
                        <div class="col-3">
                            <img class="img-fluid" src="/images/partners/zitar.jpg" width="180" height="65" alt="Зитар">
                        </div>
                        <div class="col-3">
                            <img class="img-fluid" src="/images/partners/stinger.jpg" width="180" height="65" alt="Стингер">
                        </div>
                        <div class="col-3">
                            <img class="img-fluid" src="/images/partners/mtk.jpg" width="180" height="65" alt="МТК">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="advantage" class="advantage container mb-4">
        <div class="row">
            <div class="col-md-6 d-flex">
                <div class="fix-section w-100 mb-4 p-4">
                    <h4>
                        <svg class="bi" width="1em" height="1em">
                            <use xlink:href="#icon-search"></use>
                        </svg>
                        Вы найдёте у нас именно то, что Вам нужно!
                    </h4>
                    <p>Наш ассортимент удовлетворяет практически любые запросы.
                        <b>10 000</b> наименований позиций в прайсе соответствует наличию складским запасам на <b>98%</b>.
                    </p>
                </div>
            </div>
            <div class="col-md-6 d-flex">
                <div class="fix-section w-100 mb-4 p-4">
                    <h4>
                        <svg class="bi" width="1em" height="1em">
                            <use xlink:href="#icon-scales"></use>
                        </svg>
                        Удобная фасовка для магазинов, организаций!
                    </h4>
                    <p>От промкоробок и до любой, наиболее выгодной для Вас упаковки.</p>
                </div>
            </div>
            <div class="col-md-6 d-flex">
                <div class="fix-section w-100 mb-4 p-4">
                    <h4>
                        <svg class="bi" width="1em" height="1em">
                            <use xlink:href="#icon-check"></use>
                        </svg>
                        Вам больше не нужно искать спец крепёж!
                    </h4>
                    <p>Доверьте это нам! Более
                        <strong>десяти</strong> лет опыта работы с крепежом позволяет эффективно ориентироваться на метизном рынке. Мы найдём для Вас любой крепёж и привезём его в течение недели.
                    </p>
                </div>
            </div>
            <div class="col-md-6 d-flex">
                <div class="fix-section w-100 mb-4 p-4">
                    <h4>
                        <svg class="bi" width="1em" height="1em">
                            <use xlink:href="#icon-ruble"></use>
                        </svg>
                        Вы можете рассчитывать на низкие цены!
                    </h4>
                    <p>Мы следим за тем, что бы наши цены оставались адекватными. Но! Даже если Вы нашли где-то дешевле,
                        <strong>ЗВОНИТЕ!</strong> - договоримся...</p>
                </div>
            </div>
            <div class="col-md-6 d-flex">
                <div class="fix-section w-100 mb-4 p-4">
                    <h4>
                        <svg class="bi" width="1em" height="1em">
                            <use xlink:href="#icon-clock"></use>
                        </svg>
                        Вы экономите не только деньги, но и время!
                    </h4>
                    <p>Моментальное обслуживание, начиная с выписки и оканчивая получением товара. Офис и склад находятся
                        <strong>в одном месте</strong>.</p>
                </div>
            </div>
            <div class="col-md-6 d-flex">
                <div class="fix-section w-100 mb-4 p-4">
                    <h4>
                        <svg class="bi" width="1em" height="1em">
                            <use xlink:href="#icon-truck"></use>
                        </svg>
                        Вам не нужно беспокоиться о доставке!
                    </h4>
                    <p>Мы скомплектуем товар и доставим его до вашего склада. Доставка по России осуществляется транспортными компаниями.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script>
      const swiper = new Swiper('.mySwiper', {
        slidesPerView: 6,
        spaceBetween: 30,
        autoplay: true,
        loop: true,
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
      });
    </script>
@endpush