@extends('layouts.home')
@section('title', 'Cart Page')
@section('content')
<section id="cart_items">
    @include('frontend.product.cart.cart-component')
</section>
<!--/#cart_items-->
@endsection

@push('scripts')
<script>
    function deleteCartItem(event) {
        event.preventDefault();
        var idCartItem = $(this).data('id');
        var urlDelete = $('#delete_cart').data('url');
        $.ajax({
            url: urlDelete,
            type: "GET",
            data: {
                id: idCartItem
            },
            success: function(result) {
                if (result.statusCode == 200) {
                    var countQuan = 0;
                    $('#cart_items').html(result.data.data);
                    $.each(result.data.dataCart, function(i, v) {
                        countQuan += v.quantity;
                    });
                    $('.count-cart').html(countQuan);
                    toastr('Success', 'Successfully deleted to cart', 'success');
                }
            },
            error: function(err) {
                console.log(err);
            }
        });
    }

    function updateCartItem() {
        $quantity = $(this).val();
        $idItem = $(this).data('id');
        $urlUpdate = $('.cart_update').data('update');
        console.log($quantity);
        if ($quantity < 1) {
            toastr('Warning', 'Quantity must be greater than 0', 'warning');
            $(this).val(1);
            return;
        }
        $.ajax({
            url: $urlUpdate,
            type: "GET",
            data: {
                id: $idItem,
                quantity: $quantity
            },
            success: function(result) {
                if (result.statusCode == 200) {
                    var countQuan = 0;
                    $('#cart_items').html(result.data.data);
                    console.log(result);
                    $('.count-cart').html(result.data.total);
                    toastr('Success', 'Successfully updated to cart', 'success');
                }
            },
            error: function(err) {
                return false;
            }
        });
    }

    function cartQuantityUp(event) {
        event.preventDefault();
        var quantity = parseInt($(this).parents('tr').find('input.cart_quantity_input').val());
        quantity += 1;
        $(this).parents('tr').find('input[name=quantity]').val(quantity);
        var id = $(this).parents('tr').find('input[name=quantity]').data('id');
        console.log(quantity);

        $.ajax({
            url: $('.cart_update').data('update'),
            type: "GET",
            data: {
                id: id,
                quantity: quantity
            },
            success: function(result) {
                console.log(result);
                if (result.statusCode == 200) {
                    var countQuan = 0;
                    $('#cart_items').html(result.data.data);
                    $('.count-cart').html(result.data.total);
                    toastr('Success', 'Successfully updated to cart', 'success');
                }
            },
            error: function(err) {
                console.log(err);
            }
        });
    }


    function cartQuantityDown(event) {
        event.preventDefault();
        var quantity = parseInt($(this).parents('tr').find('input.cart_quantity_input').val());
        quantity -= 1;
        $(this).parents('tr').find('input[name=quantity]').val(quantity);
        var id = $(this).parents('tr').find('input[name=quantity]').data('id');
        console.log(quantity);
        if (quantity < 1) {
            toastr('Warning', 'Quantity must be greater than 0', 'warning');
            $(this).parents('tr').find('input[name=quantity]').val(1);
            return;
        }
        $.ajax({
            url: $('.cart_update').data('update'),
            type: "GET",
            data: {
                id: id,
                quantity: quantity
            },
            success: function(result) {
                console.log(result);
                if (result.statusCode == 200) {
                    var countQuan = 0;
                    $('#cart_items').html(result.data.data);
                    // console.log(result);
                    $('.count-cart').html(result.data.total);
                    toastr('Success', 'Successfully updated to cart', 'success');
                }
            },
            error: function(err) {
                console.log(err);
            }
        });
    }

    $(function() {
        $(document).on('click', '.cart_quantity_delete', deleteCartItem);
        $(document).on('click', '.cart_quantity_up', cartQuantityUp);
        $(document).on('click', '.cart_quantity_down', cartQuantityDown);
        $(document).on('change', '.cart_quantity_input', updateCartItem);
    });

    function toastr(title, mess, icon) {
        $.toast({
            heading: title,
            text: mess,
            icon: icon,
            loader: true,
            position: 'bottom-right',
            loaderBg: '#9EC600'
        })
    }
</script>
@endpush
