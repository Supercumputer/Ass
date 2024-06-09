@extends('layouts.master')

@section('title')
    Cart
@endsection

@section('content')
    <div class="filter">
        <div class="box_content py-3 d-flex align-items-center justify-content-between">
            <div>
                <nav aria-label="breadcrumb" class="d-none d-md-block">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">Trang chủ</li>
                        <li class="breadcrumb-item">Giỏ hàng</li>
                        <li class="breadcrumb-item active" aria-current="page">Data</li>
                    </ol>
                </nav>
            </div>

        </div>
    </div>

    <div class="box_content bbg-gr py-3">
        <div class="bgkj scn">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">SẢN PHẨM</th>
                        <th scope="col">HÌNH ẢNH</th>
                        <th scope="col">GIÁ</th>
                        <th scope="col">SỐ LƯỢNG</th>
                        <th scope="col">TỔNG TIỀN</th>
                        <th scope="col">HÀNH ĐỘNG</th>
                    </tr>
                </thead>
                @if (!empty($_SESSION['cart']) || (!empty($_SESSION['user']) && !empty($_SESSION['cart-' . $_SESSION['user']['id']])))
                    <tbody>

                        @php
                            $cart = $_SESSION['cart'] ?? $_SESSION['cart-' . $_SESSION['user']['id']];
                        @endphp
                        @foreach ($cart as $item)
                            <tr style="vertical-align: middle">
                                <td>{{ $item['name'] }}</td>
                                <td>
                                    <img src="{{ asset($item['img_thumbnail']) }}" width="100px" height="100px"
                                        style="object-fit: cover" alt="">
                                </td>
                                <td>
                                    {{ number_format($item['price_sale'] ?: $item['price_regular'], 0, '', '.') }}
                                </td>
                                <td>
                                    <div class="d-flex items-center">

                                        @php
                                            $url = url('cart/quantityDec') . '?productID=' . $item['id'];

                                            if (
                                                isset($_SESSION['User']) &&
                                                isset($_SESSION['User']) &&
                                                isset($_SESSION['cart-' . $_SESSION['user']['id']])
                                            ) {
                                                $url .= '&cartID=' . $_SESSION['cart_id'];
                                            }
                                        @endphp
                                        <a class="btn btn-danger" href="{{ $url }}">-</a>

                                        <p style="padding: 5px 0;width: 35px; text-align: center">{{ $item['quantity'] }}</p>

                                        @php
                                            $url = url('cart/quantityInc') . '?productID=' . $item['id'];

                                            if (
                                                isset($_SESSION['User']) &&
                                                isset($_SESSION['User']) &&
                                                isset($_SESSION['cart-' . $_SESSION['user']['id']])
                                            ) {
                                                $url .= '&cartID=' . $_SESSION['cart_id'];
                                            }
                                        @endphp
                                        <a class="btn btn-primary" href="{{ $url }}">+</a>
                                    </div>
                                </td>
                                <td>
                                    {{ number_format($item['quantity'] * ($item['price_sale'] ?: $item['price_regular']), 0, '', '.') }}
                                </td>
                                <td>
                                    @php
                                        $url = url('cart/remove') . '?productID=' . $item['id'];

                                        if (
                                            isset($_SESSION['User']) &&
                                            isset($_SESSION['cart-' . $_SESSION['user']['id']])
                                        ) {
                                            $url .= '&cartID=' . $_SESSION['cart_id'];
                                        }
                                    @endphp
                                    <a class="btn btn-danger"
                                        onclick="return confirm('Bạn có chắc muốn xóa {{ $item['name'] }} không ?')"
                                        href="{{ $url }}">Xóa</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                @endif
            </table>

            <div class="d-flex justify-content-between">
                <div class="d-flex gap-2 align-items-center">
                    <a href="{{ url('products') }}"><button type="button" class="btn btn-primary">Tiếp tục
                            mua sắm</button></a>
                    <a href="index.php?don_hang"><button type="button" class="btn btn-success">Lịch sử đơn
                            hàng</button></a>
                    <a href="{{ url('cart/remove') }}" onclick="return confirm('Bạn có chắc muốn xóa không?')"><button
                            type="button" class="btn btn-danger">Xóa giỏ hàng</button></a>
                </div>

                @if (!empty($_SESSION['cart']) || (!empty($_SESSION['user']) && !empty($_SESSION['cart-' . $_SESSION['user']['id']])))
                    @php
                        $sum_price = 0;
                        foreach ($cart as $item) {
                            $sum_price += $item['quantity'] * ($item['price_sale'] ?? $item['price_regular']);
                        }
                    @endphp

                    <div class="d-flex gap-3 align-items-center">
                        <p class="mb-0"><b>Tổng tiền:</b> <?= number_format($sum_price, 0, '', '.') ?> VND</p>
                        <a href="{{ url('order?total_price=') . $sum_price }}"><button type="button"
                                class="btn btn-success">Thanh toán</button></a>
                    </div>
                @endif
            </div>
        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const decreaseButtons = document.querySelectorAll('.decrease');
            const increaseButtons = document.querySelectorAll('.increase');
            const quantityInput = document.querySelectorAll('.quantity-input');
            const btn_up = document.querySelectorAll('.btn_up');

            decreaseButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    let input = button.parentElement.querySelector('.quantity-input');
                    let currentValue = parseInt(input.value);
                    if (currentValue > 1) {
                        input.value = currentValue - 1;
                    }
                });
            });

            increaseButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    let input = button.parentElement.querySelector('.quantity-input');
                    let currentValue = parseInt(input.value);
                    if (currentValue < 99) {
                        input.value = currentValue + 1;
                    }
                });
            });

            btn_up.forEach(function(item, index) {
                item.addEventListener('click', function() {
                    let value = document.querySelectorAll('.quantity-input')[index].value;
                    item.href = `index.php?update_quantity=${value}&id=${index}`;
                });
            });

        });
    </script>
@endsection
