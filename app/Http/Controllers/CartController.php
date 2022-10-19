<?php

namespace App\Http\Controllers;

use App\Services\EloquentCart;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\CartRequest;

class CartController extends Controller
{
    public function show()
    {
    }

    public function update(CartRequest $request, EloquentCart $cart): JsonResponse
    {
        $data = $cart->change($request);

        return response()->json($data);
    }
}