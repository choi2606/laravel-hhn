<!DOCTYPE html>
<html lang="en">

<head>
    @yield('title')
    <title>SHOP BEST GOOD</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('library.client.head')
    @yield('css')
    <style>
        div.search-result {
            position: absolute;
            top: 55px;
            display: block;
            background-color: #fff;
            box-shadow:
                rgba(0, 0, 0, 0.07) 0px 1px 1px,
                rgba(0, 0, 0, 0.07) 0px 2px 2px,
                rgba(0, 0, 0, 0.07) 0px 4px 4px,
                rgba(0, 0, 0, 0.07) 0px 8px 8px,
                rgba(0, 0, 0, 0.07) 0px 16px 16px;
            border-top: none;
            border-radius: 0px 0px 10px 5px;
            width: 30%;
        }
    </style>
</head>

<body class="goto-here">
    @include('layouts.header')
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar ftco-navbar-light" id="ftco-navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">shop best goods</a>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item {{ Route::is('index.client') ? 'active' : '' }}"><a href="{{ url('/') }}"
                            class="nav-link">trang chủ</a></li>
                    <li class="nav-item {{ Route::is('shop') ? 'active' : '' }}"><a href="{{ url('shop') }}"
                            class="nav-link">Mua sắm</a></li>
                    <li class="nav-item {{ Route::is('about') ? 'active' : '' }}"><a href="{{ url('about') }}"
                            class="nav-link">giới thiệu</a></li>
                    <li class="nav-item {{ Route::is('blog') ? 'active' : '' }}"><a href="{{ url('blog') }}"
                            class="nav-link">diễn đàn</a></li>
                    <li class="nav-item {{ Route::is('contact') ? 'active' : '' }}"><a href="{{ url('contact') }}"
                            class="nav-link">địa chỉ</a></li>
                    <li class="nav-item cta cta-colored"><a href="{{ url('cart') }}" class="nav-link">
                            <span class="icon-shopping_cart">
                            </span>
                            [{{ count((array) session('cart')) }}]</a>
                    </li>
                </ul>
            </div>

            <div class="user-grap" id="users-nav">
                <div class="header-left" style="display: -webkit-inline-box;">
                    <div class="form-inline" style="display: block;">
                        <form class="search-form" style="display: block">
                            <input class="form-control form-control-sm search mr-sm-2 rounded-pill searchProduct"
                                type="text" placeholder="Bạn cần gì?.." aria-label="Search">
                            <button class="search-trigger"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>

                <div class="search-result col-lg-9 pr-5">
                </div>
                @if (Auth::check())
                    <div class="user-area dropdown dropdown-user float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            {{ Auth::user()->username }}
                        </a>
                        <div class="user-menu dropdown-menu">
                            @if (Auth::user()->role == 1)
                                <a class="nav-link" href="{{ route('admin.index') }}"><i
                                        class="fa fa-cogs icon-user"></i>Admin</a>
                            @endif
                            <a class="nav-link" href="order"><i class="fa fa-book icon-user"></i>Đơn hàng</a>
                            <a class="nav-link" href="{{ url('logout') }}"><i
                                    class="fa fa-sign-out icon-user"></i>Logout</a>
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

    @include('library.client.script')
    @yield('js')
    <script>
        function toastSuccess(message) {
            Swal.fire({
                text: message,
                position: "top-right",
                icon: "success",
                timer: 3000,
                showConfirmButton: false,
                backdrop: false,
                showCloseButton: true,
                customClass: {
                    container: "swal2-container swal2-top-end",
                    popup: "swal2-popup swal2-toast swal2-icon-success swal2-show",
                    title: "swal2-title",
                    closeButton: "swal2-close",
                    icon: "swal2-icon swal2-success swal2-icon-show",
                },
            });
        }

        function toastError(message) {
            Swal.fire({
                text: message,
                position: "top-right",
                icon: "error",
                timer: 3000,
                showConfirmButton: false,
                backdrop: false,
                showCloseButton: true,
                customClass: {
                    container: "swal2-container swal2-top-end",
                    popup: "swal2-popup swal2-toast swal2-icon-error swal2-show",
                    title: "swal2-title",
                    closeButton: "swal2-close",
                    icon: "swal2-icon swal2-error swal2-icon-show",
                },
            });
        }

        $.put = function(url, data, successCallback, errorCallback, datatype) {
            return $.ajax({
                    url: url,
                    type: 'PUT',
                    data: data,
                    dataType: datatype,
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    }
                })
                .done(successCallback)
                .fail(errorCallback);
        }

        $.post = function(url, data, successCallback, errorCallback, datatype) {
            return $.ajax({
                    url: url,
                    type: 'POST',
                    data: data,
                    dataType: datatype,
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    }

                })
                .done(successCallback)
                .fail(errorCallback)
        }

        $('.user-area').on('focus', function(event) {
            $(this).addClass('show');
            $('.user-menu').addClass('show');
        })

        var botmanWidget = {
            introMessage: 'Xin chào, Tôi là Chatbot!',
            chatServer: 'http://127.0.0.1:8000/api/botman',
            title: 'Shop best goods',
            frameEndpoint: 'http://127.0.0.1:8000/botman/chat',
            bubbleAvatarUrl: '',
            mainColor: '#456765',
            aboutText: '',
            desktopHeight: 400,
            desktopWidth: 300,
            placeholderText: 'Send a message...',
            displayMessageTime: true,
        }

        // function searchAjax() {
        $('.searchProduct').on('keyup', function(e) {
            var data = {
                value: e.target.value,
            }
            if (e.target.value == '') {
                $('.search-result').empty();
            } else {
                $.get('search-ajax-product', data)
                    .done(function(data) {
                        $('.search-result').empty();
                        $.each(data, function(index, item) {
                            $('.search-result').append(
                                `<div class="media mb-2">
                                        <a href="product-detail${item.product_id}" class="pull-left">
                                            <img src="./client/images/product/${item.image_url}" width="50" alt="" class="media-object">
                                        </a>
                                        <div class="media-body ml-2">
                                            <h6 class="media-heading">${item.name}</h6>
                                        </div>
                                    </div>
                                </div>`
                            );

                        })
                    })
                    .fail(function(data) {})
            }

        })
        // }
    </script>
</body>

</html>
