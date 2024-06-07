<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @include('layouts.partials.head')

    <title>Tân Việt</title>
</head>

<body>
    @include('layouts.partials.header')

    <main>
        @yield('content')

        <div class="box_mail_form">
            <div class="box_content_db">
                <div class="d-flex flex-md-row flex-column box_cc align-items-md-center justify-content-between gap-3">
                    <div class="km_text col-md-4 col-12">
                        <p>Đăng ký nhận tin khuyến mãi</p>
                        <span>Đăng ký nhận tin khuyến mãi
                            Dành cho khách hàng mới, đăng ký để nhận ưu đãi sớm nhất!</span>
                    </div>
                    <div class="gif_text d-flex align-items-center gap-2">
                        <i class="fa-solid fa-gift"></i>
                        <p>ĐĂNG KÝ NHẬN VOUCHER</p>
                    </div>
                    <div class="d-flex align-items-center col-md-5 col-12 gap-2">
                        <input type="text" placeholder="Nhập email của bạn tại đây ...">
                        <button type="button" class="btn btn-danger">Đăng kí ngay</button>
                    </div>

                </div>
            </div>


        </div>
    </main>
    @include('layouts.partials.drawer')

    @include('layouts.partials.footer')

</body>

<script>
    function showToast(message) {
        var liveToast = new bootstrap.Toast(document.getElementById('liveToast'));
        document.getElementById('toast-body-content').innerHTML = message;
        liveToast.show();
    }

    var swiper = new Swiper(".card_slider", {
        slidesPerView: 3,
        spaceBetween: 20,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            320: {
                slidesPerView: 1,

            },
            480: {
                slidesPerView: 2,
            },
            768: {
                slidesPerView: 3,

            },
            1200: {
                slidesPerView: 4,

            },
        },
    });

    //   feedback
    var swiper = new Swiper(".card_slider_feeback", {
        slidesPerView: 3,
        spaceBetween: 10,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            320: {
                slidesPerView: 1,

            },
            480: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 2,

            },
            1200: {
                slidesPerView: 2,

            },
        },
    });
</script>
