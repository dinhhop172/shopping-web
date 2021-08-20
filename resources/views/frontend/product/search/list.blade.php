@extends('layouts.listproduct')
@section('title', 'Search')
@section('listproduct')

<div class="col-sm-9 padding-right">
    <div class="features_items">
        <!--features_items-->
        <h2 class="title text-center">Search Results</h2>

        @forelse ($searchProduct as $productItem)

        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="{{ $productItem->feature_image_path }}" alt="" />
                        <h2>{{ number_format($productItem->price,0,',','.') }} VND</h2>
                        <p>{{ $productItem->name }}</p>
                        <a href="javascript:;" data-addcart="{{ $productItem->id }}" data-url="{{ route('cart.add', ['id'=>$productItem->id]) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                    <div class="product-overlay">
                        <div class="overlay-content">
                            <h2>{{ number_format($productItem->price,0,',','.') }} VND</h2>
                            <p>{{ $productItem->name }}</p>
                            <a href="javascript:;" data-addcart="{{ $productItem->id }}" data-url="{{ route('cart.add', ['id'=>$productItem->id]) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                    </div>
                </div>
                <div class="choose">
                    <ul class="nav nav-pills nav-justified">
                        <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                        <li><a href="{{ route('front.productdetail', ['slug'=>$productItem->slug, 'id'=>$productItem->id]) }}"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                    </ul>
                </div>
            </div>
        </div>
        @empty
        <div class="mt-5">
            <h1 class="text-center">Not Found</h1>
        </div>
        @endforelse
        {{ $searchProduct->appends(request()->only('search'))->links() }}
    </div>
    <!--features_items-->
</div>

@endsection
