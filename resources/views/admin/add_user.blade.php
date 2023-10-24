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
                                <li><a href="#">Quản Lý Người Dùng</a></li>
                                <li class="active">Thêm Người Dùng</li>
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
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">Thêm Người Dùng</div>
                        <div class="card-body card-block">
                            <form action="{{ url('add-user') }}" method="post" class="">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label class=" form-control-label">Tên người dùng</label>
                                    <input type="text" id="nf-email" name="userName" placeholder="Nhập tên người dùng.." class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Email</label>
                                    <input type="email" id="nf-email" name="email" placeholder="Nhập Email.." class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Mật khẩu</label>
                                    <input type="password" id="nf-email" name="password" placeholder="Nhập mật khẩu.." class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Địa chỉ</label>
                                    <input type="text" id="nf-text" name="address" placeholder="Nhập địa chỉ.." class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Số điện thoại</label>
                                    <input type="text" id="nf-text" name="phoneNumber" placeholder="Nhập số điện thoại.." class="form-control">
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
