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

    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <h1 class="text-info mb-5">{{ $rubric->title . ' — самые крутые статьи'}}</h1>
                <!-- Post preview-->
                @php
                    $nums =range(1, 100);
                    foreach ($nums as $num) {
                        if($num % 2 !== 0) {
                            echo '<p class="text-primary">' . $num . '</p>';
                        }
                        if($num % 2 === 0) {
                            echo '<p class="text-warning">' . $num . '</p>';
                        }
                    }
                @endphp
                @foreach ($articles as $article)
                    <div class="post-preview">
                        <a href="{{ route('blog.index') . '/' . $article->rubric->slug . '/' . $article->slug }}">
                            <h2 class="post-title">{{ $article->title }}</h2>
                        </a>
                            <p class="post-subtitle">{{ $article->intro }}</p>
                            <p class="post-meta">
                                Автор: {{ $article->user->name }}
                                <br>
                                Опубликовано: {{ $article->created_at }}
                            </p>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4">
                @endforeach
                <!-- Pagination Area-->
                {{ $articles->onEachSide(1)->links('partials.paginate') }}
            </div>
        </div>
    </div>
@endsection