@extends('layouts.master')

@section('title')
    Thêm mới người dùng
@endsection

@section('content')

    
<div class="box_tite mb-3">Quản lý tài khoản</div>

<div class="box_table my-3">
    <h2 class="py-2 mx-3">Tạo mới tài khoản</h2>

    @if (!empty($_SESSION['errors']))
            <div class="alert alert-warning">
                <ul>
                    @foreach ($_SESSION['errors'] as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

                @php
                    unset($_SESSION['errors']);
                @endphp
            </div>
        @endif

    <div class="box_wap mx-3 py-3">
        <form action="{{ url('admin/users/store') }}" enctype="multipart/form-data" method="POST" class="row g-3"> 
            <div class="col-md-8">
                <label for="inputEmail4" class="form-label">Name:</label>
                <input type="text" class="form-control" placeholder="Enter name" name="name">
            </div>
            <div class="col-md-8">
                <label for="inputPassword4" class="form-label">Địa chỉ email</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
            </div>

            <div class="col-md-8">
                <label for="formFile" class="form-label">Hình ảnh</label>
                <input type="file" class="form-control" id="avatar" placeholder="Enter avatar" name="avatar">
            </div>

            <div class="col-md-8">
                <label for="inputZip" class="form-label">Mật khẩu</label>
                <input type="text" class="form-control" id="password" placeholder="Enter password" name="password">
            </div>
            <div class="col-md-8">
                <label for="inputZip" class="form-label">Xác nhận mật khẩu</label>
                <input type="text" class="form-control" id="confirm_password" placeholder="Enter confirm_password"
                name="confirm_password">
            </div>
            <div class="col-md-8">
                <label class="form-label">Type:</label>

                <input type="radio" class="form-radio" id="type_admin" value="admin" name="type">
                <label for="type_admin" class="form-label">Admin</label>

                <input type="radio" class="form-radio" id="type_member" value="member" checked name="type">
                <label for="type_member" class="form-label">Member</label>
            </div>


            <div class="box_btn">
                <button type="submit" class="btn btn-primary">Tạo mới</button>
                <button type="reset" class="btn btn-secondary">Nhập lại</button>
                <button type="button" class="btn btn-success"><a href="{{ url('admin/users') }}">Danh sách</a></button>
            </div>
        </form>

    </div>

</div>
{{-- <script>
$().ready(function() {
	$("#form").validate({
		onfocusout: false,
		onkeyup: false,
		onclick: false,
		rules: {
			"user_name": {
				required: true,
				maxlength: 50,
			},
            "full_name": {
				required: true,
				maxlength: 50
			},
            "email": {
				required: true,
				email: true
			},
            "pass_word": {
				required: true,
				minlength: 8
			},
            "pass_word_check": {
                equalTo: "#pass_word",
				minlength: 8
			},
            "avatar": {
				required: true,
			},
            "phone": {
				required: true,
				maxlength: 15
			},
            "role": {
				required: true,
			},
            "address": {
				required: true,
			},
            
		},
        messages: {
			"user_name": {
				required: "Bạn chưa nhập user_name",
				maxlength: "Hãy nhập tối đa 50 ký tự",
			},
            "full_name": {
				required: "Bạn chưa nhập họ và tên",
				maxlength: "Hãy nhập tối đa 50 ký tự"
			},
            "email": {
                required: "Bạn chưa nhập email.",
                email: "Phải nhập đúng định dạng email."
            },
            "avatar": {
                required: "Bạn chưa chon hình ảnh.",
            },
            "phone": {
                required: "Vui lòng nhập số điện thoại",
                maxlength: "Số điện thoại không được vượt quá 15 ký tự"
            },
            "role": {
                required: "Bạn chưa chọn quyền cho tài khoản",
            },
            "address": {
                required: "Bạn chưa nhập địa chỉ",
            },
            "avatar": {
                required: "Bạn chưa chọn hình ảnh",
            },
            "pass_word": {
                required: "Bạn chưa nhập mật khẩu",
                maxlength: "Hãy nhập ít nhất 8 ký tự"
            },
            "pass_word_check": {
                equalTo: "Hai password phải giống nhau",
				minlength: "Hãy nhập ít nhất 8 ký tự"
            }
		}
	});
});


</script> --}}


@endsection
