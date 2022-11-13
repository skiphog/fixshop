<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Services\EloquentCart;
use App\Http\Requests\OrderRequest;

class OrderController extends Controller
{
    public function store(OrderRequest $request, EloquentCart $eloquentCart)
    {
        $cart = $eloquentCart->getCartWithItemsByToken($request->cookie('cart'));

        if (!$cart->quantity || $cart->items->isEmpty()) {
            return to_route('cart.show');
        }

        Order::create(array_merge($request->validated(), [
            'quantity' => $cart->quantity,
            'weight'   => $cart->weight,
            'amount'   => $cart->amount
        ]))
            ->orderItems()
            ->createMany($this->generateOrderItems($cart));

        // Отправить письма
        $cart->delete();

        return to_route('cart.show');
    }

    protected function generateOrderItems(Cart $cart): array
    {
        $data = [];

        foreach ($cart->items as $item) {
            $data[] = [
                'title'    => $item->product->title,
                'unit'     => $item->product->unit,
                'price'    => $item->product->price,
                'amount'   => $item->quantity * $item->product->price,
                'quantity' => $item->product->unit === 'тыс. шт' ? $item->quantity / 1000 : $item->quantity
            ];
        }

        return $data;
    }
}