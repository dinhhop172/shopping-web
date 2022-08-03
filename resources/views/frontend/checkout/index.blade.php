@extends('layouts.home')
@section('title', 'Cart Page')
@section('content')
@if (Session::has('err-checkout'))
    {{ alert()->warning(session()->get('err-checkout')) }}
@endif
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Check out</li>
            </ol>
        </div>

        <div class="shopper-informations">
            <div class="row">
                <form method="POST" data-route="{{ route('checkout.place') }}" id="place_order">
                    @csrf
                    <div class="col-sm-3">
                        <div class="shopper-info">
                            <p>Shopper Information</p>

                            <address>Name: {{ $cus->name }}</address>
                            <address>Phone number: {{ $cus->phone }} <a href="user/account/profile.html">Change</a></address>
                            <small style="border-bottom: 1px solid #404352;font-size: 14px;">Please enter specific address:</small>
                            <select name="delivery_address">
                                <option value="{{ $cus->address }}">{{ $cus->address }}</option>
                            </select>
                            <a href="user/account/profile.html">Change</a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="order-message">
                            <p>Shipping Order</p>
                            <textarea name="note" rows="10" placeholder="Notes about your order, Special Notes for Delivery" rows="16"></textarea>
                            <input class="btn btn-primary" type="submit" value="Place order" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="review-payment">
            <h2>Review & Payment</h2>
        </div>

        <div class="table-responsive cart_info">
            <table class="table table-condensed">
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
                    @foreach ($cart as $item)
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
                                {{-- <a class="cart_quantity_down" href="javascript:;"> - </a> --}}
                                <input class="cart_quantity_input" data-id="{{ $item['id'] }}" name="quantity" value="{{ $item['quantity'] }}" disabled min="1" size="2">
                                {{-- <a class="cart_quantity_up" href="javascript:;"> + </a> --}}
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">${{ number_format($item['price'] * $item['quantity'],2) }}</p>
                        </td>
                        {{-- <td class="cart_delete">
                            <a data-id="{{ $item[id] }}" class="cart_quantity_delete" href="javascript:;" style="color: black;"><i class="fa fa-times"></i></a>
                        </td> --}}
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="4">&nbsp;</td>
                        <td colspan="2">
                            <table class="table table-condensed total-result">
                                <tr>
                                    <td>Cart Sub Total</td>
                                    <td>${{ number_format($total,2) }}</td>
                                </tr>
                                <tr>
                                    <td>Exo Tax</td>
                                    <td>${{ number_format(2,2) }}</td>
                                </tr>
                                <tr class="shipping-cost">
                                    <td>Shipping Cost</td>
                                    <td>Free</td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td><span>${{ number_format($total+2,2) }}</span></td>
                                </tr>
                            </table>
                            <a href="{{ route('cart.show') }}" class="btn btn-primary">Back to cart</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="payment-options"></div>
    </div>
</section>
<!--/#cart_items-->

@endsection
@php
if(session()->has('success-verify')){
    alert()->success('<h4>Verified success</h4>')->toHtml();
}
@endphp

@push('scripts')
<script>
    $(function(){
        $('#place_order').submit(function(event){
            event.preventDefault();
            var route = $('#place_order').data('route');
            var form_data = $(this).serialize();
            $.ajax({
                url: route,
                method: 'POST',
                data: form_data,
                beforeSend: function(){
                    swal({
                        icon: "success",
                        title: 'Please wating...',
                        closeOnClickOutside:false,
                        buttons: false
                    });
                },
                success: function(success){
                    console.log(success);
                    if(success == ''){
                        {{ session()->put('place', 'Placed  order successfully, Please check your email for more details') }}
                        window.location.href = "/";
                    }
                },
                error: function(err){
                    console.log(err);
                }
            })
        })
    });
</script>
@endpush
