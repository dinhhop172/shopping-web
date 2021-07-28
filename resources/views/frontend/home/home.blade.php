@extends('layouts.home')
@section('title', 'Home page')
@section('content')

@include('frontend.home.components.slider')

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
