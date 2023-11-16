@extends('layouts.admin')
@section('title')
    <title>SBG Admin | Danh Mục</title>
@endsection
@section('css')
@endsection
@section('breadcrumbs')
    <li class="active">Danh mục</li>
@endsection
@section('content')
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
                            <strong class="card-title">Cập nhật Danh Mục Sản Phẩm</strong>
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
                                        class="btn btn-info btn-sm px-4">Cập nhật</button>
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
    <script src="{{ asset('owner/assets/js/listcategory.js') }}"></script>
@endsection
