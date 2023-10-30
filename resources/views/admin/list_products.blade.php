@extends('layouts.admin')

@section('css')
    <style>
        a.fa.fa-times {
            font-size: 20px;
        }

        .paginate_button.page-item {
            padding: 0px !important;
        }

        .card-body.row.body-product {
            justify-content: space-between;
            padding: 20px 0px 20px 36px;
            align-items: center;
        }

        label.d-flex {
            align-items: center;
            margin-bottom: 0px;
        }

        .text-search {
            width: 50%;
        }

        i.close-icon.close-search {
            position: absolute;
            right: 0;
            margin: 5px;
            color: #878787;
        }

        i.close-icon.close-search:hover {
            cursor: pointer;
        }

        .d-flex.table-header-product {
            align-items: center;
            justify-content: space-between;

        }

        .btn-form-update {
            width: 50%;
            display: block;
            padding: 4px 0px;
            margin-bottom: 16px;
            text-align: center;
            text-decoration: none;
        }

        a.fa.fa-pencil-square-o {
            font-size: 20px;
        }

        .gap-10 {
            gap: 10px;
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
            padding-top: 22px;
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
                                <li><a href="{{ url('admin') }}">Dashboard</a></li>
                                <li><a href="#">Quản Lý Sản Phẩm</a></li>
                                <li class="active">Liệt Kê Sản Phẩm</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="animated fadeIn">
            <div class="orders">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body row body-product">
                                <h4 class="box-title">Liệt Kê Sản Phẩm</h4>
                                <div id="bootstrap-data-table_filter" class="dataTables_filter">
                                    <label class="d-flex">
                                        <i class="close-icon ti-close close-search" style="display: none"
                                            onclick="onClearSearchProduct(event)"></i>
                                        <span class="text-search">Tìm kiếm</span>
                                        <input type="search" class="form-control form-control-sm" name="searchProduct"
                                            placeholder="" aria-controls="bootstrap-data-table"
                                            onfocus="onFocusSearchProduct(event)" onblur="onBlurSearchProduct(event)">
                                    </label>
                                </div>
                            </div>
                            <div class="card-body--">
                                <div class="table-stats order-table ov-h">
                                    <table class="table ">
                                        <thead>
                                            <tr>
                                                <th class="serial">#</th>
                                                <th>DANH MỤC</th>
                                                <th>
                                                    <div class="d-flex table-header-product">
                                                        <span>TÊN SẢN PHẨM</span>
                                                        <div class="box-icon-arrange">
                                                            <i class="ti-arrows-vertical"></i>
                                                        </div>
                                                    </div>
                                                </th>
                                                <th>MÔ TẢ</th>
                                                <th>
                                                    <div class="d-flex table-header-product">
                                                        <span>GIÁ</span>
                                                        <div class="box-icon-arrange">
                                                            <i class="ti-arrows-vertical"></i>
                                                        </div>
                                                    </div>
                                                </th>
                                                <th>SỐ LƯỢNG</th>
                                                <th>HÌNH</th>
                                                <th>HOẠT ĐỘNG</th>
                                            </tr>
                                        </thead>
                                        <tbody class="tbody-order">
                                        </tbody>
                                    </table>
                                </div>


                            </div>
                            <div class="card-footer d-flex">
                                <div class="col-sm-12 col-md-5">
                                    <div id="bootstrap-data-table_info" class="dataTables_info textEntries" role="status"
                                        aria-live="polite"></div>
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
            </div>
        </div>
    </div>
    <div class="modal">
        <div class="container-modal js-container-modal">
            <div class="content-form">
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-lg-12 rs-pd">
                            <div class="card">
                                <a class="close-modal js-close-container">
                                    <i class="close-icon ti-close" onclick="hideFormUpdateProduct(event)"></i>
                                </a>
                                <div class="w-100 card-header text-center font-2xl "><span class="font-weight-bold ">CẬP
                                        NHẬP</span><span class="font-weight-light"> SẢN PHẨM</span>
                                </div>

                                <div class="card-body card-block">
                                    <form action="update-product" method="post" enctype="multipart/form-data"
                                        class="form-horizontal form-update-product">
                                        {{ csrf_field() }}
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="select" class=" form-control-label">Danh
                                                    Mục</label></div>
                                            <div class="col-12 col-md-9">
                                                <select name="selectCate" id="select-cate" class="form-control">
                                                    <option value="">Please select</option>
                                                    @forelse($categories as $category)
                                                        <option value="{{ $category->category_id }}">
                                                            {{ $category->name }}
                                                        </option>
                                                    @empty
                                                        <option value="No Categories">No Categories</option>
                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input" class="form-control-label">
                                                    Tên sản phẩm</label></div>
                                            <div class="col-12 col-md-9"><input type="text" id="text-input"
                                                    name="productName" placeholder="Nhập tên sản phẩm..."
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="textarea-input"
                                                    class=" form-control-label">Mô
                                                    tả sản phẩm</label></div>
                                            <div class="col-12 col-md-9">
                                                <textarea name="productDesc" id="textarea-input" rows="9" placeholder="Nội dung..." class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input"
                                                    class=" form-control-label">Giá</label></div>
                                            <div class="col-12 col-md-9"><input type="text" id="text-input"
                                                    name="productPrice" placeholder="Nhập giá..." class="form-control">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input"
                                                    class=" form-control-label">Số lượng</label></div>
                                            <div class="col-12 col-md-9"><input type="text" id="text-input"
                                                    name="productQuantity" placeholder="Nhập số lượng..."
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="image-input" class=" form-control-label">Tải ảnh</label>
                                            </div>
                                            <div class="col-12 col-md-9 image-product">
                                                <input type="file" id="image-input" name="productImage"
                                                    class="form-control-file" accept="image/*">
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="col-lg-12 d-flex gap-10">
                                    <button type="button" class="btn btn-success btn-form-update"
                                        onclick="onSubmitFormUpdateProduct(event)">
                                        <i class="fa fa-magic"></i>
                                        CẬP NHẬP
                                    </button>
                                    <button type="button" class="btn btn-secondary btn-form-update"
                                        onclick="hideFormUpdateProduct(event)">
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
    @include('sweetalert::alert_product')
    @include('sweetalert::alert_product', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])

    <div class="clearfix"></div>
@endsection
@section('js')
    <script>
        $(function() {
            $(".modal").on("click", function() {
                hideFormUpdateProduct();
            });

            $(".js-container-modal").on("click", function(event) {
                event.stopPropagation();
            });


            $(document).on("click", ".pagination a", function(event) {
                event.preventDefault();
                var url = new URL(event.target.href);
                var page = url.searchParams.get("page");
                var pathName = url.pathname.split('/')[1];
                var valueSearch = url.searchParams.get("valueSearch");
                var fieldName = url.searchParams.get("fieldName");
                if (pathName == 'list-products') {
                    loadProductsFirst(page);
                } else if (pathName == 'search-products') {
                    sendDataSearchProduct(valueSearch, page);
                } else if (pathName == 'sort-ascending-products') {
                    sortAscendingProduct(fieldName, page);
                } else if (pathName == 'sort-descending-products') {
                    sortDescendingProduct(fieldName, page);
                } else {
                    loadListProductOnURLDelete(page);
                }

                $('.form-horizontal').on('submit', function(event) {
                    // event.preventDefault();
                })

            });
            loadProductsFirst();

            var arrTh = [];
            var elementsTh = $(".table-header-product > span");
            elementsTh.each(function(index, element) {
                arrTh.push(element.innerText);
            });
            var isSort = false;
            $(".box-icon-arrange").on("click", function(e) {
                var page = $('input[name="storagePageNumber"]').val();
                var fieldName = $(this).closest(".table-header-product").find("span").text();
                if (fieldName == arrTh[0]) {
                    fieldName = "product_name";
                } else if (fieldName == arrTh[1]) {
                    fieldName = "price";
                }

                if (!isSort) {
                    sortAscendingProduct(fieldName, page);
                    isSort = true;
                } else {
                    sortDescendingProduct(fieldName, page);
                    isSort = false;
                }
            })
        });

        function loadProductsFirst(page = 1) {
            $.ajax({
                url: `list-products?page=${page}`,
                typeof: "GET",
                dataType: "json",
                success: function(data) {
                    loadListProductPagination(data, page);
                },
                error: function(jqXHR, textStatus, errorThrown) {},
            });
        }

        function loadListProductPagination(data, page = 1) {
            $(".tbody-order")
                .empty()
                .append(
                    `<input type="hidden" name="storagePageNumber" value="${page}">`
                );
            var products = data.data;
            var lastPage = data.last_page;
            var previousPage = data.prev_page_url;
            var nextPage = data.next_page_url;
            var fromField = data.from;
            var toNextField = data.to;
            var totalField = data.total;
            var paginationHtml = "";
            $.each(products, function(index, product) {
                $(".tbody-order").append(
                    `<tr>
                    <td class="serial">${
                        index + 1
                    }.<input type="hidden" name="storageId" value=""></td>
                    <td><span class="">${product.category_name}</span></td>
                    <td><span class="">
                            ${product.product_name}
                        </span></td>
                    <td><span class="">${product.description}</span></td>
                    <td><span class="">$${product.price}</span></td>
                    <td><span class="">${product.quantity}</span></td>
                    <td>
                        <img src="./client/images/product/${product.image_url}"
                            width="50" height="50" alt="">
                    </td>
                    <td align="center">
                        <a href=""
                            onclick="showFormUpdateProduct(event,
                                '${product.product_id}',
                                '${product.category_name}',
                                '${product.product_name}',
                                '${product.description}', 
                                '${product.price}', 
                                '${product.quantity}', 
                                '${product.image_url}')"
                            class="fa fa-pencil-square-o">
                        </a>
                        <a href="remove-product" productID = "${
                            product.product_id
                        }" data-confirm-delete="true"
                            class="fa fa-times">
                        </a>
                    </td>
                </tr>`
                );
            });
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
        }"><a href="list-products?page=${i}"
                    aria-controls="bootstrap-data-table" data-dt-idx="${i}" class="page-link">${i}</a>
                </li>`;
            }

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

        function loadListProductOnURLDelete(page) {
            $.ajax({
                url: `remove-product?page=${page}`,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    loadListProductPagination(data, page);
                },
                error: function(jqXHR, textStatus, errorThrown) {},
            });
        }

        function showFormUpdateProduct(
            event,
            product_id,
            category_name,
            product_name,
            description,
            price,
            quantity,
            image_url
        ) {
            event.preventDefault();
            $(".modal").addClass("open");
            $("input[name=storageId]").val(product_id);
            $("input[name=productName]").val(product_name);
            $("textarea[name=productDesc]").val(description);
            $("input[name=productPrice]").val(price);
            $("input[name=productQuantity]").val(quantity);
            $(".image-product")
                .empty()
                .append(
                    `<input type="file" id="image-input" name="productImage" class="form-control-file" accept="image/*">
        <img src="./client/images/product/${image_url}" width="50" height="50" alt="">`
                );
            var selectCate = $("#select-cate");
            var findOption = selectCate.find(`option:contains("${category_name}")`);
            selectCate.val(findOption.val());
            selectCate.trigger("change");
        }

        function hideFormUpdateProduct(event) {
            event.preventDefault();
            $(".modal").removeClass("open");
        }

        function onSubmitFormUpdateProduct(event) {
            var productID = $("input[name=storageId]").val();
            var eleFormUpdate = $(".form-update-product");
            eleFormUpdate.attr("action", "update-product" + productID);
            $(".form-update-product").submit();
        }

        function onClearSearchProduct(event) {
            $("input[name=searchProduct]").val("");
            loadProductsFirst();
        }

        function onFocusSearchProduct(event) {
            $(".close-search").show();
        }

        function onBlurSearchProduct(event) {
            value = event.target.value;
            if (value == "") {
                $(".close-search").hide();
                loadProductsFirst();
            } else {
                sendDataSearchProduct(value);
            }
        }

        function sendDataSearchProduct(value, page = 1) {
            $.ajax({
                url: `search-products?page=${page}&value=${value}`,
                type: "GET",
                dataType: "json",
                data: {
                    valueSearch: value,
                },
                success: function(data) {
                    loadListProductPagination(data, page);
                    var lastPage = data.last_page;
                    var previousPage = data.prev_page_url + `&valueSearch=${value}`;
                    var nextPage = data.next_page_url + `&valueSearch=${value}`;
                    var paginationHtml = "";

                    //total pagination
                    for (var i = 1; i <= lastPage; i++) {
                        paginationHtml += `<li class="paginate_button page-item ${
                    page == i ? "active" : ""
                }"><a href="search-products?page=${i}&valueSearch=${value}"
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
                },
                error: function(jqXHR, textStatus, errorThrown) {},
            });
        }

        function sortAscendingProduct(fieldName, page) {
            $.ajax({
                url: `sort-ascending-products?page=${page}&fieldName=${fieldName}`,
                type: "GET",
                dataType: "json",
                data: {
                    fieldName: fieldName,
                },
                success: function(data) {
                    loadListProductPagination(data, page);
                    var lastPage = data.last_page;
                    var previousPage = data.prev_page_url + `&fieldName=${fieldName}`;
                    var nextPage = data.next_page_url + `&fieldName=${fieldName}`;
                    var paginationHtml = "";

                    //total pagination
                    for (var i = 1; i <= lastPage; i++) {
                        paginationHtml += `<li class="paginate_button page-item ${
                    page == i ? "active" : ""
                }"><a href="sort-ascending-products?page=${i}&fieldName=${fieldName}"
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
                },
                error: function() {},
            });
        }

        function sortDescendingProduct(fieldName, page) {
            $.ajax({
                url: `sort-descending-products?page=${page}&fieldName=${fieldName}`,
                type: "GET",
                dataType: "json",
                data: {
                    fieldName: fieldName,
                },
                success: function(data) {
                    loadListProductPagination(data, page);
                    var lastPage = data.last_page;
                    var previousPage = data.prev_page_url + `&fieldName=${fieldName}`;
                    var nextPage = data.next_page_url + `&fieldName=${fieldName}`;
                    var paginationHtml = "";

                    //total pagination
                    for (var i = 1; i <= lastPage; i++) {
                        paginationHtml += `<li class="paginate_button page-item ${
                    page == i ? "active" : ""
                }"><a href="search-users?page=${i}&fieldName=${fieldName}"
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
                },
                error: function() {},
            });
        }

        function onResetValue(event) {
            $('.selectCate').val("");
            $('input[name="productName"]').val("");
            $('textarea[name="productDesc"]').val("");
            $('input[name="productPrice"]').val("");
            $('input[name="productQuantity"]').val("");
            $('input[name="productImage"]').val("");
        }
    </script>
@endsection
