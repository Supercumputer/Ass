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

        @include('layouts.partials.mailForm')
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
