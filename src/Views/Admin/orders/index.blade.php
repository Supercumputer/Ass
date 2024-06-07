@extends('layouts.master')

@section('title')
    Oders
@endsection

@section('content')
    <div class="box_tite mb-3">Quản lý hóa đơn</div>

    <div class="box_table my-3">
        <div class="box_btns py-2 mx-3 d-flex justify-content-between align-items-center">
            <div class="box_btn">
                <button type="button" class="btn btn-secondary select-all">Chọn tất cả</button>
                <button type="button" class="btn btn-success deselect-all">Bỏ chọn tất cả</button>
                <button type="button" class="btn btn-danger delete-selected"><a class="url_all_delete"
                        onclick="return confirm('Bạn có muốn xóa không.')">Xóa mục đã chọn</a></button>
            </div>

            <form action="index.php" method="GET" class="mb-0">
                <input type="text" name="key" placeholder="Search here ...">
            </form>

        </div>

        <div class="box_wap mx-3 pt-2 pb-1">

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col" class="check_column">
                            <input class="form-check-input" name="input_all" type="checkbox" value="">
                        <th>
                        <th scope="col">ID</th>
                        <th scope="col" class="customer_column">Khách hàng</th>
                        <th scope="col">Ngày tạo</th>
                        <th scope="col">Tạm tính</th>
                        <th scope="col">Mã giảm giá</th>
                        <th scope="col">Tổng</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col" class="action_column_dh">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $item)
                        <tr style="vertical-align: middle;">
                            <th scope="col">
                                <input class="form-check-input" name="input_item" type="checkbox" value="<?= $order_id ?>">
                            <th>
                            <td scope="row">{{ $item['id'] }}</td>
                            <td style="width: 300px;">
                                <div class="d-flex flex-column">
                                    <span>{{ $item['user_name'] ?? $item['shipping_name'] }}</span>
                                    <span>{{ $item['user_email'] ?? $item['shipping_email'] }}</span>
                                    <span>{{ $item['user_phone'] ?? $item['shipping_phone'] }}</span>
                                    <span>{{ $item['user_address'] ?? $item['shipping_address'] }}</span>
                                </div>
                            </td>

                            <td>{{ $item['created_at'] }}</td>
                            <td><?= number_format(1000, 0, '', '.') ?></td>
                            <td>Không có</td>
                            <td><?= number_format(2000, 0, '', '.') ?></td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ $item['status_delivery'] == 0 ? 'Đang chờ xác nhận' : ($item['status_delivery'] == 1 ? 'Đang giao hàng' : ($item['status_delivery'] == 2 ? 'Đã giao hàng' : ($item['status_delivery'] == 3 ? 'Đã nhận hàng' : ($item['status_delivery'] == 4 ? 'Đã hủy' : 'Hoàn thành')))) }}

                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                        <li><a class="dropdown-item" href="{{url('admin/orders/0/update')}}">Đang chờ xác nhận</a></li>
                                        <li><a class="dropdown-item" href="{{url('admin/orders/1/update')}}">Đang Giao hàng</a></li>
                                        <li><a class="dropdown-item" href="{{url('admin/orders/2/update')}}">Đã Giao hàng</a></li>
                                        <li><a class="dropdown-item" href="{{url('admin/orders/3/update')}}">Đã nhận hàng</a></li>
                                        <li><a class="dropdown-item" href="{{url('admin/orders/4/update')}}">Đã hủy</a></li>
                                        <li><a class="dropdown-item" href="{{url('admin/orders/5/update')}}">Thành công</a></li>
                                    </ul>
                                </div>
                            </td>
                            </td>
                            <td>
                                <a class="btn btn-info" href="{{ url('admin/orders/' . $item['id']) . '/show' }}">Xem</a>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>

    </div>
@endsection
