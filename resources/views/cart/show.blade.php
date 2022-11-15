<?php

/**
 * @var \App\Models\Cart $cart
 */

?>
@extends('layouts.app')

@section('title', 'Оформление заказа')
@section('description', 'Оформление заказа')

@push('icons')
    @include('cart.icons')
@endpush

@section('content')
    <div class="fix-section mb-3">
        <h1 class="text-center">Оформление заказа</h1>
        <div class="alert alert-warning text-center" role="alert">
            <svg class="bi" width="16" height="16" role="img">
                <use xlink:href="#exclamation-triangle-fill"/>
            </svg>
            Заказ формируется по розничным ценам. Окончательную сумму и цены вы увидите в счете после обработки заказа.
            <br>
            По всем интересующим вас вопросам звоните
            <a class="text-nowrap" href="tel:79226666666">+7 (922) 666-66-66</a>
        </div>
    </div>

    @include('partials.success')

    @if($cart->items->isNotEmpty())
        <div id="basket" class="bg-light rounded shadow-sm border p-3 mb-3 table-responsive-md">
            <table class="fix-section table align-middle m-0">
                <thead>
                <tr>
                    <th scope="col">Наименование</th>
                    <th scope="col">Кол-во</th>
                    <th scope="col">Вес</th>
                    <th scope="col">Цена</th>
                    <th scope="col">Итого</th>
                    <th scope="col" class="text-danger text-center">
                        <svg class="bi align-middle" width="18" height="18">
                            <use xlink:href="#icon-cancel"/>
                        </svg>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($cart->items as $item)
                    <tr>
                        <td>{{ $item->product->title }}</td>
                        <td>
                            <!--suppress HtmlFormInputWithoutLabel -->
                            <input class="form-control fix-input-cart" type="number" value="{{ $item->quantity }}" data-id="{{ $item->product_id }}">
                        </td>
                        <td class="text-nowrap">{{ $item->weight_format }} кг</td>
                        <td class="text-nowrap">{{ $item->product->price_format }} р.</td>
                        <td class="text-nowrap">{{ $item->amount_format }} р.</td>
                        <td class="text-center">
                            <button type="button" class="btn-close btn-destroy" data-id="{{ $item->product_id }}"></button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="5" class="text-end">Вес заказа:</td>
                    <td class="text-nowrap"><span class="fw-bold weight">{{ $cart->weight_format }}</span> кг</td>
                </tr>
                <tr>
                    <td colspan="5" class="text-end">Сумма заказа:</td>
                    <td class="text-nowrap"><span class="fw-bold amount">{{ $cart->amount_format }}</span> р.</td>
                </tr>
                <tr>
                    <td colspan="6" class="text-end">
                        <form class="d-inline-block hidden" method="post" action="{{ route('cart.destroy') }}">
                            @csrf
                            <button class="btn btn-warning" type="submit">Подтверждаю удаление заказа</button>
                        </form>
                        <button id="cart-destroy" class="btn btn-outline-danger">Удалить заказ</button>
                    </td>
                </tr>
                </tfoot>
            </table>
        </div>

        @include('partials.errors')

        <form id="order-form" class="fix-section" action="{{ route('orders.store') }}" method="post">
            <fieldset>
                <legend>Информация о заказчике</legend>
                <div class="mb-3">
                    <label for="organization" class="form-label">Организация</label>
                    <input type="text" id="organization" class="form-control" name="organization"
                            value="{{ old('organization') }}" placeholder="ООО / ИП / Частное лицо">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Имя</label>
                    <input type="text" id="name" class="form-control" name="name"
                            value="{{ old('name') }}" placeholder="Джо Байден">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Телефон</label>
                    <input type="text" id="phone" class="form-control" name="phone"
                            value="{{ old('phone') }}" placeholder="+7 (999) 999-99-99">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" id="email" class="form-control" name="email"
                            value="{{ old('email') }}" placeholder="joe@biden.com">
                </div>
                <div class="mb-3">
                    <label for="note" class="form-label">Примечание</label>
                    <textarea class="form-control" id="note" name="note" rows="3"></textarea>
                </div>

                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="policy" name="policy" checked>
                    <label class="form-check-label" for="policy">
                        Я согласен <a href="#">на обработку моих персональных данных</a>
                    </label>
                </div>
                @csrf
                <button type="submit" class="btn btn-primary">Оформить</button>
            </fieldset>
        </form>

        @push('scripts')
            <script src="{{ asset('js/jquery.maskedinput.min.js') }}"></script>
            <script src="{{ asset('js/cart.js') }}"></script>
        @endpush
    @else
        <div class="fix-section text-center">
            <p class="lead">Нет товаров для оформления заказа</p>
            <a class="btn btn-primary" href="{{ route('catalog.index') }}">Перейти в каталог</a>
        </div>
    @endif
    @include('partials.success')
@endsection
