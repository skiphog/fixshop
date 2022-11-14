<?php

/**
 * @var \App\Models\Order $order
 */

?>
@extends('layouts.admin')

@section('title', "Заказ # {$order->id}")
@section('description', "Заказ # {$order->id}")

@section('content')
    <h1>Заказ #{{ $order->id }}</h1>
    <div class="fix-section">
        <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="order-info-tab" data-bs-toggle="tab" data-bs-target="#order-info" type="button"
                        role="tab" aria-controls="home-tab-pane" aria-selected="true">Информация о заказе
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="order-products-tab" data-bs-toggle="tab" data-bs-target="#order-products" type="button"
                        role="tab" aria-controls="profile-tab-pane" aria-selected="false">Заказанные товары
                </button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane show active" id="order-info" role="tabpanel" aria-labelledby="order-info-tab" tabindex="0">
                <table class="table">
                    <tr>
                        <td class="fw-bold">Статус:</td>
                        <td class="w-100">{{ $order->status_text }}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Организация:</td>
                        <td class="w-100">{{ $order->organization }}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Имя:</td>
                        <td class="w-100">{{ $order->name }}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Телефон:</td>
                        <td class="w-100">{{ $order->phone }}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Email:</td>
                        <td class="w-100">{{ $order->email }}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Примечание:</td>
                        <td class="w-100">{{ $order->note ?: "\u{2014}" }}</td>
                    </tr>
                </table>
                <p>
                    Позиции: <strong>{{ $order->quantity_format }}</strong>
                    <br>
                    Вес заказа: <strong>{{ $order->weight_format }} кг</strong>
                    <br>
                    Сумма: <strong>{{ $order->amount_format }} руб.</strong>
                </p>
            </div>
            <div class="tab-pane" id="order-products" role="tabpanel" aria-labelledby="order-products-tab" tabindex="0">
                <p>TAB #2</p>
            </div>
        </div>
    </div>
@endsection