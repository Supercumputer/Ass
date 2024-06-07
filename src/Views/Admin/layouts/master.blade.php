<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @include('layouts.partials.head')

    <title>@yield('title')</title>
</head>

<body>
    <div class="container-fluid px-0 d-flex">
        <div class="box_left ">
            <div class="box_infor d-flex flex-column align-items-center">
                <a href="<?= $ADMIN_URL ?>/account/index.php?btn_detail">
                    <div class="box_avata mb-2">
                        <img src="https://media.vov.vn/sites/default/files/styles/large/public/2024-01/f-1270-1625534732.jpg"
                            class="avatar" alt="">
                    </div>
                </a>
                <h2 class="user_name">Admin</h2>
                <span>Chào mừng bạn trở lại</span>
            </div>

            <div class="box_menu mt-2 d-flex flex-column align-items-center gap-2">
                <div class="box_item d-flex align-items-center gap-3 bg-warning">
                    <i class="fa-solid fa-user-secret"></i>
                    <span>POS Quản trị</span>
                </div>

                @include('layouts.partials.nav')

            </div>
        </div>

        <div class="box_right">

            <div class="box_right_top d-flex flex-row-reverse"><a href="/trang_chinh/index.php"><i
                        class="fa-solid fa-right-from-bracket"></i></a></div>
            <div class="box_right_content col-12 px-3 mt-3">
                @yield('content')
            </div>


        </div>
    </div>
</body>

</html>
