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
                                    <div>{{ $details['name'] }}</div>
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
            <a href="{{ url('update-cart') }}" class="btn btn-primary btn-update-card">Cập nhật chỉnh
                sửa</a>
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
                <p><button class="btn btn-primary py-3 px-4 btn-apply-discount" type="submit">Áp dụng mã
                        giảm
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
        <p><a href="{{ url('fee-transport') }}" class="btn btn-primary btn-feeTransport">Tính toán phí
                vận
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