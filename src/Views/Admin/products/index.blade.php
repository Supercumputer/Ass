 @extends('layouts.master')

 @section('title')
     Quản lý Sản phẩm
 @endsection

 @section('content')
     <div class="box_tite mb-3">Quản lý sản phẩm</div>

     <div class="box_table my-3">
         <div class="box_btns py-2 mx-3 d-flex justify-content-between align-items-center">
             <div class="box_btn">
                 <button type="button" class="btn btn-primary"><a href="{{ url('admin/products/create') }}">Tạo
                         mới</a></button>
                 <button type="button" class="btn btn-secondary select-all">Chọn tất cả</button>
                 <button type="button" class="btn btn-success deselect-all">Bỏ chọn tất cả</button>
                 <button type="button" class="btn btn-danger delete-selected"><a class="url_all_delete"
                         onclick="return confirm('Bạn có muốn xóa không.')">Xóa mục đã chọn</a></button>
                 <button type="button" class="btn btn-primary"><a href="index.php?list_trash"><i
                             class="fa-solid fa-trash-can"></i> Thùng rác</a></button>
             </div>

             <form action="index.php" method="GET" class="mb-0">
                 <input type="text" name="key" placeholder="Search here ...">
             </form>
         </div>

         <div class="box_wap mx-3 pt-2 pb-1">
             <table class="table table-striped">
                 <thead>
                     <tr>
                         <th scope="col">
                             <input class="form-check-input" name="input_all" type="checkbox" value="">
                         <th>
                         <th>ID</th>
                         <th>IMG THUMBNAIL</th>
                         <th>NAME</th>
                         <th>Category Name</th>
                         <th>PRICE_REGULAR</th>
                         <th>PRICE_SALE</th>
                         <th>CREATED AT</th>
                         <th>ACTION</th>
                     </tr>
                 </thead>
                 <tbody>

                     @foreach ($products as $product)
                         <tr style="vertical-align: middle;">
                             <th scope="col">
                                 <input class="form-check-input" name="input_item" type="checkbox"
                                     value="<?= $product_id ?>" data_id="<?= $product_id ?>" data_name="sp">
                             <th>
                             <td>{{ $product['id'] }}</td>
                             <td>
                                 <img src="{{ asset($product['img_thumbnail']) }}" width="100" height="100" style=" object-fit:cover";
                                     alt="">
                             </td>
                             <td>{{ $product['name'] }}</td>
                             <td>{{ $product['c_name'] }}</td>
                             <td>{{ number_format($product['price_regular'], 0, '.', '.') }}đ</td>
                             <td>
                                 @if (isset($product['price_sale']))
                                     {{ number_format($product['price_sale'], 0, '.', '.') }}đ
                                 @else
                                     null
                                 @endif
                             </td>
                             <td>{{ date('d/m/Y H:i:s', strtotime($product['created_at'])) }}</td>
                             <td>
                                 <a href="{{ url("admin/products/{$product['id']}/show") }}" class="btn btn-info">Xem</a>
                                 <a href="{{ url("admin/products/{$product['id']}/edit") }}"
                                     class="btn btn-warning">Sửa</a>
                                 <a href="{{ url("admin/products/{$product['id']}/delete") }}"
                                     onclick="return confirm('Chắc chắn xóa không?');" class="btn btn-danger">Xóa</a>
                             </td>
                         </tr>
                     @endforeach

                 </tbody>
             </table>

         </div>
     </div>
 @endsection
