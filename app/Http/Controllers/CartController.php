<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EloquentCart;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\CartRequest;

class CartController extends Controller
{
    public function show(Request $request, EloquentCart $eloquentCart)
    {
        $cart = $eloquentCart->getCartWithItemsByToken($request->cookie('cart'));

        return view('cart.show', compact('cart'));
    }

    public function update(CartRequest $request, EloquentCart $cart): JsonResponse
    {
        $data = $cart->change($request);

        return response()->json($data);
    }
}