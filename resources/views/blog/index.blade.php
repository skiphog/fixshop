<?php

/**
 * @var \App\Models\Rubric[]  $rubrics
 * @var \App\Models\Article[] $articles
 */

?>
@extends('layouts.app')

@section('title', 'Блог')
@section('description', 'Блог - самые крутые статьи')

@section('content')

    <div class="uk-section-muted uk-section uk-section-large">
        <div class="uk-container uk-container-large">
            <div class="tm-grid-expand uk-child-width-1-1 uk-grid-margin uk-grid uk-grid-stack" uk-grid="">
                <div class="uk-width-1-1@m uk-first-column">
                    <h2 class="uk-h1 uk-margin-large">Блог - самые крутые статьи</h2>
                    <div class="uk-margin">
                        <div class="uk-child-width-1-1 uk-child-width-1-2@s uk-grid-medium uk-grid-match uk-grid" uk-grid="">
                            @foreach ($articles as $article)
                                <div class="uk-grid-margin">
                                    <a class="el-item uk-card uk-card-default uk-card-hover uk-flex uk-link-toggle" href="{{ route('blog.article.show', ['rubric' => $article->rubric, 'article' => $article]) }}" aria-label="{{ $article->title }}">
                                        <div class="uk-child-width-expand uk-grid-collapse uk-grid-match uk-grid" uk-grid="">
                                            <div class="uk-width-1-2@m uk-first-column">
                                                <div class="uk-card-media-left uk-cover-container" uk-toggle="cls: uk-card-media-left uk-card-media-top; mode: media; media: @m">
                                                    <picture>
                                                        <source type="image/webp" srcset="{{ $article->img }}">
                                                        <img src="{{ $article->img }}" width="610" height="355" class="el-image" alt="" uk-cover="" style="object-fit: cover;">
                                                    </picture>
                                                    <picture>
                                                        <source type="image/webp" srcset="">
                                                        <img src="" width="610" height="355" class="el-image uk-invisible" alt="">
                                                    </picture>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="uk-card-body uk-margin-remove-first-child">
                                                    <h3 class="el-title uk-h4 uk-margin-top uk-margin-remove-bottom">
                                                        {{ $article->title }}
                                                    </h3>
                                                    <div class="el-meta uk-text-meta uk-margin-top">{{ $article->created_at }}</div>
                                                    <div class="el-meta uk-text-meta uk-margin-top">{{ $article->user->name }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                                <!-- Pagination Area-->
                                {{ $articles->onEachSide(1)->links('partials.paginate') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{--<div class="container px-4 px-lg-5">--}}
{{--    <div class="row gx-4 gx-lg-5 justify-content-center">--}}
{{--        <div class="col-md-10 col-lg-8 col-xl-7">--}}
{{--            <h1 class="text-info mb-5">Блог - самые крутые статьи</h1>--}}
{{--            <!-- Post preview-->--}}
{{--            @foreach ($articles as $article)--}}
{{--                <div class="post-preview">--}}
{{--                    --}}{{--<a href="{{ route('blog.index') . '/' . $article->rubric->slug . "/" . $article->slug }}">--}}
{{--                        <h2 class="post-title">{{ $article->title }}</h2>--}}
{{--                        <h3 class="post-subtitle">{{ $article->intro }}</h3>--}}
{{--                    </a>--}}
{{--                    --}}{{--Это первый вариант как сделать. И это будет пиздато работать--}}
{{--                    --}}{{--<a href="{{ route('blog.article.show', ['rubric' => $article->rubric, 'article' => $article]) }}">--}}
{{--                        <h2 class="post-title">{{ $article->title }}</h2>--}}
{{--                        <h3 class="post-subtitle">{{ $article->intro }}</h3>--}}
{{--                    </a>--}}
{{--                    --}}{{--Это второй вариант--}}
{{--                    <a href="{{ $article->path() }}">--}}
{{--                        <h2 class="post-title">{{ $article->title }}</h2>--}}
{{--                        <h3 class="post-subtitle">{{ $article->intro }}</h3>--}}
{{--                    </a>--}}
{{--                    <p class="post-meta">--}}
{{--                        Автор: {{ $article->user->name }}--}}
{{--                        <br>--}}
{{--                        Опубликовано: {{ $article->created_at }}--}}
{{--                        <br>--}}
{{--                        --}}{{--Рубрика: <a href="{{ route('blog.index') . '/' . $article->rubric->slug }}"> {{ $article->rubric->slug }} </a>--}}
{{--                        Рубрика: <a href="{{ route('blog.show', ['rubric' => $article->rubric]) }}"> {{ $article->rubric->title }} </a>--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--                <!-- Divider-->--}}
{{--                <hr class="my-4">--}}
{{--            @endforeach--}}
{{--            <!-- Pagination Area-->--}}
{{--            {{ $articles->onEachSide(1)->links('partials.paginate') }}--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

@endsection