@extends('layouts.home')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-9">

            <div class="owl-carousel owl-theme" id="recommended-item-carousel">
                @for ($i = 0;$i < 10; $i++) <div class="col-md-12">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="http://127.0.0.1:8000/storage/products/8/zJbkbSknK3CzMmqJ0M4K.jpg" alt="" />
                                <h2>3123123</h2>
                                <p>Giay nike</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                        </div>
                    </div>
            </div>
            @endfor
        </div>
    </div>
</div>
</div>
@endsection
