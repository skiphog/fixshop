<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CartItem;
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

        $items = [];

        if ($category->has('products')) {
            $items = CartItem::select([
                'cart_items.id',
                'cart_items.product_id',
                'cart_items.quantity',
                'cart_items.weight',
                'cart_items.amount',
            ])
                ->where('carts.cookie_id', $request->cookie('cart'))
                ->join('carts', 'carts.id', '=', 'cart_items.cart_id')
                ->latest('cart_items.id')
                ->get()
                ->keyBy('product_id');
        }

        if ($request->ajax()) {
            return response()->json([
                'title'   => $category->title,
                'content' => view('catalog.catalog', compact('category', 'items'))->render()
            ]);
        }

        return view('catalog.show', compact('category', 'items'));
    }
}
