@extends('layouts.client')
@section('title')
    <title>Thanh toán bằng mã QR</title>
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="{{ asset('client/css/cs-scanpayment.css') }}">

    {{-- <link rel="stylesheet" href="{{ asset('owner/assets/css/style.css') }}"> --}}
    <style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap');
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
                    <span class="ps-1">{{ number_format($payment['totalPrice'], 0, ',', '.') }}đ</span></span>
                </div>
                <div class="border-bottom mb-4"></div>
                <div class="d-flex flex-column mb-4">
                    <span class="fa fa-pencil-square-o text">
                        <span class="ps-2">Thông tin:</span>
                    </span>
                    <span class="ps-3">Tên người nhận: {{ $paymentDetail['receiveName'] }}</span>
                    <span class="ps-3">Địa chỉ giao hàng:
                        {{ $paymentDetail['street'] . ', ' . $payment['ward'] == '' ? ', ' : $payment['ward'] . ', ' . $payment['district'] . ', ' . $payment['province'] }}</span>
                    <span class="ps-3">Số điện thoại: {{ $paymentDetail['phoneNumber'] }}</span>
                </div>
                <div class="d-flex align-items-center justify-content-between text mt-5">
                    <div class="d-flex flex-column text"> <span>Chăm sóc khách hàng:</span> <span>chat online 24/7</span>
                    </div>
                    <div class="btn btn-primary rounded-circle"><span class="fas fa-comment-alt"></span></div>
                </div>
            </div>
        </div>
        <div class="card2 box2 shadow-sm">
            <div class="d-flex align-items-center justify-content-between p-md-5 p-4"> <span class="h5 fw-bold m-0">Phương
                    thức thanh toán</span>
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
                    // console.log((amount).toString(), bankId, bankAccount);
                    // console.log(<?= json_encode($paymentDetail) ?>);
                    const value = qrCodeVQ
                        .setBeneficiaryOrganization(bankId, bankAccount)
                        .setTransactionAmount((amount).toString())
                        .setAdditionalDataFieldTemplate(orderCode)
                        .build();
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
                        <span>Sử dụng <span class="font-weight-bold" style="color: #82ae46">VietinBank</span> hoặc ứng dụng
                            Camera hỗ trợ QR code để
                            quét mã. </span>
                    </div>
                </div>

                <div class="col-12 px-md-5 px-4 mt-3">
                    <a href="/home" class="btn btn-primary w-100">Xong</a>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.signnewfeed')
    @include('sweetalert::alert_checkout')
    @include('sweetalert::alert_checkout', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
@endsection
@section('js')
    <script></script>
@endsection
