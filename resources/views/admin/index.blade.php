@extends('layouts.admin')
@section('title')
    <title>SBG Admin | Tổng Quan</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('owner/assets/css/cs-indexadmin.css') }}">
    <link rel="stylesheet" href="{{ asset('owner/assets/css/cs-updateorder.css') }}">
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
                                        <div class="stat-text"><span class="count-float">{{ $totalRevenue }}</span>đ</div>
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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Đơn hàng</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="order-table2 table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Mã Đơn hàng</th>
                                            <th>Tên người dùng</th>
                                            <th>Số sản phẩm</th>
                                            <th>Số lượng</th>
                                            <th>Thành tiền</th>
                                            <th>Ngày đặt</th>
                                            <th>Trạng thái</th>
                                            <th>Cập Nhập</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $count = 1; @endphp
                                        @forelse($orders as $order)
                                            <tr>
                                                <td>{{ $count++ }}</td>
                                                <td>{{ $order->order_code }}</td>
                                                <td>{{ $order->username }}</td>
                                                <td class="total_product d-flex">{{ $order->total_product }}
                                                    <a href="{{ url('view-order' . $order->order_id) }}"
                                                        class="fa fa-eye view-products" onclick="showProduct(event)">
                                                    </a>
                                                </td>
                                                <td>{{ $order->total_quantity }}</td>
                                                <td>{{ number_format($order->total_amount, 0, ',', '.') }}đ</td>
                                                <td>{{ $order->order_date }}</td>
                                                <td>
                                                    @if ($order->status == 'pending')
                                                        <span class="badge badge-pending">Đang chờ</span>
                                                    @elseif($order->status == 'success')
                                                        <span class="badge badge-complete">Hoàn thành</span>
                                                    @elseif($order->status == 'delivering')
                                                        <span class="badge badge-info">Đang giao</span>
                                                    @else
                                                        <span class="badge badge-danger">Đã hủy</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($order->status != 'success')
                                                        <a href="update-status-order{{ $order->order_id }}"
                                                            status="{{ $order->status }}"
                                                            data-status = "{{ $order->status }}"
                                                            onclick="showFormUpdateOrder(event)"
                                                            class="fa fa-pencil-square-o">
                                                        </a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            No orders
                                        @endforelse
                                    </tbody>
                                </table>
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
    @include('admin.order.modal')
    @include('admin.order.edit')
    @include('sweetalert::alert_order')
    @include('sweetalert::alert_order', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
    <!-- /.content -->
    <div class="clearfix"></div>
@endsection
@section('js')
    <script src="{{ asset('owner/assets/js/indexadmin.js') }}"></script>
    <script src="{{ asset('owner/assets/js/lib/data-table/datatables.min.js') }}"></script>
    <script src="{{ asset('owner/assets/js/lib/data-table/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('owner/assets/js/lib/data-table/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('owner/assets/js/lib/data-table/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('owner/assets/js/lib/data-table/jszip.min.js') }}"></script>
    <script src="{{ asset('owner/assets/js/lib/data-table/vfs_fonts.js') }}"></script>
    <script src="{{ asset('owner/assets/js/lib/data-table/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('owner/assets/js/lib/data-table/buttons.print.min.js') }}"></script>
    <script src="{{ asset('owner/assets/js/lib/data-table/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('owner/assets/js/init/datatables-init.js') }}"></script>
    <script src="{{ asset('owner/assets/js/updateorder.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#bootstrap-data-table-export').DataTable();
        });
    </script>
@endsection
