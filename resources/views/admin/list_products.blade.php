@extends('layouts.admin')

@section('css')
    <style>
        a.fa.fa-times {
            font-size: 20px;
        }

        .paginate_button.page-item {
            padding: 0px !important;
        }

        .modal .container-modal {
            padding-top: 36px;
        }

        div#categorySelectWrapper {
            padding: 0px 15px;
            width: 75%;
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

                                <div class="col-lg-12 d-flex">
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
        })
    </script>
@endsection
