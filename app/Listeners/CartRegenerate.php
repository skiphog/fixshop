<?php

namespace App\Listeners;

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
    public function handle(CartItemUpdated $event)
    {
        // todo: Написать обработчик обновление самой корзины
    }
}
