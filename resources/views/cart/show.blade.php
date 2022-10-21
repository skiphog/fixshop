<?php

/**
 * @var \App\Models\Cart $cart
 */

?>
@extends('layouts.app')

@section('title', 'Оформление заказа')
@section('description', 'Оформление заказа')

@push('icons')
    <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
    </symbol>
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
    @dump($cart)
@endsection