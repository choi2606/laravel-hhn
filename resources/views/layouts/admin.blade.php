<!doctype html>
<html class="no-js" lang="">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('title')
    @include('library.admin.head')
    @yield('css')
    @yield('headtag')
</head>

<body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="index">
                        <a href="{{ url('/admin') }}"><i class="menu-icon fa fa-laptop"></i>Tổng Quan </a>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-cutlery"></i>Quản Lý Sản Phẩm</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-plus"></i><a href="{{ url('add-products') }}">Thêm sản phẩm</a>
                            </li>
                            <li><i class="fa fa-list-alt"></i><a href="{{ url('list-products') }}">Liệt Kê Sản
                                    Phẩm</a>
                            </li>
                        </ul>
                    </li>

                    
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-qrcode"></i>Quản Lý Mã Giảm</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li class="">
                                <i class="fa fa-plus"></i>
                                <a href="{{ url('add-discount') }}">
                                    Thêm Mã Giảm Giá
                                </a>
                            </li>
                            <li>
                                <i class="fa fa-list-alt"></i>
                                <a href="{{ url('list-discount') }}">
                                    Liệt Kê Mã Giảm Giá
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="">
                        <a href="{{ url('list-orders') }}" class="dropdown-toggle"> 
                            <i class="menu-icon ti ti-clipboard"></i>Đơn Hàng</a>
                    </li>



                    <li class="">
                        <a href="{{ url('list-categories') }}" class="dropdown" aria-expanded="false">
                            <i class="menu-icon fa fa-list-alt"></i>Danh Mục
                        </a>
                    </li>



                    <li class="">
                        <a href="{{ url('list-users') }}" class="list-users">
                            <i class="menu-icon fa fa-user-o"></i>Người Dùng</a>
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
                <div class="navbar-header d-flex">
                    <a class="navbar-brand" href="./"><img src="{{ asset('owner/images/logoapp.png') }}"
                            height="40px" width="40px" style="border-radius: 50%" alt="Logo"></a>
                    <a class="navbar-brand" href="./"><img src="{{ asset('owner/images/logoadmin.png') }}"
                            height="40px" width="800px" style="border-radius: 5%" alt="Logo"></a>

                    <a class="navbar-brand hidden" href="./"><img
                            src="{{ asset('owner/images/logoshop.png') }}" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">
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
        @if (!Route::is('admin.index'))
            <div class="breadcrumbs">
                <div class="breadcrumbs-inner">
                    <div class="row m-0">
                        <div class="col-sm-4">
                            <div class="page-header float-left">
                                <div class="page-title">
                                    <h1>Bảng Điều Khiển</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="page-header float-right">
                                <div class="page-title">
                                    <ol class="breadcrumb text-right">
                                        <li><a href="admin">Bảng điều khiển</a></li>
                                        @yield('breadcrumbs')
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @yield('content')
        <!-- Footer -->
    </div>
    <!-- /#right-panel -->
    @include('sweetalert::alert_admin')
    @include('sweetalert::alert_admin', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
    <!-- Scripts -->
    @include('library.admin.script')
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
