@extends('layouts.listproduct')
@section('title', 'Product detail')
@section('listproduct')

<div class="col-sm-9 padding-right">
    <div class="features_items">
        <!--features_items-->
        <h2 class="title text-center">Product detail</h2>
        <div class="product-details">
            <div class="col-sm-5">
                <div class="view-product">
                    <img src="{{ asset($data->feature_image_path) }}" alt="" />
                    <h3>ZOOM</h3>
                </div>
                <div id="similar-product" class="carousel slide" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="owl-carousel owl-carousel2 owl-theme" id="recommended-item-carousel">
                        @foreach ($data->images as $keyProduct => $product)
                            <a href="#"><img src="{{ $product->image_path }}" alt=""></a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-sm-7">
                <div class="product-information">
                    <!--/product-information-->
                    <img src="{{ asset('eshopper/images/product-details/new.jpg') }}" class="newarrival" alt="" />
                    <h2>{{ $data->name }}</h2>
                    <p>Web ID: {{ $data->id }}</p>
                    <img src="{{ asset('eshopper/images/product-details/rating.png') }}" alt="" />
                    <span>
                        <span>${{ number_format($data->price,2) }}</span>
                        <label>Quantity:</label>
                        <input type="text" value="3" />
                        <a href="#" class="btn btn-fefault cart">
                            <i class="fa fa-shopping-cart"></i>
                            Add to cart
                        </a>
                    </span>
                    <p><b>Availability:</b> In Stock</p>
                    <p><b>Condition:</b> New</p>
                    <p><b>Brand:</b> E-SHOPPER</p>
                    <a href=""><img src="{{ asset('eshopper/images/product-details/share.png') }}" class="share img-responsive" alt="" /></a>
                </div>
                <!--/product-information-->
            </div>
        </div>
        <!--/product-details-->
    </div>
    <!--features_items-->
    @include('frontend.home.components.recomend_product')
</div>

@endsection
@section('js')
<script>
    $('.owl-prev')[1].classList.add('recommended-item-control');
    $('.owl-next')[1].classList.add('recommended-item-control');

    $('.owl-prev')[0].classList.add('recommended-item-control');
    $('.owl-next')[0].classList.add('recommended-item-control');
</script>
@endsection