<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\EloquentCart;

class CatalogController extends Controller
{
    public function index()
    {
        $categories = Category::where('parent_id', 0)
            ->sorted()
            ->get();

        return view('catalog.index', compact('categories'));
    }

    public function show(Category $category, Request $request, EloquentCart $cart)
    {
        $category->load([
            'children' => static fn($q) => $q->sorted(),
            'products' => static fn($q) => $q->with('category')->sorted()
        ]);

        $items = $category->products->isNotEmpty()
            ? $cart->getItemsByToken((string)$request->cookie('cart'))
            : collect([]);

        if ($request->ajax()) {
            return response()->json([
                'title'   => $category->title,
                'content' => view('catalog.catalog', compact('category', 'items'))->render()
            ]);
        }

        return view('catalog.show', compact('category', 'items'));
    }
}
