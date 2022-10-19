<?php

/**
 * @var \App\Models\Rubric    $rubric
 * @var \App\Models\Article[] $articles
 */

?>
@extends('layouts.app')

@section('title', $rubric->title)
@section('description', "{$rubric->title} &mdash; самые крутые статьи")

@section('content')
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('blog.index') }}">Блог</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $rubric->title }}</li>
        </ol>
    </nav>
    <div class="row gy-md-4 gy-2">
        @foreach($articles as $article)
            <div class="col-md-4 col-sm-6 pb-3">
                <article class="card border-0 shadow-sm h-100">
                    <div class="position-relative">
                        <a href="{{ route('blog.article.show', ['rubric' => $rubric, 'article' => $article]) }}" class="stretched-link text-decoration-none"></a>
                        <img src="{{ $article->img }}" class="card-img-top object-cover" alt="">
                    </div>
                    <div class="card-body pb-4">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="{{ route('blog.show', $rubric) }}" class="badge bg-primary text-decoration-none">{{ Str::limit($rubric->title, 5) }}</a>
                            <span class="fs-sm text-muted">{{ $article->created_at->DiffForHumans() }}</span>
                        </div>
                        <h3 class="h5 mb-0">{{ $article->title }}</h3>
                    </div>
                    <div class="card-footer py-4 mx-4 bg-white">
                        <a href="#" class="d-flex align-items-center fw-bold text-dark text-decoration-none">
                            <img class="rounded-circle me-3 object-cover" src="{{ $article->img }}" width="48" height="48" alt="">
                            {{ $article->user->name }}
                        </a>
                    </div>
                </article>
            </div>
        @endforeach
    </div>
    <!-- Pagination Area-->
    {{ $articles->onEachSide(1)->links('partials.paginate') }}
@endsection