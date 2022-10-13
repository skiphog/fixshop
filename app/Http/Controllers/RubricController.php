<?php

namespace App\Http\Controllers;

use App\Models\Rubric;
use App\Models\Article;
use App\Http\Requests\RubricRequest;
use Illuminate\Http\RedirectResponse;

class RubricController extends Controller
{
    public function index()
    {
        /**
         * Получить все рубрики и отсортировать их по полю sort
         */
        $rubrics = Rubric::orderBy('sort')
            ->get();

        /**
         * Получить все статьи отсортированные по id.
         * Получить для статей рубрики статей
         * И завернуть всё в пагинацию по 3шт на страницу
         */
        $articles = Article::latest('id')
            ->with(['rubric', 'user'])
            ->paginate(8);

        /**
         * Показать шаблон blog.index с полученными данными
         */
        return view('blog.index', compact('rubrics', 'articles'));
    }

    public function show(Rubric $rubric)
    {
        // Когда показываем категорию, то нужно наверное показать еще статьи из этой категории
        // Я говорю категории. Загрузи (load) статьи этой категории и в пагинацию засунть
        // За одним получим юзера статьи
        // Во. Вот так надо
        $articles = $rubric
            ->articles()
            ->with('user:id,name')
            ->paginate(5);

        return view('blog.rubric', compact('rubric', 'articles'));
    }

    public function create()
    {
        return view('admin.rubrics.create')
            ->with(['rubric' => new Rubric()]);
    }

    public function store(RubricRequest $request): RedirectResponse
    {
        Rubric::create($request->safe()->all());

        return redirect()
            ->route('admin.rubrics.index')
            ->with('success', 'Рубрика создана');
    }

    public function edit(Rubric $rubric)
    {
        return view('admin.rubrics.edit', compact('rubric'));
    }

    public function update(Rubric $rubric, RubricRequest $request): RedirectResponse
    {
        $rubric->update($request->safe()->all());

        return redirect()
            ->route('admin.rubrics.edit', $rubric)
            ->with('success', 'Рубрика обновлена');
    }

    public function destroy(Rubric $rubric): RedirectResponse
    {
        $rubric->delete();

        return redirect()
            ->route('admin.rubrics.index')
            ->with('success', 'Рубрика удалена');
    }
}