<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::latest('id')
            ->paginate(20);

        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $order->load('items');

        return view('admin.orders.show', compact('order'));
    }

    public function update(Order $order, Request $request): RedirectResponse
    {
        $data = $request->validate([
            'status' => ['required', 'string', Rule::in(Order::STATUS)]
        ]);

        $order->update($data);

        return to_route('admin.orders.show', $order)->with('success', 'Статус обновлён');
    }
}
