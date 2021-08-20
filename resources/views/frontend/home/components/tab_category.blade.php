<div class="category-tab">
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            @foreach ($categoryParent as $keyParent => $valueParent)
            @if($valueParent->categoryChild->count())
            @foreach ($valueParent->categoryChild as $keyChild => $valueChild)
            <li><a href="#{{ $valueChild->name }}" data-toggle="tab">{{ $valueChild->name }}</a></li>
            @endforeach
            @else
            <li><a href="#{{ $valueParent->name }}" data-toggle="tab">{{ $valueParent->name }}</a></li>
            @endif
            @endforeach
        </ul>
    </div>
    <div class="tab-content">
        @foreach ($categoryParent as $key => $valueCategory)
        @if ($valueCategory->categoryChild->count())
        @foreach ($valueCategory->categoryChild as $valueCategoryChild)

        <div class="tab-pane active_product fade" id="{{ $valueCategoryChild->name }}">
            @foreach ($valueCategoryChild->products as $productCate)
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <a href="{{ route('front.productdetail', ['slug'=>$productCate->slug, 'id' => $productCate->id]) }}">
                                <img src="{{ $productCate->feature_image_path }}" alt="" />
                            </a>
                            <h2>{{ number_format($productCate->price,0,',','.') }} VND</h2>
                            <p>{{ $productCate->name }}</p>
                            <a href="javascript:;" data-addcart="{{ $productCate->id }}" data-url="{{ route('cart.add', ['id'=>$productCate->id]) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endforeach
        @else
        <div class="tab-pane active_product fade" id="{{ $valueCategory->name }}">
            @foreach ($valueCategory->products as $productCate)
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <a href="{{ route('front.productdetail', ['slug'=>$productCate->slug, 'id' => $productCate->id]) }}">
                                <img src="{{ $productCate->feature_image_path }}" alt="" />
                            </a>
                            <h2>{{ number_format($productCate->price,0,',','.') }} VND</h2>
                            <p>{{ $productCate->name }}</p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
        @endforeach
    </div>
</div>
