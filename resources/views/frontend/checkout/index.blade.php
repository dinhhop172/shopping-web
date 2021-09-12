@extends('layouts.home')
@section('title', 'Cart Page')
@section('content')
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
                <div class="col-sm-3">
                    <div class="shopper-info">
                        <p>Shopper Information</p>
                        <form>
                            <input type="text" placeholder="Display Name">
                            <input type="text" placeholder="User Name">
                            <input type="password" placeholder="Password">
                            <input type="password" placeholder="Confirm password">
                        </form>
                        <a class="btn btn-primary" href="">Get Quotes</a>
                        <a class="btn btn-primary" href="">Continue</a>
                    </div>
                </div>
                <div class="col-sm-5 clearfix">
                    <div class="bill-to">
                        <p>Bill To</p>
                        <div class="form-one">
                            <form>
                                <input type="text" placeholder="Company Name">
                                <input type="text" placeholder="Email*">
                                <input type="text" placeholder="Title">
                                <input type="text" placeholder="First Name *">
                                <input type="text" placeholder="Middle Name">
                                <input type="text" placeholder="Last Name *">
                                <input type="text" placeholder="Address 1 *">
                                <input type="text" placeholder="Address 2">
                            </form>
                        </div>
                        <div class="form-two">
                            <form>
                                <input type="text" placeholder="Zip / Postal Code *">
                                <select>
                                    <option>-- Country --</option>
                                    <option>United States</option>
                                    <option>Bangladesh</option>
                                    <option>UK</option>
                                    <option>India</option>
                                    <option>Pakistan</option>
                                    <option>Ucrane</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>
                                <select>
                                    <option>-- State / Province / Region --</option>
                                    <option>United States</option>
                                    <option>Bangladesh</option>
                                    <option>UK</option>
                                    <option>India</option>
                                    <option>Pakistan</option>
                                    <option>Ucrane</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>
                                <input type="password" placeholder="Confirm password">
                                <input type="text" placeholder="Phone *">
                                <input type="text" placeholder="Mobile Phone">
                                <input type="text" placeholder="Fax">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="order-message">
                        <p>Shipping Order</p>
                        <textarea name="message" placeholder="Notes about your order, Special Notes for Delivery" rows="16"></textarea>
                        <label><input type="checkbox"> Shipping to bill address</label>
                    </div>
                </div>
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
                            <a href="{{ route('front.productdetail', ['slug'=>Str::slug($item[name]), 'id'=>$item[id]]) }}"><img src="{{ asset($item[feature_image_path]) }}" alt="" width="110px" height="110px"></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{ $item[name] }}</a></h4>
                            <p>Web ID: 1089772</p>
                        </td>
                        <td class="cart_price">
                            <p>${{ number_format($item[price],2) }}</p>
                        </td>
                        <td class="cart_quantity cart_update" data-update="{{ route('cart.update') }}">
                            <div class="cart_quantity_button">
                                {{-- <a class="cart_quantity_down" href="javascript:;"> - </a> --}}
                                <input class="cart_quantity_input" data-id="{{ $item[id] }}" name="quantity" value="{{ $item[quantity] }}" disabled min="1" size="2">
                                {{-- <a class="cart_quantity_up" href="javascript:;"> + </a> --}}
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">${{ number_format($item[price] * $item[quantity],2) }}</p>
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
                                    <td>${{ $total }}</td>
                                </tr>
                                <tr>
                                    <td>Exo Tax</td>
                                    <td>$2</td>
                                </tr>
                                <tr class="shipping-cost">
                                    <td>Shipping Cost</td>
                                    <td>Free</td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td><span>${{ $total + 2}}</span></td>
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