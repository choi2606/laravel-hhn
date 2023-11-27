@extends('layouts.client')
@section('title')
    <title>Chi Tiết Sản Phẩm</title>
@endsection
@section('css')
    <style>
        .tdc-line {
            color: #b3b3b3 !important;
            text-decoration: line-through;
        }

        .ftco-navbar-light-discount {
            background: #82ae46 !important;
            color: #fff !important;
            font-size: 90% !important;
        }
    </style>
@endsection
@section('content')
    <div class="hero-wrap hero-bread" style="background-image: url({{ asset('client/images/bg1.jpg') }});">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ url('/') }}">Trang chủ</a></span> <span
                            class="mr-2"><a href="{{ url('/') }}">Sản phẩm</a></span> <span>Sản phẩm đơn</span></p>
                    <h1 class="mb-0 bread">Sản phẩm đơn lẻ</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-5 ftco-animate">
                    <a href="./client/images/product/{{ $product->image_url }}" class="image-popup"><img
                            src="./client/images/product/{{ $product->image_url }}" class="img-fluid"
                            alt="Colorlib Template"></a>
                </div>
                <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                    <h3>{{ $product->name }}</h3>
                    <div class="rating d-flex">
                        <p class="text-left mr-4">
                            <a href="#" class="mr-2">5.0</a>
                            <a href="#"><span class="ion-ios-star-outline"></span></a>
                            <a href="#"><span class="ion-ios-star-outline"></span></a>
                            <a href="#"><span class="ion-ios-star-outline"></span></a>
                            <a href="#"><span class="ion-ios-star-outline"></span></a>
                            <a href="#"><span class="ion-ios-star-outline"></span></a>
                        </p>
                        <p class="text-left mr-4">
                            <a href="#" class="mr-2" style="color: #000;">100 <span style="color: #bbb;">đánh
                                    giá</span></a>
                        </p>
                        <p class="text-left">
                            <a href="#" class="mr-2" style="color: #000;">500 <span style="color: #bbb;">Đã
                                    bán</span></a>
                        </p>
                    </div>
                    @if ($product->selling_price < $product->original_price)
                        <p class="price position-relative">
                            <span class="tdc-line">
                                {{ originalPrice($product) }}đ/1
                            </span>
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill ftco-navbar-light-discount">
                                - {{ discounted($product) }}%
                            </span>
                        </p>
                    @endif
                    <p class="price"><span>{{ sellingPrice($product) }}đ/1</span></p>
                    <p>{{ $product->description }}</p>
                    <div class="row mt-4">
                        <div class="w-100"></div>
                        <div class="input-group col-md-6 d-flex mb-3">
                            <span class="input-group-btn mr-2">
                                <button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
                                    <i class="ion-ios-remove"></i>
                                </button>
                            </span>
                            <input type="text" id="quantity" name="quantity" class="form-control input-number"
                                value="1" min="1" max="{{ $product->quantity }}">
                            <span class="input-group-btn ml-2">
                                <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
                                    <i class="ion-ios-add"></i>
                                </button>
                            </span>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-12">
                            <p style="color: #000;">{{ $product->quantity }} hộp hàng có sẵn</p>
                        </div>
                    </div>
                    <p><a href="add-cart{{ $product->product_id }}"
                            class="btn btn-black py-3 btn-add-cart {{ $product->quantity == 0 ? 'disabled' : '' }}"
                            onclick="onAddCart(event)">
                            Thêm vào giỏ hàng
                        </a></p>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-3 pb-3">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <span class="subheading">Các sản phẩm</span>
                    <h2 class="mb-4">Các sản phẩm tương tự</h2>
                    <p>Trên tinh thần khách hàng là thượng đế, chúng tôi nguyện phục vụ khách hàng bằng thái độ phục vụ chân
                        thành nhất.</p>
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
                                    @php
                                        $discouned = number_format((($product->original_price - $product->selling_price) / $product->original_price) * 100, 0);
                                        $originalPrice = number_format($product->original_price, 0, ',', '.');
                                        $sellingPrice = number_format($product->selling_price, 0, ',', '.');
                                    @endphp
                                    <span class="status">
                                        {{ $discouned }}%
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
                                                <span class="mr-2 price-dc">{{ $originalPrice }}đ</span>
                                            @endif
                                            <span>{{ $sellingPrice }}đ</span>
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
    @include('layouts.signnewfeed')
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            var quantity = 0;
            var max = $('#quantity').attr('max');
            $('.quantity-right-plus').click(function(e) {
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());
                // If is not undefined
                if (quantity < max) {
                    $('#quantity').val(quantity + 1);
                }

                // Increment

            });

            $('#quantity').change(function(e) {
                console.log(this.value, max);
                console.log(this.value >= max);

                if (this.value > max) {
                    $('.btn-add-cart').addClass('disabled');
                }
                if (this.value <= max) {
                    $('.btn-add-cart').removeClass('disabled');

                }
            })


            $('.quantity-left-minus').click(function(e) {
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());

                // If is not undefined

                // Increment
                if (quantity > 1) {
                    $('#quantity').val(quantity - 1);
                }

            });

        });

        function onAddCart(event) {
            event.preventDefault();
            var form = document.createElement('form');
            form.action = event.target.href;
            form.method = 'POST';
            form.innerHTML = `@csrf`;

            var quantityInput = document.createElement('input');
            quantityInput.type = 'hidden';
            quantityInput.name = 'quantity';
            quantityInput.value = $('input[name="quantity"]').val();

            form.appendChild(quantityInput);
            document.body.appendChild(form);
            form.submit();
        }
    </script>
@endsection
