@extends('layouts.home')
@section('title', 'Danh muc')
@section('content')
<section id="advertisement">
    <div class="container">
        <img src="{{asset('eshopper/images/shop/advertisement.jpg')}}" alt="" />
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            @include('frontend.components.sidebar')
            @yield('listproduct')
        </div>

    </div>
</section>
@endsection
@push('scripts')
<script>
    function addCart(event) {
        event.preventDefault();
        $data = $(this).data('url');
        var dataId = $(this).data('addcart');
        $.ajax({
            url: $data,
            type: 'POST',
            data: {
                dataId: dataId
            },
            success: function(result) {
                if (result.statusCode == 200) {
                    // $countQuan = Object.keys(result.data.data).length;
                    // console.log($countQuan);
                    var countQuan = 0;
                    $.each(result.data.data, function(i, v) {
                        countQuan += v.quantity;
                    });
                    $('.count-cart').html(countQuan);
                    console.log(countQuan);
                    toastr('Success', 'Successfully added to cart', 'success');
                }
            },
            error: function(err) {
                console.log(err);
            }
        });
    }
    $(function() {
        $('.add-to-cart').on('click', addCart);
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
