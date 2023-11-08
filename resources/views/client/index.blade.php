@extends('layouts.client')
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
                            <span>Cho đơn hàng trên 150k</span>
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
                                        <a href="#"
                                            class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                            <span><i class="ion-ios-menu"></i></span>
                                        </a>
                                        <a href="product-detail{{ $product->product_id }}"
                                            class="buy-now d-flex justify-content-center align-items-center mx-1">
                                            <span><i class="ion-ios-cart"></i></span>
                                        </a>
                                        <a href="#" class="heart d-flex justify-content-center align-items-center ">
                                            <span><i class="ion-ios-heart"></i></span>
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



    <section class="ftco-section testimony-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <span class="subheading">Đánh giá</span>
                    <h2 class="mb-4">Sự hài lòng của khách hàng</h2>
                    <p>Trên tinh thần khách hàng là thượng đế, chúng tôi nguyện phục vụ khách hàng bằng thái độ phục vụ chân
                        thành nhất</p>
                </div>
            </div>
            <div class="row ftco-animate">
                <div class="col-md-12">
                    <div class="carousel-testimony owl-carousel">
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5"
                                    style="background-image: url({{ asset('/client/images/person1.jpg') }})">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text text-center">
                                    <p class="mb-5 pl-4 line">Không gì có thể phá hủy sắt, nhưng rỉ sét của chính nó có
                                        thể. Tương tự như vậy, không ai có thể phá hủy một con người.</p>
                                    <p class="name">Tony Hsieh</p>
                                    <span class="position">Giám đốc điều hành</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5"
                                    style="background-image: url({{ asset('/client/images/person2.webp') }})">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text text-center">
                                    <p class="mb-5 pl-4 line">Nó phụ thuộc vào cách khách hàng của bạn trải nghiệm thương
                                        hiệu - và thương hiệu đó khiến một người cảm thấy như thế nào.</p>
                                    <p class="name">Alex Allwood</p>
                                    <span class="position">Giám đốc điều hành</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5"
                                    style="background-image: url({{ asset('/client/images/person3.webp') }})">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text text-center">
                                    <p class="mb-5 pl-4 line">Có một cách nhất định để tạo ra một dịch vụ, sự hiếu khách và
                                        trải nghiệm khiến mọi người luôn cảm thấy họ là người quan trọng.</p>
                                    <p class="name">Julie Rice</p>
                                    <span class="position">Đồng sáng lập SoulCycle và Giám đốc thương hiệu của
                                        WeWork</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5"
                                    style="background-image: url({{ asset('/client/images/person4.jpg') }})">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text text-center">
                                    <p class="mb-5 pl-4 line">Đến gần hơn bao giờ hết với khách hàng của bạn. Gần đến mức
                                        bạn nói rõ họ cần gì trước khi họ tự nhận ra điều đó.</p>
                                    <p class="name">Steve Jobs</p>
                                    <span class="position">Đồng sáng lập và cựu Giám đốc điều hành của Apple</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <hr>

    <section class="ftco-section ftco-partner">
        <div class="container">
            <div class="row">
                <div class="col-sm ftco-animate">
                    <a href="#" class="partner"><img src="{{ asset('/client/images/partner.jpg') }}"
                            class="img-fluid" alt="Colorlib Template"></a>
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
                            <input type="text" class="form-control" placeholder="Nhập địa chỉ email">
                            <input type="submit" value="Đăng kí" class="submit px-3">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
