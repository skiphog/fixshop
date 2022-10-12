<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('description')">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--suppress CssUnusedSymbol -->
    <style>
      html {overflow-y: scroll;}
      .breadcrumb-skip {--bs-breadcrumb-divider: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E");}
      .bg-simple {backdrop-filter: saturate(50%) blur(8px);background: rgba(255, 255, 255, .5);border-bottom: 1px solid #ccc;}
    </style>
    @stack('styles')
</head>
<body>
<main class="container pt-5">
    @yield('content')
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>