@extends('layouts.admin')
@section('css')
    <style>
        img[src=""] {
            display: none;
        }

        .linelimit-6 {
            line-height: 1.6;
            height: 15.25em;
            overflow: hidden;
        }
    </style>
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
                        <form method="post" action="add-blogs" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="titleInput">Tiêu đề</label>
                                <input type="text" id="titleInput" name="blogTitle" class="form-control"
                                    placeholder="Viết tiêu đề vào đây." required>
                            </div>
                            <div class="form-group">
                                <label for="contentInput">Nội dung</label>
                                <textarea type="text" id="contentInput" name="blogContent" class="form-control" placeholder="Thêm nội dung vào dây"
                                    rows='9' required></textarea>
                            </div>
                            <div class="form-group">
                                <input type="file" id="ImageInput" name="blogImage"
                                    accept="image/png, image/gif, image/jpeg">
                            </div>
                            <div class="form-actions form-group">
                                <button type="submit" class="btn btn-success btn-sm px-4">Thêm</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="list-blog">
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
                                        <th scope="col" class="w-50">Ngày đăng</th>
                                        <th scope="col" class="w-20" align="end"></th>
                                    </tr>
                                </thead>
                                <tbody class="body-blog">
                                    <?php $count = ($blogs->currentPage() - 1) * 5 + 1; ?>
                                    @forelse ($blogs as $blog)
                                        <tr class="d-flex justify-content-between">
                                            <td class="w-20 counter">{{ $count++ }}</td>
                                            <td class="w-50">{{ $blog->title }}</td>
                                            <td style="white-space: pre-line" class="w-100 linelimit-6">{{ $blog->text }}
                                            </td>
                                            <td class="w-50">
                                                <img src="{{ asset('client/images/blog/' . $blog->image_url) }}"
                                                    alt="">
                                            </td>
                                            <td scope="col" class="w-50">
                                                {{ \Carbon\Carbon::parse($blog->created_at)->format('d/m/Y') }}
                                            </td>
                                            <td class="w-20" align="end">
                                                <a href="#" data-target = "#updateFormModal" data-toggle="modal"
                                                    data-whatever={{ $blog->blog_id }}
                                                    onclick="showUpdateForm(event, '{{ $blog->title }}', `{{ $blog->text }}`)"
                                                    class="fa fa-pencil-square-o icon-update update_button"></a>
                                                <a href="#"
                                                    onclick="confirmDelete('{{ url('/remove-blog' . $blog->blog_id) }}')"
                                                    data-confirm-delete="true" class="fa fa-times"></a>
                                            </td>
                                        </tr>
                                    @empty
                                        <p>No blogs</p>
                                    @endforelse
                                </tbody>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="p-2">Đang hiện thị {{ $count - 5 }} - {{ $count - 1 }} mục trên
                                        {{ $record_count }}</div>
                                    <div>{{ $blogs->links() }}</div>
                                </div>
                            </table>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="p-2">Đang hiện thị {{ $count - 5 }} - {{ $count - 1 }} mục trên
                                    {{ $record_count }}</div>
                                <div>{{ $blogs->links() }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="updateFormModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                    aria-hidden="true">
                    <div class="card modal-dialog modal-lg modal-content" role="document">
                        <div class="modal-header">
                            <strong class="card-title">Cập Nhật Diễn Đàn</strong>
                        </div>
                        <div class="modal-body card-block">
                            <form method="post" action="update-blog" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" id="updateInput" name="blogID" value="0" required>
                                <div class="form-group">
                                    <label for="titleInput">Tiêu đề</label>
                                    <input type="text" id="titleUpdateInput" name="blogTitleUpdate"
                                        class="form-control" placeholder="Viết tiêu đề vào đây." required>
                                </div>
                                <div class="form-group">
                                    <label for="contentInput">Nội dung</label>
                                    <textarea style="white-space: pre-line" type="text" id="contentUpdateInput" name="blogContentUpdate"
                                        class="form-control" placeholder="Thêm nội dung vào dây" rows='9' required></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="file" id="imageUpdateInput" name="blogImageUpdate"
                                        accept="image/png, image/gif, image/jpeg">
                                </div>
                                <div class="form-actions form-group">
                                    <button type="submit" class="btn btn-success btn-sm px-4">Sửa</button>
                                </div>
                            </form>
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
    <script>
        $('#updateFormModal').on('show.bs.modal', function(event) {
            var a = $(event.relatedTarget)
            var blogID = a.data('whatever')
            var modal = $(this);
            modal.find('#updateInput').val(blogID)
        })

        function showUpdateForm(event, blogTitle, blogContent) {
            event.preventDefault()
            $('#titleUpdateInput').val(blogTitle)
            $('#contentUpdateInput').val(blogContent)
        }

        function confirmDelete(url) {
            if (confirm("Bạn có chắc chắn muốn xóa blog này không?")) {
                window.location.href = url
            }
        }
    </script>
@endsection
