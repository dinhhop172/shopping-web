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
