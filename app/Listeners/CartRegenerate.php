<?php

namespace App\Listeners;

use App\Models\CartItem;
use App\Events\CartItemUpdated;

class CartRegenerate
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param CartItemUpdated $event
     *
     * @return void
     */
    public function handle(CartItemUpdated $event): void
    {
        $data = CartItem::where('cart_id', $event->cartItem->cart_id)
            ->selectRaw('count(*) quantity, sum(weight) weight, sum(amount) amount')
            ->first()?->toArray() ?? [];

        $event->cartItem->cart()->update($data);
    }
}
