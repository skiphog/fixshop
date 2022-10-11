<?php

namespace App\Http\Controllers;

use App\Models\Category;

class IndexController extends Controller
{
    public function index()
    {
        $category = Category::tree();

        return view('index', compact('category'));
    }
}