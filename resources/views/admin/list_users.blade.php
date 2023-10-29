@extends('layouts.admin')

@section('css')
    <style>
        .icon-delete-user {
            font-size: 22px;
        }

        span.action {
            line-height: 26px;
            /* margin-left: 20px; */
        }
    </style>
@endsection
@section('content')
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Dashboard</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="{{ url('/admin') }}">Dashboard</a></li>
                                <li><a href="#">Quản Lý Người Dùng</a></li>
                                <li class="active">Liệt Kê Người Dùng</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Liệt Kê Người Dùng</strong>
                        </div>
                        <div class="card-body">
                            <div id="bootstrap-data-table_wrapper"
                                class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="dataTables_length" id="bootstrap-data-table_length"><label>Hiển thị
                                                <select name="bootstrap-data-table_length"
                                                    aria-controls="bootstrap-data-table"
                                                    class="form-control form-control-sm" onchange="onChangeEntries(event)">
                                                    <option value="10">10</option>
                                                    <option value="20">20</option>
                                                    <option value="-1">All</option>
                                                </select> mục </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div id="bootstrap-data-table_filter" class="dataTables_filter">
                                            <label>Tìm kiếm:
                                                <input type="search" class="form-control form-control-sm"
                                                    name="search_users" placeholder="" aria-controls="bootstrap-data-table"
                                                    onblur="onSearch(event)">
                                                <button type="button" class="btn btn-secondary btn-sm btn-reset-search"
                                                    onclick="onClearSearchAll()" style="display:none;">
                                                    Xóa tìm kiếm
                                                </button>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                            <thead>
                                                <tr role="row">
                                                    <th>#</th>
                                                    <th>
                                                        <div class="d-flex table-header-user">
                                                            <span>Tên người dùng</span>
                                                            <div class="box-icon-arrange">
                                                                <i class="ti-arrows-vertical"></i>
                                                            </div>
                                                        </div>
                                                    </th>
                                                    <th>
                                                        <div class="d-flex table-header-user">
                                                            <span>Email</span>
                                                            <div class="box-icon-arrange">
                                                                <i class="ti-arrows-vertical"></i>
                                                            </div>
                                                        </div>
                                                    </th>
                                                    <th>
                                                        <div class="d-flex table-header-user">
                                                            <span>Địa chỉ</span>
                                                            <div class="box-icon-arrange">
                                                                <i class="ti-arrows-vertical"></i>
                                                            </div>
                                                        </div>
                                                    </th>
                                                    <th>
                                                        <div class="d-flex table-header-user">
                                                            <span>Số điện thoại</span>
                                                            <div class="box-icon-arrange">
                                                                <i class="ti-arrows-vertical"></i>
                                                            </div>
                                                        </div>
                                                    </th>
                                                    <th>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="tbody-user">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <button type="button" class="btn btn-primary btn-sm" onclick="onCheckAll()">Chọn
                                            tất
                                        </button>
                                        <a href="{{ url('/delete-users') }}" data-confirm-delete="true"
                                            class="btn btn-danger btn-sm px-4"> Xóa
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-5">
                                        <div id="bootstrap-data-table_info" class="dataTables_info textEntries"
                                            role="status" aria-live="polite">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="dataTables_paginate paging_simple_numbers"
                                            id="bootstrap-data-table_paginate">
                                            <ul class="pagination">
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- end card --}}
                </div>

                <!--/.col-->

            </div>
        </div><!-- .animated -->
        <div class="modal">
            <div class="container-modal js-container-modal">
                <a class="close-modal js-close-container">
                    <i class="close-icon ti-close" onclick="hideFormUpdateUser()"></i>
                </a>
                <div class="content-form">
                    <div class="animated fadeIn">
                        <div class="row">
                            <div class="col-lg-12 rs-pd">
                                <div class="card">
                                    <a class="close-modal js-close-container">
                                        <i class="close-icon ti-close" onclick="hideFormUpdateUser()"></i>
                                    </a>
                                    <div class="w-100 card-header text-center font-2xl "><span class="font-weight-bold ">CẬP
                                            NHẬP</span><span class="font-weight-light"> NGƯỜI DÙNG</span>
                                    </div>

                                    <div class="card-body card-block">
                                        <div class="form-group">
                                            <label for="username" class=" form-control-label">Tên Người
                                                Dùng</label>
                                            <input type="text" id="company" placeholder="Nhập tên người dùng mới"
                                                class="form-control" name="username">
                                        </div>
                                        <div class="form-group"><label for="email"
                                                class=" form-control-label">Email</label><input type="text"
                                                id="vat" placeholder="Nhập email mới" class="form-control"
                                                name="email">
                                        </div>
                                        <div class="form-group"><label for="street" class=" form-control-label">Địa
                                                Chỉ</label><input type="text" id="street"
                                                placeholder="Nhập địa chỉ" class="form-control" name="address"></div>
                                        <div class="form-group"><label for="street" class=" form-control-label">Số
                                                Điện
                                                Thoại</label><input type="text" id="street"
                                                placeholder="Nhập số điện thoại" class="form-control"
                                                name="phone_number"></div>
                                    </div>

                                    <div class="col-lg-12 d-flex">
                                        <button type="button" class="btn btn-success btn-form-update"
                                            onclick="onSubmitFormUpdateUser(event)">
                                            <i class="fa fa-magic"></i>
                                            CẬP NHẬP
                                        </button>
                                        <button type="button" class="btn btn-secondary btn-form-update"
                                            onclick="hideFormUpdateUser(event)">
                                            ĐÓNG
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('sweetalert::alert_user')
        @include('sweetalert::alert_user', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
        <div class="clearfix"></div>
    @endsection
    @section('js')
        <script>
            $(document).ready(function() {
                $(".modal").on("click", function() {
                    hideFormUpdateUser();
                });

                $(".js-container-modal").on("click", function(event) {
                    event.stopPropagation();
                });

                var arrTh = [];
                var elementsTh = $(".table-header-user > span");
                elementsTh.each(function(index, element) {
                    arrTh.push(element.innerText);
                });

                $(document).on("click", ".pagination a", function(event) {
                    event.preventDefault();
                    var url = new URL(event.target.href);
                    var numberEntries = url.pathname.split('number_entries')[1];
                    var page = url.searchParams.get("page");
                    var pathName = url.pathname.split('/')[1];
                    var valueSearch = url.searchParams.get("valueSearch");
                    var fieldName = url.searchParams.get("fieldName");
                    console.log(pathName);
                    if (pathName == 'list-users') {
                        loadPageFirst(numberEntries, page);
                    } else if (pathName == 'update-user') {
                        getDataOnURLUpdate(numberEntries, page);
                    } else if (pathName == 'search-users') {
                        sendDataSearch(valueSearch, numberEntries, page);
                    } else if (pathName == 'delete-users') {
                        sendRequestGetDataOnURLDelete(numberEntries, page);
                    } else if (pathName == 'sort-ascending') {
                        sortAscending(fieldName, numberEntries, page);
                    } else {
                        sortDescending(fieldName, numberEntries, page);
                    }

                });
                loadPageFirst(10);

                var isSort = false;
                $(".box-icon-arrange").on("click", function(e) {
                    var page = $('input[name="storagePageNumber"]').val();
                    var numberEntries = $('input[name="storageNumberEntries"]').val();
                    var fieldName = $(this).closest(".table-header-user").find("span").text();
                    if (fieldName == arrTh[0]) {
                        fieldName = "username";
                    } else if (fieldName == arrTh[1]) {
                        fieldName = "email";
                    } else if (fieldName == arrTh[2]) {
                        fieldName = "address";
                    } else {
                        fieldName = "phone_number";
                    }
                    if (!isSort) {
                        sortAscending(fieldName, numberEntries, page);
                        isSort = true;
                    } else {
                        sortDescending(fieldName, numberEntries, page);
                        isSort = false;
                    }
                })
            });
        </script>
    @endsection
