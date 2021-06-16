<!doctype html>
<html class="no-js" lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Makplus - Marketplace HTML5 Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="/assets/img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/animate.min.css">
    <link rel="stylesheet" href="/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="/assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="/assets/css/aos.css">
    <link rel="stylesheet" href="/assets/css/flaticon.css">
    <link rel="stylesheet" href="/assets/css/jquery-ui.min.css">
    <link rel="stylesheet" href="/assets/css/nice-select.css">
    <link rel="stylesheet" href="/assets/css/meanmenu.css">
    <link rel="stylesheet" href="/assets/css/slick.css">
    <link rel="stylesheet" href="/assets/css/default.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/responsive.css">
</head>
<body>

<!-- preloader -->
<div id="preloader">
    <div id="loading-center">
        <div id="loading-center-absolute">
            <div class="object" id="object_one"></div>
            <div class="object" id="object_two"></div>
            <div class="object" id="object_three"></div>
        </div>
    </div>
</div>
<!-- preloader-end -->

<!-- header-area -->
<header>
    <div id="header-sticky" class="menu-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="logo">
                        <a href="{{route('home')}}"><img src="/assets/img/logo/logo.png" alt="Logo"></a>
                    </div>
                </div>

                    <div class="col-lg-9 col-md-6 col-sm-6 text-right">
                        <div class="main-menu d-none d-lg-inline-block">
                            <nav id="mobile-menu">
                                <ul>
                                    <li><a href="#">@lang('home.language')</a>
                                        <ul class="submenu">
                                            <li><a href="{{route('locale',['locale'=>'ua'])}}">@lang('home.languages.ua')</a></li>
                                            <li><a href="{{route('locale',['locale'=>'ru'])}}">@lang('home.languages.ru')</a></li>
                                            <li><a href="{{route('locale',['locale'=>'en'])}}">@lang('home.languages.en')</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>

                    @if(\Illuminate\Support\Facades\Auth::check())
                    <div class="shop-cart position-relative d-none d-sm-inline-block">
                        <a href="#"><i class="fas fa-shopping-basket"></i></a>
                        <?php
                        $total = 0;
                        foreach (\Cart::session(\Illuminate\Support\Facades\Auth::user()->id)->getContent() as $order)
                        {
                            $total += 1;
                        }
                        ?>
                        <span>{{$total}}</span>
                        <div class="menu-cart-widget">
                            <ul>

                                @forelse(\Cart::session(\Illuminate\Support\Facades\Auth::user()->id)->getContent() as $order)
                                <li class="menu-cart-product-list">
                                    <div class="cart-product-thumb">
                                        <a href="{{route('product.show', ['id'=>$order->id])}}"><img style="height: 74px;width: 73px;" src="/{{$order->attributes[0]}}" alt=""></a>
                                    </div>
                                    <div class="cart-product-content">
                                        <h5><a href="{{route('product.show', ['id'=>$order->id])}}">{{$order->name}}</a></h5>
                                        <span>{{$order->quantity}} x ${{$order->price}}.00</span>
                                    </div>
                                    <div class="cart-del">
                                        <form action="{{route('product.order.delete', ['id'=>$order->id])}}" method="post">
                                            @csrf
                                            <button>X</button>
                                        </form>

                                    </div>
                                </li>
                                @empty
                                    <p>@lang('home.basket_is_empty')</p>
                                @endforelse
                            </ul>
                            <div class="cart-price fix mb-15">
                                <span>@lang('home.generally')</span>
                                <?php
                                $total = 0;
                                foreach (\Cart::session(\Illuminate\Support\Facades\Auth::user()->id)->getContent() as $order)
                                    {
                                        $total += $order->price * $order->quantity;
                                    }
                                ?>
                                <span>$ {{$total}}.00</span>
                            </div>
                            <div class="cart-checkout-btn">
                                <a href="{{route('product.payment.get')}}" class="btn">@lang('home.payment')</a>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="header-btn d-none d-xl-inline-block">
                        @if(\Illuminate\Support\Facades\Auth::check())
                            <form action="{{route('logout')}}" method="post">
                                @csrf
                                @if(\Illuminate\Support\Facades\Auth::user()->role=='admin')
                                    <div class="header-btn d-none d-xl-inline-block">
                                        <a href="{{route('admin.index')}}" class="btn"><i class="fas fa-user"></i>@lang('home.admin')</a>
                                    </div>
                                @endif
                                <button class="btn"><i class="fas fa-user"></i>@lang('home.leave')</button>
                            </form>
                        @else
                            <a href="/{{'login'}}" class="btn"><i class="fas fa-user"></i>@lang('home.login')</a>
                            <a href="/{{'register'}}" class="btn"><i class="fas fa-user"></i>@lang('home.register')</a>
                        @endif
                    </div>
                </div>
                <div class="col-12">
                    <div class="mobile-menu"></div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header-area-end -->
        @yield('content')
<!-- footer -->
<footer>
    <div class="footer-top-wrap black-bg pt-90 pb-35">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-widget mb-50 pr-80">
                        <div class="logo mb-25">
                            <a href="#"><img src="/assets/img/logo/w_logo.png" alt="Logo"></a>
                        </div>
                        <div class="footer-text mb-35">
                            <p>Popularised in the with the release of etras sheets containing passages and more rcently with desop publishing software
                                like Maker including versions.</p>
                        </div>
                        <div class="footer-social">
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-3 col-sm-6">
                    <div class="footer-widget mb-50">
                        <div class="fw-title mb-30">
                            <h5>PRODUCT List</h5>
                        </div>
                        <div class="fw-link">
                            <ul>
                                <li><a href="#">Pricing</a></li>
                                <li><a href="#">LiveChat Benefits</a></li>
                                <li><a href="#">Tour</a></li>
                                <li><a href="#">Features</a></li>
                                <li><a href="#">Use Cases</a></li>
                                <li><a href="#">App</a></li>
                                <li><a href="#">Marketplace</a></li>
                                <li><a href="#">Updates</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-6">
                    <div class="footer-widget mb-50">
                        <div class="fw-title mb-30">
                            <h5>RESOURCES</h5>
                        </div>
                        <div class="fw-link">
                            <ul>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Infographics</a></li>
                                <li><a href="#">Reports</a></li>
                                <li><a href="#">Podcast</a></li>
                                <li><a href="#">Benchmark</a></li>
                                <li><a href="#">Update</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-6">
                    <div class="footer-widget mb-50">
                        <div class="fw-title mb-30">
                            <h5>CUSTOMERS</h5>
                        </div>
                        <div class="fw-link">
                            <ul>
                                <li><a href="#">Pricing</a></li>
                                <li><a href="#">LiveChat Benefits</a></li>
                                <li><a href="#">Tour</a></li>
                                <li><a href="#">Features</a></li>
                                <li><a href="#">Use Cases</a></li>
                                <li><a href="#">App</a></li>
                                <li><a href="#">Marketplace</a></li>
                                <li><a href="#">Updates</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-4 col-md-3 col-sm-6">
                    <div class="footer-widget mb-50">
                        <div class="fw-title mb-30">
                            <h5>SUPPORT center</h5>
                        </div>
                        <div class="fw-link">
                            <ul>
                                <li><a href="#">Help Center</a></li>
                                <li><a href="#">Community</a></li>
                                <li><a href="#">Webinars</a></li>
                                <li><a href="#">Experts Marketplace</a></li>
                                <li><a href="#">API & Developers</a></li>
                                <li><a href="#">System Status</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="copyright-text">
                        <p>Copyright © 2019 <a href="#">Makplus</a> All Rights Reserved.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 d-none d-md-block">
                    <div class="payment-method-img text-right">
                        <img src="/assets/img/images/card_img.png" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer-end -->





<!-- JS here -->
<script src="/assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="/assets/js/popper.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/js/isotope.pkgd.min.js"></script>
<script src="/assets/js/slick.min.js"></script>
<script src="/assets/js/jquery.meanmenu.min.js"></script>
<script src="/assets/js/ajax-form.js"></script>
<script src="/assets/js/wow.min.js"></script>
<script src="/assets/js/aos.js"></script>
<script src="/assets/js/jquery-ui.min.js"></script>
<script src="/assets/js/jquery.counterup.min.js"></script>
<script src="/assets/js/jquery.waypoints.min.js"></script>
<script src="/assets/js/jquery.nice-select.min.js"></script>
<script src="/assets/js/jquery.scrollUp.min.js"></script>
<script src="/assets/js/imagesloaded.pkgd.min.js"></script>
<script src="/assets/js/jquery.magnific-popup.min.js"></script>
<script src="/assets/js/plugins.js"></script>
<script src="/assets/js/main.js"></script>
</body>
</html>
