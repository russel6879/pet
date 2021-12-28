<!doctype html>
<html class="no-js" lang="zxx">
    
<!-- Mirrored from template.hasthemes.com/marten/marten/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Dec 2021 08:34:21 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Marten - Pet Donete</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
		
		<!-- all css here -->
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/simple-line-icons.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/themify-icons.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/slick.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/meanmenu.min.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css')}}">
        <script src="{{ asset('frontend/assets/js/vendor/modernizr-3.11.7.min.js')}}"></script>
      
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"  crossorigin="anonymous"/>
     
    </head>
    <body>
        
        <div id="app">
        <header class="header-area">
           
            <div class="header-bottom transparent-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-5">
                            <div class="logo pt-39">
                                <a href="index.html"><img alt="" src="{{ asset('frontend/assets/img/logo/logo.png')}}"></a>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-7 d-none d-lg-block relative">
                            <div class="main-menu text-center">
                                <nav>
                                    <ul>
                                        <li><a href="{{ route('home') }}"><i class="fas fa-home" style="font-size: 25px;"></i></a>
                                          
                                        </li>
                                      
                                     
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-8 col-sm-8 col-7 relative">
                            <div class="search-login-cart-wrapper">
                                
                                @if(Auth::user())
                             
                                <div class="dropdown show">
  <a  href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  <a href="login-register.html" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-user icons"></i>&nbsp;{{Auth::user()->name}}</a>
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <li class="dropdown-item" > <router-link
              style="text-decoration: none; color: inherit"
              to="/add"
              class="card-title"
            ><i class="fas fa-plus-circle"></i>&nbsp;Add Post</router-link>
</li>
    <li class="dropdown-item"> <router-link
              style="text-decoration: none; color: inherit"
              to="/myPost"
              class="card-title"
            ><i class="fas fa-paste"></i>&nbsp;My Post</router-link>
</li>
    <a class="dropdown-item" href="#"> <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                 </a>
   
  </div>
</div>
                                @else
                                <div class="header-login same-style">
                                    <a href="login-register.html " data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-user icons"></i></a>
                                </div>
     
                     @endif
                               
                            </div>
                        </div>
                        <div class="mobile-menu-area electro-menu d-md-block col-md-12 col-lg-12 col-12 d-lg-none d-xl-none">
                            <div class="mobile-menu">
                                <nav id="mobile-menu-active">
                                    <ul class="menu-overflow">
                                        <li><a href="{{ route('home') }}">HOME</a>
                                           
                                        </li>
                                      
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
     
        <div class="slider-area" v-if="!$route.meta.hideDashboard">
            <div class="slider-active owl-dot-style owl-carousel">
                <div class="single-slider pt-100 pb-100 yellow-bg">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12 col-sm-7">
                                <div class="slider-content slider-animated-1 pt-114">
                                    <h3 class="animated">You Pet deserves more Care</h3>
                                    <h1 class="animated">Love, Treat, care your Pet</h1>
                                    <div class="slider-btn">
                                     
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 col-sm-5">
                                <div class="slider-single-img slider-animated-1">
                                    <img class="animated" src="{{ asset('frontend/assets/img/slider/slider-single-img.png')}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-slider pt-100 pb-100 yellow-bg">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-7 col-12">
                                <div class="slider-content slider-animated-1 pt-114">
                                    <h3 class="animated">We keep pets for pleasure.</h3>
                                    <h1 class="animated">Making your Pet Happier</h1>
                                    <div class="slider-btn">
                                   
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-5 col-12">
                                <div class="slider-single-img slider-animated-1">
                                    <img class="animated" src="{{ asset('frontend/assets/img/slider/slider-single-img-2.png')}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <router-view></router-view>
        <span  v-if="!$route.meta.hideDashboard">
        <index></index>
</span>

        <!-- <div class="food-category food-category-col pt-100 pb-60">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="single-food-category cate-padding-1 text-center mb-30">
                            <div class="single-food-hover-2">
                                <img src="assets/img/product/product-1.jpg" alt="">
                            </div>
                            <div class="single-food-content">
                                <h3>Dogs Food</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="single-food-category cate-padding-2 text-center mb-30">
                            <div class="single-food-hover-2">
                                <img src="{{ asset('frontend/assets/img/product/product-2.jpg')}}" alt="">
                            </div>
                            <div class="single-food-content">
                                <h3>Cats Food</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="single-food-category cate-padding-3 text-center mb-30">
                            <div class="single-food-hover-2">
                                <img src="{{ asset('frontend/assets/img/product/product-3.jpg')}}" alt="">
                            </div>
                            <div class="single-food-content">
                                <h3>Fishs Food</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-area pt-95 pb-70 gray-bg">
            <div class="container">
                <div class="section-title text-center mb-55">
                    <h4>Most Populer</h4>
                    <h2>Recent Products</h2>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                        <div class="product-wrapper mb-10">
                            <div class="product-img">
                                <a href="product-details.html">
                                    <img src="{{ asset('frontend/assets/img/product/product-4.jpg')}}" alt="">
                                </a>
                                <div class="product-action">
                                    <a title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#">
                                        <i class="ti-plus"></i>
                                    </a>
                                    <a title="Add To Cart" href="#">
                                        <i class="ti-shopping-cart"></i>
                                    </a>
                                </div>
                                <div class="product-action-wishlist">
                                    <a title="Wishlist" href="#">
                                        <i class="ti-heart"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="product-content">
                                <h4><a href="product-details.html">Dog Calcium Food</a></h4>
                                <div class="product-price">
                                    <span class="new">$20.00 </span>
                                    <span class="old">$50.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                        <div class="product-wrapper mb-10">
                            <div class="product-img">
                                <a href="product-details.html">
                                    <img src="{{ asset('frontend/assets/img/product/product-5.jpg')}}" alt="">
                                </a>
                                <div class="product-action">
                                    <a title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#">
                                        <i class="ti-plus"></i>
                                    </a>
                                    <a title="Add To Cart" href="#">
                                        <i class="ti-shopping-cart"></i>
                                    </a>
                                </div>
                                <div class="product-action-wishlist">
                                    <a title="Wishlist" href="#">
                                        <i class="ti-heart"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="product-content">
                                <h4><a href="product-details.html">Cat Buffalo Food</a></h4>
                                <div class="product-price">
                                    <span class="new">$22.00 </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                        <div class="product-wrapper mb-10">
                            <div class="product-img">
                                <a href="product-details.html">
                                    <img src="{{ asset('frontend/assets/img/product/product-6.jpg')}}" alt="">
                                </a>
                                <div class="product-action">
                                    <a title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#">
                                        <i class="ti-plus"></i>
                                    </a>
                                    <a title="Add To Cart" href="#">
                                        <i class="ti-shopping-cart"></i>
                                    </a>
                                </div>
                                <div class="product-action-wishlist">
                                    <a title="Wishlist" href="#">
                                        <i class="ti-heart"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="product-content">
                                <h4><a href="product-details.html">Legacy Dog Food</a></h4>
                                <div class="product-price">
                                    <span class="new">$50.00 </span>
                                    <span class="old">$70.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                        <div class="product-wrapper mb-10">
                            <div class="product-img">
                                <a href="product-details.html">
                                    <img src="{{ asset('frontend/assets/img/product/product-7.jpg')}}" alt="">
                                </a>
                                <div class="product-action">
                                    <a title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#">
                                        <i class="ti-plus"></i>
                                    </a>
                                    <a title="Add To Cart" href="#">
                                        <i class="ti-shopping-cart"></i>
                                    </a>
                                </div>
                                <div class="product-action-wishlist">
                                    <a title="Wishlist" href="#">
                                        <i class="ti-heart"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="product-content">
                                <h4><a href="product-details.html">Chicken Dry Cat Food</a></h4>
                                <div class="product-price">
                                    <span class="new">$60.00 </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                        <div class="product-wrapper mb-10">
                            <div class="product-img">
                                <a href="product-details.html">
                                    <img src="{{ asset('frontend/assets/img/product/product-8.jpg')}}" alt="">
                                </a>
                                <div class="product-action">
                                    <a title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#">
                                        <i class="ti-plus"></i>
                                    </a>
                                    <a title="Add To Cart" href="#">
                                        <i class="ti-shopping-cart"></i>
                                    </a>
                                </div>
                                <div class="product-action-wishlist">
                                    <a title="Wishlist" href="#">
                                        <i class="ti-heart"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="product-content">
                                <h4><a href="product-details.html">Stomach Dog Food</a></h4>
                                <div class="product-price">
                                    <span class="new">$70.00 </span>
                                    <span class="old">$90.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                        <div class="product-wrapper mb-10">
                            <div class="product-img">
                                <a href="product-details.html">
                                    <img src="{{ asset('frontend/assets/img/product/product-9.jpg')}}" alt="">
                                </a>
                                <div class="product-action">
                                    <a title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#">
                                        <i class="ti-plus"></i>
                                    </a>
                                    <a title="Add To Cart" href="#">
                                        <i class="ti-shopping-cart"></i>
                                    </a>
                                </div>
                                <div class="product-action-wishlist">
                                    <a title="Wishlist" href="#">
                                        <i class="ti-heart"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="product-content">
                                <h4><a href="product-details.html">Nourish Puppy Food</a></h4>
                                <div class="product-price">
                                    <span class="new">$80.00 </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                        <div class="product-wrapper mb-10">
                            <div class="product-img">
                                <a href="product-details.html">
                                    <img src="{{ asset('frontend/assets/img/product/product-10.jpg')}}" alt="">
                                </a>
                                <div class="product-action">
                                    <a title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#">
                                        <i class="ti-plus"></i>
                                    </a>
                                    <a title="Add To Cart" href="#">
                                        <i class="ti-shopping-cart"></i>
                                    </a>
                                </div>
                                <div class="product-action-wishlist">
                                    <a title="Wishlist" href="#">
                                        <i class="ti-heart"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="product-content">
                                <h4><a href="product-details.html">Tarpaulin Dog Food</a></h4>
                                <div class="product-price">
                                    <span class="new">$10.00 </span>
                                    <span class="old">$30.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                        <div class="product-wrapper mb-10">
                            <div class="product-img">
                                <a href="product-details.html">
                                    <img src="{{ asset('frontend/assets/img/product/product-11.jpg')}}" alt="">
                                </a>
                                <div class="product-action">
                                    <a title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#">
                                        <i class="ti-plus"></i>
                                    </a>
                                    <a title="Add To Cart" href="#">
                                        <i class="ti-shopping-cart"></i>
                                    </a>
                                </div>
                                <div class="product-action-wishlist">
                                    <a title="Wishlist" href="#">
                                        <i class="ti-heart"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="product-content">
                                <h4><a href="product-details.html">Dog Calcium Food</a></h4>
                                <div class="product-price">
                                    <span class="new">$22.00 </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="deal-area bg-img pt-95 pb-100">
            <div class="container">
                <div class="section-title text-center mb-50">
                    <h4>Best Product</h4>
                    <h2>Deal of the Week</h2>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="deal-img wow fadeInLeft">
                            <a href="#"><img src="{{ asset('frontend/assets/img/banner/banner-2.png')}}" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="deal-content">
                            <h3><a href="#">Name Your Product</a></h3>
                            <div class="deal-pro-price">
                                <span class="deal-old-price">$16.00 </span>
                                <span> $10.00</span>
                            </div>
                            <p>Lorem ipsum dolor sit amet, co adipisicing elit, sed do eiusmod tempor incididunt labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercita ullamco laboris nisi ut aliquip ex ea commodo </p>
                            <div class="timer timer-style">
                                <div data-countdown="2022/10/01"></div>
                            </div>
                            <div class="discount-btn mt-35">
                                <a class="btn-style" href="#">SHOP NOW</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<div class="testimonial-area pt-90 pb-70 bg-img" style="background-image:url(assets/img/banner/banner-1.jpg);">
		    <div class="container">
                <div class="row">
                    <div class="col-lg-10 ms-auto me-auto">
                        <div class="testimonial-wrap">
                            <div class="testimonial-text-slider text-center">
                                <div class="sin-testiText">
                                    <p>Lorem ipsum dolor sit amet, co adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercita ullamco laboris nisi ut aliquip ex ea commodo</p>
                                </div>
                                <div class="sin-testiText">
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or amro porano ja cai tomi tai go amro porano  amro porano ja cai tomi tai go  .... </p>
                                </div>
                                <div class="sin-testiText">
                                    <p>Lorem ipsum dolor sit amet, co adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercita ullamco laboris nisi ut aliquip ex ea commodo</p>
                                </div>
                                <div class="sin-testiText">
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or amro porano ja cai tomi tai go amro porano  amro porano ja cai tomi tai go  .... </p>
                                </div>
                            </div>
                            <div class="testimonial-image-slider text-center">
                                <div class="sin-testiImage">
                                    <img src="{{ asset('frontend/assets/img/testi/3.jpg')}}" alt="">
                                    <h3>Robiul Islam</h3>
                                    <h5>Customer</h5>
                                </div>
                                <div class="sin-testiImage">
                                    <img src="{{ asset('frontend/assets/img/testi/4.jpg')}}" alt="">
                                    <h3>Robiul Islam</h3>
                                    <h5>Customer</h5>
                                </div>
                                <div class="sin-testiImage">
                                    <img src="{{ asset('frontend/assets/img/testi/3.jpg')}}" alt="">
                                    <h3>F. H. Shuvo</h3>
                                    <h5>Developer</h5>
                                </div>
                                <div class="sin-testiImage">
                                    <img src="{{ asset('frontend/assets/img/testi/5.jpg')}}" alt="">
                                    <h3>T. T. Rayed</h3>
                                    <h5>CEO</h5>
                                </div>
                            </div>
                            <div class="testimonial-shap">
                                <img src="{{ asset('frontend/assets/img/icon-img/testi-shap.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</div>
		<div class="service-area bg-img pt-100 pb-65">
		    <div class="container">
		        <div class="row">
		            <div class="col-lg-4 col-md-4">
		                <div class="service-content text-center mb-30 service-color-1">
		                    <img src="{{ asset('frontend/assets/img/icon-img/shipping.png')}}" alt="">
		                    <h4>FREE SHIPPING</h4>
		                    <p>Free shipping on all order </p>
		                </div>
		            </div>
		            <div class="col-lg-4 col-md-4">
		                <div class="service-content text-center mb-30 service-color-2">
		                    <img src="{{ asset('frontend/assets/img/icon-img/support.png')}}" alt="">
		                    <h4>ONLINE SUPPORT</h4>
		                    <p>Online support 24 hours a day</p>
		                </div>
		            </div>
		            <div class="col-lg-4 col-md-4">
		                <div class="service-content text-center mb-30 service-color-3">
		                    <img src="{{ asset('frontend/assets/img/icon-img/money.png')}}" alt="">
		                    <h4>MONEY RETURN</h4>
		                    <p>Back guarantee under 5 days</p>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
		<div class="blog-area pb-70">
		    <div class="container">
		        <div class="section-title text-center mb-60">
                    <h4>Latest News</h4>
                    <h2>From Our Blog</h2>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-wrapper mb-30 gray-bg">
                            <div class="blog-img hover-effect">
                                <a href="blog-details.html"><img alt="" src="{{ asset('frontend/assets/img/blog/blog-1.jpg')}}"></a>
                            </div>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <ul>
                                        <li>By: <span>Admin</span></li>
                                        <li>Sep 14, 2018</li>
                                    </ul>
                                </div>
                                <h4><a href="blog-details.html">Lorem ipsum dolor amet cons adipisicing elit</a></h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-wrapper mb-30 gray-bg">
                            <div class="blog-img hover-effect">
                                <a href="blog-details.html"><img alt="" src="{{ asset('frontend/assets/img/blog/blog-2.jpg')}}"></a>
                            </div>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <ul>
                                        <li>By: <span>Admin</span></li>
                                        <li>Sep 14, 2018</li>
                                    </ul>
                                </div>
                                <h4><a href="blog-details.html">Lorem ipsum dolor amet cons adipisicing elit</a></h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-wrapper mb-30 gray-bg">
                            <div class="blog-img hover-effect">
                                <a href="blog-details.html"><img alt="" src="{{ asset('frontend/assets/img/blog/blog-3.jpg')}}"></a>
                            </div>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <ul>
                                        <li>By: <span>Admin</span></li>
                                        <li>Sep 14, 2018</li>
                                    </ul>
                                </div>
                                <h4><a href="blog-details.html">Lorem ipsum dolor amet cons adipisicing elit</a></h4>
                            </div>
                        </div>
                    </div>
                </div>
		    </div>
		</div> -->
		<footer class="footer-area">
         
            <div class="footer-bottom gray-bg-3 pt-17 pb-15">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="copyright text-center">
                                <p>Copyright © <a href="#">Marten.</a> All Right Reserved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</footer>
		<!-- modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span class="ti-close" aria-hidden="true"></span>
            </button>
            <div class="modal-dialog" role="document">
                <div class="modal-content ">
                    <div class="modal-body mx-auto">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('register') }}">
                                    New member?{{ __('Register') }} Here
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
		
		<!-- all js here -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/vendor/jquery-v1.12.4.min.js')}}"></script>
        <script src="{{ asset('frontend/assets/js/popper.js')}}"></script>
        <script src="{{ asset('frontend/assets/js/bootstrap.min.js')}}"></script>
        <script src="{{ asset('frontend/assets/js/jquery.counterup.min.js')}}"></script>
        <script src="{{ asset('frontend/assets/js/waypoints.min.js')}}"></script>
        <script src="{{ asset('frontend/assets/js/elevetezoom.js')}}"></script>
        <script src="{{ asset('frontend/assets/js/ajax-mail.js')}}"></script>
        <script src="{{ asset('frontend/assets/js/owl.carousel.min.js')}}"></script>
        <script src="{{ asset('frontend/assets/js/plugins.js')}}"></script>
        <script src="{{ asset('frontend/assets/js/main.js')}}"></script>
        

    </body>

<!-- Mirrored from template.hasthemes.com/marten/marten/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Dec 2021 08:34:43 GMT -->
</html>
