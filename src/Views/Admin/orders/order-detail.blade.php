@extends('layouts.master')

@section('title')
    Order detail
@endsection

@section('content')
    <div class="box_tite mb-3">Cập nhật trạng thái đơn hàng</div>

    <div class="box_table my-3">
        <!-- <h2 class="py-2 mx-3">Cập nhật trạng thái đơn hàng</h2> -->
        <div class="d-flex mx-3 gap-5 pt-3">
            <div>
                <p class="name_infor">Thông tin khách hàng</p>
                <p>Họ và tên: {{ $orderInfor['user_name'] }}</p>
                <p>Email: {{ $orderInfor['user_email'] }}</p>
                <p>Phone: {{ $orderInfor['user_phone'] }}</p>
                <p>Địa chỉ: {{ $orderInfor['user_address'] }}</p>
            </div>

            <div>
                <p class="name_infor">Tổng tiền thanh toán</p>
                <p>Tổng tiền: <?= number_format(100000, 0, '', '.') ?> vnđ</p>
                <p>Voucher: Không có</p>
                <p>Ngày tạo: {{ $orderInfor['created_at'] }}</p>
                <p>Hình thức thanh toán: {{ $orderInfor['status_payment'] }} </p>
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
                        <th scope="col">Giá</th>
                        <th scope="col">Màu</th>
                        <th scope="col">Kích thước</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Tổng tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($list_order_detail as $list) : extract($list) ?>
                    <tr style="vertical-align: middle;">
                        <td scope="row"><?= $product_id ?></td>
                        <td><span class="title"><?= $product_name ?></span></td>
                        <td><img src="<?= $UPLOAD_URL . '/' . $image ?>" width="80" alt=""></td>
                        <td><?= number_format($price, 0, '', '.') ?></td>
                        <td><?= $color_name ?></td>
                        <td><?= $size_name ?></td>
                        <td><?= $quantity ?></td>
                        <td><?= number_format($unit_price, 0, '', '.') ?></td>
                    </tr>
                    <?php endforeach ?>

                </tbody>
            </table>
        </div>

    </div>
@endsection
