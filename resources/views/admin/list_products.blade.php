@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" href="{{ asset('owner/assets/css/cs-listproduct.css') }}">
@endsection
@section('content')
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
                                <li><a href="{{ url('admin') }}">Bảng Điều Khiển</a></li>
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
                                                        <span>GIÁ GỐC</span>
                                                        <div class="box-icon-arrange">
                                                            <i class="ti-arrows-vertical"></i>
                                                        </div>
                                                    </div>
                                                </th>
                                                <th>
                                                    <div class="d-flex table-header-product">
                                                        <span>GIÁ BÁN</span>
                                                        <div class="box-icon-arrange">
                                                            <i class="ti-arrows-vertical"></i>
                                                        </div>

                                                    </div>
                                                </th>
                                                <th>SỐ LƯỢNG</th>
                                                <th>HÌNH</th>
                                                <th>TRẠNG THÁI</th>
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
                                        NHẬT</span><span class="font-weight-light"> SẢN PHẨM</span>
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
                                                <textarea style="height: 100px" name="productDesc" id="textarea-input" rows="9" placeholder="Nội dung..." class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Giá
                                                    gốc</label></div>
                                            <div class="col-12 col-md-3 mr-4">
                                                <div class="input-group-addon addon-vnd">đ</div><input type="text"
                                                    id="text-input" name="originalPrice" placeholder="Nhập giá gốc.. vd: 10000"
                                                    class="form-control input-price">
                                            </div>
                                            <div class="col col-md-2 ml-5"><label for="text-input"
                                                    class=" form-control-label">Giá
                                                    bán</label></div>
                                            <div class="col-12 col-md-3">
                                                <div class="input-group-addon addon-vnd">đ</div><input type="text"
                                                    id="text-input" name="sellingPrice" placeholder="Nhập giá bán.. vd: 10000"
                                                    class="form-control input-price">
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
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Trạng
                                                    thái</label></div>
                                            <div class="col-12 col-md-9"><input type="text" id="text-input"
                                                    name="status" value="" class="form-control">
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
                                        Cập nhật
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
    <script src="{{ asset('owner/assets/js/listproduct.js') }}"></script>
    <script src="{{ asset('owner/assets/js/sharedata.js') }}"></script>
@endsection
