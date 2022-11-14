<?php

/**
 * @var \App\Models\Order[] $orders
 */

?>
@extends('layouts.admin')

@section('title', 'Заказы')
@section('description', 'Заказы')

@section('content')
    <h1>Заказы</h1>
    <div class="fix-section mb-3">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Статус</th>
                <th scope="col">Организация</th>
                <th scope="col">User</th>
                <th scope="col" class="text-end">Сумма</th>
                <th scope="col" class="text-end">Вес</th>
                <th scope="col" class="text-center">Позиции</th>
                <th scope="col" class="text-end">Дата</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr class="position-relative">
                    <th scope="row">{{ $order->id }}</th>
                    <td class="fw-bold {{ $order->status_color }}">{{ $order->status_text }}</td>
                    <td><a href="{{ route('admin.orders.show', $order) }}">{{ $order->organization }}</a></td>
                    <td>{{ $order->name }}</td>
                    <td class="text-end">{{ $order->amount_format }} р</td>
                    <td class="text-end">{{ $order->weight_format }} кг</td>
                    <td class="text-center">{{ $order->quantity }}</td>
                    <td class="text-end">
                        <div data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-title="{{ $order->created_at->diffForHumans() }}">
                            {{ $order->created_at->format('d.m.Y H:i') }}
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{ $orders->onEachSide(1)->links('partials.paginate') }}
@endsection

@push('scripts')
    <script>
      const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
      const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
    </script>
@endpush