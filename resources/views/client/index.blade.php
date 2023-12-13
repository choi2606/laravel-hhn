@extends('layouts.client')
@section('title')
    <title>Trang Chủ</title>
@endsection
@section('css')
    <style>
        .img-prod {
            width:
        }
    </style>
@endsection
@section('content')
    <section id="home-section" class="hero">
        <div class="home-slider owl-carousel">
            <div class="slider-item" style="background-image: url({{ asset('client/images/trinhchieu_2.jpg') }});">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

                        <div class="col-md-12 ftco-animate text-center">
                            <h1 class="mb-2">Trải nghiệm tuyệt với cho khách hàng tới Shop best goods</h1>
                            <h2 class="subheading mb-4">Cung cấp đa dạng các mặt hàng</h2>
                            <p><a href="localhost:5500/shop1.html" class="btn btn-primary">Xem chỉ tiết</a></p>
                        </div>

                    </div>
                </div>
            </div>

            <div class="slider-item" style="background-image: url({{ asset('client/images/trinhchieu_1.jpg') }});">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

                        <div class="col-sm-12 ftco-animate text-center">
                            <h1 class="mb-2">100% thực phẩm tươi và hữu cơ</h1>
                            <h2 class="subheading mb-4">Cung cấp thực phẩm tươi sống ngon nhất</h2>
                            <p><a href="localhost:5500/shop1.html" class="btn btn-primary">Xem chi tiết</a></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row no-gutters ftco-services">
                <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services mb-md-0 mb-4">
                        <div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
                            <span class="flaticon-shipped"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">Miễn phí vận chuyển</h3>
                            <span>Cho đơn hàng trên 1000k</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services mb-md-0 mb-4">
                        <div class="icon bg-color-2 d-flex justify-content-center align-items-center mb-2">
                            <span class="flaticon-diet"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">Luôn tươi</h3>
                            <span>Gói sản phẩm tốt</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services mb-md-0 mb-4">
                        <div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
                            <span class="flaticon-award"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">Chất lượng cao</h3>
                            <span>Chất lượng sản phẩm</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services mb-md-0 mb-4">
                        <div class="icon bg-color-4 d-flex justify-content-center align-items-center mb-2">
                            <span class="flaticon-customer-service"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">Hỗ trợ</h3>
                            <span>Hỗ trợ 24/7</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-category ftco-no-pt">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-6 order-md-last align-items-stretch d-flex">
                            <div class="category-wrap-2 ftco-animate img align-self-stretch d-flex"
                                style="background-image: url({{ asset('client/images/category.jpg') }});">
                                <div class="text text-center">
                                    <h2>Shop best goods</h2>
                                    <p>Bảo vệ sức khỏe của mọi nhà</p>
                                    <p><a href="localhost:5500/shop1.html" class="btn btn-primary">Mua sắm ngay</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end"
                                style="background-image: url({{ asset('client/images/category1.jpg') }});">
                                <div class="text px-3 py-1">
                                    <h2 class="mb-0"><a
                                            href="localhost:5500/Shop%20diverse%20goods_master/Shop%20diverse%20goods-master/shop.html">Đồ
                                            ăn vặt</a></h2>
                                </div>
                            </div>
                            <div class="category-wrap ftco-animate img d-flex align-items-end"
                                style="background-image: url({{ asset('client/images/category2.jpg') }});">
                                <div class="text px-3 py-1">
                                    <h2 class="mb-0"><a
                                            href="localhost:5500/Shop%20diverse%20goods_master/Shop%20diverse%20goods-master/shop.html">Hàng
                                            đông mát</a></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end"
                        style="background-image: url({{ asset('client/images/category3.jpg') }});">
                        <div class="text px-3 py-1">
                            <h2 class="mb-0"><a
                                    href="localhost:5500/Shop%20diverse%20goods_master/Shop%20diverse%20goods-master/shop.html">Thực
                                    phẩm</a></h2>
                        </div>
                    </div>
                    <div class="category-wrap ftco-animate img d-flex align-items-end"
                        style="background-image: url({{ asset('client/images/category4.jpg') }});">
                        <div class="text px-3 py-1">
                            <h2 class="mb-0"><a href="{{ url('shop') }}">Gia
                                    dụng</a></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-3 pb-3">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <span id="content product" class="subheading">Sản phẩm nổi bật</span>
                    <h2 class="mb-4">Sản phẩm của chúng tôi</h2>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @forelse($products as $product)
                    <div class="col-md-6 col-lg-3 ftco-animate fadeInUp ftco-animated">
                        <div class="product">
                            <a href="product-detail{{ $product->product_id }}" class="img-prod"><img class="img-fluid"
                                    src="./client/images/product/{{ $product->image_url }}" alt="Colorlib Template"
                                    style="width: 254px; height: 191px;">
                                @if ($product->selling_price < $product->original_price)
                                    <span class="status">
                                        {{ discounted($product) }}%
                                    </span>
                                @endif
                                <div class="overlay"></div>
                            </a>
                            <div class="text py-3 pb-4 px-3 text-center">
                                <h3><a href="#">{{ $product->name }}</a></h3>
                                <div class="d-flex">
                                    <div class="pricing">
                                        <p class="price">
                                            @if ($product->selling_price < $product->original_price)
                                                <span class="mr-2 price-dc">{{ originalPrice($product) }}đ</span>
                                            @endif
                                            <span>{{ $product->selling_price }}đ</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="bottom-area d-flex px-3">
                                    <div class="m-auto d-flex">
                                        <a href="product-detail{{ $product->product_id }}"
                                            class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                            <span><i class="ion-ios-menu"></i></span>
                                        </a>
                                        <a href="add-cart{{ $product->product_id }}"
                                            class="buy-now d-flex justify-content-center align-items-center mx-1 ion-ios-cart"
                                            onclick="onAddCart(event)">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    Không có sản phẩm
                @endforelse
            </div>
        </div>
    </section>
    <hr>
    @include('layouts.signnewfeed')
@endsection
@section('js')
    <script>
        function onAddCart(e) {
            e.preventDefault();
            $.post(e.target.href)
                .done(function(data) {
                    toastSuccess('Đã thêm vào giỏ hàng!')
                })
                .fail(function() {
                    toastError('Thêm giỏ hàng thất bại!')
                });
        }
    </script>
@endsection
