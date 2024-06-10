@extends('layouts.master')

@section('title')
    Thanks
@endsection

@section('content')
    <div class="box_content bbg-gr py-3">
        <div class="mgbg d-flex justify-content-center py-4">
            <div class="thank d-flex flex-column align-items-center">
                <i class="fa-regular fa-circle-check ic_tc"></i>
                <h1 class="h1_true">Đặt hàng thành công</h1>
                <p class="text-center" style="max-width: 500px">Cảm ơn bạn đã tin tưởng và dặt hàng của chúng tôi. Chúng tôi
                    sẽ liên hệ quý khách để xác nhận đơn hàng xớm nhất.</p>
                <div class="d-flex align-items-center gap-2">
                    <a href="{{ url('order/history') }}"><button type="button" class="btn btn-outline-secondary">Xem chi tiết
                            đơn hàng</button></a>
                    <a href="{{ url('products') }}"><button type="button" class="btn btn-danger">Tiếp tục mua
                            hàng</button></a>
                </div>
            </div>
        </div>
    </div>
@endsection
