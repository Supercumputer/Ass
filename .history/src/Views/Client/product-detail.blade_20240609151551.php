@extends('layouts.master')

@section('title')
    Product detail
@endsection

@section('content')
    <div class="bbg-gr">
        <div class="box_content py-3">
            <div class="mgbg">
                <div class="row padi">
                    <div class="col-lg-6 ">

                        <div class="box_img_imgs">
                            <img class="card-img-top" style=
                            ""; height="200px"; object-fit:cover;
                                ; src="{{ asset($productInfor['img_thumbnail']) }}" alt="Card image">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h1 class="name_product">{{ $productInfor['name'] }}</h1>
                        <div class="d-flex align-items-center">
                            <div id='rating3' class='px-0 pe-2'></div>
                            <p class='danhgia'>20 Đánh giá</p>
                            <p class='daban'>10 Đã bán</p>
                        </div>

                        <div class="box_price my-3 d-flex align-items-center">

                            @if (isset($productInfor['price_sale']) && $productInfor['price_sale'] > 0)
                                <p class="price_product">{{ $productInfor['price_sale'] }}</p>
                            @else
                                <p class="price_product">{{ $productInfor['price_regular'] }}</p>
                            @endif

                        </div>

                        <p class="mn">Số lượng:</p>

                        <form action="{{ url('cart/add') }}" method="get">
                            <div class=" d-flex">
                                <input type="button" class="decrease" value="-">
                                <input type="text" class="quantity-input text-center" name="quantity" value="1"
                                    min="1" step="1">
                                <input type="button" class="increase" value="+">
                                <input type="hidden" name="productID" value="{{ $productInfor['id'] }}">
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="btn btn-success btn-lg">Mua ngay</button>

                                <button type="submit" class="btn btn-danger btn-lg">Thêm vào giỏ
                                    hàng</button>
                            </div>
                        </form>

                    </div>

                </div>
            </div>

        </div>

        <div class="box_content mb-3">
            <div class="slider_container">

                <div class="swiper card_slider">
                    <div class="swiper-wrapper">
    
                        @foreach ($productCategory as $category)
                            <div class="swiper-slide">
                                <a href="">
                                    <div class="img_box">
                                        <img src="{{ asset($category['image']) }}" alt="">
                                    </div>
                                    <div class="tieudeanh">
                                        <h5 class="tieudend">{{ $category['name'] }}</h5>
                                    </div>
                                </a>
                            </div>
                        @endforeach
    
    
    
                    </div>
                    <div class="swiper-button-next arrow arrow-left"></div>
                    <div class="swiper-button-prev arrow arrow-left"></div>
                </div>
    
            </div>
        </div>

        <div class="box_content pb-3">
            <div class="mgbg p-3">
                <p class="tii">CHI TIẾT SẢN PHẨM</p>
                <div class="box_infor_ct d-flex flex-column gap-3">
                    <p class="d-flex"><span class="mjh">Danh muc:</span><span
                            class="okl">{{ $productInfor['c_name'] }}</span>
                    </p>
                    <p class="d-flex"><span class="mjh">Ngày sản xuất:</span><span
                            class="okl">{{ $productInfor['created_at'] }}</span></p>
                    </p>
                </div>
                <p class="tii">MÔ TẢ SẢN PHẨM</p>
                <div class="box_infor_mt mb-2">
                    <p>{{ $productInfor['content'] }}</p>
                </div>
            </div>
        </div>

    </div>
    
@endsection
