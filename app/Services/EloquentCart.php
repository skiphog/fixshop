<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Database\Eloquent\Collection;

class EloquentCart
{
    /**
     * @param CartItem $cartItem
     *
     * @return void
     */
    public function regenerate(CartItem $cartItem): void
    {
        $data = CartItem::where('cart_id', $cartItem->cart_id)
            ->selectRaw('count(*) quantity, coalesce(sum(weight), 0) weight, coalesce(sum(amount), 0) amount')
            ->first()?->toArray() ?? [];

        $cartItem->cart()->update($data);
    }

    /**
     * @param FormRequest $request
     *
     * @return array
     */
    public function change(FormRequest $request): array
    {
        $cart = Cart::firstOrCreate(['cookie_id' => $request->cookie('cart')]);
        $product = Product::findOrFail($request['product_id']);

        if (empty($request['quantity'])) {
            return $this->deleteItem($cart, $product);
        }

        return $this->changeItem($cart, $product, (int)$request['quantity']);
    }

    /**
     * @param string $token
     *
     * @return Cart
     */
    public function getCartByToken(string $token): Cart
    {
        return Cart::where('cookie_id', $token)->firstOrNew();
    }

    /**
     * @param string $token
     *
     * @return Collection
     */
    public function getItemsByToken(string $token): Collection
    {
        return CartItem::select([
            'cart_items.id',
            'cart_items.product_id',
            'cart_items.quantity',
            'cart_items.weight',
            'cart_items.amount',
        ])
            ->where('carts.cookie_id', $token)
            ->join('carts', 'carts.id', '=', 'cart_items.cart_id')
            ->oldest('cart_items.id')
            ->get()
            ->keyBy('product_id');
    }

    /**
     * @param Cart    $cart
     * @param Product $product
     *
     * @return array
     */
    protected function deleteItem(Cart $cart, Product $product): array
    {
        $fresh = tap($cart, static function (Cart $cart) use ($product) {
            $cart->items()->where('product_id', $product->id)->first()?->delete();
        })->fresh();

        return $this->response('delete', $fresh ?? new Cart());
    }

    /**
     * @param Cart    $cart
     * @param Product $product
     * @param int     $quantity
     *
     * @return array
     */
    protected function changeItem(Cart $cart, Product $product, int $quantity): array
    {
        $params = $this->generateParams($product, $quantity);
        $fresh = tap($cart, static function (Cart $cart) use ($product, $params) {
            $cart->items()->updateOrCreate(['product_id' => $product->id], $params);
        })->fresh();

        return $this->response('update', $fresh ?? new Cart(), $params);
    }

    /**
     * @param Product $product
     * @param int     $quantity
     *
     * @return array
     */
    protected function generateParams(Product $product, int $quantity): array
    {
        $params = [
            'quantity' => $quantity,
            'amount'   => $product->price * $quantity,
            'weight'   => $product->weight * $quantity
        ];

        if ('тыс. шт' === $product->unit) {
            foreach (['amount', 'weight'] as $item) {
                $params[$item] /= 1000;
            }
        }

        return $params;
    }

    /**
     * @param string $status
     * @param Cart   $cart
     * @param array  $params
     *
     * @return array
     */
    protected function response(string $status, Cart $cart, array $params = []): array
    {
        return [
            'status'  => $status,
            'cart'    => [
                'quantity' => $cart->quantity_format,
                'weight'   => $cart->weight_format,
                'amount'   => $cart->amount_format,
            ],
            'product' => $params
        ];
    }
}
