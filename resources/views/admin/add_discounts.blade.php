@extends('layouts.admin')
@section('css')
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
                                <li><a href="#">Quản Lý Mã Giảm Giá</a></li>
                                <li class="active">Thêm Mã Giảm</li>
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
                                <strong class="card-title">Thêm Mã Giảm Giá</strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="{{ url('add-discount') }}" method="post" class="form-horizontal">
                                    {{ csrf_field() }}

                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class="form-control-label">
                                                Tên mã</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="codeName"
                                                placeholder="Nhập tên mã giảm giá..." class="form-control">
                                        </div>
                                    </div>
                                    @error('codeName')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror


                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class="form-control-label">
                                                Loại mã</label></div>
                                        <div class="col-12 col-md-9">
                                            <select name="selectType" id="select-type" class="form-control">
                                                <option value="">Hãy chọn loại mã</option>
                                                <option value="1">
                                                    Theo phần trăm (%)
                                                </option>
                                                <option value="2">
                                                    Theo giá trị thực
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    @error('selectType')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="row form-group d-none" id="percent">
                                        
                                    </div>
                                    @error('discount')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="row form-group  d-none" id="value">
                                        
                                    </div>
                                    @error('discount')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="row form-group" id="dateExpire">
                                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">
                                                Ngày hết hạn
                                            </label></div>
                                        <div class="col-12 col-md-9"><input type="date" id="date-input" name="expire"
                                                placeholder="Nhập giá trị ..." class="form-control">
                                        </div>
                                    </div>
                                    @error('expire')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Mô tả
                                            </label></div>
                                        <div class="col-12 col-md-9">
                                            <textarea name="description" id="textarea-input" rows="9" placeholder="Nội dung..." class="form-control"></textarea>
                                        </div>
                                    </div>
                                    @error('description')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror


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
<script src="{{ asset('owner/assets/js/adddiscount.js') }}"></script>
@endsection
