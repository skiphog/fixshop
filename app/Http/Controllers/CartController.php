<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Http\Requests\CartRequest;

class CartController extends Controller
{
    public function show()
    {
    }

    public function update(CartRequest $request)
    {
        $cart = Cart::firstOrCreate(['cookie_id' => $request->cookie('cart')]);
        $product = Product::findOrFail($request['product_id']);

        if (0 === (int)$request['quantity']) {
            $cart->items()->where('product_id', $product->id)->first()?->delete();

            // Total cart
            return response()->json([]);
        }

        $param = $product->unit === 'тыс. шт' ? [
            'amount' => $product->price * (int)$request['quantity'] / 1000,
            'weight' => (float)$product->weight * (int)$request['quantity'] / 1000
        ] : [
            'amount' => $product->price * (int)$request['quantity'],
            'weight' => (float)$product->weight * (int)$request['quantity']
        ];

        $cart->items()->updateOrCreate(
            ['product_id' => $product->id],
            [
                'quantity' => $request['quantity'],
                'weight'   => $param['weight'],
                'amount'   => $param['amount']
            ]);

        //Total cart
        return response()->json([]);
    }
}