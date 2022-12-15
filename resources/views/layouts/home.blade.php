<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Norda - Minimal eCommerce HTML Template</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png">

    <!-- All CSS is here
	============================================ -->

    <link rel="stylesheet" href="{{asset('assets/css/vendor/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/vendor/signericafat.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/vendor/cerebrisans.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/vendor/simple-line-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/vendor/elegant.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/vendor/linear-icon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/easyzoom.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/slick.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/animate.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>

    <!-- Use the minified version files listed below for better performance and remove the files listed above
    <link rel="stylesheet" href="assets/css/vendor/vendor.min.css">
    <link rel="stylesheet" href="assets/css/plugins/plugins.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css"> -->

</head>
@livewireStyles
<body>

    <div class="main-wrapper">
        <header class="header-area">
            <div class="header-large-device section-padding-2">
                <div class="header-top header-top-ptb-3 bg-black">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-xl-4 col-lg-3">
                                <div class="header-quick-contect">
                                    <ul>
                             @if(Auth::user())
                             <li><i class="icon-phone "></i> {{Auth::user()->phone}}</li>
                            
                            @else
                            <li><i class="icon-phone "></i>  0113474748</li>
                            @endif
                            @if (Auth::user())
                            <li><i class="icon-envelope-open "></i> {{Auth::user()->email}}</li> 
                            @else
                          
                            @endif
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4">
                                <div class="header-offer-wrap-3 text-center">
                                    <p>Free shipping worldwide for orders over</p>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-5">
                                <div class="header-top-right">
                                    <div class="social-hm4-wrap">
                                        <span>Follow us</span>
                                        <div class="social-style-1 social-style-1-white">
                                            <a href="https://twitter.com/login" target="_blank"><i class="icon-social-twitter"></i></a>
                                            <a href="https://www.facebook.com/" target="_blank" ><i class="icon-social-facebook"></i></a>
                                            <a href="https://www.instagram.com/accounts/login/" target="_blank"><i class="icon-social-instagram"></i></a>
                                            <a href="https://www.youtube.com/" target="_blank"><i class="icon-social-youtube"></i></a>
                                          
                                        </div>
                                    </div>
                                    <div class="hm4-currency-language-wrap same-style-wrap">
                                        <div class="same-style same-style-mrg-3 language-wrap">
                                            <a class="language-dropdown-active">Langauge <i class="icon-arrow-down"></i></a>
                                            <div class="language-dropdown">
                                                <ul>
                                                    <li><a href="{{Url('locale/en')}}">English</a></li>
                                                    <li><a href="{{Url('locale/ar')}}">Arbica</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    @if (Auth::user())
                                    <a style="color:white;" href="{{route('logout')}}"><li>{{__('Logout')}}</a></li>   
                                    @else
                                    <a  style="color:white;"href="{{route('login')}}"><li>{{__('Login')}}</a></li>     
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-bottom">
                    <div class="container-fluid">
                        <div class="border-bottom-6">
                            <div class="row align-items-center">
                                <div class="col-xl-3 col-lg-2">
                                    <div class="logo">
                                        <a href="{{route('home')}}"><img src="{{asset('assets/images/logo/logo.png')}}" alt="logo"></a>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-7">
                                    <div class="main-menu main-menu-padding-1 main-menu-lh-3 main-menu-hm4 main-menu-center">
                                        <nav>
                                            <ul>
                                                <li><a class="active" href="{{route('home')}}">HOME </a>
                                                </li>
                                                <li><a href="{{route('shop')}}">SHOP </a>
                                                    
                                                </li>
                                                <li><a href="#">PAGES </a>
                                                    <ul class="sub-menu-style">
                                                        <li><a href="{{route('about')}}">about us </a></li>
                                                        <li><a href="{{route('cart')}}">cart page</a></li>
                                                        <li><a href="{{route('checkout')}}">checkout </a></li>
                                                        <li><a href="my-account.html">my account</a></li>
                                                        <li><a href="{{route('wishlist')}}">wishlist </a></li>
                                                        <li><a href="compare.html">compare </a></li>
                                                        <li><a href="contact.html">contact us </a></li>
                                                        <li><a href="order-tracking.html">order tracking</a></li>
                                                        <li><a href="{{route('login')}}">login / register </a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="{{route('blog')}}">BLOG </a>
                                                </li>
                                                <li><a href="contact.html">CONTACT </a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3">
                                    <div class="header-action header-action-flex header-action-mrg-right">
                                        <div class="same-style-2 header-search-1">
                                            <a class="search-toggle" href="#">
                                                <i class="icon-magnifier s-open"></i>
                                                <i class="icon_close s-close"></i>
                                            </a>
                                            <div class="search-wrap-1">
                                                <form action="{{route('search')}}" method="POST">
                                                    @csrf
                                                    <input name="search" placeholder="Search products…" type="search">
                                                    <button type="submit" class="button-search"><i class="icon-magnifier"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="same-style-2 same-style-2-font-inc">
                                            <a href="login-register.html"><i class="icon-user"></i></a>
                                        </div>
                                        <div class="same-style-2 same-style-2-font-inc">
                                            <a href="{{route('wishlist')}}" id="showwishlist"><i class="icon-heart"></i><span class="pro-count black"><?= count(Cart::instance('wishlist')->content()) ?></span></a>
                                        </div>
                                        <div class="same-style-2 same-style-2-font-inc header-cart">
                                            <a href="{{route('cart')}}" id="showcount">
                                                <i class="icon-basket-loaded"></i><span class="pro-count black"><?= count(Cart::instance('cart')->content()) ?></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-small-device small-device-ptb-1 border-bottom-2">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-5">
                            <div class="mobile-logo">
                                <a href="{{route('home')}}">
                                    <img alt="" src="{{asset('assets/images/logo/logo.png')}}">
                                </a>
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="header-action header-action-flex">
                                <div class="same-style-2 same-style-2-font-inc">
                                    <a href="login-register.html"><i class="icon-user"></i></a>
                                </div>
                                <div class="same-style-2 same-style-2-font-inc">
                                    <a href="{{route('wishlist')}}"><i class="icon-heart"></i><span class="pro-count black"><?= count(Cart::instance('wishlist')->content()) ?></span></a>
                                </div>
                                <div class="same-style-2 same-style-2-font-inc header-cart">
                                    <a class="cart-active" href="{{route('cart')}}">
                                        <i class="icon-basket-loaded"></i><span class="pro-count black"><?= count(Cart::instance('cart')->content()) ?></span>
                                    </a>
                                </div>
                                <div class="same-style-2 main-menu-icon">
                                    <a class="mobile-header-button-active" href="#"><i class="icon-menu"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- mobile header start -->
        <div class="mobile-header-active mobile-header-wrapper-style">
            <div class="clickalbe-sidebar-wrap">
                <a class="sidebar-close"><i class="icon_close"></i></a>
                <div class="mobile-header-content-area">
                    <div class="mobile-search mobile-header-padding-border-1">
                        <form class="search-form" action="{{route('search')}}" method="POST">
                            @csrf
                            <input type="text" name="search"  placeholder="Search here…">
                            <button class="button-search" type="submit"><i class="icon-magnifier"></i></button>
                        </form>
                    </div>
                    <div class="mobile-menu-wrap mobile-header-padding-border-2">
                        <!-- mobile menu start -->
                        <nav>
                            <ul class="mobile-menu">
                                <li class="menu-item-has-children"><a href="{{route('home')}}">Home</a>
                                </li>
                                <li class="menu-item-has-children "><a href="{{route('shop')}}">shop</a>
                                </li>
                                <li class="menu-item-has-children"><a href="#">Pages</a>
                                    <ul class="dropdown">
                                        <li><a href="{{route('about')}}">about us </a></li>
                                        <li><a href="{{route('cart')}}">cart page</a></li>
                                        <li><a href="{{route('checkout')}}">checkout </a></li>
                                        <li><a href="my-account.html">my account</a></li>
                                        <li><a href="{{route('wishlist')}}">wishlist </a></li>
                                        <li><a href="compare.html">compare </a></li>
                                        <li><a href="contact.html">contact us </a></li>
                                        <li><a href="order-tracking.html">order tracking</a></li>
                                        <li><a href="{{route('login')}}">login / register </a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children "><a href="{{route('blog')}}">Blog</a>
                                </li>
                                <li><a href="contact.html">Contact us</a></li>
                            </ul>
                        </nav>
                        <!-- mobile menu end -->
                    </div>
                    <div class="mobile-header-info-wrap mobile-header-padding-border-3">
                        <div class="single-mobile-header-info">
                            <a href="store-location.html"><i class="lastudioicon-pin-3-2"></i> Store Location </a>
                        </div>
                        <div class="single-mobile-header-info">
                            <a class="mobile-language-active" href="#">Language <span><i class="icon-arrow-down"></i></span></a>
                            <div class="lang-curr-dropdown lang-dropdown-active">
                                <ul>
                                    <li><a href="{{Url('locale/en')}}">English</a></li>
                                    <li><a href="{{Url('locale/ar')}}">Arbica</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="mobile-contact-info mobile-header-padding-border-4">
                        <ul>
                            @if(Auth::user())
                            <li><i class="icon-phone "></i> {{Auth::user()->phone}}</li>
                            
                            @else
                            <li><i class="icon-phone "></i>  0113474748</li>
                            @endif
                            @if (Auth::user())
                            <li><i class="icon-envelope-open "></i> {{Auth::user()->email}}</li> 
                             
                            @else
                            <li><i class="icon-envelope-open "></i> norda@domain.com</li> 
                            @endif
                            @if (Auth::user())
                            <li><i class="icon-home"></i> {{Auth::user()->address}}</li> 
                            
                            @else
                            <li><i class="icon-home"></i> PO Box 1622 Colins Street West Australia</li>  
                            @endif
                            
                        </ul>
                    </div>
                    <div class="mobile-social-icon">
                        <a href="https://twitter.com/login" target="_blank"><i class="icon-social-twitter"></i></a>
                        <a href="https://www.facebook.com/" target="_blank" ><i class="icon-social-facebook"></i></a>
                        <a href="https://www.instagram.com/accounts/login/" target="_blank"><i class="icon-social-instagram"></i></a>
                        <a href="https://www.youtube.com/" target="_blank"><i class="icon-social-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-categories-area product-categories-border pt-50 pb-20">
            <div class="container">
                <div class="product-categories-wrap-2">
                    <div class="single-product-categories-2 mb-30">
                        <div class="product-categories-2-icon">
                            <i class="icon-people"></i>
                        </div>
                        <div class="product-categories-2-content">
                            <h4><a href="shop.html">New Arrival <br>Products</a></h4>
                        </div>
                    </div>
                    <div class="single-product-categories-2 mb-30">
                        <div class="product-categories-2-icon">
                            <i class="icon-fire "></i>
                        </div>
                        <div class="product-categories-2-content">
                            <h4><a href="shop.html">Special Offer <br>Products</a></h4>
                        </div>
                    </div>
                    <div class="single-product-categories-2 mb-30">
                        <div class="product-categories-2-icon">
                            <i class="icon-handbag"></i>
                        </div>
                        <div class="product-categories-2-content">
                            <h4><a href="shop.html">Bags & <br>Accessories</a></h4>
                        </div>
                    </div>
                    <div class="single-product-categories-2 mb-30">
                        <div class="product-categories-2-icon">
                            <i class="icon-people"></i>
                        </div>
                        <div class="product-categories-2-content">
                            <h4><a href="shop.html">Young Clothing <br>& Accessories</a></h4>
                        </div>
                    </div>
                    <div class="single-product-categories-2 mb-30">
                        <div class="product-categories-2-icon">
                            <i class="icon-emotsmile "></i>
                        </div>
                        <div class="product-categories-2-content">
                            <h4><a href="shop.html">Kids & Babies <br>Apparel</a></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       @yield('silder')
        @yield('content')
        
        @yield('bunner')
        @yield('shop')
        
        @yield('blog')
        <div class="brand-logo-area pb-100">
            <div class="container">
                <div class="brand-logo-wrap brand-logo-mrg">
                    @php
                      $barnds = App\Models\Silder::where('staus',2)->paginate('5');  
                    @endphp
                    @foreach($barnds  as $barnd)
                    <div class="single-brand-logo mb-10">
                        <img src="{{asset('admin_panel/img/'.$barnd->image)}}" alt="brand-logo">
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="instagram-area">
            <div class="container-fluid p-0">
                <div class="instagram-wrap">
                    <div class="instagram-carousel-2 instagram-style-2" id="instagramFeedOne">
                    </div>
                </div>
            </div>
        </div>
        <div class="subscribe-area pt-115 pb-115">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-5">
                        <div class="section-title">
                            <h2>keep connected</h2>
                            <p>Get updates by subscribe our weekly newsletter</p>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div id="mc_embed_signup" class="subscribe-form">
                            <form id="mc-embedded-subscribe-form" class="validate subscribe-form-style" novalidate="" target="_blank" name="mc-embedded-subscribe-form" method="post" action="http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef">
                                <div id="mc_embed_signup_scroll" class="mc-form">
                                    <input class="email" type="email" required="" placeholder="Enter your email address" name="EMAIL" value="">
                                    <div class="mc-news" aria-hidden="true">
                                        <input type="text" value="" tabindex="-1" name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef">
                                    </div>
                                    <div class="clear">
                                        <input id="mc-embedded-subscribe" class="button" type="submit" name="subscribe" value="Subscribe">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer-area pb-65">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="contact-info-wrap">
                            <div class="footer-logo">
                                <a href="#"><img src="assets/images/logo/logo.png" alt="logo"></a>
                            </div>
                            <div class="single-contact-info">
                                <span>Our Location</span>
                                <p>869 General Village Apt. 645, Moorebury, USA</p>
                            </div>
                            <div class="single-contact-info">
                                <span>24/7 hotline:</span>
                                <p>(+99) 052 128 2399</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="footer-right-wrap">
                            <div class="footer-menu">
                                <nav>
                                    <ul>
                                        <li><a href="{{route('home')}}">home</a></li>
                                        <li><a href="{{route('shop')}}">Shop</a></li>
                                        <li><a href="{{route('contact')}}">Contact</a></li>
                                        <li><a href="{{route('blog')}}">Blog.</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="social-style-2 social-style-2-hover-black social-style-2-mrg">
                                <a href="https://twitter.com/login" target="_blank"><i class="social_twitter"></i></a>
                                <a href="https://www.facebook.com/" target="_blank"><i class="social_facebook"></i></a>
                                <a href="https://www.instagram.com/accounts/login/" target="_blank"><i class="social_instagram"></i></a>
                                <a href="https://www.youtube.com/" target="_blank"><i class="social_youtube"></i></a>
                            </div>
                            <div class="copyright">
                                <p>Copyright © 2020 HasThemes | <a href="https://hasthemes.com/">Built with <span>Norda</span> by HasThemes</a>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- All JS is here
============================================ -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script src="{{asset('assets/js/vendor/modernizr-3.6.0.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/jquery-migrate-3.3.0.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/slick.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery.syotimer.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery.instagramfeed.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/wow.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery-ui-touch-punch.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery-ui.js')}}"></script>
    <script src="{{asset('assets/js/plugins/magnific-popup.js')}}"></script>
    <script src="{{asset('assets/js/plugins/sticky-sidebar.js')}}"></script>
    <script src="{{asset('assets/js/plugins/easyzoom.js')}}"></script>
    <script src="{{asset('assets/js/plugins/scrollup.js')}}"></script>
    <script src="{{asset('assets/js/plugins/ajax-mail.js')}}"></script>

    <!-- Use the minified version files listed below for better performance and remove the files listed above  
<script src="assets/js/vendor/vendor.min.js"></script>
<script src="assets/js/plugins/plugins.min.js"></script>  -->
    <!-- Main JS -->
    <script src="{{asset('assets/js/main.js')}}"></script>
    @livewireScripts
</body>

</html>