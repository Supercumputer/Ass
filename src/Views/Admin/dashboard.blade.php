@extends('layouts.master')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="box_tite mb-3">Bảng điều khiển</div>

    <div class="box_count">
        <div class="row">
            <div class="col custom-column">
                <div class="box_count_item d-flex align-items-center gap-2 ">
                    <i class="icon_01 fa-solid fa-users"></i>
                    <div class="box_infor_item">
                        <div class="infor_item_top">
                            <h2>TỔNG TÀI KHOẢN</h2>
                            <p>{{ $totalUsers }} tài khoản</p>
                        </div>
                        <span class="title_des">Tổng số tài khoản được quản lý</span>
                    </div>
                </div>

            </div>
            <div class="col custom-column">
                <div class="box_count_item d-flex align-items-center gap-2 ">

                    <i class="icon_02 fa-solid fa-layer-group"></i>
                    <div class="box_infor_item">
                        <div class="infor_item_top">
                            <h2>TỔNG DANH MỤC</h2>
                            <p>{{ $totalCategorys }} danh mục</p>
                        </div>
                        <span class="title_des">Tổng số danh mục được quản lý</span>
                    </div>
                </div>

            </div>
            <div class="col custom-column">
                <div class="box_count_item d-flex align-items-center gap-2 ">
                    <i class="icon_03 fa-solid fa-clipboard"></i>
                    <div class="box_infor_item">
                        <div class="infor_item_top">
                            <h2>TỔNG ĐƠN HÀNG</h2>
                            <p>{{ $totalOrders }} đơn hàng</p>
                        </div>
                        <span class="title_des">Tổng số đơn hàng được quản lý</span>
                    </div>
                </div>

            </div>
            <div class="col custom-column">
                <div class="box_count_item d-flex align-items-center gap-2 ">
                    <i class="icon_04 fa-solid fa-database"></i>
                    <div class="box_infor_item">
                        <div class="infor_item_top">
                            <h2>TỔNG SẢN PHẨM</h2>
                            <p>{{ $totalProducts }} sản phẩm</p>
                        </div>
                        <span class="title_des">Tổng số sản phẩm được quản lý</span>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <div class="box_chart mt-3">
        <h2 class="py-2 mx-3">Biểu đồ thống kê đơn hàng theo tháng</h2>
        <div class="p-3">
            <canvas id="myChart"></canvas>
        </div>
    </div>

    <div class="box_table my-3">
        <h2 class="py-2 mx-3">Khách hàng mới</h2>

        <div class="box_wap mx-3 py-2">

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NAME</th>
                        <th scope="col">AVATAR</th>
                        <th scope="col">Email</th>
                        <th scope="col">CREATED_AT</th>
                        <th scope="col">UPDATE_AT</th>
                        <th scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($users as $user)
                        <tr>
                            <td><?= $user['id'] ?></td>
                            <td><?= $user['name'] ?></td>
                            <td>
                                <img src="{{ asset($user['avatar']) }}" alt="" width="100px">
                            </td>
                            <td><?= $user['email'] ?></td>

                            <td><?= $user['created_at'] ?></td>
                            <td><?= $user['updated_at'] ?></td>
                            <td>

                                <a class="btn btn-info" href="{{ url('admin/users/' . $user['id'] . '/show') }}">Xem</a>
                                <a class="btn btn-warning" href="{{ url('admin/users/' . $user['id'] . '/edit') }}">Sửa</a>
                                <a class="btn btn-danger delete-selected"
                                    href="{{ url('admin/users/' . $user['id'] . '/delete') }}"
                                    onclick="return confirm('Chắc chắn xóa không?')">Xóa</a>

                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>

    <div class="box_table">
        <h2 class="py-2 mx-3">Đơn hàng mới nhất</h2>

        <div class="box_wap mx-3 py-2">

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Mã Đơn</th>
                        <th scope="col">Khách hàng</th>
                        <th scope="col">Ngày tạo</th>
                        <th scope="col">Trạng thái thanh toán</th>
                        <th scope="col">Trạng thái Giao</th>
                        <th scope="col">Hành động</th>

                    </tr>
                </thead>
                <tbody>

                    @foreach ($orders as $orderItem)
                        <tr style="vertical-align: middle;">

                            <td scope="row">{{ $orderItem['id'] }}</td>

                            <td>
                                <div class="d-flex flex-column">
                                    <span>{{ $orderItem['user_name'] ?? $orderItem['shipping_name'] }}</span>
                                    <span>{{ $orderItem['user_email'] ?? $orderItem['shipping_email'] }}</span>
                                    <span>{{ $orderItem['user_phone'] ?? $orderItem['shipping_phone'] }}</span>
                                    <span>{{ $orderItem['user_address'] ?? $orderItem['shipping_address'] }}</span>
                                </div>
                            </td>

                            <td>{{ $orderItem['created_at'] }}</td>
                            <td>
                                <p class="{{ $orderItem['status_payment'] === 0 ? 'text-danger' : 'text-success' }} mb-0"
                                    style="font-weight: 700">
                                    {{ $orderItem['status_payment'] === 0 ? 'Chưa thanh toán' : 'Đã thanh toán' }}</p>
                            </td>

                            <td>{{ $orderItem['status_delivery'] == 0
                                ? 'Chờ xác nhận'
                                : ($orderItem['status_delivery'] == 1
                                    ? 'Chờ lấy hàng'
                                    : ($orderItem['status_delivery'] == 2
                                        ? 'Chờ giao hàng'
                                        : ($orderItem['status_delivery'] == 3
                                            ? 'Đã giao hàng'
                                            : ($orderItem['status_delivery'] == 4
                                                ? 'Đã hủy'
                                                : 'Trả hàng')))) }}
                            </td>

                            <td>
                                <a class="btn btn-info text-white"
                                    href="{{ url('admin/orders/' . $orderItem['id']) . '/show' }}">Xem</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>
@endsection
