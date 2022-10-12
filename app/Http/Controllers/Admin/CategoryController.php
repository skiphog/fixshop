<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('admin.categories.index');
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('admin.categories.create')
            ->with('category', new Category());
    }

    /**
     * @param CategoryRequest $request
     *
     * @return RedirectResponse
     */
    public function store(CategoryRequest $request): RedirectResponse
    {
        $category = Category::create($request->validated());

        return redirect()
            ->route('admin.categories.edit', $category)
            ->with('success', 'Категория создана');
    }

    /**
     * @param Category $category
     *
     * @return View
     */
    public function edit(Category $category): View
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * @param Category        $category
     * @param CategoryRequest $request
     *
     * @return RedirectResponse
     */
    public function update(Category $category, CategoryRequest $request): RedirectResponse
    {
        $category->update($request->validated());
        Cache::forget('categories_tree');

        return redirect()
            ->route('admin.categories.edit', $category)
            ->with('success', 'Категория обновлена');
    }
}
