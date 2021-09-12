<div class="recommended_items">
    <!--recommended_items-->
    <h2 class="title text-center">recommended items</h2>
    <div class="owl-carousel owl-carousel1 owl-theme" id="recommended-item-carousel">
        @foreach ($productRecommend as $valueRecommend)
        <div class="col-md-12">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <a href="{{ route('front.productdetail', ['slug'=>$valueRecommend->slug, 'id' => $valueRecommend->id]) }}">
                            <img src="{{ $valueRecommend->feature_image_path }}" alt="" />
                        </a>
                        <h2>${{ number_format($valueRecommend->price,2) }}</h2>
                        <p>{{ $valueRecommend->name }}</p>
                        <a href="javascript:;" data-addcart="{{ $valueRecommend->id }}" data-url="{{ route('cart.add', ['id'=>$valueRecommend->id]) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>

                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>