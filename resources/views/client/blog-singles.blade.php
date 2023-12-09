@extends('layouts.client')
@section('css')
<style>
    img[src=""] {
        display: none;
    }
</style>
@section('title')
<title>Chi Tiết Blog</title>
@endsection
@section('content')
<div class="hero-wrap hero-bread" style="background-image: url({{ asset('client/images/bg1.jpg') }});">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animlúce text-center">
                <h1 class="mb-0 bread"><span class="mr-2"><a href="index.html"
                            style="font-size: 30px; color: aliceblue;">BLOG</span></a></h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section ftco-degree-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 ftco-animlúce">
                @if (Auth::user())
                @if (Auth::user()->role == 1)
                <div class="clearfix d-block">
                    <a href="#" data-target="#updateFormModal" data-toggle="modal"
                        class="fa fa-pencil-square-o icon-update update_button ms-auto text-warning float-right">Cập
                        nhật blog</a>
                </div>
                <div class="modal fade" id="updateFormModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                    aria-hidden="true">
                    <div class="card modal-dialog modal-lg modal-content" role="document">
                        <div class="modal-header">
                            <strong class="card-title">Cập Nhật Diễn Đàn</strong>
                        </div>
                        <div class="modal-body card-block">
                            <form method="post" action="/update-blog" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" id="updateInput" name="blogID" value={{ $blog->blog_id }}
                                required>
                                <div class="form-group">
                                    <label for="titleInput">Tiêu đề</label>
                                    <input type="text" name="blogTitleUpdate" class="form-control"
                                        placeholder="Viết tiêu đề vào đây." value="{{ $blog->title }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="contentInput">Nội dung</label>
                                    <textarea style="white-space: pre-line" type="text" name="blogContentUpdate"
                                        class="form-control" rows='9' required>{{ $blog->text }}</textarea>
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
                @endif
                @endif
                <h2 class="mb-3">{{ $blog->title }}</h2>
                <p style="white-space: pre-line; font-size: 20px" id="blog_text">{{ $blog->text }}</p>
                <div class="row">
                    <img class="img-fluid col-8 offset-2" src="{{ asset('client/images/blog/' . $blog->image_url) }}"
                        alt="">
                </div>

                <div class="comment-form-wrap pt-5">
                    <h3 class="mb-5">Bình luận</h3>

                    <form method="post" action="comment" class="p-3 bg-light">
                        @csrf
                        <div class="row">
                            <div class="col-2 d-none d-md-block p-md-5"><i class="fa fa-user-circle"
                                    style="font-size: 64px"></i></div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="message">Bình luận</label>
                                    <textarea name="commentContent" id="message" cols="30" rows="3" class="form-control"
                                        required></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <input type="hidden" name="blogID" value="{{ $blog->blog_id }}">
                                        @auth
                                        <input type="hidden" name="userID" value="{{ Auth::user()->user_id }}">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fa fa-user" style="width: 18px"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="text-success form-control form-control-sm"
                                                name="userName" value="{{ Auth::user()->username }}" readonly>
                                        </div>
                                        <div class="input-group mt-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fa fa-at" style="width: 18px"></i>
                                                </span>
                                            </div>
                                            <input type="email" class="text-success form-control form-control-sm"
                                                name="userEmail" value="{{ Auth::user()->email }}" readonly>
                                        </div>
                                        @endauth
                                        @guest
                                        <input type="hidden" name="userID" value=-1>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fa fa-user" style="width: 18px"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm" name="userName"
                                                placeholder="Tên*" required>
                                        </div>
                                        <div class="input-group mt-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fa fa-at" style="width: 18px"></i>
                                                </span>
                                            </div>
                                            <input type="email" class="form-control form-control-sm" name="userEmail"
                                                placeholder="Email*" required>
                                        </div>
                                        @endguest
                                    </div>
                                    <div class="col-md-4">
                                        <input type="submit" value="Bình luận"
                                            class="btn btn-primary float-right mt-2 mt-md-4">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="pt-5 mt-5">
                    <h3 class="mb-5">{{ $comments->count() }} bình luận</h3>
                    <ul class="comment-list">
                        @forelse ($comments as $comment)
                        <li>
                            <div class="comment-body">
                                <h3>{{ $comment->username }}{{ $comment->unreg_username }}</h3>
                                <div class="meta">
                                    {{ $comment->created_at ? \Carbon\Carbon::parse($comment->created_at)->format('d/m/Y
                                    \l\ú\c h:i A') : 'Unknow' }}
                                </div>
                                <p style="font-size: 18px">{{ $comment->text }}</p>
                                <hr>
                            </div>
                        </li>
                        @empty
                        No comments
                        @endforelse
                    </ul>
                    <!-- END comment-list -->
                </div>
            </div> <!-- .col-md-8 -->
            <div class="col-lg-4 sidebar ftco-animlúce">
                <div class="sidebar-box ftco-animate">
                    <h3 class="heading">Loại sản phẩm</h3>
                    <ul class="clúcegories">
                        @forelse ($category_count as $category)
                            <li><a href="#">{{ $category->name }}<span>({{ $category->total }})</span></a></li>
                        @empty
                            No Category Possible
                        @endforelse
                    </ul>
                </div>

                <div class="sidebar-box ftco-animlúce">
                    <h3 class="heading">Blog gần đây</h3>
                    @forelse ( $recents as $recent_blog )
                    <div class="block-21 mb-4 d-flex">
                        <a href="{{ url('/blog-singles/'. $recent_blog->blog_id)}}" class="blog-img mr-4"
                            style="background-image: url({{ asset('client/images/blog/' . $recent_blog->image_url) }})"></a>
                        <div class="text">
                            <h3 class="heading-1"><a href="{{ url('/blog-singles/'. $recent_blog->blog_id)}}">
                                    {{ $recent_blog->title }}</a></h3>
                            <div class="meta">
                                <div><a href="#"><span class="icon-calendar"></span> {{ \Carbon\Carbon::parse($recent_blog->created_at)->format('d/m/Y') }}</a></div>
                            </div>
                        </div>
                    </div>
                    @empty
                    Không có blog gần đây
                    @endforelse
                </div>

                <div class="sidebar-box ftco-animlúce">
                    <h3 class="heading">Đoạn trích</h3>
                    <p>"Cửa hàng Shop best goods của chúng tôi la của hàng bách hóa với đa dạng hàng hóa đáp ứng tất cả
                        nhu cầu của khách hàng. Shop best goods mong muốn đem lại sự thỏa mãn khi mua sắm của khách hàng
                        và đặt khẩu hiệu "Khách hàng là thượng đế" lên hàng đầu"</p>
                </div>
            </div>

        </div>
    </div>
</section> <!-- .section -->
@endsection