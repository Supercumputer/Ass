@extends('layouts.master')

@section('title')
    Xem chi tiết: {{ $product['name'] }}
@endsection

@section('content')
    <div class="box_tite mb-3">Quản lý sản phẩm</div>

    <div class="box_table my-3">

        <div class="box_wap_user mx-3 py-3">
            <div class="row">
                <div class="col-12">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>TRƯỜNG</th>
                                <th>GIÁ TRỊ</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($product as $key => $value)
                                <tr>
                                    <td>{{ $key }}</td>
                                    <td>
                                        @if ( $key== 'img_thumbnail')
                                            <img src="{{ asset($value) }}" alt="Avatar"
                                                style="max-width: 100px; max-height: 100px;
                                                object-fit:cover">
                                        @else
                                            {{ $value }}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
