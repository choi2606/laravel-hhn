@extends('layouts.client')
@section('title')
    <title>Giỏ Hàng</title>
@endsection
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('client/css/cs-cart.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/cs-discount.css') }}">
    <script src="{{ asset('owner/assets/js/qrcode.js') }}"></script>
    <style>
        .cart-list {
            min-height: 276px;
        }

        .shopping_cart {
            margin: 32px 0 12px 0;
        }

        .primary-btn.cart-btn {
            color: #fff;
            padding: 14px 30px 12px;
            background: #82ae46;
        }
    </style>
@endsection
@section('content')
    <div class="hero-wrap hero-bread" style="background-image: url({{ asset('client/images/bg_1.jpg') }});">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Giỏ hàng</a></span> <span>tại
                            nhà</span>
                    </p>
                    <h1 class="mb-0 bread">giỏ hàng của tôi</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section ftco-cart">
        <div class="container">
            <div class="cart-wrapper">
                @include('components.cart')
            </div>
            <div class="orders pt-3">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Mã Giảm Giá</strong>
                            </div>
                            <div class="card-body card-block">
                                <div class="container mg-tb-20">
                                    <div class="row">
                                        @forelse ($discountsValid as $discount)
                                            <div class="col-sm-6">
                                                <div class="coupon bg-white rounded mb-3 d-flex justify-content-between">
                                                    <div class="kiri p-3">
                                                        <div class="icon-container ">
                                                            <div id="discount_{{ $discount->discount_id }}"
                                                                class="icon-container_box">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <script>
                                                        var myId = "discount_" + <?= json_encode($discount->discount_id) ?>;
                                                        var value = <?= json_encode($discount->discount_code) ?>;
                                                        var qrcode = new QRCode(document.getElementById(myId), {
                                                            text: value,
                                                            width: 85,
                                                            height: 85,
                                                            colorDark: "#111111",
                                                            colorLight: "#ffffff",
                                                            correctLevel: QRCode.CorrectLevel.H
                                                        });
                                                    </script>
                                                    <div class="tengah py-3 d-flex w-100 justify-content-start">
                                                        <div>
                                                            @if ($discount->remainingDays > 0)
                                                                <span class="badge badge-success">Valid</span>
                                                            @else
                                                                <span class="badge badge-danger">Invalid</span>
                                                            @endif
                                                            <h3 class="lead">
                                                                {{ $discount->description }}</h3>
                                                            <p class="text-muted mb-0">MÃ: <span class="font-weight-bold">
                                                                    {{ $discount->discount_code }}</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="kanan">
                                                        <div class="info m-3 d-flex align-items-center">
                                                            <div class="w-100">
                                                                <div class="block">
                                                                    <span class="time font-weight-light">
                                                                        HSD:
                                                                        <span class="text-uppercase font-weight-normal">
                                                                            {{ date_format(DateTime::createFromFormat('Y-m-d', $discount->expire), 'd/m') }}
                                                                        </span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            Chưa có mã giảm giá nào khả dụng
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('sweetalert::alert_cart')
    @include('sweetalert::alert_cart', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script src="{{ asset('client/js/cart.js') }}"></script>
@endsection
