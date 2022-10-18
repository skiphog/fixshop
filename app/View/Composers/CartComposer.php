<?php

namespace App\View\Composers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Services\EloquentCart;

class CartComposer
{
    /**
     * @var EloquentCart
     */
    public EloquentCart $cart;

    /**
     * @var Request
     */
    public Request $request;

    /**
     * @param EloquentCart $cart
     * @param Request      $request
     */
    public function __construct(EloquentCart $cart, Request $request)
    {
        $this->cart = $cart;
        $this->request = $request;
    }

    /**
     * @param View $view
     *
     * @return void
     * @noinspection PhpUnused
     */
    public function compose(View $view): void
    {
        $cart = $this->cart->getCartByToken($this->request->cookie('cart'));

        $view->with(compact('cart'));
    }
}