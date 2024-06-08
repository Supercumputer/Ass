@extends('layouts.master')

@section('title')
Danh muc
@endsection

@section('content')
<div class="box_tite mb-3">Quản lý danh mục</div>

<div class="box_table my-3">
    <h2 class="py-2 mx-3">Cập nhật danh mục</h2>
    @if (!empty($_SESSION['errors']))
        <div class="alert alert-warning">
            <ul>
                @foreach ($_SESSION['errors'] as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

            @php
                unset($_SESSION['errors']);
            @endphp
        </div>
    @endif

    @if (isset($_SESSION['status']) && $_SESSION['status'])
        <div class="alert alert-success">
            {{ $_SESSION['msg'] }}
        </div>

        @php
            unset($_SESSION['status']);
            unset($_SESSION['msg']);
        @endphp
    @endif

    <div class="box_wap mx-3 py-3">
        <form action="{{ url("admin/categorys/{$category['id']}/update") }}" method="POST" id="form" class="row g-3"
            enctype="multipart/form-data">
            <div class="col-md-4">
                <label for="inputEmail4" class="form-label">Tên danh mục</label>
                <input type="text" class="form-control" id="inputEmail4" name="name"
                value="{{ $category['name'] }}" >
            </div>
            <div class="col-md-4">
                <label for="formFile" class="form-label">Hình ảnh</label>
                <input type="file" class="form-control" id="avatar" placeholder="Enter avatar" name="image">
                <img src="{{ asset($category['image']) }}" alt="" width="100px">
            </div>
            <div class="box_btn">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
                <button type="reset" class="btn btn-secondary">Nhập lại</button>
                <button type="button" class="btn btn-success"><a href="{{ url('admin/categorys') }}">Danh sách</a></button>
            </div>
        </form>

    </div>

</div>

@endsection