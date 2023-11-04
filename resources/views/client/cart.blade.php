@extends('layouts.client')
@section('css')
    <style>
        .ion-ios-close {
            font-size: xx-large;
        }

        .bd-un {
            border-radius: unset;
        }

        .table tbody tr td {
            padding: 10px 10px;
        }

        a.btn.btn-primary {
            float: right;
        }

        a.btn.btn-primary.btn-update-card {
            margin-top: 20px;
        }

        .btn-apply-discount {
            background: #82ae46;
            border: 1px solid #82ae46;
            color: #fff;
        }
    </style>
@endsection
@section('content')
    <div class="hero-wrap hero-bread" style="background-image: url({{ asset('client/images/bg_1.jpg') }});">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Giỏ hàng</a></span> <span>tại nhà</span>
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
                                <input type="text" class="form-control text-left px-3" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="district">Quận/Huyện</label>
                                <input type="text" class="form-control text-left px-3" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="district">Phường/Xã</label>
                                <input type="text" class="form-control text-left px-3" placeholder="">
                            </div>

                        </form>
                    </div>
                    <p><a href="{{ url('update-product') }}" class="btn btn-primary">Tính toán phí vận chuyển</a></p>
                </div>
                <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Tổng số</h3>
                        <p class="d-flex">
                            <span>Tổng</span>
                            <span id="total">{{ number_format($total, 0, ',', '.') }}đ</span>
                        </p>
                        <p class="d-flex">
                            <span>Phí vận chuyển</span>
                            <span id="fee-ship">0đ</span>
                        </p>
                        <p class="d-none" id="discount-view">
                            <span>Giảm giá</span>
                            <span id="discount"></span>
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
    <script>
        var listChange = {};

        $(document).ready(function() {
            $('.btn-update-card').click(function(e) {
                e.preventDefault();
                $.ajax({
                    url: e.target.href,
                    type: 'GET',
                    datatype: 'json',
                    data: {
                        dataUpdate: listChange
                    },
                    success: function(data) {
                        window.location.reload();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {}
                })
            })

            $('input[name="quantity"]').change(function(event) {
                var id = $(this).parents('tr').attr('rowId');
                var quantityNew = $(this).val();
                updateTotalPrice(id, quantityNew);
            })

            $('.form-apply-discount').on('submit', function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    url: 'apply-discount',
                    method: 'POST',
                    dataType: 'json',
                    data: formData,
                    success: function(data) {
                        $('#total-price').empty().append(data.total.toString().replace(
                            /\B(?=(\d{3})+(?!\d))/g, ".") + 'đ');
                        $('#discount-view').addClass("d-flex");
                        $('#discount').empty().append(
                            `${String(Number(data.discount).toFixed(0)).replace(/\B(?=(\d{3})+(?!\d))/g, ".")}${data.type==1?'%':'đ'}`
                        );
                    },
                    error: function(jqXHR, textStatus, errorTh) {
                        $('#discount-view').addClass("d-none");
                        Swal.fire({
                            text: 'Áp dụng mã thất bại!',
                            position: 'top-right',
                            icon: "error",
                            timer: 3000,
                            showConfirmButton: false,
                            showCloseButton: true,
                            backdrop: false,
                            customClass: {
                                container: 'swal2-container swal2-top-end',
                                popup: 'swal2-popup swal2-toast swal2-icon-error swal2-show',
                                title: 'swal2-title',
                                closeButton: 'swal2-close',
                                icon: 'swal2-icon swal2-error swal2-icon-show',
                            }
                        })
                    }
                })
            })

            $('.btn-payment').click(function(e) {
                e.preventDefault();
                var total = $('#total').text().split('đ')[0];
                var feeShip = $('#fee-ship').text().split('đ')[0];
                var discount = $('#discount').text().split('đ')[0];
                var totalPrice = $('#total-price').text().split('đ')[0];

                var data = {
                    _token: `{{ csrf_token() }}`,
                    total: total,
                    feeShip: feeShip,
                    discount: discount,
                    totalPrice: totalPrice,
                };
                $.post(e.target.href, data)
                    .done(function(response) {
                        window.location.href = e.target.href;
                    })
                    .fail(function(jqXHR, textStatus, error) {

                    });
            });

        });

        function onPlusQuantity(event) {
            var id = $(event.target).parents('tr').attr('rowId');
            // Stop acting like a button
            event.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity' + id).val());

            // If is not undefined

            $('#quantity' + id).val(quantity + 1);
            var quantityNew = $('#quantity' + id).val();
            updateTotalPrice(id, quantityNew);

            // Increment
        }

        function onMinusQuantity(event) {
            event.preventDefault();
            // Get the field name
            var id = $(event.target).parents('tr').attr('rowId');

            var quantity = parseInt($('#quantity' + id).val());

            // If is not undefined

            // Increment
            if (quantity > 0) {
                $('#quantity' + id).val(quantity - 1);
            }
            var quantityNew = $('#quantity' + id).val();
            updateTotalPrice(id, quantityNew);
        }

        function updateTotalPrice(id, quantityNew) {
            listChange[id] = quantityNew;
            var getPriceString = $('#price_product' + id).text().split('đ')[0];
            getPriceString = getPriceString.replace('.', '');
            var price = parseInt(getPriceString);
            var total_price = price * quantityNew;
            $('#total_price' + id).text(total_price.toString().replace(/\B(?=(\d{3})+(?!\d))/g,
                ".") + 'đ');
        }
    </script>
@endsection
