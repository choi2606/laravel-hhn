@extends('layouts.admin')
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
                                <li class="active">Danh Mục Sản Phẩm</li>
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
                <div class="col-lg-6 list-category">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Danh Sách Danh Mục Sản Phẩm</strong>
                        </div>
                        <div class="card-body">
                            <table class="table table-responsive-xl">
                                <thead>
                                    <tr class="d-flex justify-content-between">
                                        <th scope="col" class="w-100">#</th>
                                        <th scope="col" class="w-100">Tên danh mục</th>
                                        <th scope="col" class="w-100" align="end"></th>
                                    </tr>
                                </thead>
                                <tbody class="body-category">
                                    <?php $count = 1; ?>
                                    @forelse ($categories as $category)
                                        <tr class="d-flex justify-content-between">
                                            <td class="w-100" scope="row">{{ $count++ }}</td>
                                            <td class="w-100">{{ $category->name }}</td>
                                            <td class="w-100" align="end">
                                                <a href="#"
                                                    onclick="setValue(event, 
                                                    '{{ $category->category_id }}',
                                                   '{{ $category->name }}' )"
                                                    class="fa fa-pencil-square-o icon-update"></a>
                                                <input type="hidden" name="categoryID" value="">
                                                <a href="{{ url('/remove-category' . $category->category_id) }}"
                                                    data-confirm-delete="true" class="fa fa-times">
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <p>No categories</p>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Thêm Danh Mục Sản Phẩm</strong>
                        </div>

                        <div class="card-body card-block">
                            <form>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">Tên danh mục</div>
                                        <input type="text" id="username3" name="categoryName" class="form-control"
                                            placeholder="Nhập tên danh mục..." required>
                                    </div>
                                </div>
                                <div class="form-actions form-group">
                                    <button type="submit" onclick="onAddCategory(event)"
                                        class="btn btn-success btn-sm px-4">Thêm</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Cập nhập Danh Mục Sản Phẩm</strong>
                        </div>
                        <div class="card-body card-block">
                            <div id="categorySelectWrapper">
                                <select data-placeholder="Chọn danh mục để chỉnh sửa" class="standardSelect category-select"
                                    tabindex="-1" style="display: none;" onchange="(onSelectCate(event))">
                                    <option value="" label="default"></option>
                                    @forelse($categories as $category)
                                        <option value="{{ $category->name }}"
                                            data-categoryid="{{ $category->category_id }}">{{ $category->name }}</option>
                                    @empty
                                        <option value="No Categories">No Categories</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="chosen-container chosen-container-single" title="" style="width: 20%;">
                                <div class="chosen-drop">
                                    <div class="chosen-search">
                                        <input class="chosen-search-input" type="text" autocomplete="off" tabindex="1">
                                    </div>
                                    <ul class="chosen-results"></ul>
                                </div>
                            </div>
                            <form class="form-update-category">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">Tên danh mục mới</div>
                                        <input type="text" id="username3" name="categoryNameUpdate" class="form-control"
                                            placeholder="Nhập tên danh mục..." required>
                                    </div>
                                </div>
                                <div class="form-actions form-group">
                                    <button type="submit" onclick="onSubmitCateUpdate(event)"
                                        class="btn btn-info btn-sm px-4">Cập nhập</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!--/.col-->
            </div>
        </div><!-- .animated -->
    </div>
    @include('sweetalert::alert_category')
    @include('sweetalert::alert_category', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
    <div class="clearfix"></div>
@endsection
@section('js')
    <script>
        jQuery(document).ready(function($) {
            jQuery(".standardSelect").chosen({
                disable_search_threshold: 10,
                no_results_text: "Oops, nothing found!",
                width: "100%"
            });
        });
        function setValue(event, categoryID, categoryName) {
    event.preventDefault();
    $('input[name="categoryNameUpdate"]').val(categoryName);
    $('input[name="categoryID"]').val(categoryID);
}

function onSubmitCateUpdate(event) {
    event.preventDefault();
    var newCategory = $('input[name="categoryNameUpdate"]').val();
    var categoryID = $('input[name="categoryID"]').val();
    $.ajax({
        url: "/update_category" + categoryID,
        type: "PUT",
        datatype: "json",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: {
            name: newCategory,
        },
        success: function (response) {
            //Xử lý dữ liệu nhận về từ máy chủ
            $(".body-category").empty(); // Xóa danh sách danh mục hiện tại
            $.each(response, function (index, category) {
                $(".body-category").append(
                    `<tr class="d-flex justify-content-between">
                        <td class="w-100" scope="row">${index + 1}</td>
                        <td class="w-100">${category.name}</td>
                        <td class="w-100" align="end">
                            <a href="#" onclick = "setValue(event,${
                                category.category_id},'${category.name}')" class="fa fa-pencil-square-o icon-update"></a>
                        <input type="hidden" name="categoryID" value="">
                            <a href="${
                                window.location.origin
                                }/remove-category${category.category_id}"
                                data-confirm-delete="true"
                                class="fa fa-times icon-remove-category">
                            </a>
                        </td>
                    </tr>`
                );
            });

            // load lại các thẻ trong phần tử select
            $("#categorySelectWrapper").empty();
            $("#categorySelectWrapper").append(
                `<select data-placeholder="Select the category to edit"
                        class="standardSelect category-select" tabindex="-1" style="display: none;"
                        onchange="(onSelectCate(event))">
                        <option value="" label="default"></option>
                        ${response
                            .map(
                                (category) => `
                        <option value="${category.name}"
                            data-categoryid="${category.category_id}">${category.name}
                        </option>`
                            )
                            .join("")};
                </select>`
            );

            jQuery(".standardSelect").chosen({
                disable_search_threshold: 10,
                no_results_text: "Oops, nothing found!",
                width: "100%",
            });
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
            $('input[name="categoryNameUpdate"]').val("");
        },
        error: function (xhr, status, error) {
            // Thực hiện các thao tác khác khi xóa thất bại (nếu cần)
            Swal.fire({
                text: "Cập nhập thất bại!",
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

function onSelectCate(event) {
    var selectedOption = $(event.target).find("option:selected");
    var categoryID = selectedOption.data("categoryid");
    var categoryName = selectedOption.val();
    $('input[name="categoryNameUpdate"]').val(categoryName);
    $('input[name="categoryID"]').val(categoryID);
}

function onAddCategory(event) {
    event.preventDefault();
    var category = $('input[name="categoryName"]').val();
    $.ajax({
        url: "/add-category",
        type: "POST",
        datatype: "json",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: {
            name: category,
        },
        success: function (response) {
            //Xử lý dữ liệu nhận về từ máy chủ
            $(".body-category").empty(); // Xóa danh sách danh mục hiện tại
            $.each(response, function (index, category) {
                $(".body-category").append(
                    `<tr class="d-flex justify-content-between">
					        <td class="w-100" scope="row">${index + 1}</td>
					        <td class="w-100">${category.name}</td>
					        <td class="w-100" align="end">
						        <a href="#" 
                                    onclick="setValue(event, ${
                                        category.category_id
                                    }, '${category.name}')"
                                    class="fa fa-pencil-square-o icon-update">
                                </a>
                                <input type="hidden" name="categoryID" value="">
						        <a href="${window.location.origin}/remove-category${
                        category.category_id
                    }"
                                    data-confirm-delete="true"
                                    class="fa fa-times icon-remove-category">
                                </a>
					        </td>
				        </tr>`
                );
            });

            // load lại các thẻ trong phần tử select
            $("#categorySelectWrapper").empty();
            $("#categorySelectWrapper").append(
                `<select data-placeholder="Select the category to edit"
                        class="standardSelect category-select" tabindex="-1" style="display: none;"
                        onchange="(onSelectCate(event))">
                        <option value="" label="default"></option>
                        ${response
                            .map(
                                (category) => `
                        <option value="${category.name}"
                            data-categoryid="${category.category_id}">${category.name}
                        </option>`
                            )
                            .join("")};
                </select>`
            );

            jQuery(".standardSelect").chosen({
                disable_search_threshold: 10,
                no_results_text: "Oops, nothing found!",
                width: "100%",
            });
            Swal.fire({
                text: "Thêm thành công!",
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
            $('input[name="categoryName"]').val("");
        },
        error: function (xhr, status, error) {
            // Thực hiện các thao tác khác khi xóa thất bại (nếu cần)
            Swal.fire({
                text: "Thêm thất bại!",
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

    </script>
@endsection
