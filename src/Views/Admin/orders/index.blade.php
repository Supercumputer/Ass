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

                        <th scope="col">Mã Đơn</th>
                        <th scope="col">Khách hàng</th>
                        <th scope="col">
                            <div class="d-flex">
                                <p class="mb-0">Ngày tạo</p>
                                <p class="mb-0 flex items-center">
                                    @if ($sort_by == 'created_asc')
                                        <a href="{{ url('admin/orders?sort_by=created_desc') }}"><i
                                                class="fa-solid fa-arrow-down-short-wide" style="color: #000"></i></a>
                                    @else
                                        <a href="{{ url('admin/orders?sort_by=created_asc') }}"><i
                                                class="fa-solid fa-arrow-up-wide-short" style="color: #000"></i></a>
                                    @endif
                                </p>
                            </div>
                        </th>
                        <th scope="col">Trạng thái thanh toán</th>
                        <th scope="col">Trạng thái Giao</th>
                        <th scope="col">Hành động</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $item)
                        <tr style="vertical-align: middle;">
                            <th scope="col">
                                <input class="form-check-input" name="input_item" type="checkbox" value="<?= $order_id ?>">
                            <th>

                            <td scope="row">{{ $item['id'] }}</td>

                            <td>
                                <div class="d-flex flex-column">
                                    <span>{{ $item['shipping_name'] ?: $item['user_name'] }}</span>
                                    <span>{{ $item['shipping_email'] ?: $item['user_email'] }}</span>
                                    <span>{{ $item['shipping_phone'] ?: $item['user_phone'] }}</span>
                                    <span>{{ $item['shipping_address'] ?: $item['user_address'] }}</span>
                                </div>
                            </td>

                            <td>{{ date('d/m/Y H:i:s', strtotime($item['created_at'])) }}</td>

                            <td>
                                <p class="{{ $item['status_payment'] === 0 ? 'text-danger' : 'text-success' }} mb-0"
                                    style="font-weight: 700">
                                    {{ $item['status_payment'] === 0 ? 'Chưa thanh toán' : 'Đã thanh toán' }}</p>
                            </td>

                            <td>
                                <div class="btn-group" role="group">

                                    <button id="btnGroupDrop1" type="button"
                                        class="btn {{ $item['status_delivery'] == 0 ? 'btn-secondary' : ($item['status_delivery'] == 3 ? 'btn-success' : ($item['status_delivery'] == 5 || $item['status_delivery'] == 4 ? 'btn-danger' : 'btn-primary')) }} dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ $item['status_delivery'] == 0 ? 'Chờ xác nhận' : ($item['status_delivery'] == 1 ? 'Chờ lấy hàng' : ($item['status_delivery'] == 2 ? 'Chờ giao hàng' : ($item['status_delivery'] == 3 ? 'Đã giao hàng' : ($item['status_delivery'] == 4 ? 'Đã hủy' : 'Trả hàng')))) }}

                                    </button>

                                    <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                        <li><a class="dropdown-item"
                                                href="{{ url('admin/orders/' . $item['id'] . '/update?status_delivery=0') }}">Chờ
                                                xác nhận</a></li>
                                        <li><a class="dropdown-item"
                                                href="{{ url('admin/orders/' . $item['id'] . '/update?status_delivery=1') }}">Chờ
                                                lấy hàng</a></li>
                                        <li><a class="dropdown-item"
                                                href="{{ url('admin/orders/' . $item['id'] . '/update?status_delivery=2') }}">Chờ
                                                giao hàng</a></li>
                                        <li><a class="dropdown-item"
                                                href="{{ url('admin/orders/' . $item['id'] . '/update?status_delivery=3') }}">Đã
                                                giao hàng</a></li>
                                        <li><a class="dropdown-item"
                                                href="{{ url('admin/orders/' . $item['id'] . '/update?status_delivery=4') }}">Đã
                                                hủy</a></li>
                                        <li><a class="dropdown-item"
                                                href="{{ url('admin/orders/' . $item['id'] . '/update?status_delivery=5') }}">Trả
                                                hàng</a></li>
                                    </ul>

                                </div>
                            </td>

                            </td>
                            <td>
                                <a class="btn btn-warning text-white"
                                    onclick="return confirm('Cảnh báo: Xóa dữ liệu này sẽ làm ảnh hưởng đến các số liệu thống kê. Bạn có chắc chắn muốn tiếp tục?')"
                                    href="{{ url('admin/orders/' . $item['id']) . '/delete' }}">Xóa</a>
                                <a class="btn btn-info text-white"
                                    href="{{ url('admin/orders/' . $item['id']) . '/show' }}">Xem</a>
                            </td>
                        </tr>
                    @endforeach


                </tbody>

            </table>
            <div class="d-flex justify-content-between">
                <div>
                    <form action="{{ url('admin/orders') }}" method="get">
                        <select class="form-select" name="perPage" onchange="this.form.submit()">
                            <option value="5" {{ $perPage == 5 ? 'selected' : '' }}>5</option>
                            <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>
                            <option value="15" {{ $perPage == 15 ? 'selected' : '' }}>15</option>
                        </select>
                    </form>
                </div>


                @if ($totalPage > 1)
                    <div class="d-flex justify-content-end">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                @if ($page > 1)
                                    <li class="page-item">
                                        <a class="page-link linkm"
                                            href="{{ url('admin/orders') }}?page={{ $page - 1 }}">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                @endif

                                @for ($i = 1; $i <= $totalPage; $i++)
                                    <li class="page-item"><a class="page-link linkm"
                                            href="{{ url('admin/orders') }}?page={{ $i }}"><?= $i ?></a>
                                    </li>
                                @endfor

                                @if ($page < $totalPage)
                                    <li class="page-item">
                                        <a class="page-link linkm"
                                            href="{{ url('admin/orders') }}?page={{ $page + 1 }}">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                @endif
            </div>

        </div>

    </div>
@endsection
