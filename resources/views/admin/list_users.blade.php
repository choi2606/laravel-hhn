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

        .btn-form-update {
            width: 50%;
            display: block;
            padding: 16px;
            margin-bottom: 16px;
            text-align: center;
            text-decoration: none;
        }

        a.fa.fa-pencil-square-o {
            font-size: 20px;
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

            function onChangeEntries(event) {
                var numberEntries = event.target.value;
                loadPageFirst(numberEntries);
            }

            function loadPageFirst(numberEntries, page = 1) {
                $.ajax({
                    url: `list-users/number_entries${numberEntries}?page=${page}`,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        numberEntries != -1 ?
                            loadListUserPagination(data, numberEntries, page) :
                            loadListUserFull(data, numberEntries);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {},
                });
            }

            function loadListUserFull(data, numberEntries) {
                $(".tbody-user")
                    .empty()
                    .append(
                        `<input type="hidden" name="storageNumberEntries" value="${numberEntries}">`
                    );
                var lengthData = data.length;
                $.each(data, function(index, user) {
                    $(".tbody-user").append(
                        `<tr>
                            <td>
                            <input type="checkbox" class="input-checkbox-user"
                                userID = "${user.user_id}">
                            <i class="check-box icheckbox"></i>
                            <input type="hidden" name="storageId" value="">
                            </td>
                            <td>${user.username}</td>
                            <td>${user.email}</td>
                            <td>${user.address}</td>
                            <td>${user.phone_number}</td>
                            <td align="center">
                                <a href="" onclick="showFormUpdateUser(event,'${user.user_id}','${user.username}','${user.email}','${user.address}','${user.phone_number}')"
                                    class="fa fa-pencil-square-o">
                                </a>
                                <a href="delete-users" userID = "${
                                    user.user_id
                                }" data-confirm-delete="true"
                                    class="fa fa-times icon-delete-user">
                                </a>
                            </td>
                        </tr>`
                    );
                });
                $(".textEntries")
                    .empty()
                    .append(`Đang hiển thị ${lengthData} / ${lengthData} mục`);
                $(".pagination").empty();
            }

            function loadListUserPagination(data, numberEntries, page = 1) {
                $(".tbody-user")
                    .empty()
                    .append(
                        `<input type="hidden" name="storagePageNumber" value="${page}"><input type="hidden" name="storageNumberEntries" value="${numberEntries}">`
                    );
                var users = data.data;
                var lastPage = data.last_page;
                var previousPage = data.prev_page_url;
                var nextPage = data.next_page_url;
                var fromField = data.from;
                var toNextField = data.to;
                var totalField = data.total;
                var paginationHtml = "";

                $.each(users, function(index, user) {
                    $(".tbody-user").append(
                        `<tr>
                            <td>
                            <input type="checkbox" class="input-checkbox-user" userID = "${user.user_id}">
                            <i class="check-box icheckbox"></i>
                            <input type="hidden" name="storageId" value="">
                            </td>
                            <td>${user.username}</td>
                            <td>${user.email}</td>
                            <td>${user.address}</td>
                            <td>${user.phone_number}</td>
                            <td align="center">
                                <a href="" onclick="showFormUpdateUser(event,'${user.user_id}','${user.username}','${user.email}','${user.address}','${user.phone_number}')"
                                    class="fa fa-pencil-square-o">
                                </a>
                                <a href="delete-users" userID = "${
                                    user.user_id
                                }" data-confirm-delete="true"
                                    class="fa fa-times icon-delete-user">
                                </a>
                            </td>
                        </tr>`
                    );
                });

                //show entries
                if (fromField != null && toNextField != null) {
                    $(".textEntries")
                        .empty()
                        .append(
                            `Đang hiển thị ${fromField} - ${toNextField} / ${totalField} mục`
                        );
                } else {
                    $(".textEntries").empty().append(`Không có mục nào để hiển thị`);
                }

                //total pagination
                for (var i = 1; i <= lastPage; i++) {
                    paginationHtml += `<li class="paginate_button page-item ${
                        page == i ? "active" : ""
                    }"><a href="list-users/number_entries${numberEntries}?page=${i}"
                                aria-controls="bootstrap-data-table" data-dt-idx="${i}" class="page-link">${i}</a>
                            </li>`;
                }

                //display button pagination
                $(".pagination")
                    .empty()
                    .append(
                        `<li class="paginate_button page-item previous ${
                            page == 1 ? "d-none" : ""
                        }"
                    id="bootstrap-data-table_previous">
                        <a href="${previousPage}"
                            aria-controls="bootstrap-data-table"
                            class="page-link">Previous
                        </a></li>
                    ${paginationHtml}
                    <li class="paginate_button page-item next  ${
                        page == lastPage ? "d-none" : ""
                    }" id="bootstrap-data-table_next">
                            <a href="${nextPage}" aria-controls="bootstrap-data-table"
                            class="page-link">Next
                            </a>
                    </li>`
                    );
            }

            function onCheckAll() {
                var isChecked = false;
                $('input[type="checkbox"]').each(function() {
                    if ($(this).prop("checked")) {
                        isChecked = true;
                        return false;
                    }
                });
                $('input[type="checkbox"]').prop("checked", !isChecked);
            }

            function sendRequestGetDataOnURLDelete(numberEntries, page) {
                $.ajax({
                    url: `delete-users/number_entries${numberEntries}?page=${page}`,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        loadListUserPagination(data, numberEntries, page);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {},
                });
            }

            function showFormUpdateUser(
                event,
                userID,
                username,
                email,
                address,
                phone_number) {
                event.preventDefault();
                $(".modal").addClass("open");
                $('input[name="storageId"]').val(userID);
                $('input[name="username"]').val(username);
                $('input[name="email"]').val(email);
                $('input[name="address"]').val(address);
                $('input[name="phone_number"]').val(phone_number);
            }

            function hideFormUpdateUser(event) {
                $(".modal").removeClass("open");
            }

            function onSubmitFormUpdateUser(event) {
                event.preventDefault();
                var userID = $('input[name="storageId"]').val();
                var username = $('input[name="username"]').val();
                var email = $('input[name="email"]').val();
                var address = $('input[name="address"]').val();
                var phone_number = $('input[name="phone_number"]').val();
                var page = $('input[name="storagePageNumber"]').val();
                var numberEntries = $('input[name="storageNumberEntries"]').val();
                sendUpdateData(
                    userID,
                    username,
                    email,
                    address,
                    phone_number,
                    numberEntries,
                    page
                );
            }

            function sendUpdateData(
                userID,
                username,
                email,
                address,
                phone_number,
                numberEntries,
                page
            ) {
                $.ajax({
                    url: `update-user/number_entries${numberEntries}?page=${page}`,
                    type: "PUT",
                    dataType: "json",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                    data: {
                        username: username,
                        email: email,
                        address: address,
                        phone_number: phone_number,
                        userID: userID,
                    },
                    success: function(response) {
                        loadListUserPagination(response, numberEntries, page);
                        if (numberEntries == -1) {
                            loadListUserFull(response, numberEntries);
                        }
                        Swal.fire({
                            text: "Cập nhập thành công!",
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
                        $(".modal").removeClass("open");
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            text: "Cập nhập thất bại!: " + status + ":" + error,
                            position: "top-right",
                            icon: "error",
                            timer: 3000,
                            showConfirmButton: false,
                            showCloseButton: true,
                            backdrop: false,
                            customClass: {
                                container: "swal2-container swal2-top-end",
                                popup: "swal2-popup swal2-toast swal2-icon-error swal2-show",
                                title: "swal2-title",
                                closeButton: "swal2-close",
                                icon: "swal2-icon swal2-error swal2-icon-show",
                            },
                        });
                    },
                });
            }

            function getDataOnURLUpdate(numberEntries, page) {
                $.ajax({
                    url: `update-user/number_entries${numberEntries}?page=${page}`,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        loadListUserPagination(data, numberEntries, page);
                    },
                    error: function(xhr, status, error) {},
                });
            }

            function onClearSearchAll() {
                $(".input-search-user").val("");
                var numberEntries = $('input[name="storageNumberEntries"]').val();
                loadPageFirst(numberEntries);
                $(".btn-reset-search").css("display", "none");
            }

            function onSearch(event) {
                var value = event.target.value;
                var numberEntries = $('input[name="storageNumberEntries"]').val();
                if (value === "") {
                    loadPageFirst(numberEntries);
                } else {
                    sendDataSearch(value, numberEntries);
                }
            }

            function sendDataSearch(value, numberEntries, page = 1) {
                $.ajax({
                    url: `search-users/number_entries${numberEntries}?page=${page}`,
                    type: "GET",
                    dataType: "json",
                    data: {
                        valueSearch: value,
                    },
                    success: function(data) {
                        $(".btn-reset-search").css("display", "inline");
                        if (numberEntries != -1) {
                            loadListUserPagination(data, numberEntries, page);
                            var lastPage = data.last_page;
                            var previousPage = data.prev_page_url + `&valueSearch=${value}`;
                            var nextPage = data.next_page_url + `&valueSearch=${value}`;
                            var paginationHtml = "";

                            //total pagination
                            for (var i = 1; i <= lastPage; i++) {
                                paginationHtml += `<li class="paginate_button page-item ${
                        page == i ? "active" : ""
                    }"><a href="search-users/number_entries${numberEntries}?page=${i}&valueSearch=${value}"
                        aria-controls="bootstrap-data-table" data-dt-idx="${i}" class="page-link">${i}</a>
                    </li>`;
                            }

                            //display button pagination
                            $(".pagination")
                                .empty()
                                .append(
                                    `<li class="paginate_button page-item previous ${
                            page == 1 ? "d-none" : ""
                        }"
                        id="bootstrap-data-table_previous">
                            <a href="${previousPage}"
                                aria-controls="bootstrap-data-table"
                                class="page-link">Previous
                            </a></li>
                        ${paginationHtml}
                        <li class="paginate_button page-item next  ${
                            page == lastPage ? "d-none" : ""
                        }" id="bootstrap-data-table_next">
                                <a href="${nextPage}" aria-controls="bootstrap-data-table"
                                class="page-link">Next
                                </a>
                        </li>`
                                );
                        } else {
                            loadListUserFull(data, numberEntries);
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {},
                });
            }

            function sortAscending(fieldName, numberEntries, page) {
                $.ajax({
                    url: `sort-ascending/number_entries${numberEntries}?page=${page}`,
                    type: "GET",
                    dataType: "json",
                    data: {
                        fieldName: fieldName,
                    },
                    success: function(data) {
                        if (numberEntries != -1) {
                            loadListUserPagination(data, numberEntries, page);
                            var lastPage = data.last_page;
                            var previousPage =
                                data.prev_page_url + `&fieldName=${fieldName}`;
                            var nextPage = data.next_page_url + `&fieldName=${fieldName}`;
                            var paginationHtml = "";

                            //total pagination
                            for (var i = 1; i <= lastPage; i++) {
                                paginationHtml += `<li class="paginate_button page-item ${
                        page == i ? "active" : ""
                    }"><a href="sort-ascending/number_entries${numberEntries}?page=${i}&fieldName=${fieldName}"
                        aria-controls="bootstrap-data-table" data-dt-idx="${i}" class="page-link">${i}</a>
                    </li>`;
                            }

                            //display button pagination
                            $(".pagination")
                                .empty()
                                .append(
                                    `<li class="paginate_button page-item previous ${
                            page == 1 ? "d-none" : ""
                        }"
                        id="bootstrap-data-table_previous">
                            <a href="${previousPage}"
                                aria-controls="bootstrap-data-table"
                                class="page-link">Previous
                            </a></li>
                        ${paginationHtml}
                        <li class="paginate_button page-item next  ${
                            page == lastPage ? "d-none" : ""
                        }" id="bootstrap-data-table_next">
                                <a href="${nextPage}" aria-controls="bootstrap-data-table"
                                class="page-link">Next
                                </a>
                        </li>`
                                );
                        } else {
                            loadListUserFull(data, numberEntries);
                        }
                    },
                    error: function() {},
                });
            }

            function sortDescending(fieldName, numberEntries, page) {
                $.ajax({
                    url: `sort-descending/number_entries${numberEntries}?page=${page}`,
                    type: "GET",
                    dataType: "json",
                    data: {
                        fieldName: fieldName,
                    },
                    success: function(data) {
                        if (numberEntries != -1) {
                            loadListUserPagination(data, numberEntries, page);
                            var lastPage = data.last_page;
                            var previousPage =
                                data.prev_page_url + `&fieldName=${fieldName}`;
                            var nextPage = data.next_page_url + `&fieldName=${fieldName}`;
                            var paginationHtml = "";

                            //total pagination
                            for (var i = 1; i <= lastPage; i++) {
                                paginationHtml += `<li class="paginate_button page-item ${
                        page == i ? "active" : ""
                    }"><a href="search-users/number_entries${numberEntries}?page=${i}&fieldName=${fieldName}"
                        aria-controls="bootstrap-data-table" data-dt-idx="${i}" class="page-link">${i}</a>
                    </li>`;
                            }

                            //display button pagination
                            $(".pagination")
                                .empty()
                                .append(
                                    `<li class="paginate_button page-item previous ${
                            page == 1 ? "d-none" : ""
                        }"
                        id="bootstrap-data-table_previous">
                            <a href="${previousPage}"
                                aria-controls="bootstrap-data-table"
                                class="page-link">Previous
                            </a></li>
                        ${paginationHtml}
                        <li class="paginate_button page-item next  ${
                            page == lastPage ? "d-none" : ""
                        }" id="bootstrap-data-table_next">
                                <a href="${nextPage}" aria-controls="bootstrap-data-table"
                                class="page-link">Next
                                </a>
                        </li>`
                                );
                        } else {
                            loadListUserFull(data, numberEntries);
                        }
                    },
                    error: function() {},
                });
            }
        </script>
    @endsection
