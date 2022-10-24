<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function prices()
    {
        return view('pages.prices');
    }

    public function certificates()
    {
        return view('pages.certificates');
    }

    public function contacts()
    {
        return view('pages.contacts');
    }
}
