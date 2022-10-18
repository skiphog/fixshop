<?php

namespace App\Listeners;

use App\Services\EloquentCart;
use App\Events\CartItemUpdated;

class CartRegenerate
{
    /**
     * @var EloquentCart
     */
    public EloquentCart $eloquentCart;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(EloquentCart $eloquentCart)
    {
        $this->eloquentCart = $eloquentCart;
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
        $this->eloquentCart->regenerate($event->cartItem);
    }
}
