<header id="header">
    <!--header-->
    <div class="header_top">
        <!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> {{ getConfigValueFromSettingTable('phone') }}</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> {{ getConfigValueFromSettingTable('email') }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header_top-->

    <div class="header-middle">
        <!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-md-4 clearfix">
                    <div class="logo pull-left">
                        <a href="{{ route('front.index') }}"><img src="{{ asset('eshopper/images/home/logo.png') }}" alt="" /></a>
                    </div>
                    <div class="btn-group pull-right clearfix">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                USA
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="">Canada</a></li>
                                <li><a href="">UK</a></li>
                            </ul>
                        </div>

                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                DOLLAR
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="">Canadian Dollar</a></li>
                                <li><a href="">Pound</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 clearfix">
                    <div class="shop-menu clearfix pull-right">
                        <ul class="nav navbar-nav navbar-custom-menu">
                            @if (auth()->guard('customer')->check())
                            <li><a href="#" type="button" class="dropdown-toggle" id="about-us" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> {{ auth()->guard('customer')->user()->name }} <span class="caret"></span></a>
                                <ul class="dropdown-menu" aria-labelledby="about-us">
                                    <li><a href="{{route('customer.profile')}}">Profile</a></li>
                                    <li><a href="{{ route('front.logout-cus') }}">Logout</a></li>
                                </ul>
                            </li>
                            @else
                            <li><a href="{{ route('front.login') }}"><i class="fa fa-user"></i> Account</a></li>
                            @endif
                            <li><a href=""><i class="fa fa-star"></i> Wishlist</a></li>
                            @if (auth()->guard('customer')->check())
                            <li><a href="{{ route('checkout.show') }}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                            @endif
                            <li><a href="{{ route('cart.show') }}"><i class="fa fa-shopping-cart"></i> Cart
                                    @if (session()->has('cart'))
                                    <span class="badge count-cart">{{ $quantityAllProduct }}</span>
                                    @else
                                    {{-- <li><a href="javascript:;"><i class="fa fa-shopping-cart"></i> Cart --}}
                                    <span class="badge count-cart"></span>
                                    {{-- </a></li> --}}
                                    @endif
                            </a></li>
                            {{-- @if (!auth()->guard('customer')->check()) --}}
                            @guest('customer')
                            <li><a href="{{route('front.login')}}"><i class="fa fa-lock"></i> Login</a></li>
                            {{-- @endif --}}
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header-middle-->

    <div class="header-bottom">
        <!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    @include('frontend.components.main_menu')
                </div>
                <div class="col-sm-3">
                    <form action="{{ route('front.search') }}" method="get">
                        <div class="search_box pull-right">
                            <input type="text" placeholder="Search" name="search" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--/header-bottom-->
</header>
