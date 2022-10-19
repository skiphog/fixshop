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
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <article class="rounded-2 shadow-sm overflow-hidden">
                <div class="row">
                    <div class="col-md-12">
                        <img class="w-100 img-fluid object-cover" src="https://avto-bolt.ru/wp-content/uploads/2013/06/1442227961_14.jpg" style="height: 400px;" alt="">
                        <div class="article-text bg-white">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <a href="#" class="d-flex align-items-center fw-bold text-dark text-decoration-none me-3">
                                    <img class="rounded-circle me-3 object-cover" src="{{ $article->img }}" width="48" height="48" alt="">{{ $article->user->name }}</a>
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
                                <p class="m-0">Рубрика: <span class="badge bg-primary">{{ Str::limit($article->rubric->title, 5) }}</span></p>
                                <p class="m-0">Опубликовано: <span class="">{{ $article->created_at->format('d.m.Y') }}</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </div>
{{--    <div class="uk-section-muted uk-section uk-section-large">--}}
{{--        <div class="uk-container uk-container-small">--}}
{{--            <div class="slider uk-flex uk-flex-center">--}}
{{--                @foreach ($article->promotions as $key => $banner)--}}
{{--                    @if ($banner->is_active)--}}
{{--                        <div class="slider-item {{ $key > 0 ? 'hidden': '' }}">--}}
{{--                            <a href="#" class="slider-img">--}}
{{--                                <picture>--}}
{{--                                    <img src="{{ $banner->path }}" alt="" style="width: 900px; height: 300px; object-fit: cover;">--}}
{{--                                </picture>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="uk-grid-margin uk-container uk-container-small">--}}
{{--            <div class="tm-grid-expand uk-child-width-1-1 uk-grid uk-grid-stack" uk-grid="">--}}
{{--                <div class="uk-width-1-1@m uk-first-column">--}}
{{--                    <h1 class="uk-heading-small uk-text-center">{{ $article->title }}</h1>--}}
{{--                    <div class="uk-margin-medium">--}}
{{--                        <div class="uk-child-width-auto uk-flex-center uk-flex-middle uk-grid-column-medium uk-grid-row-small uk-grid-divider uk-grid-match uk-grid" uk-grid="">        <div class="uk-first-column">--}}
{{--                                <div class="el-item uk-panel uk-margin-remove-first-child">--}}
{{--                                    <div class="uk-child-width-expand uk-grid-column-small uk-flex-middle uk-grid" uk-grid="">--}}
{{--                                        <div class="uk-width-auto uk-first-column">--}}
{{--                                            <picture>--}}
{{--                                                <source type="image/webp" srcset="">--}}
{{--                                                <img src="{{ $article->img }}" width="40" height="40" style="height: 40px" class="el-image uk-border-circle" alt="" loading="lazy">--}}
{{--                                            </picture>--}}
{{--                                        </div>--}}
{{--                                        <div class="uk-margin-remove-first-child">--}}
{{--                                            <div class="el-title uk-h5 uk-margin-top uk-margin-remove-bottom">{{ $article->user->name }}</div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div>--}}
{{--                                <div class="el-item uk-panel uk-margin-remove-first-child">--}}
{{--                                    <div class="el-title uk-h5 uk-margin-top uk-margin-remove-bottom">{{ $article->created_at }}</div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div>--}}
{{--                                <div class="el-item uk-panel uk-margin-remove-first-child">--}}
{{--                                    <div class="el-title uk-h5 uk-margin-top uk-margin-remove-bottom">--}}
{{--                                        <a href="#" class="uk-link-heading">{{ $article->rubric->title }}</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="uk-margin-large uk-margin-remove-bottom uk-container uk-container-large">--}}
{{--            <div class="uk-margin-remove-bottom tm-grid-expand uk-child-width-1-1 uk-grid uk-grid-stack" uk-grid="">--}}
{{--                <div class="uk-width-1-1@m uk-first-column">--}}
{{--                    <div class="uk-margin uk-flex uk-flex-center">--}}
{{--                        <picture>--}}
{{--                            <source type="image/webp" srcset="{{ $article->img }}">--}}
{{--                            <img loading="lazy" src="{{ $article->img }}" width="800" height="600" class="el-image" alt="">--}}
{{--                        </picture>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="uk-margin-large uk-container uk-container-xsmall">--}}
{{--            <div class="tm-grid-expand uk-child-width-1-1 uk-grid uk-grid-stack" uk-grid="">--}}
{{--                <div class="uk-width-1-1@m uk-first-column">--}}

{{--                    <div class="uk-panel uk-margin">--}}
{{--                        <h2>{{ $article->title }}</h2>--}}
{{--                        <p>{{ $article->content }}</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

@endsection

