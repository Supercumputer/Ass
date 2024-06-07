@extends('layouts.master')

@section('title')
    Danh muc
@endsection

@section('content')

<div class="box_tite mb-3">Quản lý danh mục</div>

<div class="box_table my-3">
    <h2 class="py-2 mx-3">Tạo mới danh mục</h2>
    
    @if (!empty($_SESSION['$errors']))
    <div class="alert alert-warning">
        <ul>
            @foreach ( $_SESSION['$errors'] as $error )
            <li> {{ $error}}</li>
            @endforeach
        </ul>
        @php
        unset( $_SESSION['$errors']);
        
        @endphp
    </div>
    @endif

    <div class="box_wap mx-3 py-3">
        <form action="{{ url('admin/categorys/store') }}"  method="POST" id="form" class="row g-3" enctype="multipart/form-data">
            <div class="col-md-4">
                <label for="inputEmail4" class="form-label">Tên danh mục</label>
                <input type="text" class="form-control" id="inputEmail4" name="name">
            </div>
            <div class="col-md-4">
                <label for="formFile" class="form-label">Hình ảnh</label>
                <input class="form-control" type="file" name="avata_cate">
            </div>
         
            <div class="box_btn">
                <button type="submit" class="btn btn-primary">Tạo mới</button>
                <button type="reset" class="btn btn-secondary">Nhập lại</button>
                <button type="button" class="btn btn-success"><a href="index.php">Danh sách</a></button>
            </div>
        </form>

    </div>

</div>

@endsection