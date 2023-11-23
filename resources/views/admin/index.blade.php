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
                                <div class="stat-icon dib"><i class="ti-server text-primary border-primary"></i></div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text"><span class="count">{{ $totalProducts }}</span></div>
                                        <div class="stat-heading">Tổng sản phẩm</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--  Traffic  -->
            <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title">Traffic </h4>
                            </div>
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="card-body">
                                        <!-- <canvas id="TrafficChart"></canvas>   -->
                                        <div id="traffic-chart" class="traffic-chart"></div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card-body">
                                        <div class="progress-box progress-1">
                                            <h4 class="por-title">Visits</h4>
                                            <div class="por-txt">96,930 Users (40%)</div>
                                            <div class="progress mb-2" style="height: 5px;">
                                                <div class="progress-bar bg-flat-color-1" role="progressbar" style="width: 40%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="progress-box progress-2">
                                            <h4 class="por-title">Bounce Rate</h4>
                                            <div class="por-txt">3,220 Users (24%)</div>
                                            <div class="progress mb-2" style="height: 5px;">
                                                <div class="progress-bar bg-flat-color-2" role="progressbar" style="width: 24%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="progress-box progress-2">
                                            <h4 class="por-title">Unique Visitors</h4>
                                            <div class="por-txt">29,658 Users (60%)</div>
                                            <div class="progress mb-2" style="height: 5px;">
                                                <div class="progress-bar bg-flat-color-3" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="progress-box progress-2">
                                            <h4 class="por-title">Targeted  Visitors</h4>
                                            <div class="por-txt">99,658 Users (90%)</div>
                                            <div class="progress mb-2" style="height: 5px;">
                                                <div class="progress-bar bg-flat-color-4" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div> <!-- /.card-body -->
                                </div>
                            </div> <!-- /.row -->
                            <div class="card-body"></div>
                        </div>
                    </div><!-- /# column -->
                </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="chartjs-size-monitor"
                                style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                <div class="chartjs-size-monitor-expand"
                                    style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                    <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink"
                                    style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                    <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                                </div>
                            </div>
                            <h4 class="mb-3">Bar chart </h4>
                            <canvas id="barChart" width="668" height="333"
                                style="display: block; height: 267px; width: 535px;"
                                class="chartjs-render-monitor"></canvas>
                        </div>
                    </div>
                </div>
            </div><!-- /# column -->
        </div>
        <!--  /Traffic -->
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
                                        <th>Người đặt</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Tổng cộng</th>
                                        <th>Tổng phụ</th>
                                        <th>Thành tiền</th>
                                        <th>Ngày đặt</th>
                                        <th>Trạng thái</th>
                                        <th>Cập Nhập</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $count = 1; @endphp
                                    @forelse($data as $order)
                                        <tr>
                                            <td>{{ $count++ }}</td>
                                            <td>{{ $order->order_code }}</td>
                                            <td>{{ $order->users()->first()->username }}</td>
                                            <td>
                                                <ol>
                                                    @foreach($order->orderDetail()->get() as $subitem)
                                                    <li>
                                                        {{$subitem->products()->first()->name}}
                                                    </li>
                                                    @endforeach
                                                </ol>
                                            </td>
                                            <td>{{ number_format($order->total_amount - $order->subtotal, 0, ",", ".") }}đ</td>
                                            <td>{{ number_format($order->subtotal, 0, ",", ".") }}đ</td>
                                            <td>{{ number_format($order->total_amount, 0, ",", ".") }}đ</td>
                                            <td>{{ $order->order_date }}</td>
                                            <td>
                                                @if ($order->status == 'pending')
                                                    <span class="badge badge-pending">Đang chờ</span>
                                                @elseif($order->status == 'success')
                                                    <span class="badge badge-complete">Đã giao</span>
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
        </div>
        <!-- /#add-category -->
    </div>
    <!-- .animated -->
    </div>
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#bootstrap-data-table-export').DataTable();

        });
    </script>
@endsection
