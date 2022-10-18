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
            ->selectRaw('count(*) quantity, sum(weight) weight, sum(amount) amount')
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
            ->latest('cart_items.id')
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
        $cart->items()->where('product_id', $product->id)->first()?->delete();

        // Total cart
        return [];
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
        $cart
            ->items()
            ->updateOrCreate(
                ['product_id' => $product->id],
                $this->generateParams($product, $quantity)
            );

        //Total cart
        return [];
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
}
