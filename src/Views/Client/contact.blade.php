@extends('layouts.master')

@section('title')
    Contact
@endsection

@section('content')
    <div class="box_content py-2">
        <div class="row">
            <div class="col-xl-6">
                <h4>Liên hệ với chúng tôi</h4>
                <p class="gt_text">Trụ sở chính: 180 – 182 Lý Chính Thắng, Phường 9, Quận 3, TP Hồ Chí Minh
                    Chi nhánh: Tầng 4, số 01 ngõ 120 Trường Chinh, Thanh Xuân , Hà Nội</p>
                <p class="gt_text">Hotline: (024) 9865 7868 &&
                    (028) 9885 6845</p>
                <p class="gt_text">Email: vothuat@gmail.com &&
                    vothuatdemo@gmail.com</p><br>
            </div>
            <div class="col-xl-6 gap-2">
                <form action="index.php?lien_he" method="post" id="form">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="full_name" placeholder="Họ và tên...">
                    </div>

                    <div class="mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Email liên hệ...">
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control" name="phone" placeholder="Số điện thoại...">
                    </div>

                    <div class="mb-3">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Nội dung liên hệ..."
                            name="message"></textarea>
                    </div>

                    <button type="submit" class="btn btn-danger mb-2">Gửi liên hệ</button>
                </form>
            </div>

        </div>
    </div>
@endsection
