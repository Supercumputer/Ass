@extends('layouts.master')

@section('title')
    Users
@endsection

@section('content')
    <div class="box_tite mb-3">Quản lý tài khoản </div>

    <div class="box_table my-3">
        <div class="box_btns py-2 mx-3 d-flex justify-content-between align-items-center">
            <div class="box_btn">
                <button type="button" class="btn btn-primary"><a href="{{ url('admin/users/create') }}">Tạo mới</a></button>
                <button type="button" class="btn btn-secondary select-all">Chọn tất cả</button>
                <button type="button" class="btn btn-success deselect-all">Bỏ chọn tất cả</button>
                <button type="button" class="btn btn-danger delete-selected"><a class="url_all_delete"
                        onclick="return confirm('Bạn có muốn xóa không.')">Xóa mục đã chọn</a></button>
            </div>

            <form action="index.php" method="GET" class="mb-0">
                <input type="text" name="key" placeholder="Search here ...">
                <input type="hidden" name="role" value="{{ $role ?? $list_user[0]['role'] }}">
            </form>
        </div>

        <div class="box_wap mx-3 py-2">

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Họ và tên</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Email</th>
                        <th scope="col">Loại tài khoản</th>
                        <th scope="col">Ngày tạo</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($users as $user)
                        <tr style="vertical-align: middle;">
                            <td>{{ $user['id'] }}</td>
                            <td>{{ $user['name'] }}</td>
                            <td>
                                <img src="{{ asset($user['avatar']) }}" alt="" width="100" height="100"
                                    style=" object-fit:cover">
                            </td>
                            <td>{{ $user['email'] }}</td>
                            <td>{{ $user['type'] }}</td>
                            <td>{{ $user['created_at'] }}</td>
                            <td>{!! $user['is_active'] == 1
                                ? '<span class="text-success">Đã Kích hoạt</span>'
                                : '<span class="text-danger">Chưa kích hoạt</span>' !!}</td>
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
@endsection
