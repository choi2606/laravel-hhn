<!DOCTYPE html>
<html lang="en">

<head>
    <title>SHOP BEST GOOD</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('client/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('client/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('client/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('client/css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('client/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/jquery.timepicker.css') }}">


    <link rel="stylesheet" href="{{ asset('client/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/style.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">

</head>

<body class="goto-here">
    <div class="py-1 bg-primary">
        <div class="container-fluid">
            <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
                <div class="col-lg-12 d-block">
                    <div class="row d-flex">
                        <div class="col-md d-flex topper align-items-center">
                            <div class="icon mr-2 d-flex justify-content-center align-items-center"><span
                                    class="icon-phone2"></span></div>
                            <span class="text">+8438999999</span>
                        </div>
                        <div class="col-md d-flex topper align-items-center">
                            <div class="icon mr-2 d-flex justify-content-center align-items-center"><span
                                    class="icon-paper-plane"></span></div>
                            <span class="text">nxhung.20it1@vku.udn.vn</span>
                        </div>
                        <div class="col-md d-flex topper align-items-center text-lg-right">
                            <span class="text">GIAO HÀNG 3-5 NGÀY LÀM VIỆC &amp; TRẢ HÀNG MIỄN PHÍ </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar ftco-navbar-light" id="ftco-navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">shop best goods</a>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="{{ url('/') }}" class="nav-link">trang chủ</a></li>
                    <li class="nav-item dropdown dropdown-shopping">
                        <a class="nav-link shopping" href="#" id="dropdown04" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">Mua sắm</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04">
                            <a class="dropdown-item" href="{{ url('shop1') }}">Mua sắm</a>
                            <a class="dropdown-item" href="{{ url('cart') }}">Giỏ hàng</a>
                            <a class="dropdown-item" href="{{ url('checkout') }}">Thủ tục thanh toán</a>
                        </div>
                    </li>
                    <li class="nav-item"><a href="{{ url('about') }}" class="nav-link">giới thiệu</a></li>
                    <li class="nav-item"><a href="{{ url('blog') }}" class="nav-link">diễn đàn</a></li>
                    <li class="nav-item"><a href="{{ url('contact') }}" class="nav-link">địa chỉ</a></li>
                </ul>
            </div>

            <div class="user-grap" id="users-nav">
                <div class="header-left" style="display: -webkit-inline-box;">
                    <button class="search-trigger-out" style="display: block;"><i class="fa fa-search"></i></button>
                    <div class="form-inline" style="display: block;">
                        <form class="search-form" style="display: none">
                            <input class="form-control form-control-sm search mr-sm-2 rounded-pill" type="text"
                                placeholder="Search ..." aria-label="Search">
                            <button class="search-trigger"><i class="fa fa-search"></i></button>
                            <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                        </form>
                    </div>
                </div>

                @if(Auth::check())
                    <div class="user-area dropdown dropdown-user float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="{{ asset('client/images/6.jpg') }}"
                                alt="User Avatar">
                        </a>
                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#"><i class="fa fa-user icon-user"></i>My Profile</a>

                            <a class="nav-link" href="{{ url('logout') }}"><i
                                    class="fa fa-power-off icon-user"></i>Logout</a>
                        </div>
                    </div>
                @else
                    <a href="{{ url('login') }}"><button class="btn btn-primary" type="submit">Đăng
                            Nhập</button></a>
                @endif
            </div>
        </div>
    </nav>
    <!-- END nav -->

    @yield('content')


    <footer class="ftco-footer ftco-section">
        <div class="container">
            <div class="row">
                <div class="mouse">
                    <a href="#" class="mouse-icon">
                        <div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
                    </a>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Shop best goods</h2>
                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                            <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4 ml-md-5">
                        <h2 class="ftco-heading-2">Thực đơn</h2>
                        <ul class="list-unstyled">
                            <li><a href="#" class="py-2 d-block">Cửa hàng</a></li>
                            <li><a href="#" class="py-2 d-block">Giới thiệu</a></li>
                            <li><a href="#" class="py-2 d-block">Diễn đàn</a></li>
                            <li><a href="#" class="py-2 d-block">Địa chỉ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Hỗ trợ</h2>
                        <div class="d-flex">
                            <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
                                <li><a href="#" class="py-2 d-block">Thông tin vận chuyển
                                    </a></li>
                                <li><a href="#" class="py-2 d-block">Điều khoản &amp;điều kiện </a></li>
                                <li><a href="#" class="py-2 d-block">Trả hàng &amp; Trao đổi</a></li>
                                <li><a href="#" class="py-2 d-block">Chính sách bảo mật</a></li>
                            </ul>
                            <ul class="list-unstyled">
                                <li><a href="#" class="py-2 d-block">Câu hỏi thường gặp
                                    </a></li>
                                <li><a href="#" class="py-2 d-block">Địa chỉ</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <div class="block-23 mb-3">
                            <ul>
                                <li><span class="icon icon-map-marker"></span><span class="text">470 Đường Trần Đại
                                        Nghĩa, Hoà Hải, Ngũ Hành Sơn, Đà Nẵng 550000</span></li>
                                <li><a href="#"><span class="icon icon-phone"></span><span
                                            class="text">+8438999999</span></a></li>
                                <li><a href="#"><span class="icon icon-envelope"></span><span
                                            class="text">vku@.com.vn</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">

                    <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <!-- Copyright &copy;<script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> -->
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </footer>



    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke-miterlimit="10" stroke="#F96D00" />
        </svg></div>


    <script src="{{ asset('client/js/jquery.min.js') }}"></script>
    <script src="{{ asset('client/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('client/js/popper.min.js') }}"></script>
    <script src="{{ asset('client/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('client/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('client/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('client/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('client/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('client/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('client/js/aos.js') }}"></script>
    <script src="{{ asset('client/js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('client/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('client/js/scrollax.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="{{ asset('client/js/google-map.js') }}"></script>
    <script src="{{ asset('client/js/main.js') }}"></script>


    </script>
</body>

</html>
