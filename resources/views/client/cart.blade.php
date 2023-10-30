@extends('layouts.client')
@section('css')
    <style>
        span.ion-ios-close {
			font-size: xx-large;
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
                            <tbody>
                                <tr class="text-center">
                                    <td class="productremove"><a href="#"><span class="ion-ios-close"></span></a></td>

                                    <td class="image-prod">
                                        <div class="img"
                                            style="background-image:url({{ asset('client/images/product3.jpg') }});"></div>
                                    </td>

                                    <td class="productname">
                                        <h3>Ức gà tươi C.P khay 500mg</h3>
                                        <p>Sản phẩm được lấy từ những con gà ngon, chất lượng nhất</p>
                                    </td>

                                    <td class="price" id="price_1">70$/1</td>

                                    <td class="quantity">
                                        <div class="input-group mb-3">
                                            <input type="text" id="input_1" name="quantity"
                                                class="quantity form-control input-number" value="1" min="1"
                                                max="100">
                                        </div>
                                    </td>

                                    <td class="total" id="total_1">$120
                                    </td>
                                </tr><!-- END TR-->

                                <tr class="text-center">
                                    <td class="productremove"><a href="#"><span class="ion-ios-close"></span></a></td>

                                    <td class="image-prod">
                                        <div class="img"
                                            style="background-image:url({{ asset('client/images/product4.jpg') }});"></div>
                                    </td>

                                    <td class="productname">
                                        <h3>Nấm kim chi trắng hộp 150mg</h3>
                                        <p>Được những người bản xứ lấy từ núi Phú Sĩ 6 ngày 6 đêm</p>
                                    </td>

                                    <td class="price" id="price_2">5$/1</td>

                                    <td class="quantity">
                                        <div class="input-group mb-3">
                                            <input type="text" id="input_2" name="quantity"
                                                class="quantity form-control input-number" value="1" min="1"
                                                max="100">
                                        </div>
                                    </td>

                                    <td class="total" id="total_2">$5
                                    </td>
                                </tr><!-- END TR-->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Mã giảm giá</h3>
                        <p>Nhập mã giảm giá nếu có</p>
                        <form action="#" class="info">
                            <div class="form-group">
                                <label for="">Mã giảm giá</label>
                                <input type="text" class="form-control text-left px-3" placeholder="">
                            </div>
                        </form>
                    </div>
                    <p><a href="#" class="btn btn-primary py-3 px-4">Áp dụng mã giảm giá</a></p>
                </div>
                <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Ước tính phí vận chuyển và thuế</h3>
                        <p>Nhập điểm đến của bạn để có được ước tính vận chuyển</p>
                        <form action="#" class="info">
                            <div class="form-group">
                                <label for="">Đất nước</label>
                                <input type="text" class="form-control text-left px-3" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="country">Tỉnh/Thành phố</label>
                                <input type="text" class="form-control text-left px-3" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="country">Mã zip/bưu chính</label>
                                <input type="text" class="form-control text-left px-3" placeholder="">
                            </div>
                        </form>
                    </div>
                    <p><a href="#" class="btn btn-primary py-3 px-4">Ước lượng</a></p>
                </div>
                <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Tổng số</h3>
                        <p class="d-flex">
                            <span>Tổng phụ</span>
                            <span>$20.60</span>
                        </p>
                        <p class="d-flex">
                            <span>Delivery</span>
                            <span>$0.00</span>
                        </p>
                        <p class="d-flex">
                            <span>Vận chuyển</span>
                            <span>$3.00</span>
                        </p>
                        <hr>
                        <p class="d-flex total-price">
                            <span>chiết khấu</span>
                            <span>$17.60</span>
                        </p>
                    </div>
                    <p><a href="checkout.html" class="btn btn-primary py-3 px-4">Tiến hành kiểm tra</a></p>
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
@endsection
