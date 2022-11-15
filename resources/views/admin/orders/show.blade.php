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
    <div class="fix-section mb-3">
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
                        <td class="fw-bold align-middle">Статус:</td>
                        <td class="w-100">
                            <form id="status-form" class="d-flex gap-3" action="{{ route('admin.orders.update', $order) }}" method="post">
                                @csrf
                                <div>
                                    <select id="select-status" class="form-select" aria-label="Выбор статуса" name="status">
                                        @foreach(\App\Models\Order::statusList() as $key => $value)
                                            <option value="{{ $key }}" @selected($key === $order->status)>{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="hidden">
                                    <button class="btn btn-primary" type="submit">Сохранить</button>
                                </div>
                            </form>
                        </td>
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
                        <td class="w-100 text-muted">{{ $order->note ?: "\u{2014}" }}</td>
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
                <table class="table table-hover mb-3">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Номенклатура</th>
                        <th scope="col" class="text-end">Кол-во</th>
                        <th scope="col" class="text-center">Ед. изм</th>
                        <th scope="col" class="text-end">Цена</th>
                        <th scope="col" class="text-end">Сумма</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order->items as $key => $item)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $item->title }}</td>
                            <td class="text-end">{{ $item->quantity_format }}</td>
                            <td class="text-center">{{ $item->unit }}</td>
                            <td class="text-end">{{ $item->price_format }}</td>
                            <td class="text-end">{{ $item->amount_format }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <p class="text-end">
                    Вес заказа: <strong>{{ $order->quantity_format }} кг</strong>
                    <br>
                    Сумма: <strong>{{ $order->amount_format }} руб.</strong>
                </p>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
      $('#select-status').on('change', function () {
        $(this).parent().next().removeClass('hidden');
      });

      $('#status-form').on('submit', function () {
        $(this).find('button[type=submit]').attr('disabled', 'disabled').html('<span class="spinner-grow spinner-grow-sm"></span> Обновляю ...');
      });
    </script>
@endpush