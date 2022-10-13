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

    <div class="uk-section-muted uk-section uk-section-large">
        <div class="uk-container uk-container-small">
            <div class="slider uk-flex uk-flex-center">
                @foreach ($article->promotions as $key => $banner)
                    @if ($banner->is_active)
                        <div class="slider-item {{ $key > 0 ? 'hidden': '' }}">
                            <a href="#" class="slider-img">
                                <picture>
                                    <img src="{{ $banner->path }}" alt="" style="width: 900px; height: 300px; object-fit: cover;">
                                </picture>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="uk-grid-margin uk-container uk-container-small">
            <div class="tm-grid-expand uk-child-width-1-1 uk-grid uk-grid-stack" uk-grid="">
                <div class="uk-width-1-1@m uk-first-column">
                    <h1 class="uk-heading-small uk-text-center">{{ $article->title }}</h1>
                    <div class="uk-margin-medium">
                        <div class="uk-child-width-auto uk-flex-center uk-flex-middle uk-grid-column-medium uk-grid-row-small uk-grid-divider uk-grid-match uk-grid" uk-grid="">        <div class="uk-first-column">
                                <div class="el-item uk-panel uk-margin-remove-first-child">
                                    <div class="uk-child-width-expand uk-grid-column-small uk-flex-middle uk-grid" uk-grid="">
                                        <div class="uk-width-auto uk-first-column">
                                            <picture>
                                                <source type="image/webp" srcset="">
                                                <img src="{{ $article->img }}" width="40" height="40" style="height: 40px" class="el-image uk-border-circle" alt="" loading="lazy">
                                            </picture>
                                        </div>
                                        <div class="uk-margin-remove-first-child">
                                            <div class="el-title uk-h5 uk-margin-top uk-margin-remove-bottom">{{ $article->user->name }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="el-item uk-panel uk-margin-remove-first-child">
                                    <div class="el-title uk-h5 uk-margin-top uk-margin-remove-bottom">{{ $article->created_at }}</div>
                                </div>
                            </div>
                            <div>
                                <div class="el-item uk-panel uk-margin-remove-first-child">
                                    <div class="el-title uk-h5 uk-margin-top uk-margin-remove-bottom">
                                        <a href="#" class="uk-link-heading">{{ $article->rubric->title }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="uk-margin-large uk-margin-remove-bottom uk-container uk-container-large">
            <div class="uk-margin-remove-bottom tm-grid-expand uk-child-width-1-1 uk-grid uk-grid-stack" uk-grid="">
                <div class="uk-width-1-1@m uk-first-column">
                    <div class="uk-margin uk-flex uk-flex-center">
                        <picture>
                            <source type="image/webp" srcset="{{ $article->img }}">
                            <img loading="lazy" src="{{ $article->img }}" width="800" height="600" class="el-image" alt="">
                        </picture>
                    </div>
                </div>
            </div>
        </div>
        <div class="uk-margin-large uk-container uk-container-xsmall">
            <div class="tm-grid-expand uk-child-width-1-1 uk-grid uk-grid-stack" uk-grid="">
                <div class="uk-width-1-1@m uk-first-column">

                    <div class="uk-panel uk-margin">
                        <h2>{{ $article->title }}</h2>
                        <p>{{ $article->content }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

