@extends('layouts.admin')
@section('title')
    <title>SBG Admin | Đơn Hàng</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('owner/assets/css/cs-updateorder.css') }}">
    <link rel="stylesheet" href="{{ asset('owner/assets/css/lib/datatable/dataTables.bootstrap.min.css') }}">
@endsection
@section('breadcrumbs')
    <li><a href="#">Quản lý đơn hàng</a></li>
    <li class="active">Danh sách đơn hàng</li>
@endsection
@section('content')
    <div class="content">
        <div class="animated fadeIn">
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
                                            <td>{{ number_format($order->total_amount, 0, ",", ".") }}đ</td>
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
                                                @if($order->status != 'success')
                                                <a href="update-status-order{{$order->order_id}}" status="{{$order->status}}" data-status = "{{$order->status}}" 
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
        </div><!-- .animated -->
    </div><!-- .content -->

    <div class="clearfix"></div>
    {{-- modal --}}
    @include('admin.order.modal')
    @include('admin.order.edit')
@endsection
@section('js')
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
