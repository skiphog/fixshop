<?php

/**
 * @var \App\Models\Rubric  $rubric
 * @var \App\Models\Article $article
 */

?>
@extends('layouts.app')

@section('title', $article->title)
@section('description', $article->intro)

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="text-decoration-none" href="/">Главная</a></li>
            <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('blog.index') }}">Блог</a></li>
            <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('blog.show', $rubric) }}">{{ $rubric->title }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $article->title }}</li>
        </ol>
    </nav>
    <article class="rounded-2 shadow-sm overflow-hidden">
        <div class="row">
            <div class="col-md-12">
                <img class="w-100 img-fluid object-cover" src="https://avto-bolt.ru/wp-content/uploads/2013/06/1442227961_14.jpg" style="height: 400px;" alt="">
                <div class="p-md-5 p-3">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <a href="#" class="d-flex align-items-center fw-bold text-dark text-decoration-none me-3">
                            <img class="rounded-circle me-3 object-cover" src="{{ $article->img }}" width="48" height="48" alt="">
                            {{ $article->user->name }}
                        </a>
                        <div class="d-flex align-items-center text-muted">
                            <p class="d-flex align-items-center text-reset text-decoration-none m-0">
                                <span class="">Время чтения: {{ time_to_read($article->content) }}мин.</span>
                            </p>
                        </div>
                    </div>
                    <h2 class="mb-4">{{ $article->title }}</h2>
                    <div class="mb-4">
                        <p>{{ $article->content }}</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('blog.show', $rubric) }}" class="text-decoration-none">Рубрика: <span class="badge bg-primary">{{ Str::limit($rubric->title, 5) }}</span></a>
                        <span class="fs-sm text-muted">Опубликовано: {{ $article->created_at->format('d.m.Y') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </article>
@endsection

