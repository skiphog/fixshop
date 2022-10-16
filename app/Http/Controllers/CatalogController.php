<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index()
    {
        $categories = Category::where('parent_id', 0)
            ->sorted()
            ->get();

        return view('catalog.index', compact('categories'));
    }

    public function show(Category $category, Request $request)
    {
        $category->load([
            'children' => static fn($q) => $q->sorted(),
            'products' => static fn($q) => $q->with('category')->sorted()
        ]);

        if ($request->ajax()) {
            return response()->json([
                'title'   => $category->title,
                'content' => view('catalog.catalog', compact('category'))->render()
            ]);
        }

        return view('catalog.show', compact('category'));
    }
}
