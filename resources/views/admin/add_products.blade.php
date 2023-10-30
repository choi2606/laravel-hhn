@extends('layouts.admin')
@section('css')
    <style>
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
                                <li><a href="#">Quản Lý Sản Phẩm</a></li>
                                <li class="active">Thêm Sản Phẩm</li>
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
                                        <div class="col col-md-3"><label for="text-input"
                                                class=" form-control-label">Giá</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input"
                                                name="productPrice" placeholder="Nhập giá..." class="form-control">
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
                                        <button type="reset" class="btn btn-danger btn-sm" onclick="onResetValue(event)">
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
    <script></script>
@endsection
