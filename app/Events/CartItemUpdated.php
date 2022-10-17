<?php

namespace App\Events;

use App\Models\CartItem;
use Illuminate\Queue\SerializesModels;

class CartItemUpdated
{
    use SerializesModels;

    /**
     * @var CartItem
     */
    public CartItem $cartItem;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(CartItem $cartItem)
    {
        $this->cartItem = $cartItem;
    }
}
