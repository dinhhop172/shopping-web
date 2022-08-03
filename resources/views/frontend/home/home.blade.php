@extends('layouts.home')
@section('title', 'Home page')
@section('content')

@include('frontend.home.components.slider')
@if (Session::has('place'))
    {{-- {{ alert()->success(session()->get('place')) }} --}}
    {{-- {!! `<script>alert("session()->get('place')")</script>` !!} --}}
    @php
        echo "<script>";
        echo "alert(`Đặt hàng thành công, Vui lòng kiểm tra Order của bạn trong Mail`);";
        echo "</script>";
    @endphp
@endif
<section>
    
    <div class="container">
        <div class="row">
            @include('frontend.components.sidebar')

            <div class="col-sm-9 padding-right">
                <!--features_items-->
                @include('frontend.home.components.feature_product')

                <!--category-tab-->
                @include('frontend.home.components.tab_category')
                <!--/category-tab-->

                @include('frontend.home.components.recomend_product')
                <!--/recommended_items-->

            </div>
        </div>
    </div>
</section>

@endsection
@section('js')
<script>
    $('.active_product')[0].classList.add('active', 'in');
    $tabs = $('.nav.nav-tabs')[0];
    $tabs.firstElementChild.classList.add('active');

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


    $('.owl-prev')[0].classList.add('recommended-item-control');
    $('.owl-next')[0].classList.add('recommended-item-control');


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
@endsection

@if (Session::has('place'))
    {{ Session::forget('place') }}
@endif
