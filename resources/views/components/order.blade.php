<section class="ftco-section ftco-cart">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ftco-animate">
                <div class="cart-list">
                    <table class="table">
                        <thead class="thead-primary">
                            <tr class="text-center">
                                <th>Sản phẩm</th>
                                <th>Tổng phụ</th>
                                <th>Tổng tiền</th>
                                <th>Trạng thái</th>
                                <th>Ngày đặt</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody id="tbody-cart">
                            @foreach ($orders as $id => $details)
                                <tr rowId="{{ $details->order_id }}" class="text-center">
                                    <td class="productname total">
                                        <ol class="mt-1rem">
                                            @foreach ($details->orderDetail()->get() as $detailId => $subDetails)
                                                <li>
                                                    <img src="{{url('client/images/product')}}/{{$subDetails->products()->first()->image_url}}" alt="" width="50">
                                                    {{ $subDetails->products()->first()->name . ' (' . $subDetails->quantity . ' x ' . number_format($subDetails->products()->first()->selling_price, 0, ',', '.') . 'đ)' }}
                                                </li>
                                            @endforeach
                                        </ol>

                                    </td>

                                    <td class="subTotal total">
                                        {{ number_format($details->subtotal, 0, ',', '.') }}đ
                                    </td>

                                    <td class="totalPrice total">
                                        {{ number_format($details->total_amount, 0, ',', '.') }}đ
                                    </td>

                                    <td class="status total">
                                            @if ($details->status == 'pending')
                                            <span class="badge badge-pending">
                                                Đang chờ xác nhận đơn
                                            </span>
                                            @elseif($details->status == 'delivering')
                                            <span class="badge badge-success">
                                                Đang trên đường giao đến bạn
                                            </span>
                                            @else
                                            <span class="badge badge-danger">
                                                Đã hủy đơn hàng
                                            </span>
                                            @endif
                                    </td>

                                    <td class="total">
                                        {{ $details->created_at }}
                                    </td>
                                    @if($details->status == 'cancel' || $details->status == 'delivering')
                                    @else
                                    <td class="productremove"><a href="cancel-status-product{{ $details->order_id }}"
                                            class="ion-ios-close" data-confirm-delete ="true"></a></td>
                                    @endif
                                </tr><!-- END TR-->
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>