@extends('layouts.master')

@section('title')
    Hiastory
@endsection

@section('content')
    <div class="filter">
        <div class="box_content pt-3 d-flex align-items-center justify-content-between">
            <div>
                <nav aria-label="breadcrumb" class="d-none d-md-block">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Trang chu</li>
                        <li class="breadcrumb-item">Giỏ hàng</li>
                        <li class="breadcrumb-item active" aria-current="page">Lịch sử đơn hàng chi tiết</li>
                    </ol>
                </nav>
            </div>

        </div>
    </div>

    <div class="box_content bbg-gr py-3">
        <div class="bgkj">

            <div class="d-flex justify-content-between border-bottom p-2">
                <p class="" style="font-size: 18px; font-weight: 500;">Sản phẩm</p>
                <p class="" style="font-size: 18px; font-weight: 500;">Tổng tiền</p>
            </div>

            @foreach ($data as $item)
                <a href="" class="history_cart_infor_wrapper align-items-center">
                    <div class="history_cart_infor">
                        <div class="history_cart_img">
                            <img src="{{ asset($item['img_thumbnail']) }}" alt="">
                        </div>
                        <div class="history_cart_infor_detail">
                            <p class="history_cart_infor_title">{{ $item['name'] }}</p>
                            <p class="history_cart_infor_title_distribute">Phân loại hàng : không</p>
                            <p class="history_cart_infor_quantity">
                                <span>x {{ $item['quantity'] }}</span>
                            </p>
                        </div>
                    </div>

                    <div class="history_cart_infor_detail_price">
                        <span>{{ number_format($item['price_sale'] ?: $item['price_regular'] * $item['quantity'], 0, '', '.') }}
                            vnđ</span>
                    </div>
                </a>
            @endforeach
            @php
                $total = 0;
                foreach ($data as $key) {
                    $total += ($key['price_sale'] ?: $key['price_regular']) * $key['quantity'];
                }
            @endphp
            <div class="d-flex justify-content-between px-2 py-4">
                <a href="{{ url('order/history') }}"><button type="button" class="btn btn-danger">Lịch sử đơn hàng</button></a>
                <p class="" style="font-size: 18px; font-weight: 500;color: red">
                    {{ number_format($total, 0, '', '.') }} vnđ</p>
            </div>



        </div>
    </div>
@endsection
