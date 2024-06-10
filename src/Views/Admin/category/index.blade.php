@extends('layouts.master')

@section('title')
Danh muc
@endsection

@section('content')
<div class="box_tite mb-3">Quản lý danh mục</div>

<div class="box_table my-3">
    <div class="box_btns py-2 mx-3 d-flex justify-content-between align-items-center">
        <div class="box_btn">
            <button type="button" class="btn btn-primary"><a href="{{ url('admin/categories/create') }}">Tạo
                    mới</a></button>
            <button type="button" class="btn btn-secondary select-all">Chọn tất cả</button>
            <button type="button" class="btn btn-success deselect-all">Bỏ chọn tất cả</button>
            <button type="button" class="btn btn-danger delete-selected"><a class="url_all_delete"
                    onclick="return confirm('Bạn có muốn xóa không.')">Xóa mục đã chọn</a></button>
        </div>

        <form action="index.php" method="GET" class="mb-0">
            <input type="text" name="key" placeholder="Search here ...">
        </form>

    </div>

    <div class="box_wap mx-3 py-2">

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col" class="check_column">
                        <input class="form-check-input" name="input_all" type="checkbox" value="">
                    <th>
                    <th scope="col">STT</th>
                    <th scope="col">Ảnh danh mục</th>
                    <th scope="col">Tên danh mục</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($category as $cate)
                    <tr style="vertical-align: middle;">
                        <th scope="col">
                            <input class="form-check-input" name="input_item" type="checkbox">
                        <th>
                        <td scope="row" class="id_column">
                            <?= $cate['id'] ?>
                        </td>
                        <td>
                            <img src="{{ asset($cate['image']) }}" alt="" width="100" height="100" style=" object-fit:cover">
                        </td>

                        <td>
                            <?= $cate['name'] ?>
                        </td>

                        <td>
                            <div class="icon_btn">
                                <a class="btn btn-danger" href="{{ url('admin/categorys/' . $cate['id'] . '/delete') }}"
                                    onclick="return confirm('Chắc chắn xóa không?')">Xóa</a>

                                <a class="btn btn-warning" href="{{ url('admin/categorys/' . $cate['id'] . '/edit') }}">Sửa</a>

                            </div>
                        </td>

                @endforeach 



                </tr>


            </tbody>
        </table>

    </div>

</div>

@endsection