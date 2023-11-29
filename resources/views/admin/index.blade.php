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

            <div class="row">
                <div class="col-lg-12">
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
                            <h4 class="mb-3">Đơn hàng năm 2023 </h4>
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
        <!-- /#add-category -->
    </div>
    <!-- .animated -->
    </div>
    @include('sweetalert::alert_order')
    @include('sweetalert::alert_order', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
    <!-- /.content -->
    <div class="clearfix"></div>
@endsection
@section('js')
    @include('library.data-table.data')
    <script src="{{ asset('owner/assets/js/indexadmin.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#bootstrap-data-table-export').DataTable();


            if ($("#traffic-chart").length) {
                var chartTotalPrice = {{ $chartTotalPrice }};
                console.log(chartTotalPrice);
                var chart = new Chartist.Line(
                    "#traffic-chart", {
                        labels: [
                            "Tháng 1",
                            "Tháng 2",
                            "Tháng 3",
                            "Tháng 4",
                            "Tháng 5",
                            "Tháng 6",
                            "Tháng 7",
                            "Tháng 8",
                            "Tháng 9",
                            "Tháng 10",
                            "Tháng 11",
                            "Tháng 12",
                        ],
                        series: [
                            chartTotalPrice,
                        ],
                    }, {
                        low: 0,
                        showArea: true,
                        showLine: false,
                        showPoint: false,
                        fullWidth: true,
                        axisX: {
                            showGrid: true,
                        },
                    }
                );

                chart.on("draw", function(data) {
                    if (data.type === "line" || data.type === "area") {
                        data.element.animate({
                            d: {
                                begin: 2000 * data.index,
                                dur: 2000,
                                from: data.path
                                    .clone()
                                    .scale(1, 0)
                                    .translate(0, data.chartRect.height())
                                    .stringify(),
                                to: data.path.clone().stringify(),
                                easing: Chartist.Svg.Easing.easeOutQuint,
                            },
                        });
                    }
                });
            }

            //bar chart
            var ctx = document.getElementById("barChart");
            //    ctx.height = 200;
            var dataCharOrderDeliver = {{ $dataCharOrderDeliver }};
            var dataCharOrderCancel = {{ $dataCharOrderCancel }};
            var myChart = new Chart(ctx, {
                type: "bar",
                data: {
                    labels: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7",
                        "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"
                    ],
                    datasets: [{
                            label: "Đơn hàng đang giao",
                            data: dataCharOrderDeliver,
                            borderColor: "rgba(0, 194, 146, 0.9)",
                            borderWidth: "0",
                            backgroundColor: "rgba(0, 194, 146, 0.5)",
                        },
                        {
                            label: "Đơn hàng đã hủy",
                            data: dataCharOrderCancel,
                            borderColor: "rgba(0,0,0,0.09)",
                            borderWidth: "0",
                            backgroundColor: "rgba(0,0,0,0.07)",
                        },
                    ],
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                            },
                        }, ],
                    },
                },
            });

        });
    </script>
@endsection
