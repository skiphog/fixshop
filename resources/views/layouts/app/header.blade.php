<?php

/**
 * @var \App\Models\Cart $cart
 */

?>
<header class="navbar navbar-expand-md fixed-top bg-simple">
    <nav class="container-lg">
        <a class="navbar-brand" href="{{ route('index') }}">
            <img class="d-inline-block" src="/images/logo.png" width="116" height="24" alt="{{ config('app.name') }}">
{{--            <span>{{ config('app.name') }}</span>--}}
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
                <li class="nav-item">
                    <button type="button" class="btn btn-link position-relative">
                        <svg class="bi" width="20" height="20">
                            <use xlink:href="#icon-basket"></use>
                        </svg>
                        @if($cart->quantity)
                            <span class="badge bg-success position-absolute rounded-pill top-50 translate-middle-x">
                                {{ $cart->quantity }}
                            </span>
                        @endif
                    </button>
                </li>
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.index') }}">Админка</a></li>
            </ul>
        </div>
    </nav>
</header>