@extends('layouts.listproduct')
@section('title', 'Product detail')
@section('listproduct')

{{-- {{ dd($data)}} --}}
<div class="col-sm-9 padding-right">
    <div class="features_items">
        <!--features_items-->
        <h2 class="title text-center">Product detail1</h2>
        <div class="product-details">
            <div class="col-sm-5">
                <div class="view-product">
                    <img src="{{ asset($data->feature_image_path) }}" alt="" />
                    <h3>ZOOM</h3>
                </div>
                <div id="similar-product" class="carousel slide" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        @foreach ($data->images as $keyProduct => $product)
                        @if ($keyProduct % 3 == 0)
                        <div class="item {{$keyProduct == 0 ? 'active' : ''}}">
                        @endif
                            <a href=""><img src="{{ $product->image_path }}" alt=""></a>
                        @if ($keyProduct % 3 == 2)
                        </div>
                        @endif
                        @endforeach

                    </div>

                    <!-- Controls -->
                    <a class="left item-control" href="#similar-product" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a class="right item-control" href="#similar-product" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-sm-7">
                <div class="product-information">
                    <!--/product-information-->
                    <img src="images/product-details/new.jpg" class="newarrival" alt="" />
                    <h2>{{ $data->name }}</h2>
                    <p>Web ID: {{ $data->id }}</p>
                    <img src="{{ asset('eshopper/images/product-details/rating.png') }}" alt="" />
                    <span>
                        <span>{{ number_format($data->price,0,',','.') }} VND</span>
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
</div>

@endsection
