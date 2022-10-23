<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EloquentCart;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\CartRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CartController extends Controller
{
    /**
     * @param Request      $request
     * @param EloquentCart $eloquentCart
     *
     * @return View
     */
    public function show(Request $request, EloquentCart $eloquentCart): View
    {
        $cart = $eloquentCart->getCartWithItemsByToken($request->cookie('cart'));

        return view('cart.show', compact('cart'));
    }

    /**
     * @param CartRequest  $request
     * @param EloquentCart $cart
     *
     * @return JsonResponse
     */
    public function update(CartRequest $request, EloquentCart $cart): JsonResponse
    {
        $data = $cart->change($request);

        return response()->json($data);
    }

    /**
     * @param Request      $request
     * @param EloquentCart $cart
     *
     * @return RedirectResponse
     */
    public function destroy(Request $request, EloquentCart $cart): RedirectResponse
    {
        $cart->destroyCartByToken($request->cookie('cart'));

        return to_route('cart.show')->with('success', 'Заказ удалён');
    }
}