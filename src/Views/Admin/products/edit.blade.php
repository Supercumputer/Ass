@extends('layouts.master')

@section('title')
    Cập nhật Người dùng: {{ $product['name'] }}
@endsection

@section('content')


<div class="box_tite mb-3">Quản lý sản phẩm</div>

<div class="box_table my-3">
    <h2 class="py-2 mx-3">Tạo mới sản phẩm</h2>
        <div class="box_wap mx-3 ">
            @if (!empty($_SESSION['errors']))
<div class="alert alert-warning">
    <ul style="list-style: none; padding: 0;">
        @foreach ($_SESSION['errors'] as $error)
            <li >{{ $error }}</li>
        @endforeach
    </ul>
</div>
@php
    unset($_SESSION['errors']);
@endphp
@endif

@if (isset($_SESSION['status']) && $_SESSION['status'])
<div class="alert alert-success">{{ $_SESSION['msg'] }}</div>

@php
    unset($_SESSION['status']);
    unset($_SESSION['msg']);
@endphp
@endif
        </div>
    <div class="box_wap mx-3 py-3">
        <form action="{{url("admin/products/{$product['id']}/update") }}" enctype="multipart/form-data" method="POST">
            <div class="row">
                <div class="col-l-12">
                    <div class="row">
                        <div class=" col-md-6 mb-3 mt-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter name"
                                value="{{ $product['name'] }}" name="name">
                        </div>
                        <div class="col-md-6 mb-3 mt-3">
                        <label for="category_id" class="form-label">Category:</label>

                        <select name="category_id" id="category_id" class="form-select">
                            @foreach ($categoryPluck as $id => $name)
                                <option @if ($product['category_id'] == $id) selected @endif value="{{ $id }}">
                                    {{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                    </div>
                    
                        <div class="col-l-12">
                            <div class="row">
                        <div class="col-md-6">
                        <div class="mb-3 mt-3">
                            <label for="name" class="form-label">Price regular:</label>
                            <input type="number" class="form-control" value="{{ $product['price_regular'] }}" placeholder="Enter price regular"
                                name="price_regular">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 mt-3">
                            <label for="name" class="form-label">Price Sale:</label>
                            <input type="number" class="form-control" id="price_sale" value="{{ $product['price_sale'] }}" placeholder="Enter price sale"
                                name="price_sale">
                        </div>
                    </div>
                </div>
                </div>
                    
                   
                    <div class="mb-3 mt-3">
                        <label for="img_thumbnail" class="form-label">Img Thumbnail:</label>
                        <input type="file" class="form-control" id="img_thumbnail" placeholder="Enter img_thumbnail"
                            name="img_thumbnail">
                        <img src="{{asset($product['img_thumbnail']) }}" width="100px" alt="">
                    </div>
                </div>
                </div>
                    
                <div class="col-md-12">
                    <div class="mb-3 mt-3">
                        <label for="overview" class="form-label">Overview:</label>
                        <textarea class="form-control" id="overview" placeholder="Enter overview" name="overview">{{ $product['overview'] }}</textarea>
                    </div>

                    <div class="mb-3 mt-3">
                        <label for="content" class="form-label">Content:</label>
                        <textarea class="form-control" id="content" rows="4" placeholder="Enter content" name="content">{{ $product['content'] }}</textarea>
                    </div>
                </div>
            </div>

            <div class="box_btn">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Nhập lại</button>
                <button type="button" class="btn btn-success"><a href="{{url('admin/products/')}}">Danh sách</a></button>
            </div>
        </form>

    </div>

</div>

<script>

</script>

@endsection