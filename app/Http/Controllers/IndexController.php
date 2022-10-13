<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

class IndexController extends Controller
{
    public function index()
    {
        $category = Category::tree();

        $products = Product::where('category_id', 2)->sorted()->get();
        $product = Product::find(1);

        return view('index', compact('category'));
    }
}