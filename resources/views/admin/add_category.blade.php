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
                                <li><a href="{{ url('/admin-dashboard') }}">Dashboard</a></li>
                                <li><a href="#">Danh Mục Sản Phẩm</a></li>
                                <li class="active">Thêm Danh Mục Sản Phẩm</li>
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
                <!--/.col-->
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">Thêm Danh Mục Sản Phẩm</div>
                        <div class="card-body card-block">
                            <form action="{{ url('save-category') }}" method="post" class="">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">Tên danh mục</div>
                                        <input type="text" id="username3" name="categoryName" class="form-control"
                                            placeholder="Nhập tên danh mục..." required>
                                    </div>
                                </div>
                                <div class="form-actions form-group">
                                    <button type="submit" class="btn btn-success btn-sm px-4">Thêm</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div>
    <div class="clearfix"></div>
@endsection
