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
                        <li class="breadcrumb-item active" aria-current="page">Lịch sử đơn hàng</li>
                    </ol>
                </nav>
            </div>

        </div>
    </div>

    <div class="box_content bbg-gr py-3">
        <div class="bgkj">
            <h1>Lịch sử đơn hàng</h1>

            @if (!isset($_SESSION['user']))
                <div class="d-flex flex-column align-items-center">
                    <h1 class="title_order">Kiểm tra đơn hàng của bạn</h1>
                    <form action="{{ url('order/history') }}" method="get"
                        class="box_order_search d-flex flex-column align-items-center col-7 gap-3">
                        <input type="text" class="col-6" name="order_id" placeholder="Nhập vào mã đơn hàng để tra cứu.">
                        <button type="submit" class="btn btn-danger col-3 mb-3">Tra cứu</button>
                    </form>
                </div>
            @endif

            @if (sizeof($data) > 0)
                @foreach ($data as $item)
                    <div class="box_hd mb-2">
                        <div class="icon_deles"><a href=""><i class="fa-regular fa-circle-xmark"></i></a></div>
                        <div class="wrapper_history_cart">
                            <div class="wrapper_item_history_cart">
                                <div class="history_cart_1"><b>Mã đơn: {{ $item['id'] }}</b></div>

                                <div class="status_history_cart">
                                    <div class="status_delevery">
                                        <i class="fas fa-truck"></i>
                                        {!! $item['status_delivery'] == 5
                                            ? '<span>Trả hàng</span>'
                                            : ($item['status_delivery'] == 4
                                                ? '<span>Giao hàng bị hủy</span>'
                                                : ($item['status_delivery'] == 3
                                                    ? '<span>Đã giao hàng</span>'
                                                    : ($item['status_delivery'] == 2
                                                        ? '<span>Chờ giao hàng</span>'
                                                        : ($item['status_delivery'] == 1
                                                            ? '<span>Chờ lấy hàng</span>'
                                                            : '<span>Chờ xác nhận</span>')))) !!}

                                    </div>
                                    <div class="check_status">
                                        {!! $item['status_delivery'] == 3
                                            ? '<span>HOÀN THÀNH</span>'
                                            : ($item['status_delivery'] == 4
                                                ? '<span>ĐÃ HỦY</span>'
                                                : ($item['status_delivery'] == 5
                                                    ? '<span>TRẢ HÀNG</span>'
                                                    : '<span>CHƯA HOÀN THÀNH</span>')) !!}
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="d-flex align-items-center justify-content-between mt-3 p-2">
                            <div class="d-flex flex-column gap-3">
                                <div class="d-flex gap-3">
                                    <p><b>Họ tên:</b> {{ $item['user_name'] }}</p> /
                                    <p><b>Số điện thoại:</b>
                                        @if (isset($_SESSION['user']))
                                            {{ $item['user_phone'] ?: $item['shipping_phone'] }}
                                        @else
                                            {{ str_repeat('*', strlen($item['user_phone'] ?: $item['shipping_phone']) - 4) . substr($item['user_phone'] ?: $item['shipping_phone'], -4) }}
                                        @endif
                                    </p> /
                                    <p><b>Email:</b>
                                        @if (isset($_SESSION['user']))
                                            {{ $item['user_email'] ?: $item['shipping_email'] }}
                                        @else
                                            {{ preg_replace('/(.{2})(.*)(?=@)/', '$1****', $item['user_email'] ?: $item['shipping_email']) }}
                                        @endif
                                    </p>
                                </div>
                                <div class="d-flex gap-3">
                                    <p><b>Ngày tạo:</b> {{ $item['created_at'] }}</p> /
                                    <p><b>Địa chỉ nhận hàng:</b>
                                        @if (isset($_SESSION['user']))
                                            {{ $item['user_address'] ?: $item['shipping_address'] }}
                                        @else
                                            {{ str_repeat('*', strlen($item['user_address'] ?: $item['shipping_address']) - 10) . substr($item['user_address'] ?: $item['shipping_address'], -10) }}
                                            {{-- {{ preg_replace('/^(\S+)/', str_repeat('*', strlen('$1')), $item['user_address'] ?: $item['shipping_address']) }} --}}
                                        @endif
                                    </p>
                                </div>

                            </div>
                            <a href="{{ url('order/' . $item['id'] . '/detail') }}"><button type="button"
                                    class="btn btn-danger">Xem chi tiết đơn hàng</button></a>
                        </div>

                    </div>
                @endforeach
            @endif

        </div>
    </div>
@endsection
