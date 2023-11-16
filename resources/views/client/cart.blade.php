@extends('layouts.client')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('client/css/cs-cart.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/cs-discount.css') }}">

    <script src="{{ asset('owner/assets/js/qrcode.js') }}"></script>
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
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="cart-list">
                        <table class="table">
                            <thead class="thead-primary">
                                <tr class="text-center">
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng tiền</th>
                                </tr>
                            </thead>
                            <tbody id="tbody-cart">
                                @php $total = 0 @endphp
                                @if (session('cart'))
                                    @foreach (session('cart') as $id => $details)
                                        <tr rowId="{{ $id }}" class="text-center">
                                            <td class="productremove"><a href="delete-product-cart{{ $id }}"
                                                    class="ion-ios-close" data-confirm-delete ="true"></a></td>
                                            <td class="image-prod">
                                                <div class="img"
                                                    style="background-image: url(client/images/product/{{ $details['image'] }});">
                                                </div>
                                            </td>

                                            <td class="productname">
                                                <h3>{{ $details['name'] }}</h3>
                                                <p>{{ $details['description'] }}</p>
                                            </td>

                                            <td class="price" id="price_product{{ $id }}">
                                                {{ number_format($details['price'], 0, ',', '.') }}đ/1</td>

                                            <td class="quantity">
                                                <div class="d-flex">
                                                    <span class="input-group-btn mr-2">
                                                        <button type="button" class="quantity-left-minus btn bd-un"
                                                            data-type="minus" data-field=""
                                                            onclick="onMinusQuantity(event)">
                                                            <i class="ion-ios-remove"></i>
                                                        </button>
                                                    </span>
                                                    <div class="input-group mb-3">
                                                        <input type="text" id="quantity{{ $id }}"
                                                            name="quantity" class="quantity form-control input-number"
                                                            value="{{ $details['quantity'] }}" min="1"
                                                            max="100">
                                                    </div>
                                                    <span class="input-group-btn ml-2">
                                                        <button type="button" class="quantity-right-plus btn bd-un"
                                                            data-type="plus" data-field="" onclick="onPlusQuantity(event)">
                                                            <i class="ion-ios-add"></i>
                                                        </button>
                                                    </span>
                                                </div>
                                            </td>

                                            <td class="total" id="total_price{{ $id }}">
                                                {{ $subTotal = number_format($details['price'] * $details['quantity'], 0, ',', '.') }}đ
                                            </td>
                                            </td>
                                        </tr><!-- END TR-->
                                        @php
                                            $subTotal = str_replace('.', '', $subTotal);
                                            $subTotal = intval($subTotal);
                                            $total += !empty($subTotal) ? $subTotal : 0;
                                        @endphp
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    @if (session()->has('cart'))
                        <a href="{{ url('update-cart') }}" class="btn btn-primary btn-update-card">Cập nhật chỉnh sửa</a>
                    @else
                    @endif
                </div>
            </div>
            <div class="orders pt-3">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Mã Giảm Giá Khả Dụng</strong>
                            </div>
                            <div class="card-body card-block">
                                <div class="container mg-tb-20">
                                    <div class="row">
                                        @forelse ($discounts as $discount)
                                            @if ($discount->remainingDays > 0)
                                                <div class="col-sm-6">
                                                    <div
                                                        class="coupon bg-white rounded mb-3 d-flex justify-content-between">
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
                                                                <p class="text-muted mb-0">MÃ: <span
                                                                        class="font-weight-bold">
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
                                            @endif
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

            <div class="row justify-content-end">
                <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Mã giảm giá</h3>
                        <p>Nhập mã giảm giá nếu có</p>
                        <form class="form-apply-discount">
                            {{ @csrf_field() }}
                            <div class="form-group">
                                <label for="">Mã giảm giá</label>
                                <input type="text" class="form-control text-left px-3" placeholder=""
                                    name="discountName">
                                <input type="hidden" name="storageTotal" value="{{ $total }}">
                            </div>
                            <p><button class="btn btn-primary py-3 px-4 btn-apply-discount" type="submit">Áp dụng mã giảm
                                    giá</button></p>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Tính toán phí vận chuyển</h3>
                        <p>Nhập điểm đến của bạn để xem phí vận chuyển</p>
                        <form action="#" class="info">
                            <div class="form-group">
                                <label for="country">Tỉnh/Thành phố</label>
                                <select class="form-select form-select-sm mb-3" id="province"
                                    aria-label=".form-select-sm">
                                    <option value="" selected>Chọn tỉnh thành</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="district">Quận/Huyện</label>
                                <select class="form-select form-select-sm mb-3" id="district"
                                    aria-label=".form-select-sm">
                                    <option value="" selected>Chọn quận huyện</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="district">Phường/Xã</label>
                                <select class="form-select form-select-sm" id="ward" aria-label=".form-select-sm">
                                    <option value="" selected>Chọn phường xã</option>
                                </select>
                            </div>

                        </form>
                    </div>
                    <p><a href="{{ url('fee-transport') }}" class="btn btn-primary btn-feeTransport">Tính toán phí vận
                            chuyển</a></p>
                </div>
                <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Tổng số</h3>
                        <p class="d-flex">
                            <span>Tổng</span>
                            <span id="total">{{ number_format($total, 0, ',', '.') }}đ</span>
                        </p>
                        <p class="d-flex">
                            <span>Giảm giá</span>
                            <span id="discount">0đ</span>
                        </p>
                        <p class="d-flex">
                            <span>Phí vận chuyển</span>
                            <span id="fee-ship">0đ</span>
                        </p>
                        <hr>
                        <p class="d-flex total-price">
                            <span>Thành tiền</span>
                            <span id="total-price">{{ number_format($total, 0, ',', '.') . 'đ' }}</span>
                        </p>
                    </div>
                    <p><a href="{{ url('checkout') }}" class="btn btn-primary py-3 px-4 btn-payment">Tiến hành thanh
                            toán</a></p>
                </div>
            </div>
        </div>
    </section>

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
    @include('sweetalert::alert_cart')
    @include('sweetalert::alert_cart', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script src="{{ asset('client/js/cart.js') }}"></script>
    <script></script>
@endsection
