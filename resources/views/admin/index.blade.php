@extends('layouts.admin')
@section('css')
    <style>
        .modal .container-modal {
            padding-top: 150px;
        }

        .modal.open {
            display: block;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal .container-modal {
            padding-top: 100px;
            width: 1080px;
            max-width: calc(100% - 32px);
            min-width: 200px;
            margin-left: auto;
            margin-right: auto;
            position: relative;
            animation: modal-hide ease .5s;
        }

        .modal .close-icon {
            position: absolute;
            padding: 8px 16px;
            font-size: 12px;
            color: rgb(0, 0, 0);
            right: 0;
            line-height: 36px;
            font-weight: 900;
        }

        .modal .close-icon:hover {
            color: rgba(0, 0, 0, 0.579);
        }

        .modal .header-modal {
            border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0;
            background-color: #009688;
            color: white;
            text-align: center;
            height: 70px;
            line-height: 65px;
            letter-spacing: 4px;
            font-size: 30px;
            font-weight: 100;
        }

        .modal .header-modal .heading-modal {
            margin: 10px 0px;
            letter-spacing: 4px;
            font-weight: 200;
        }

        .modal .container-modal .content-modal {
            height: 318px;
            background-color: white;
            padding: 0px 16px;
        }

        .modal .content-modal .margin {

            display: inline-block;
        }

        .modal .container-modal .bill {
            margin-top: 20px;
        }

        .modal .content-modal input {
            width: 100%;
            border: 1px solid #ccc;
            line-height: 23px;
            font-size: 15px;
            margin: 8px 0px 20px;
        }

        .modal .container-modal .btn-update {
            width: 100%;
            display: block;
            padding: 16px;
            margin-bottom: 16px;
            background-color: #009688;
            text-align: center;
            color: white;
            text-decoration: none;
        }

        .modal .container-modal .btn-close {
            width: 100%;
            display: block;
            padding: 16px;
            margin-bottom: 16px;
            background-color: #009688;
            text-align: center;
            color: white;
            text-decoration: none;
        }

        .modal .container-modal .btn-update:hover {
            background-color: #bbb5b5;
            color: #000;
        }

        .modal .btn-pay a {}

        .modal .btn-pay .icon-tick {
            font-weight: 700;
        }

        .modal .container-modal .footer-modal {
            width: 100%;
            display: inline-block;
            position: relative;
            margin: 15px 0px 32px;
        }


        .modal .footer-modal .support {
            position: absolute;
            right: 0;
            display: inline;
        }

        .modal .footer-modal>a {
            text-decoration: none;

        }

        .modal .footer-modal .support a {
            color: #2196F3;
            margin-bottom: 15px;
        }

        /* Animation modal */

        @keyframes modal-hide {

            from {
                transform: translateY(-150px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }

        }


        span.total_product {
            justify-content: space-between;
            padding-right: 40px;
            align-items: center;
        }

        .view-products {
            font-size: 20px;
        }

        .btn-form-details {
            width: 100%;
            display: block;
            padding: 16px;
            margin-bottom: 16px;
            text-align: center;
            text-decoration: none;
        }

        .icon-delete-user {
            font-size: x-large;
        }

        td.d-flex.active {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        th.status {
            text-align: left!important;
        }
    </style>
@endsection
@section('content')
    <!-- Content -->
    <div class="content">
        <!-- Animated -->
        <div class="animated fadeIn">
            <!-- Widgets  -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-1">
                                    <i class="pe-7s-cash"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text">$<span class="count">{{ $totalPrices }}</span></div>
                                        <div class="stat-heading">Doanh thu</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-2">
                                    <i class="pe-7s-cart"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text"><span class="count">{{ $totalOrders }}</span></div>
                                        <div class="stat-heading">Đơn hàng</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-4">
                                    <i class="pe-7s-users"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text"><span class="count">{{ $totalUsers }}</span></div>
                                        <div class="stat-heading">Người dùng</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib"><i class="ti-user text-primary border-primary"></i></div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text"><span class="count">{{ $newUsers }}</span></div>
                                        <div class="stat-heading">Người dùng mới</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="clearfix"></div>
            <!-- Orders -->
            <div class="orders">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title">Orders </h4>
                            </div>
                            <div class="card-body--">
                                <div class="table-stats order-table ov-h">
                                    <table class="table ">
                                        <thead>
                                            <tr>
                                                <th class="serial">#</th>
                                                <th>ID</th>
                                                <th>TÊN NGƯỜI DÙNG</th>
                                                <th>SỐ SẢN PHẨM</th>
                                                <th>SỐ LƯỢNG</th>
                                                <th>TỔNG TIỀN</th>
                                                <th>GIẢM GIÁ</th>
                                                <th>THÀNH TIỀN</th>
                                                <th>NGÀY ĐẶT HÀNG</th>
                                                <th class="status">TRẠNG THÁI</th>
                                            </tr>
                                        </thead>
                                        <tbody class="tbody-order">
                                            <?php $count = 1; ?>
                                            @forelse($orders as $order)
                                                <tr>
                                                    <td class="serial">{{ $count++ }}.</td>
                                                    <td class="order_id">#{{ $order->order_id }}</td>
                                                    <td><span class="name">{{ $order->username }}</span></td>
                                                    <td><span class="total_product d-flex">
                                                            {{ $order->total_product }}
                                                            <a href="{{ url('view-order' . $order->order_id) }}"
                                                                class="fa fa-eye view-products"
                                                                onclick="showProduct(event)">
                                                            </a>
                                                        </span></td>
                                                    <td><span class="count">{{ $order->total_quantity }}</span></td>
                                                    <td>$<span class="count">{{ $order->total_price }}</span></td>
                                                    <td>
                                                        $<span class="count">
                                                            {{ $order->total_price - $order->total_money }}
                                                        </span>
                                                    </td>
                                                    <td>$<span class="count">{{ $order->total_money }}</span></td>
                                                    <td><span class="order_date">{{ $order->order_date }}</span></td>
                                                    <td class="d-flex active">
                                                        @if ($order->status == 'đang chờ')
                                                            <a href="{{ url('update-status-order' . $order->order_id) }}"
                                                                class="badge badge-pending" onclick="onUpdateStatus(event)">
                                                                {{ $order->status }}
                                                            </a>
                                                        @else
                                                            <span class="badge badge-complete">{{ $order->status }}</span>
                                                        @endif
                                                        <a href="delete-order{{$order->order_id}}"
                                                            data-confirm-delete="true"
                                                            class="fa fa-trash-o icon-delete-user">
                                                        </a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td>
                                                        <p>No Orders</p>
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /#add-category -->
        </div>
        <!-- .animated -->
    </div>
    <div class="modal">
        <div class="container-modal js-container-modal">
            <a class="close-modal js-close-container">
                <i class="close-icon ti-close" onclick="hideProducts()"></i>
            </a>
            <div class="content-form">
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-lg-12 rs-pd">
                            <div class="card">
                                <a class="close-modal js-close-container">
                                    <i class="close-icon ti-close" onclick="hideProducts()"></i>
                                </a>
                                <div class="w-100 card-header text-center font-2xl "><span class="font-weight-bold ">CHI
                                        TIẾT</span><span class="font-weight-light"> ĐƠN HÀNG</span>
                                </div>

                                <div class="card-body--">
                                    <div class="table-stats order-table ov-h">
                                        <table class="table ">
                                            <thead>
                                                <tr>
                                                    <th class="serial">#</th>
                                                    <th>Người Dùng </th>
                                                    <th>Sản Phẩm</th>
                                                    <th>Số Lượng</th>
                                                    <th>Đơn Giá</th>
                                                </tr>
                                            </thead>
                                            <tbody class="tbody-order-detail">
                                            </tbody>
                                        </table>
                                    </div> <!-- /.table-stats -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert_order')
    @include('sweetalert::alert_order', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
    <!-- /.content -->
    <div class="clearfix"></div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $(".modal").on("click", function() {
                hideProducts();
            });

            $(".js-container-modal").on("click", function(event) {
                event.stopPropagation();
            });

        });

        function onUpdateStatus(event) {
            event.preventDefault();
            url = event.target.href;
            sendRequestUpdateStatus(url);
        }

        function sendRequestUpdateStatus(url) {
            $.ajax({
                url: url,
                type: "PUT",
                datatype: "json",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                success: function(response) {
                    $(".tbody-order").empty();

                    $.each(response, function(index, order) {
                        $(".tbody-order").append(`
                <tr>
                    <td class="serial">${index++}.</td>
                    <td class="order_id">#${order.order_id}</td>
                    <td><span class="name">${order.username}</span></td>
                    <td><span class="total_product">${
                        order.total_product
                    }</span></td>
                    <td><span class="count">${order.quantity}</span></td>
                    <td><span class="count">${order.total_price}</span></td>
                    <td>
                        <span class="count">
                            ${order.total_price - order.total_money}
                        </span>
                    </td>
                    <td><span class="count">${order.total_money}</span></td>
                    <td><span class="order_date">${order.order_date}</span></td>
                    <td>
                        ${
                            order.status == "đang chờ"
                                ? `<a href="${
                                                      window.location.origin /
                                                      "update-status-order".order.order_id
                                                  }" 
                                            class="badge badge-pending" onclick="onUpdateStatus(event)">${
                                                order.status
                                            }</a>`
                                : `<span class="badge badge-complete">${order.status}</span>`
                        }
                     </td>
                  </tr>
                `);
                    });
                },
                error: function(jqXHR, textStatus, errorThrown) {},
            });
        }

        function showProduct(event) {
            event.preventDefault();
            $(".modal").addClass("open");
            url = event.target.href;
            $.ajax({
                url: url,
                type: "GET",
                datatype: "json",
                success: function(data) {
                    $(".tbody-order-detail").empty();
                    $.each(data, function(index = 1, orderDetail) {
                        $(".tbody-order-detail").append(
                            `<tr>
                    <td class="serial">${index + 1}.</td>
                    <td><span class="name">${orderDetail.username}</span></td>
                    <td><span class="total_product">
                        ${orderDetail.name}
                        </span></td>
                    <td><span class="count">${orderDetail.quantity}</span></td>
                    <td><span class="count">$${
                        orderDetail.unit_price
                    }/1</span></td>
                </tr>`
                        );
                    });
                },
                error: function(jqXHR, textStatus, errorThrown) {},
            });
        }

        function hideProducts(event) {
            $(".modal").removeClass("open");
        }
    </script>
@endsection
