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
                            <img class="card-img-top" style="
                                max-height: 200px
                                object-fit:cover;
                                "
                            
                             src="{{ asset($product['img_thumbnail']) }}" alt="Card image">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h1 class="name_product">{{$product['name']}}</h1>
                        <div class="d-flex align-items-center">
                            <div id='rating3' class='px-0 pe-2'></div>
                            <p class='danhgia'>20 Đánh giá</p>
                            <p class='daban'>10 Đã bán</p>
                        </div>

                        <div class="box_price my-3 d-flex align-items-center">

                            <p class="price_product">{{$product['price_regular']}}</p>

                        </div>


                        <p class="mn">Số lượng:</p>
                        <form action="{{ url('cart/add') }}" method="post">
                            <div class=" d-flex">
                                <input type="button" class="decrease" value="-">
                                <input type="text" class="quantity-input text-center" name="quantity" value="1"
                                    min="1" step="1">
                                <input type="button" class="increase" value="+">
                                <input type="hidden" name="variant_id" value="">
                                <input type="hidden" name="image" value="">
                                <input type="hidden" name="product_name" value="">

                                <input type="hidden" name="size_id" value="">
                                <input type="hidden" name="color_id" value="">

                            </div>

                            <div class="mt-4">
                                <button type="button" class="btn btn-success btn-lg" name="mua_ngay">Mua ngay</button>

                                <button type="button" class="btn btn-danger btn-lg" name="add_cart">Thêm vào giỏ
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
                    <div class="swiper-wrapper" style="max-height: 278px;">

                        <div class="swiper-slide">
                            <a href="index.php?san_pham_chi_tiet=<?= $list['product_id'] ?>"
                                class="box_sp d-flex flex-column">
                                <div class="box_img_sp d-flex justify-content-center">
                                    <img src="{{ asset('assets/client/img/slider_1.jpg') }}" alt="">
                                </div>
                                <h1 class="title"><?= $list['product_name'] ?></h1>
                                <span><?= number_format(1, 0, '', '.') ?> VNĐ</span>
                            </a>
                        </div>

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
                    <p class="d-flex"><span class="mjh">Danh muc:</span><span class="okl">{{$product['c_name']}}</span>
                    </p>
                    <p class="d-flex"><span class="mjh">Ngày sản xuất:</span><span
                            class="okl">{{$product['c_name']}}</span></p>
                    <p class="d-flex"><span class="mjh">Nhãn hàng:</span><span class="okl"><?= $brand_name ?></span>
                    </p>
                    <p class="d-flex"><span class="mjh">Kho hàng:</span><span class="okl">Dụng Cụ Võ Thuật Giá Sỉ
                            HCM</span></p>
                    <p class="d-flex"><span class="mjh">Gửi từ</span><span class="okl">TP. Hồ Chí Minh</span></p>
                </div>
                <p class="tii">MÔ TẢ SẢN PHẨM</p>
                <div class="box_infor_mt mb-2">
                    <p><?= $description ?></p>
                </div>
            </div>
        </div>

        <div class="box_content pb-3">
            <div class="mgbg p-3">
                <p class="tii mb-3">ĐÁNH GIÁ SẢN PHẨM</p>
                <!--  -->
                <div class="box_ratings d-flex gap-5 align-items-center mb-3">
                    <div class="box_start d-flex flex-column justify-content-center align-items-center">
                        <p class="start_up_count"><?= $result_start ?> / 5 Sao</p>
                        <div id='rating2' class='px-0 mb-3'></div>
                    </div>
                    <div class="box_start_btn">

                        <div class="box_color">
                            <a href="index.php?san_pham_chi_tiet=<?= $product_id ?>&start=all">
                                <p class="">Tất cả
                                </p>
                            </a>
                        </div>

                        <div class="box_color">
                            <a href="index.php?san_pham_chi_tiet=<?= $product_id ?>&start=5">
                                <p class="">5 sao</p>
                            </a>
                        </div>

                        <div class="box_color">
                            <a href="index.php?san_pham_chi_tiet=<?= $product_id ?>&start=4">
                                <p class="">4 sao</p>
                            </a>
                        </div>

                        <div class="box_color">
                            <a href="index.php?san_pham_chi_tiet=<?= $product_id ?>&start=3">
                                <p class="">3 sao</p>
                            </a>
                        </div>

                        <div class="box_color">
                            <a href="index.php?san_pham_chi_tiet=<?= $product_id ?>&start=2">
                                <p class="">2 sao</p>
                            </a>
                        </div>

                        <div class="box_color">
                            <a href="index.php?san_pham_chi_tiet=<?= $product_id ?>&start=1">
                                <p class="">1 sao</p>
                            </a>
                        </div>

                    </div>
                </div>
                <!--  -->
                <div class="bbox_comment">
                    <div class="bbox_comment">



                        <div class="d-flex gap-3 mb-2">
                            <div class="box_inf_ava"><img src="<?= $UPLOAD_URL . '/' . $lt_bl['avatar'] ?>"
                                    alt=""></div>
                            <div class="d-flex flex-column gap-2">
                                <div>
                                    <p class="loi"><?= $lt_bl['user_name'] ?></p>

                                    <p class="tl"><?= $lt_bl['created_at'] ?></p>
                                </div>

                                <span class="text-justify"><?= $lt_bl['content'] ?></span>
                            </div>
                        </div>


                        <div class="d-flex justify-content-center">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">

                                    <li class="page-item">
                                        <a class="page-link linkm" href="index.php?san_pham_chi_tiet=">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>



                                    <li class="page-item"><a class="page-link linkm"
                                            href="index.php?san_pham_chi_tiet="><?= $i ?></a>
                                    </li>



                                    <li class="page-item">
                                        <a class="page-link linkm" href="index.php?san_pham_chi_tiet=">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>

                                </ul>
                            </nav>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
