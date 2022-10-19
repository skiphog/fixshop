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
    <article class="rounded-2 shadow-sm overflow-hidden">
        <div class="row">
            <div class="col-md-12">
                <img class="w-100 img-fluid object-cover" src="https://avto-bolt.ru/wp-content/uploads/2013/06/1442227961_14.jpg" style="height: 400px;" alt="">
                <div class="p-md-5 p-3 bg-light">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <a href="#" class="d-flex align-items-center fw-bold text-dark text-decoration-none me-3">
                            <img class="rounded-circle me-3 object-cover" src="{{ $article->img }}" width="48" height="48" alt="">{{ $article->user->name }}
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
                        <p class="m-0">Рубрика:
                            <span class="badge bg-primary">{{ Str::limit($article->rubric->title, 5) }}</span></p>
                        <p class="m-0">Опубликовано: <span class="">{{ $article->created_at->format('d.m.Y') }}</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </article>
@endsection