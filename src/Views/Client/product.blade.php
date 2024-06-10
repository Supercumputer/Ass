@extends('layouts.master')

@section('title')
    Home
@endsection

@section('content')
    <div class="filter">
        <div class="box_content py-3 d-flex align-items-center justify-content-between">
            <div>
                <nav aria-label="breadcrumb" class="d-none d-md-block">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">Trang chủ</li>
                        <li class="breadcrumb-item">Sản phẩm</li>
                        <li class="breadcrumb-item active" aria-current="page">Data</li>
                    </ol>
                </nav>
            </div>

            <div class="col-lg-4 col-md-6 col-10">
                <form action="{{ url('products') }}" method="get" class="d-flex gap-2">

                    <select class="form-select" name="sort_by">
                        <option value="default_sort">Sắp xếp sản phẩm</option>
                        <option value="price_asc">Sắp xếp tăng dần theo giá</option>
                        <option value="price_desc">Sắp xếp giảm dần theo giá</option>
                    </select>
                    <button type="submit" class="btn btn-danger">Sort</button>
                </form>

            </div>
        </div>
    </div>


    <div class="box_content bbg-gr py-3">
        <div class="row">

            <div class="col-xl-3 mb-3 d-none d-xl-block">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                Lọc theo danh mục
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">

                                @foreach ($categorys as $category)
                                    <a href="" style="color: black; display:block;width:100%;padding:10px;">
                                        {{ $category['name'] }}</a>
                                @endforeach


                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                Lọc theo màu sắc
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">

                                <a href="" style="color: black; display:block;width:100%;padding:10px;">
                                    xanh </a>
                                <a href="" style="color: black; display:block;width:100%;padding:10px;">
                                    xanh </a>
                                <a href="" style="color: black; display:block;width:100%;padding:10px;">
                                    xanh </a>

                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseThree" aria-expanded="false"
                                aria-controls="flush-collapseThree">
                                Lọc theo kích thước
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">

                                <a href="" style="color: black; display:block;width:100%;padding:10px;">
                                    xanh </a>
                                <a href="" style="color: black; display:block;width:100%;padding:10px;">
                                    xanh </a>
                                <a href="" style="color: black; display:block;width:100%;padding:10px;">
                                    xanh </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-xl-9 mb-3">
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-3">
                            <div href="{{ url('products/' . $product['id']) }}" class="box_sp d-flex flex-column">
                                <a href="{{ url('products/' . $product['id']) }}"
                                    class="box_img_sp d-flex justify-content-center">
                                    <img src="{{ asset($product['img_thumbnail']) }}" alt="">
                                </a>
                                <h1 class="title">{{ $product['name'] }}</h1>
                                <span>
                                    {{ number_format($product['price_regular'], 0, '', '.') }} VND
                                </span>
                                <a href="{{ url('cart/add') }}?quantity=1&productID={{ $product['id'] }}"
                                    class="btn btn-danger mx-2 mb-2">Thêm vào giỏ hàng</a>

                            </div>
                        </div>
                    @endforeach

                    @if ($totalPage > 1)
                        <div class="d-flex justify-content-center">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    @if ($page > 1)
                                        <li class="page-item">
                                            <a class="page-link linkm"
                                                href="{{ url('products') }}?page={{ $page - 1 }}">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                    @endif

                                    @for ($i = 1; $i <= $totalPage; $i++)
                                        <li class="page-item"><a class="page-link linkm"
                                                href="{{ url('products') }}?page={{ $i }}">
                                                {{ $i }}
                                            </a>
                                        </li>
                                    @endfor

                                    @if ($page < $totalPage)
                                        <li class="page-item">
                                            <a class="page-link linkm"
                                                href="{{ url('products') }}?page={{ $page + 1 }}">
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
