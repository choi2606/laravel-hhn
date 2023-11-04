@extends('layouts.client')
@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

    {{-- <link rel="stylesheet" href="{{ asset('owner/assets/css/style.css') }}"> --}}
    <style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            list-style: none;
            font-family: 'Montserrat', sans-serif
        }

        .bg-primary {
            background: #82ae46 !important;
        }

        a {
            color: #82ae46;
        }

        .user-dropdown:hover {
            color: 000000;
        }

        .navbar-dark .navbar-brand:focus,
        .navbar-dark .navbar-brand:hover {
            color: #000;
        }

        .card2.box12 {
            width: 350px;
            height: 500px;
            background-color: #82ae46 !important;
            color: #ebf2ec;
            border-radius: 0;
        }


        .container-fluid {
            width: 100%;
            padding: 0 50px;
            margin-right: auto;
            margin-left: auto;
        }

        .no-gutters {
            margin-right: 0;
            margin-left: 0;
        }

        .no-gutters>.col,
        .no-gutters>[class*="col-"] {
            padding-right: 0;
            padding-left: 0;
        }

        .d-block {
            display: block !important;
        }

        .row {
            flex-wrap: wrap;
            margin-right: -15px;
            margin-left: -15px;
        }

        .ftco-navbar-light {
            background: transparent !important;
            z-index: 3;
            padding: 0;
        }

        .navbar {
            position: relative;
            display: flex;
            -webkit-box-align: center;
            text-align: center;
        }


        .ftco-navbar-light .navbar-brand {
            color: #82ae46;
        }

        .navbar-brand {
            font-weight: 800;
            font-size: 20px;
            text-transform: uppercase;
        }

        .navbar-brand {
            display: inline-block;
            padding-top: 0.3125rem;
            padding-bottom: 0.3125rem;
            margin-right: 1rem;
            font-size: 1.25rem;
            line-height: inherit;
            white-space: nowrap;
        }

        a {
            text-decoration: none;
            background-color: transparent;
            transition: .3s all ease;
        }

        .navbar-collapse {
            -ms-flex-preferred-size: 100%;
            flex-basis: 100%;
            -webkit-box-flex: 1;
            -ms-flex-positive: 1;
            /* flex-grow: 1; */
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
        }


        .container2 {
            margin: 20px auto;
            width: 800px;
            padding: 30px
        }

        .card2.box2 {
            width: 450px;
            height: 580px;
            background-color: #ffffff;
            border-radius: 0
        }

        .box2 .btn.btn-primary.bar {
            width: 20px;
            background-color: transparent;
            border: none;
            color: #82ae46
        }

        .box2 .btn.btn-primary.bar:hover {
            color: #baf0c3
        }

        .box12 .btn.btn-primary {
            background-color: #9ecd5e;
            width: 45px;
            height: 45px;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid #ddd
        }

        .box12 .btn.btn-primary:hover {
            background-color: #f6f8f7;
            color: #82ae46;
        }

        .btn.btn-success {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #ddd;
            color: black;
            display: flex;
            justify-content: center;
            align-items: center;
            border: none
        }

        .nav.nav-tabs {
            border: none;
            border-bottom: 2px solid #ddd
        }

        .nav.nav-tabs .nav-item .nav-link {
            border: none;
            color: black;
            border-bottom: 2px solid transparent;
            font-size: 14px
        }

        .nav.nav-tabs .nav-item .nav-link:hover {
            border-bottom: 2px solid #82ae46;
            color: #82ae46
        }

        .nav.nav-tabs .nav-item .nav-link.active {
            border: none;
            border-bottom: 2px solid #82ae46
        }

        .form-control {
            border: none;
            border-bottom: 1px solid #ddd;
            box-shadow: none;
            height: 20px;
            font-weight: 600;
            font-size: 14px;
            padding: 15px 0px;
            letter-spacing: 1.5px;
            border-radius: 0
        }

        .inputWithIcon {
            position: relative
        }

        img {
            width: 50px;
            height: 45px;
            object-fit: cover
        }

        .inputWithIcon span {
            position: absolute;
            right: 0px;
            bottom: 9px;
            color: #57c97d;
            cursor: pointer;
            transition: 0.3s;
            font-size: 14px
        }

        .form-control:focus {
            box-shadow: none;
            border-bottom: 1px solid #ddd
        }

        .btn-outline-primary {
            color: black;
            background-color: #ddd;
            border: 1px solid #ddd
        }

        .btn-outline-primary:hover {
            background-color: #82ae46;
            border: 1px solid #ddd
        }

        .btn-check:active+.btn-outline-primary,
        .btn-check:checked+.btn-outline-primary,
        .btn-outline-primary.active,
        .btn-outline-primary.dropdown-toggle.show,
        .btn-outline-primary:active {
            color: #fff;
            background-color: #82ae46;
            box-shadow: none;
            border: 1px solid #ddd
        }

        .btn-group>.btn-group:not(:last-child)>.btn,
        .btn-group>.btn:not(:last-child):not(.dropdown-toggle),
        .btn-group>.btn-group:not(:first-child)>.btn,
        .btn-group>.btn:nth-child(n+3),
        .btn-group>:not(.btn-check)+.btn {
            border-radius: 50px;
            margin-right: 20px
        }

        form {
            font-size: 14px
        }

        form .btn.btn-primary {
            width: 100%;
            height: 45px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: #82ae46;
            border: 1px solid #ddd
        }

        form .btn.btn-primary:hover {
            background-color: #82ae46
        }

        @media (max-width:750px) {
            .container {
                padding: 10px;
                width: 100%
            }

            .text-green {
                font-size: 14px
            }

            .card2.box12,
            .card2.box2 {
                width: 100%
            }

            .nav.nav-tabs .nav-item .nav-link {
                font-size: 12px
            }



            .pb-1,
            .py-1 {
                padding-bottom: 0.25rem !important;
            }

            .pt-1,
            .py-1 {
                padding-top: 0.25rem !important;
            }
        }

        .icon-container img {
            width: 150px;
            height: 150px;
        }

        .far.fa-file-alt.text {
            margin-bottom: 12px;
        }

        .px-md-5.px-4.mb-4.d-flex.align-items-center {
            justify-content: center;
        }
    </style>
    <script src="{{ asset('owner/assets/js/qrcode.js') }}"></script>
    <script src="{{ asset('client\js\qrcode-generate.js') }}"></script>
@endsection
@section('content')
    <div class="hero-wrap hero-bread" style="background-image: url({{ asset('client/images/bg_1.jpg') }});">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Thanh toán</a></span> <span></span>
                    </p>
                    <h1 class="mb-0 bread">Trực tuyến</h1>
                </div>
            </div>
        </div>
    </div>
    @php
        $payment = session()->get('payment');
        $paymentDetail = session()->get('paymentDetail');
    @endphp
    <div class="container2 bg-light d-md-flex align-items-center">
        <div class="card2 box12 shadow-sm p-md-5 p-md-5 p-4">
            <div class="d-flex flex-column">
                <div class="d-flex align-items-center justify-content-between text">
                    <span class=""><i class="far fa-file-alt"></i> Mã đơn hàng: </span>
                    <span class="ps-1">{{ $paymentDetail['orderCode'] }}</span>
                </div>
                <div class="d-flex align-items-center justify-content-between text mb-4">
                    <span><i class="fa fa-money"></i> Số tiền:</span>
                    <span class="ps-1">{{ $payment['totalPrice'] }}đ</span></span>
                </div>
                <div class="border-bottom mb-4"></div>
                <div class="d-flex flex-column mb-4">
                    <span class="far fa-file-alt text">
                        <span class="ps-2">Thông tin:</span>
                    </span>
                    <span class="ps-3">Họ tên: {{ $paymentDetail['full_name'] }}</span>
                    <span class="ps-3">Địa chỉ: {{ $paymentDetail['address'] }}</span>
                    <span class="ps-3">Tỉnh/Thành phố: {{ $paymentDetail['province'] }}</span>
                    <span class="ps-3">Số điện thoại: {{ $paymentDetail['phone_number'] }}</span>
                    <span class="ps-3">Email: {{ $paymentDetail['email'] }}</span>
                </div>
                <div class="d-flex align-items-center justify-content-between text mt-5">
                    <div class="d-flex flex-column text"> <span>Chăm sóc khách hàng:</span> <span>chat online 24/7</span>
                    </div>
                    <div class="btn btn-primary rounded-circle"><span class="fas fa-comment-alt"></span></div>
                </div>
            </div>
        </div>
        <div class="card2 box2 shadow-sm">
            <div class="d-flex align-items-center justify-content-between p-md-5 p-4"> <span class="h5 fw-bold m-0">Phương thức thanh toán</span>
                <div class="btn btn-primary bar"><span class="fas fa-bars"></span></div>
            </div>
            <ul class="nav nav-tabs mb-3 px-md-4 px-2">
                <li class="nav-item"> <a class="nav-link px-2 active" aria-current="page" href="#">QUÉT MÃ QR</a>
                </li>
            </ul>
            <div class="col-12">
                <div class="d-flex flex-column px-md-5 px-4 mb-4 align-items-center">
                    <span>Quét mã để thanh toán</span>
                </div>
            </div>
            <div class="px-md-5 px-4 mb-4 d-flex align-items-center">
                <div class="p-3">
                    <div class="icon-container">
                        <div id="discount" class="icon-container_box">
                        </div>
                    </div>
                </div>
                <script>
                    const qrCodeVQ = new QRCodeVQ();
                    var bankId = <?= json_encode($paymentDetail['bankId']) ?>;
                    var bankAccount = <?= json_encode($paymentDetail['bankAccount']) ?>;
                    var amount = <?= json_encode($payment['totalPrice']) ?>;
                    var orderCode = <?= json_encode($paymentDetail['orderCode']) ?>;
                    const value = qrCodeVQ
                        .setBeneficiaryOrganization(bankId, bankAccount)
                        .setTransactionAmount(amount.replaceAll('.', ''))
                        .setAdditionalDataFieldTemplate(orderCode)
                        .build();
                    console.log({
                        value
                    });
                    var qrcode = new QRCode(document.getElementById('discount'), {
                        text: value,
                        width: 86,
                        height: 86,
                        colorDark: "#111111",
                        colorLight: "#ffffff",
                        correctLevel: QRCode.CorrectLevel.H
                    });
                </script>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="d-flex flex-column px-md-5 px-4 mb-4">
                        <span>Sử dụng <span class="font-weight-bold" style="color: #82ae46">VietinBank</span> hoặc ứng dụng Camera hỗ trợ QR code để
                            quét mã. </span>
                    </div>
                </div>

                <div class="col-12 px-md-5 px-4 mt-3">
                    <a href="/" class="btn btn-primary w-100">Xong</a>
                </div>
            </div>
        </div>
    </div>
    <section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
        <div class="container py-4">
            <div class="row d-flex justify-content-center py-5">
                <div class="col-md-6">
                    <h2 style="font-size: 22px;" class="mb-0">Đăng ký bản tin của chúng tôi</h2>
                    <span>Nhận thông tin cập nhật qua e-mail về các cửa hàng mới nhất của chúng tôi và các ưu đãi đặc
                        biệt</span>
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <form action="#" class="subscribe-form">
                        <div class="form-group d-flex">
                            <input type="text" class="form-control" placeholder="Nhập địa chỉ Email">
                            <input type="submit" value="Đăng kí" class="submit px-3">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    @include('sweetalert::alert_checkout')
    @include('sweetalert::alert_checkout', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
@endsection
@section('js')
    <script></script>
@endsection
