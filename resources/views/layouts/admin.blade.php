<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HHN Admin</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width,
    initial-scale=1">
    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{ asset('owner/assets/css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('owner/assets/css/lib/chosen/chosen.min.css') }}">
    <link rel="stylesheet" href="{{ asset('owner/assets/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ asset('owner/assets/css/lib/datatable/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('owner/assets/css/cs-adminlayout.css') }}">
    @yield('css')
    @yield('headtag')
</head>

<body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="{{ url('/admin') }}"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li class="menu-title">UI elements</li><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Quản Lý Người Dùng</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-puzzle-piece"></i><a href="{{ url('add-user') }}">Thêm Người Dùng</a>
                            </li>
                           
                            <li><i class="fa fa-id-badge"></i><a href="{{ url('list-users') }}" class="list-users"
                                {{-- onclick="getData(event)" --}}>Liệt Kê Người Dùng</a>
                        </li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Quản Lý Sản Phẩm</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-puzzle-piece"></i><a href="{{ url('add-products') }}">Thêm sản phẩm</a>
                            </li>
                            <li><i class="fa fa-id-badge"></i><a href="{{ url('list-products') }}">Liệt Kê Sản
                                    Phẩm</a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Quản Lý Đơn Hàng</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-id-badge"></i><a href="{{ url('update-orders') }}">Cập nhật Đơn
                                    Hàng</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Quản Lý Mã Giảm</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li class="">
                                <i class="fa fa-puzzle-piece"></i>
                                <a href="{{ url('add-discount') }}">
                                    Thêm Mã Giảm Giá
                                </a>
                            </li>
                            <li>
                                <i class="fa fa-id-badge"></i>
                                <a href="{{ url('list-discount') }}">
                                    Liệt Kê Mã Giảm Giá
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="">
                        <a href="{{ url('list-categories') }}" class="dropdown" aria-expanded="false">
                            <i class="menu-icon fa fa-cogs"></i>Danh Mục Sản Phẩm
                        </a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ url('/') }}"
                        style= "
    color: #00c292;
    font-weight: 800;
    font-size: 28px;
    text-transform: uppercase;
">SHOP BEST GOODS</a>
                    <a class="navbar-brand hidden" href="./"><img src="{{ asset('owner/images/logo2.png') }}"
                            alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..."
                                    aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>
                    </div>

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="{{ asset('owner/images/admin.jpg') }}"
                                alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">

                            <a class="nav-link" href="{{ url('admin-logout') }}"><i
                                    class="fa fa-sign-out"></i>Logout</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        <!-- /#header -->
        @yield('content')
        <!-- Footer -->
        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        Mọi thông tin về bản quyền xin liên hệ qua Mail:
                        <br> &copy; hungtroipk.balabala@gmail.com
                    </div>
                    <div class="col-sm-6 text-right">
                        Designed by <a href="">Colorlib</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->
    @include('sweetalert::alert_admin')
    @include('sweetalert::alert_admin', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
    <!-- Scripts -->

    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('owner/assets/js/main.js') }}"></script>
    <script src="{{ asset('owner/assets/js/lib/chosen/chosen.jquery.min.js') }}"></script>


    <!--  Chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

    <!--Chartist Chart-->
    <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
    <script src="{{ asset('owner/assets/js/init/weather-init.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
    <script src="{{ asset('owner/assets/js/init/fullcalendar-init.js') }}"></script>
    @yield('js')
    <script>
        function toastSuccess(message) {
            Swal.fire({
                text: message,
                position: "top-right",
                icon: "success",
                timer: 3000,
                showConfirmButton: false,
                backdrop: false,
                showCloseButton: true,
                customClass: {
                    container: "swal2-container swal2-top-end",
                    popup: "swal2-popup swal2-toast swal2-icon-success swal2-show",
                    title: "swal2-title",
                    closeButton: "swal2-close",
                    icon: "swal2-icon swal2-success swal2-icon-show",
                },
            });
        }

        function toastError(message) {
            Swal.fire({
                text: message,
                position: "top-right",
                icon: "error",
                timer: 3000,
                showConfirmButton: false,
                backdrop: false,
                showCloseButton: true,
                customClass: {
                    container: "swal2-container swal2-top-end",
                    popup: "swal2-popup swal2-toast swal2-icon-error swal2-show",
                    title: "swal2-title",
                    closeButton: "swal2-close",
                    icon: "swal2-icon swal2-error swal2-icon-show",
                },
            });
        }

        $.put = function(url, data, successCallback, errorCallback, datatype) {
            return $.ajax({
                    url: url,
                    type: 'PUT',
                    data: data,
                    dataType: datatype,
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    }

                })
                .done(successCallback)
                .fail(errorCallback)
        }

        $.post = function(url, data, successCallback, errorCallback, datatype) {
            return $.ajax({
                    url: url,
                    type: 'POST',
                    data: data,
                    dataType: datatype,
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    }

                })
                .done(successCallback)
                .fail(errorCallback)
        }
    </script>
</body>

</html>
