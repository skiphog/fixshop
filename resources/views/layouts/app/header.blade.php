<?php

/**
 * @var \App\Models\Cart $cart
 */

?>
<header class="navbar navbar-expand-md fixed-top bg-simple">
    <nav class="container-lg">
        <a class="navbar-brand" href="{{ route('index') }}">
            <img class="d-inline-block" src="/images/bootstrap-logo.svg" width="30" height="24" alt="{{ config('app.name') }}">
            <span>{{ config('app.name') }}</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('catalog.*') ? 'active': '' }}"
                            href="{{ route('catalog.index') }}">Каталог</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="#">Акции</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Прайсы</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Сертификаты</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('blog.index') }}">Блог</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Контакты</a></li>
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-md-0">
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.index') }}">Админка</a></li>
                <li class="nav-item dropdown">
                    <button type="button" class="btn btn-link position-relative" data-bs-toggle="dropdown">
                        <svg class="bi" width="20" height="20">
                            <use xlink:href="#icon-basket"></use>
                        </svg>
                        @if($cart->quantity)
                            <span class="badge bg-danger position-absolute rounded-pill top-50 translate-middle-x">
                                {{ $cart->quantity_format }}
                            </span>
                        @endif
                    </button>
                    <div class="dropdown-menu dropdown-menu-end fix-menu-card">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <div class="d-flex align-items-center me-4">
                                <svg class="bi" width="20" height="20">
                                    <use xlink:href="#icon-card-list"></use>
                                </svg>
                                <span class="ms-1">Позиций</span>
                            </div>
                            <div class="text-nowrap">
                                <span class="fw-bold">{{ $cart->quantity_format }}</span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <div class="d-flex align-items-center me-4">
                                <svg class="bi" width="20" height="20">
                                    <use xlink:href="#icon-boxes"></use>
                                </svg>
                                <span class="ms-1">Вес</span>
                            </div>
                            <div class="text-nowrap">
                                <span class="fw-bold">{{ $cart->weight_format }}</span>
                                <span>кг</span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <div class="d-flex align-items-center me-4">
                                <svg class="bi" width="20" height="20">
                                    <use xlink:href="#icon-cash"></use>
                                </svg>
                                <span class="ms-1">Сумма</span>
                            </div>
                            <div class="text-nowrap">
                                <span class="fw-bold">{{ $cart->amount_format }}</span>
                                <span>р.</span>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>