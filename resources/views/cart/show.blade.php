<?php

/**
 * @var \App\Models\Cart $cart
 */

?>
@extends('layouts.app')

@section('title', 'Оформление заказа')
@section('description', 'Оформление заказа')

@section('content')
    @dump($cart)
@endsection