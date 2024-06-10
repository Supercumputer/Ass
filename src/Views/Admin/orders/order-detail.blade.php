@extends('layouts.master')

@section('title')
    Order detail
@endsection

@section('content')
    <div class="box_tite mb-3">Chi tiết đơn hàng</div>

    <div class="box_table my-3">
        <!-- <h2 class="py-2 mx-3">Cập nhật trạng thái đơn hàng</h2> -->
        <div class="d-flex mx-3 gap-5 pt-3">

            <div>
                <p class="name_infor text-uppercase">Thông tin người đặt</p>
                <p><b>Họ và tên:</b> {{ $orderInfor['user_name'] }}</p>
                <p><b>Email:</b> {{ $orderInfor['user_email'] }}</p>
                <p><b>Phone:</b> {{ $orderInfor['user_phone'] }}</p>
                <p><b>Địa chỉ:</b> {{ $orderInfor['user_address'] }}</p>
            </div>

            <div>
                <p class="name_infor text-uppercase">Thông tin người nhận</p>
                <p><b>Họ và tên:</b> {{ $orderInfor['shipping_name'] ?: $orderInfor['user_name'] }}</p>
                <p><b>Email:</b> {{ $orderInfor['shipping_email'] ?: $orderInfor['user_email'] }}</p>
                <p><b>Phone:</b> {{ $orderInfor['shipping_phone'] ?: $orderInfor['user_phone'] }}</p>
                <p><b>Địa chỉ:</b> {{ $orderInfor['shipping_address'] ?: $orderInfor['user_address'] }}</p>
            </div>

            <div>
                <p class="name_infor text-uppercase">Thông tin đơn hàng</p>
                @php
                    $total = 0;
                    foreach ($orderDetail as $key) {
                        $total += ($key['price_sale'] ?: $key['price_regular']) * $key['quantity'];
                    }
                @endphp
                <p><b>Tổng tiền:</b> <?= number_format($total, 0, '', '.') ?> vnđ</p>
                <p><b>Trạng thái giao hàng:</b>
                    {{ $orderInfor['status_delivery'] == 0 ? 'Chờ xác nhận' : ($orderInfor['status_delivery'] == 1 ? 'Chờ lấy hàng' : ($orderInfor['status_delivery'] == 2 ? 'Chờ giao hàng' : ($orderInfor['status_delivery'] == 3 ? 'Đã giao hàng' : ($orderInfor['status_delivery'] == 4 ? 'Đã hủy' : 'Trả hàng')))) }}
                </p>
                <p><b>Ngày tạo đơn:</b> {{ date('d/m/Y H:i:s', strtotime($orderInfor['created_at'])) }}</p>
                <p><b>Trạng thái thanh toán:</b> {{ $orderInfor['status_payment'] === 0 ? 'Chưa thanh toán' : 'Đã thanh toán' }}
                </p>
            </div>

        </div>

    </div>

    <div class="box_table my-3">

        <div class="box_wap mx-3 py-2">

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">IDSP</th>
                        <th scope="col" style="width: 360px;">Tên sản phẩm</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Giá gốc</th>
                        <th scope="col">Giá Sale</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Tổng tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orderDetail as $item)
                        <tr style="vertical-align: middle;">
                            <td scope="row">{{ $item['id'] }}</td>
                            <td><span class="title">{{ $item['name'] }}</span></td>
                            <td><img src="{{ asset($item['img_thumbnail']) }}" width="100" height="100" style="object-fit: cover" alt=""></td>
                            <td>{{ number_format($item['price_regular'], 0, '', '.') }}</td>
                            <td>{{ isset($item['price_sale']) ? number_format($item['price_sale'], 0, '', '.') : 'Không có' }}</td>

                            <td>{{ $item['quantity'] }}</td>

                            <td>{{ number_format((($item['price_sale'] ?: $item['price_regular'] ) * $item['quantity']), 0, '', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
