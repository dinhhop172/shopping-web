<div class="container">
    <div class="breadcrumbs">
        <ol class="breadcrumb">
            <li><a href="{{ route('front.index') }}">Home</a></li>
            <li class="active">Shopping Cart</li>
        </ol>
    </div>
    <div class="table-responsive cart_info">
        <table class="table table-condensed" id="delete_cart" data-url="{{ route('cart.delete') }}">
            <thead>
                <tr class="cart_menu">
                    <td class="image">Item</td>
                    <td class="description"></td>
                    <td class="price">Price</td>
                    <td class="quantity">Quantity</td>
                    <td class="total">Total</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                @php
                $total = 0;
                @endphp
                @forelse ($cart as $item)
                @php
                $total += $item['price'] * $item['quantity']
                @endphp
                <tr>
                    <td class="cart_product">
                        <a href="{{ route('front.productdetail', ['slug'=>Str::slug($item['name']), 'id'=>$item['id']]) }}"><img src="{{ asset($item['feature_image_path']) }}" alt="" width="110px" height="110px"></a>
                    </td>
                    <td class="cart_description">
                        <h4><a href="">{{ $item['name'] }}</a></h4>
                        <p>Web ID: 1089772</p>
                    </td>
                    <td class="cart_price">
                        <p>${{ number_format($item['price'],2) }}</p>
                    </td>
                    <td class="cart_quantity cart_update" data-update="{{ route('cart.update') }}">
                        <div class="cart_quantity_button">
                            <a class="cart_quantity_down" href="javascript:;"> - </a>
                            <input class="cart_quantity_input" data-id="{{ $item['id'] }}" name="quantity" value="{{ $item['quantity'] }}" min="1" size="2">
                            <a class="cart_quantity_up" href="javascript:;"> + </a>
                        </div>
                    </td>
                    <td class="cart_total">
                        <p class="cart_total_price">${{ number_format($item['price'] * $item['quantity'],2) }}</p>
                    </td>
                    <td class="cart_delete">
                        <a data-id="{{ $item['id'] }}" class="cart_quantity_delete" href="javascript:;" style="color: black;"><i class="fa fa-times"></i></a>
                    </td>
                </tr>
                @empty
                <tr>
                    <div class="col-md-12">
                        <div class="row">
                            <h3 class="text-center">Not found</h3>
                        </div>
                    </div>
                </tr>
                @endforelse
            </tbody>

        </table>
        <div class="col-md-12 col-xs-12 ">
            <a href="{{ route('checkout.show') }}" class="btn btn-default check_out float-right mb-3" style="font-size: 19px" href="">Check out</a>
        </div>
    </div>
    <div class="row">

        <div class="col-md-2 col-xs-12">
            <h3>
                <a href="{{ route('front.index') }}">
                    <--- Back home</a>
            </h3>
        </div>
        <div class="col-md-10 col-xs-12">
            <h3 style="float: right;">Total: ${{ number_format($total,2) }}</h3>
        </div>
    </div>
</div>