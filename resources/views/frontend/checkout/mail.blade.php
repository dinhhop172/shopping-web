@extends('layouts.mail')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-body">
                    <h2>Xin chào: {{ $details['name'] }}</h2>
                    <h3>Email: {{ $details['email'] }}</h3>
                    <h3>Địa chỉ của bạn: {{ $details['delivery_address'] }}</h3>
                    <h3>Lưu ý của bạn: {{ $details['note'] }}</h3>
                    <h2>Đơn đặt hàng của bạn: </h2>
                    <table border="1" style="border-collapse: collapse">
                        <thead>
                            <tr>
                                <th>*</th>
                                <th>Tên sản phẩm </th>
                                <th>Sản phẩm </th>
                                <th>Giá </th>
                                <th>Số lượng </th>
                                <th>Tổng </th>
                            </tr>
                        </thead>
                        @php
                            $i = 1;
                        @endphp
                        @foreach($details['product'] as $item)
                        <tbody>
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $item['name'] }}</td>
                                <td><img src="{{ $item['feature_image_path'] }}" alt="" width="100px"></td>
                                <td>{{ $item['price'] }}</td>
                                <td>{{ $item['quantity'] }}</td>
                                <td>{{ $item['price'] * $item['quantity'] }}</td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                    <h2>Tổng giá sản phẩm: {{ $details['totalPrice'] }} nghìn đồng.</h2>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
