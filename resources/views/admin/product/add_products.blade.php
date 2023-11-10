@extends('layouts.admin')
@section('title')
    <title>SBG Admin | Thêm Sản Phẩm</title>
@endsection
@section('css')
    <style>
        .addon-vnd {
            position: absolute;
            right: 0;
            margin-right: 15px;
        }
    </style>
@endsection
@section('breadcrumbs')
    <li><a href="#">Quản lý sản phẩm</a></li>
    <li class="active">thêm sản phẩm</li>
@endsection
@section('content')
    <div class="content">
        <div class="animated fadeIn">
            <div class="orders">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Thêm Sản Phẩm</strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="{{ url('add-products') }}" method="post" enctype="multipart/form-data"
                                    class="form-horizontal">
                                    {{ csrf_field() }}

                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="select" class=" form-control-label">Chọn
                                                danh
                                                Mục</label></div>
                                        <div class="col-12 col-md-9">
                                            <select name="selectCate" id="select-cate" class="form-control">
                                                <option value="">Hãy chọn danh mục</option>
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
                                                name="productName" placeholder="Nhập tên sản phẩm..." class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Mô
                                                tả sản phẩm</label></div>
                                        <div class="col-12 col-md-9">
                                            <textarea name="productDesc" id="textarea-input" rows="9" placeholder="Nội dung..." class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Giá
                                                gốc</label></div>
                                        <div class="col-12 col-md-3 mr-5">
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
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Số
                                                lượng</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input"
                                                name="productQuantity" placeholder="Nhập số lượng..." class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Trạng
                                                thái</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input"
                                                name="status" value="Hiện" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="image-input" class=" form-control-label">Hình ảnh</label>
                                        </div>
                                        <div class="col-12 col-md-9"><input type="file" id="image-input"
                                                name="productImage" class="form-control-file" accept="image/*">
                                        </div>
                                    </div>

                                    <div class="form-actions form-group">
                                        <button type="submit" class="btn btn-success btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Thêm
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm"
                                            onclick="onResetValue(event)">
                                            <i class="fa fa-ban"></i> Làm mới
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
@endsection
@section('js')
    <script>
        function onResetValue(event) {
            $(".selectCate").val("");
            $('input[name="productName"]').val("");
            $('textarea[name="productDesc"]').val("");
            $('input[name="productPrice"]').val("");
            $('input[name="productQuantity"]').val("");
            $('input[name="productImage"]').val("");
        }
    </script>
@endsection
