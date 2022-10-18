<?php

namespace App\Http\Controllers;

use App\Services\EloquentCart;
use App\Http\Requests\CartRequest;

class CartController extends Controller
{
    public function show()
    {
    }

    public function update(CartRequest $request, EloquentCart $cart)
    {
        $data = $cart->change($request);

        return response()->json($data);
    }
}