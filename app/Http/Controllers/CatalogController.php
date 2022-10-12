<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CatalogController extends Controller
{
    public function index()
    {

    }

    public function show(Category $category)
    {
        dd($category);
    }
}