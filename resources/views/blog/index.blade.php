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
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('blog.index') }}">Блог</a></li>
        </ol>
    </nav>
    @foreach ($articles as $article)
        <article class="card border-0 shadow-sm overflow-hidden mb-4">
            <div class="row position-relative g-0">
                <div class="col-md-4">
                    <div class="">
                        <img class="w-100 h-100 img-fluid object-cover" src="{{ $article->img }}" width="640" height="400" alt="">
                    </div>
                </div>
                <div class="col-md-8 d-flex align-items-center">
                    <div class="card-body">
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
    <!-- Pagination Area-->
    {{ $articles->onEachSide(1)->links('partials.paginate') }}
@endsection