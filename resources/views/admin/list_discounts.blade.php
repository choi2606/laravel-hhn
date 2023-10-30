@extends('layouts.admin')
@section('headtag')
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@endsection

@section('css')
    <style>
        body {
            background: #dedede;
        }

        .mg-tb-20 {
            margin: 20px 0px;
        }

        .coupon .kanan {
            border-left: 1px dashed #ddd;
            width: 40% !important;
            position: relative;
        }

        .coupon .kanan .info::after,
        .coupon .kanan .info::before {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            background: #dedede;
            border-radius: 100%;
        }

        .coupon .kanan .info::before {
            top: -10px;
            left: -10px;
        }

        .coupon .kanan .info::after {
            bottom: -10px;
            left: -10px;
        }

        .coupon .time {
            font-size: 1.6rem;
        }

        aside.left-panel:hover {
            overflow-x: unset;
        }

        a:hover,
        a:focus {
            text-decoration: none !important;
        }

        a.dropdown-toggle:hover {
            text-decoration: none;
        }

        a:hover {}

        .coupon .kanan .info::after,
        .coupon .kanan .info::before {
            background: #f0f8ff;
        }

        .dashboard {
            color: #878787;
        }

        .dashboard:hover {
            color: #000;
        }

        .icon-container {
            width: 85px;
        }

        .coupon .kanan {
            width: 30% !important;
        }

        .card-body.card-block {
            background-color: aliceblue;
        }

        .info.m-3.d-flex.align-items-center {
            text-align: center;
        }
    </style>
    <script src="{{ asset('owner/assets/js/qrcode.js') }}"></script>
@endsection
@section('content')
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Dashboard</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="{{ url('/admin') }}" class="dashboard">Dashboard</a></li>
                                <li><a href="#" class="dashboard">Quản Lý Mã Giảm Giá</a></li>
                                <li class="active">Liệt Kê Mã Giảm</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="animated fadeIn">
            <div class="orders">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Liệt Kê Mã Giảm Giá</strong>
                            </div>
                            <div class="card-body card-block">
                                <div class="container mg-tb-20">
                                    <div class="row">
                                        @forelse ($discounts as $discount)
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
                                                            <h3 class="lead">{{ $discount->description }}</h3>
                                                            <p class="text-muted mb-0">MÃ: <span
                                                                    class="font-weight-bold">{{ $discount->discount_code }}</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="kanan">
                                                        <div class="info m-3 d-flex align-items-center">
                                                            <div class="w-100">
                                                                <div class="block">
                                                                    <span class="time font-weight-light">
                                                                        @if ($discount->remainingDays <= 0)
                                                                            <span style="color: red"
                                                                                class="text-uppercase font-weight-normal">hết
                                                                                hạn</span>
                                                                        @else
                                                                            <span
                                                                                class="text-uppercase font-weight-normal">{{ $discount->remainingDays }}
                                                                                NGÀY</span>
                                                                        @endif
                                                                    </span>
                                                                </div>
                                                                {{-- <a href="#" target="_blank"
                                                                    class="btn btn-sm btn-outline-danger btn-block">
                                                                    show
                                                                </a> --}}
                                                                <a href="delete-discount{{ $discount->discount_id }}"
                                                                    class="btn btn-sm btn-outline-danger btn-block"
                                                                    data-confirm-delete="true">
                                                                    delete
                                                                </a>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            No discounts
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert_discount')
    @include('sweetalert::alert_discount', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
    <div class="clearfix"></div>
@endsection
@section('js')
@endsection
