<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"
        type="text/javascript"></script>

    <!-- Latest compiled and minified CSS -->
    
    <link rel="stylesheet" href="{{ asset('assets/client/css/index.css')}}">
</head>

<body>

    <div class="box_contens d-flex justify-content-center align-items-center">

        @if (!empty($_SESSION['error']))
            <div class="alert alert-warning mt-3 mb-3">
                {{ $_SESSION['error'] }}
            </div>

            @php
                unset($_SESSION['error']);
            @endphp
        @endif

        <div class="box_conten_lg d-flex col-xl-7 col-lg-9 col-md-10 col-11 align-items-center">
            <div class="box_imgm col-5 d-none d-sm-block"><img
                    src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/db/Vovinam_demonstration_Master_de_fleuret_2014_t223131.jpg/220px-Vovinam_demonstration_Master_de_fleuret_2014_t223131.jpg"
                    alt=""></div>
            <div class="box_form col-sm-7 col-12">
                <h1 style="padding-bottom: 10px;">Welcome to Tan Viet</h1>
                <p style="padding-bottom: 10px;"><a href="<?= $SITE_URL ?>/trang_chinh/index.php"><img width="300px"
                            src="<?= $CONTENT ?>/image/logo.png" alt=""></a></p>

                <p class="name_ac mb-3">ĐĂNG NHẬP</p>
                <form class="row g-3" action="{{ url('handle-login') }}" method="post" id="form">
                    <div class="col-md-12">
                        <input type="email" class="form-control" id="email" placeholder="Enter email"
                            name="email">
                    </div>
                    <div class="col-md-12">
                        <input type="password" class="form-control" id="pwd" placeholder="Enter password"
                            name="password">
                    </div>
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-danger col-4">Đăng nhập</button>
                    </div>
                    <div class="nut_chuyen d-flex justify-content-center gap-2">
                        <a href="index.php?register">Đăng ký?</a>
                        <a href="index.php?forget_pass_word">Quên mật khẩu?</a>
                    </div>
                </form>

            </div>
        </div>
    </div>

</body>

</html>



