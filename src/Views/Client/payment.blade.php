@extends('layouts.master')

@section('title')
    Home
@endsection

@section('content')
    <div class="box_content bbg-gr py-3">
        <div class="bgkj">
            <h1>Thông tin khách hàng</h1>

            <form class="row mt-3" action="{{ url('order/checkout') }}" method="post" id="form">
                <div class="col-lg-7 col-md-6">
                    <div class="row g-3 mb-3">

                        <div class="col-lg-6">
                            <label for="inputEmail4" class="form-label">Họ và tên</label>
                            <input type="text" class="form-control" name="user_name"
                                value="{{ $_SESSION['user']['name'] ?? null }}">
                            <span style="color: red;">{{ $_SESSION['errors']['user_name'] ?? '' }}</span>
                        </div>

                        <div class="col-lg-6">
                            <label for="inputPassword4" class="form-label">Email</label>
                            <input type="email" class="form-control" name="user_email"
                                value="{{ $_SESSION['user']['email'] ?? null }}">
                            <span style="color: red;">{{ $_SESSION['errors']['user_email'] ?? '' }}</span>
                        </div>

                        <div class="col-12">
                            <label for="inputAddress2" class="form-label">Số điện thoại</label>
                            <input type="text" class="form-control" name="user_phone">
                            <span style="color: red;">{{ $_SESSION['errors']['user_phone'] ?? '' }}</span>
                        </div>

                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Address</label>
                            <input type="text" class="form-control" name="user_address">
                            <span style="color: red;">{{ $_SESSION['errors']['user_address'] ?? '' }}</span>
                        </div>
                    </div>
                </div>
                @php
                    unset($_SESSION['errors']);
                @endphp
                <div class="col-lg-5 col-md-6">
                    <div class="box_infor_money">
                        <h2 class="hdd">Hóa đơn</h2>
                        <div class="d-flex flex-column gap-3">

                            <div class="luka d-flex justify-content-between align-items-center">
                                <p>Phí vận chuyển</p>
                                <p>0 VNĐ</p>
                            </div>

                            <div class="luka d-flex justify-content-between align-items-center">
                                <p>Voucher</p>
                                <p>Không có</p>
                            </div>

                            <div class="luka d-flex justify-content-between align-items-center">
                                <p>Tổng tiền</p>
                                <p>{{ number_format($_GET['total_price'], 0, '', '.') }} VNĐ</p>
                                <input type="hidden" name="total_price" value="{{ $_GET['total_price'] }}">
                            </div>

                            <div class="luka d-flex justify-content-between align-items-center">
                                <p>Hình thức thanh toán</p>
                            </div>

                            <div class="ck_onl d-flex align-items-center">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="thanhtoan" id="inlineRadio1"
                                        value="vnpay">
                                    <label class="form-check-label" for="inlineRadio1">Vn Pay</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="thanhtoan" id="inlineRadio2"
                                        value="knh" checked>
                                    <label class="form-check-label" for="inlineRadio2">Thanh toán khi nhận hàng</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mt-3">
                            <button type="submit" name="redirect" class="btn btn-danger col-12">Thanh Toán</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>

    </div>
@endsection
