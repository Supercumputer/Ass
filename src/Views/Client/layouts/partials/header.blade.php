<header class="container-fuild">
    <div class="header_top">
        <div class="box_wrap_top d-flex justify-content-md-between justify-content-center">
            <p class="title_header">Chào mừng {{ isset($_SESSION['user']) ? $_SESSION['user']['name'] : 'bạn' }} đến với website shop võ thuật</p>
            <div class="d-md-block d-none">
                <div class="d-flex d-flex align-items-center gap-2">
                    <nav>
                        @if (!isset($_SESSION['user']))
                            <a class="text_link_mm d-flex align-items-center gap-2" href="{{ url('login') }}">
                                <i class="fa-solid fa-user"></i>
                                <span>Log in</span>
                            </a>
                        @endif

                        @if (isset($_SESSION['user']))
                            <a class="text_link_mm d-flex align-items-center gap-2" href="{{ url('logout') }}">
                                <i class="fa-solid fa-user"></i>
                                <span>Log out</span>
                            </a>
                        @endif
                    </nav>

                    <div class="d-flex d-flex align-items-center gap-2">
                        <i class="fa-brands fa-product-hunt"></i>
                        <span>Sản phẩm</span>
                    </div>
                    <div class="d-flex d-flex align-items-center gap-2">
                        <i class="fa-solid fa-location-dot"></i>
                        <span>Hệ thống cửa hàng</span>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="header_center">
        <div class="box_wrap_center d-flex justify-content-between align-items-center">
            <div class="box_icon_menu d-md-none d-block">

                <a class="btn " data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
                    aria-controls="offcanvasExample">
                    <i class="fa-solid fa-bars bars"></i>
                </a>

            </div>
            <a href="{{url('')}}">
                <div class="box_img"><img src="{{ asset('assets/client/img/logo.png') }}" alt=""></div>
            </a>
            <div class="d-none d-md-block">
                <form action="/san_pham/index.php" method="GET" class="box_search d-flex align-items-center">
                    <input type="text" placeholder="Tìm kiếm tại đây ..." name="keyword">
                    <button class="btn_search"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>

            <div class="d-none d-xl-block">
                <div class="box_phone d-flex align-items-center gap-3">
                    <i class="fa-solid fa-phone-volume"></i>
                    <div class="d-flex flex-sm-column">
                        <span class="name_order">Gọi đặt hàng</span>
                        <span class="name_number">033.8973.258</span>
                    </div>
                </div>
            </div>

            <div class="d-none d-xl-block">
                <div class="box_phone d-flex align-items-center gap-3">
                    <i class="fa-solid fa-phone-volume"></i>
                    <div class="d-flex flex-sm-column">
                        <span class="name_order">Gọi tư vấn</span>
                        <span class="name_number">033.8973.258</span>
                    </div>
                </div>
            </div>

            <div class="box_icon_cart d-md-none d-block">
                <a class="ttloo" href="/gio_hang/index.php">
                    <i class="fa-solid fa-cart-shopping"></i>
                </a>
            </div>
        </div>

    </div>

    <div class="header_bottom d-none d-md-block">
        <div class="box_wrap_bottom d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <div class="d-none d-lg-block">
                    <div class="bt_left d-flex align-items-center gap-3">
                        <i class="fa-solid fa-bars"></i>
                        <p>DANH MỤC SẢN PHẨM</p>
                        <div class="box_dm_po">
                            @foreach ($categorys as $category)

                                <a  href="{{ url('products') }}"  class="d-flex align-items-center gap-2">
                                    
                                    <i class="fa-solid fa-angle-right"></i>

                                    <span>{{ $category['name'] }}</span>


                                </a>
                            @endforeach
                        </div>
                    </div>

                </div>

                @include('layouts.partials.menu')

            </div>

            <a class="cart d-flex align-items-center" href="{{ url('cart') }}">
                <span class="d-none d-lg-block">Giỏ hàng</span>
                <i class="fa-solid fa-cart-shopping"></i>
            </a>

        </div>

    </div>
</header>