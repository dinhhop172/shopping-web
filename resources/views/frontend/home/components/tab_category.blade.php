<div class="category-tab">
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            @foreach ($categoryParent as $keyParent => $valueParent)
            <li class="{{ $keyParent==0 ? 'active' : '' }}"><a href="#{{ $valueParent->name }}" data-toggle="tab">{{ $valueParent->name }}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="tab-content">
        @foreach ($categoryParent as $key => $valueCategory)
        <div class="tab-pane fade {{ $key==0 ? 'active in' : '' }}" id="{{ $valueCategory->name }}">
            @foreach ($valueCategory->products as $productCate)
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{ $productCate->feature_image_path }}" alt="" />
                            <h2>{{ number_format($productCate->price,0,',','.') }} VND</h2>
                            <p>{{ $productCate->name }}</p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endforeach

    </div>
</div>
