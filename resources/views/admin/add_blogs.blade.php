@extends('layouts.admin')
@section('css')
    img[src=""] {
        display: none;
    }
@endsection
@section('content')
    <div class="breadcrumbs">
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
                                    <li class="active">Diễn Đàn</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="animated fadeIn">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Thêm Diễn Đàn</strong>
                    </div>
                    <div class="card-body card-block">
                        <form method="post" action="add-blogs">
                            @csrf
                            <div class="form-group">
                                    <input type="text" id="username3" name="blogTitle" class="form-control"
                                        placeholder="Tiêu đề" required>
                            </div>
                            <div class="form-group">
                                <textarea type="text" id="username3" name="blogContent" class="form-control"
                                    placeholder="Nội dung" required></textarea>
                            </div>
                            <div class="form-group">
                                <input type="file" id="username3" name="blogImage" 
                                    accept="image/png, image/gif, image/jpeg">
                            </div>
                            <div class="form-actions form-group">
                                <button type="submit" 
                                //onclick="onAddCategory(event)"
                                    class="btn btn-success btn-sm px-4">Thêm</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="list-category">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Diễn Đàn</strong>
                        </div>
                        <div class="card-body">
                            <table class="table table-responsive-xl">
                                <thead>
                                    <tr class="d-flex justify-content-between">
                                        <th scope="col" class="w-20">#</th>
                                        <th scope="col" class="w-50">Tiêu đề</th>
                                        <th scope="col" class="w-100">Nội dung</th>
                                        <th scope="col" class="w-50">Ảnh</th>
                                        <th scope="col" class="w-20" align="end"></th>
                                    </tr>
                                </thead>
                                <tbody class="body-blog">
                                    <?php $count = 1; ?>
                                    @forelse ($blogs as $blog)
                                        <tr class="d-flex justify-content-between">
                                            <td class="w-20">{{ $count++ }}</th>
                                            <td class="w-50">{{ $blog->title }}</th>
                                            <td class="w-100">{{ $blog->text }}</th>
                                            <td class="w-50"><img src=" {{ asset('client/images/blog/'.$blog->image_url) }}" alt=""></th>
                                            <td class="w-20" align="end">
                                                <a href="#"
                                                    onclick="setValue(event, 
                                                    '{{ $blog->blog_id }}',
                                                   '{{ $blog->name }}' )"
                                                    class="fa fa-pencil-square-o icon-update"></a>
                                                <input type="hidden" name="blogId" value="">
                                                <a href="{{ url('/remove-blog' . $blog->blog_id) }}"
                                                    data-confirm-delete="true" class="fa fa-times">
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <p>No blogs</p>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div>
    </div>
    @include('sweetalert::alert_category')
    @include('sweetalert::alert_category', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
    <div class="clearfix"></div>
@endsection
@section('js')
@endsection