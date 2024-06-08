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
                       
                        <div class="box_img_imgs" 
                         >
                            <img class="card-img-top" 
                            
                            style=
                            "";
                            height="200px";
                            object-fit:cover;
                            ;   
                             src="{{ asset($productInfor['img_thumbnail']) }}" alt="Card image">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h1 class="name_product">{{$productInfor['name']}}</h1>
                        <div class="d-flex align-items-center">
                            <div id='rating3' class='px-0 pe-2'></div>
                            <p class='danhgia'>20 Đánh giá</p>
                            <p class='daban'>10 Đã bán</p>
                        </div>

                        <div class="box_price my-3 d-flex align-items-center">

                            <p class="price_product">{{$productInfor['price_regular']}}</p>

                        </div>


                        <p class="mn">Số lượng:</p>
                        <form action="{{ url('cart/add') }}" method="get">
                            <input type="hidden" name="productID" value="{{ $product['id'] }}">
                            <input type="number" min="1" name="quantity" value="1">
                            <div class="mt-4">
                                <button type="submit" class="btn btn-success btn-lg" name="mua_ngay">Mua ngay</button>

                                <button type="submit" class="btn btn-danger btn-lg" name="add_cart">Thêm vào giỏ
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
                    {{-- <div class="swiper-wrapper" style="max-height: 278px;">
                        @foreach ($productCategory as $item)
                        <div class="swiper-slide">
                            <a href="{{ url('products/' . $item['id']) }}"
                                class="box_sp d-flex flex-column">
                                <div class="box_img_sp d-flex justify-content-center">
                                    <img src="{{ asset($item['img_thumbnail']) }}" alt="">
                                </div>
                                <h1 class="title">{{$item['name']}}</h1>
                                <span>{{ number_format($item['price_regular'], 0, '', '.') }} VNĐ</span>
                            </a>
                           
                            
                        </div>
                        @endforeach

                    </div> --}}
                    <div class="swiper-button-next arrow arrow-left"></div>
                    <div class="swiper-button-prev arrow arrow-left"></div>
                </div>
            </div>
        </div>

        <div class="box_content pb-3">
            <div class="mgbg p-3">
                <p class="tii">CHI TIẾT SẢN PHẨM</p>
                <div class="box_infor_ct d-flex flex-column gap-3">
                    <p class="d-flex"><span class="mjh">Danh muc:</span><span class="okl">{{$productInfor['c_name']}}</span>
                    </p>
                    <p class="d-flex"><span class="mjh">Ngày sản xuất:</span><span
                            class="okl">{{$productInfor['created_at']}}</span></p>
                    </p>
                </div>
                <p class="tii">MÔ TẢ SẢN PHẨM</p>
                <div class="box_infor_mt mb-2">
                    <p>{{$productInfor['content']}}</p>
                </div>
            </div>
        </div>

    </div>
    <script>

        </script>
    </script>
   

@endsection
