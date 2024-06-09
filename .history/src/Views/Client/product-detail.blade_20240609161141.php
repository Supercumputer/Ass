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

                            {{-- @if (isset($productInfor['price_sale']) && $productInfor['price_sale'] > 0)
                                 
                            @else
                            <span><?= number_format($productInfor['price_regular'], 0, "", ".") ?> VNĐ</span>
                            @endif --}}



                            <div class="box_price my-3 d-flex align-items-center">
                                <?php
                                    $sale_price = $infor_varian['price'] - ($infor_varian['price'] * ($infor_varian['discount'] / 100));
                                    if($infor_varian['discount'] > 0){
                                        echo '<p class="t_price">đ'.number_format($infor_varian['price'], 0, "", ".").'</p> - <p class="t_discount mx-1">₫'.number_format($sale_price, 0, "", ".").'</p>';
                                    }else{
                                        echo '<p class="t_discount">₫'.number_format($infor_varian['price'], 0, "", ".").'</p>';
                                    }
                                ?>
        
                            </div>

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
                                <div href="{{ url('products/' . $category['id']) }}" class="box_sp d-flex flex-column">
                                    <a href="{{ url('products/' . $category['id']) }}"
                                        class="box_img_sp d-flex justify-content-center">
                                        <img src="{{ asset($category['img_thumbnail']) }}" alt="">
                                    </a>
                                    <h1 class="title">{{ $category['name'] }}</h1>
                                    <span>{{ number_format($category['price_regular'], 0, '', '.') }} VNĐ</span>
                                    <a href="{{ url('cart/add') }}?quantity=1&productID={{ $category['id'] }}"
                                        class="btn btn-danger mx-2 mb-2">Thêm vào giỏ hàng
                                    </a>
                                </div>
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
