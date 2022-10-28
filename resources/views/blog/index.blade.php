<?php
/**
 * @var \App\Models\Rubric[]  $rubrics
 * @var \App\Models\Article[] $articles
 */

?>
@extends('layouts.app')

@section('title', 'Блог')
@section('description', 'Блог - самые крутые статьи')

@push('icons')
    @include('icons')
@endpush

@section('content')
    <section id="blog-list-header" class="blog-list-header container mb-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-decoration-none" href="/">Главная</a></li>
                <li class="breadcrumb-item active" aria-current="page">Блог</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="fix-section">
                    <h1>Блог</h1>
                </div>
            </div>
        </div>
    </section>
    <section id="blog-list" class="blog-list container mb-4">
        <div class="row">
            <div class="col-lg-9">
                <div class="row g-0">
                    <div class="col-md-12">
                        @foreach ($articles as $article)
                            <article class="position-relative fix-section overflow-hidden mb-4 px-0 py-0">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <div class="d-flex h-100 p-0">
                                            <img class="img-fluid object-cover" src="{{ $article->img }}" width="640" height="400" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-8 d-flex align-items-center">
                                        <div class="card-body p-4">
                                            <div class="d-flex align-items-center mb-3">
                                                <div class="mb-0">
                                                    <a href="#" class="badge text-decoration-none bg-primary fw-normal">{{ Str::limit($article->rubric->title, 5) }}</a>
                                                </div>
                                                <span class="text-muted border-start ps-3 ms-3">{{ $article->created_at->DiffForHumans() }}</span>
                                            </div>
                                            <h3 class="h4">
                                                <a href="{{ route('blog.article.show', ['rubric' => $article->rubric, 'article' => $article]) }}" class="stretched-link text-decoration-none">{{ $article->title }}</a>
                                            </h3>
                                            <p>{{ $article->intro }}</p>
                                            <hr class="my-4">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <a href="#" class="d-flex align-items-center fw-bold text-dark text-decoration-none me-3">
                                                    <img class="rounded-circle me-3 object-cover" src="{{ $article->img }}" width="48" height="48" alt="">{{ $article->user->name }}
                                                </a>
                                                <div class="d-flex align-items-center text-muted">
                                                    <p class="d-flex align-items-center text-reset text-decoration-none m-0">
                                                        <span class="icon-square rounded-circle text-bg-primary d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                                                            <svg class="bi" width="1em" height="1em">
                                                                <use xlink:href="#icon-clock"></use>
                                                            </svg>
                                                        </span>
                                                        <span class="">
                                                            {{ time_to_read($article->content) }}мин.
                                                        </span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </div>
            <aside class="col-lg-3">
                <button class="btn btn-sm btn-primary fixed-bottom d-lg-none w-100 rounded-0"
                        type="button"
                        data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasResponsive"
                        aria-controls="offcanvasResponsive">
                    Все категории
                </button>
                <div class="offcanvas-lg offcanvas-end" tabindex="-1" id="offcanvasResponsive" aria-labelledby="offcanvasResponsiveLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasResponsiveLabel">Категории</h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasResponsive" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <div class="card card-body fix-section overflow-hidden mb-4">
                            <h3 class="h5">Категории</h3>
                            <ul class="nav flex-column fs-sm">
                                @foreach ($rubrics as $rubric)
                                    <li class="nav-item mb-1">
                                        <a href="{{ route('blog.show', $rubric) }}" class="nav-link py-1 px-0 active">{{ Str::limit($rubric->title, 5) }}<span class="fw-normal ms-1">({{ $rubric->articles_count }})</span></a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </aside>
            <!-- Pagination Area-->
            {{ $articles->onEachSide(1)->links('partials.paginate') }}
        </div>
    </section>
@endsection