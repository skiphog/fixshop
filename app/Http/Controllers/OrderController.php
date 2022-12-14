<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Services\EloquentCart;
use App\Http\Requests\OrderRequest;
use Illuminate\Http\RedirectResponse;

class OrderController extends Controller
{
    /**
     * @param OrderRequest $request
     * @param EloquentCart $eloquentCart
     *
     * @return RedirectResponse
     */
    public function store(OrderRequest $request, EloquentCart $eloquentCart): RedirectResponse
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
            ->items()
            ->createMany($this->generateOrderItems($cart));

        // Отправить письма
        $cart->delete();

        return to_route('cart.show')->with('success', 'Заказ создан');
    }

    /**
     * @param Cart $cart
     *
     * @return array
     */
    protected function generateOrderItems(Cart $cart): array
    {
        $data = [];

        foreach ($cart->items as $item) {
            $data[] = [
                'title'    => $item->product->title,
                'unit'     => $item->product->unit,
                'price'    => $item->product->price,
                'amount'   => $item->product->unit === 'тыс. шт' ? $item->quantity * $item->product->price / 1000 : $item->quantity * $item->product->price,
                'quantity' => $item->product->unit === 'тыс. шт' ? $item->quantity / 1000 : $item->quantity
            ];
        }

        return $data;
    }
}
