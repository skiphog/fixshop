<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CatalogController extends Controller
{
    public function index()
    {
        $categories = Category::where('parent_id', 0)->sorted()->get();

        return view('catalog.index', compact('categories'));
    }

    public function show(Category $category)
    {
        $category->load(['children' => static fn($q) => $q->sorted()]);

        return view('catalog.show', compact('category'));
    }
}