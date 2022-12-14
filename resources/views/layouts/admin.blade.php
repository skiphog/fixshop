<!doctype html>
<html lang="ru" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('description')">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('styles')
</head>
<body class="d-flex flex-column h-100">
<header class="navbar navbar-expand-md fixed-top bg-simple">
    <nav class="container">
        <a class="navbar-brand" href="{{ route('admin.index') }}">
            <img class="d-inline-block" src="/images/bootstrap-logo.svg" width="30" height="24" alt="{{ config('app.name') }}">
            <span>Админка</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.categories.*') ? 'active': '' }}"
                            href="{{ route('admin.categories.index') }}">Каталог</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.orders.*') ? 'active': '' }}"
                            href="{{ route('admin.orders.index') }}">Заказы</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="#">Продукты</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Блог</a></li>
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-md-0">
                <li class="nav-item"><a class="nav-link" href="{{ route('index') }}">На сайт</a></li>
            </ul>
        </div>
    </nav>
</header>
<main class="flex-shrink-0">
    <div class="container">
        @yield('content')
    </div>
</main>
<footer class="footer mt-auto py-3 bg-light bg-simple-footer">
    <div class="container">
        <div class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <p class="col-md-4 mb-0 text-muted">&copy; {{ date('Y') }} &mdash; {{ config('app.name') }}</p>

            <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                <img class="d-inline-block" src="/images/bootstrap-logo.svg" width="30" height="24" alt="Logo">
            </a>

            <ul class="nav col-md-4 justify-content-end">
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Features</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Pricing</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
            </ul>
        </div>
    </div>
</footer>
@include('admin.partials.flash')
<script src="{{ asset('js/app.js') }}"></script>
@stack('scripts')
</body>
</html>