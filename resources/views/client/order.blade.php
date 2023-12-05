@extends('layouts.client')
@section('css')
    <style>
        .text-center {
            margin-top: ;
        }

        .cart-list {
            overflow-x: unset;
        }

        .table tbody tr td {
            padding: unset;
        }

        .img {
            height: 50px !important;
            width: 50px !important;
        }

        .mt-1rem {
            margin-top: 1rem;
        }

        td.totalPrice.total {
            font-weight: 700;
        }

        span.badge.badge-pending {
            background-color: #fb9678;
            color: white;
        }

        .ion-ios-close:before {
            font-size: xx-large;
        }
    </style>
@endsection
@section('content')
    <div class="hero-wrap hero-bread" style="background-image: url({{ asset('client/images/bg1.jpg') }});">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animlúce text-center">
                    <h1 class="mb-0 bread"><span class="mr-2"><a href="index.html"
                                style="font-size: 30px; color: aliceblue;">Đơn hàng của tôi</span></a></h1>
                </div>
            </div>
        </div>
    </div>
    <div class="order-wrapper">
        @include('components.order')
    </div>
    @include('sweetalert::alert_cancel_order')
    @include('sweetalert::alert_cancel_order', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
@endsection
