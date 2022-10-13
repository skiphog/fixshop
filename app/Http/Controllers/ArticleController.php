<?php

namespace App\Http\Controllers;

use App\Models\Rubric;
use App\Models\Article;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\RedirectResponse;

class ArticleController extends Controller
{
    public function index()
    {

    }

    public function show(Rubric $rubric, Article $article)
    {
        // здесь можно подгрузить пользователя статьи, а можно и нахуй тут не подгружать, т.к. он всегда один и
        // запрос будет всегда один
        //Ну и хули. у нас нет шаблонов нихуя

        return view('blog.show', compact('rubric', 'article'));
    }

    public function create()
    {
        return view('admin.articles.create')
            ->with(['article' => new Article()]);
    }

    public function store(ArticleRequest $request): RedirectResponse
    {
        Article::create($request->validated());

        return redirect()
            ->route('admin.articles.index')
            ->with('success', 'Статья создана');
    }

    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    public function update(Article $article, ArticleRequest $request): RedirectResponse
    {
        $article->update($request->safe()->all());

        return redirect()
            ->route('admin.articles.edit', $article)
            ->with('success', 'Статья обновлена');
    }

    public function destroy(Article $article): RedirectResponse
    {
        $article->delete();

        return redirect()
            ->route('admin.articles.index')
            ->with('success', 'Статья удалена');
    }
}