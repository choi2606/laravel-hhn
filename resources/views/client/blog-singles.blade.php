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
                    @if (Auth::user()->role == 1)
                        <div class="clearfix d-block">
                            <a href="#" data-target = "#updateFormModal" data-toggle="modal"
                                class="fa fa-pencil-square-o icon-update update_button ms-auto text-warning float-right">Cập
                                nhật blog</a>
                        </div>
                        <div class="modal fade" id="updateFormModal" tabindex="-1" role="dialog"
                            aria-labelledby="modalLabel" aria-hidden="true">
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
                                            <textarea style="white-space: pre-line" type="text" name="blogContentUpdate" class="form-control" rows='9'
                                                required>{{ $blog->text }}</textarea>
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
                    <h2 class="mb-3">{{ $blog->title }}</h2>
                    <p style="white-space: pre-line; font-size: 20px" id="blog_text">{{ $blog->text }}</p>
                    <div class="row">
                        <img class="img-fluid col-8 offset-2" src="{{ asset('client/images/blog/' . $blog->image_url) }}"
                            alt="">
                    </div>
                    <div class="tag-widget post-tag-container mb-5 mt-5">
                        <div class="tagcloud">
                            <a href="#" class="tag-cloud-link">Cuộc sống</a>
                            <a href="#" class="tag-cloud-link">Thể thao</a>
                            <a href="#" class="tag-cloud-link">công nghệ</a>
                            <a href="#" class="tag-cloud-link">du lịch</a>
                        </div>
                    </div>

                    <div class="about-author d-flex p-4 bg-light">
                        <div class="bio align-self-md-center mr-4">
                            <img src="{{ asset('client/images/admin.jpg') }}" alt="Image placeholder"
                                class="img-fluid mb-4">
                        </div>
                        <div class="desc align-self-md-center">
                            <h3>{{ $blog->username }}</h3>
                            <p>Empty desc</p>
                        </div>
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
                                        <textarea name="commentContent" id="message" cols="30" rows="3" class="form-control" required></textarea>
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
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="userName" placeholder="Tên*" required>
                                                </div>
                                                <div class="input-group mt-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fa fa-at" style="width: 18px"></i>
                                                        </span>
                                                    </div>
                                                    <input type="email" class="form-control form-control-sm"
                                                        name="userEmail" placeholder="Email*" required>
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
                                <li class="comment">
                                    <div class="vcard bio">
                                        <img src=" {{ asset('client/images/blog/comment' . $comment->image_url) }}"
                                            alt="Image placeholder">
                                    </div>
                                    <div class="comment-body">
                                        <h5>{{ $comment->username }}{{ $comment->unreg_username }}</h5>
                                        <div class="meta">
                                            {{ $comment->created_at ? \Carbon\Carbon::parse($comment->created_at)->format('d/m/Y \l\ú\c h:i A') : 'Unknow' }}
                                        </div>
                                        <p style="font-size: 18px">{{ $comment->text }}</p>
                                        <hr>
                                    </div>
                                </li>
                            @empty
                                No comments
                            @endforelse
                            {{-- <li class="comment">
                                <div class="vcard bio">
                                    <img src="{{ asset('client/images/person3.webp') }}" alt="Image placeholder">
                                </div>
                                <div class="comment-body">
                                    <h3>John Doe</h3>
                                    <div class="meta"> 12-02-2022 lúc 15:11pm</div>
                                    <p>Có một cách nhất định để tạo ra một dịch vụ, sự hiếu khách và trải nghiệm khiến mọi
                                        người luôn cảm thấy họ là người quan trọng.</p>
                                    <p><a href="#" class="reply">Trả lời</a></p>
                                </div>

                                <ul class="children">
                                    <li class="comment">
                                        <div class="vcard bio">
                                            <img src="{{ asset('client/images/person1.jpg') }}" alt="Image placeholder">
                                        </div>
                                        <div class="comment-body">
                                            <h3>John Doe</h3>
                                            <div class="meta"> 24-02-2022 lúc 8:30pm</div>
                                            <p>Tôi cảm thấy rất thích khi sử dụng dịch vụ của Shop best goods, thực phẩm
                                                tươi ngon, dịch vụ tốt và chất lượng. </p>
                                            <p><a href="#" class="reply">Trả lời</a></p>
                                        </div>


                                        <ul class="children">
                                            <li class="comment">
                                                <div class="vcard bio">
                                                    <img src="{{ asset('client/images/person4.jpg') }}"
                                                        alt="Image placeholder">
                                                </div>
                                                <div class="comment-body">
                                                    <h3>John Doe</h3>
                                                    <div class="meta"> 16-02-2022 lúc 22:11pm</div>
                                                    <p>Ngày nay các đồ dùng gia đình có rất nhiều mẫu mã, màu sắc tha hồ lựa
                                                        chọn. Các bạn có thể lựa chọn sao cho phù hợp với sở thích của bạn.
                                                        Đồng thời giá cả cũng hợp lý.</p>
                                                    <p><a href="#" class="reply">Trả lời</a></p>
                                                </div>

                                                <ul class="children">
                                                    <li class="comment">
                                                        <div class="vcard bio">
                                                            <img src="{{ asset('client/images/person1.jpg') }}"
                                                                alt="Image placeholder">
                                                        </div>
                                                        <div class="comment-body">
                                                            <h3>John Doe</h3>
                                                            <div class="meta"> 23-02-2022 lúc pm</div>
                                                            <p>Các đồ dùng thông minh đều thiết kế với cơ chế hoạt động
                                                                thông minh. Hoàn toàn tự động thực hiện theo ý muốn của con
                                                                người. Bạn có thể chủ động hẹn giờ bật tắt các thiết bị điện
                                                                khác thông qua việc hẹn giờ.</p>
                                                            <p><a href="#" class="reply">Trả lời</a></p>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li class="comment">
                                <div class="vcard bio">
                                    <img src="{{ asset('client/images/person1.jpg') }}" alt="Image placeholder">
                                </div>
                                <div class="comment-body">
                                    <h3>John Doe</h3>
                                    <div class="meta"> 27-02-2022 lúc 6:23pm</div>
                                    <p>Ngày trước thay vì cặm cụi làm việc nhà dọn dẹp bếp núc, nhà cửa bằng tay hoặc các
                                        dụng cụ lỗi thời. Thì nay đã có các đồ dùng thông minh hỗ trợ chị em. Chị em có thể
                                        thoải mái thư giãn, làm đẹp, spa,...mà vẫn đảm bảo công việc nhà.</p>
                                    <p><a href="#" class="reply">Trả lời</a></p>
                                </div>
                            </li> --}}
                        </ul>
                        <!-- END comment-list -->
                    </div>
                </div> <!-- .col-md-8 -->
                <div class="col-lg-4 sidebar ftco-animlúce">
                    <!-- <div class="sidebar-box">
                                                                                                  <form action="#" class="search-form">
                                                                                                    <div class="form-group">
                                                                                                      <span class="icon ion-ios-search"></span>
                                                                                                      <input type="text" class="form-control " placeholder="Search...">
                                                                                                    </div>
                                                                                                  </form>
                                                                                                </div> -->
                    <div class="sidebar-box ftco-animlúce">
                        <h3 class="heading">Loại sản phẩm</h3>
                        <ul class="clúcegories">
                            <li><a href="#">Rau, củ, quả<span>(12)</span></a></li>
                            <li><a href="#">Đồ gia dụng <span>(22)</span></a></li>
                            <li><a href="#">Bánh kẹo <span>(37)</span></a></li>
                            <li><a href="#">Mì ăn liền<span>(42)</span></a></li>
                        </ul>
                    </div>

                    <div class="sidebar-box ftco-animlúce">
                        <h3 class="heading">Blog gần đây</h3>
                        <div class="block-21 mb-4 d-flex">
                            <a class="blog-img mr-4"
                                style="background-image: url({{ asset('client/images/image1.jpg') }});"></a>
                            <div class="text">
                                <h3 class="heading-1"><a href="#">Sale 90% các mặt hàng rau củ quả từ ngày
                                        15-05-2022 đến 25-05-2022</a></h3>
                                <div class="meta">
                                    <div><a href="#"><span class="icon-calendar"></span> 15-05-2022</a></div>
                                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                                    <div><a href="#"><span class="icon-chlúc"></span> 34</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="block-21 mb-4 d-flex">
                            <a class="blog-img mr-4"
                                style="background-image: url({{ asset('client/images/image2.jpg') }});"></a>
                            <div class="text">
                                <h3 class="heading-1"><a href="#">Shop best goods thêm các mặt hàng gia dụng nhằm
                                        đáp ứng nhu cầu của khách hàng </a></h3>
                                <div class="meta">
                                    <div><a href="#"><span class="icon-calendar"></span> 10-04-2022</a></div>
                                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                                    <div><a href="#"><span class="icon-chlúc"></span> 11</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="block-21 mb-4 d-flex">
                            <a class="blog-img mr-4"
                                style="background-image: url({{ asset('client/images/image_3.jpg') }});"></a>
                            <div class="text">
                                <h3 class="heading-1"><a href="#">Sinh nhật 8 tuổi của Shop best goods giảm giá sốc
                                        tất cả các mặt hàng lên đến 99%</a></h3>
                                <div class="meta">
                                    <div><a href="#"><span class="icon-calendar"></span>01-02-2022</a></div>
                                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                                    <div><a href="#"><span class="icon-chlúc"></span>1000</a></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="sidebar-box ftco-animlúce">
                        <h3 class="heading">Tag Cloud</h3>
                        <div class="tagcloud">
                            <a href="#" class="tag-cloud-link">trái cây</a>
                            <a href="#" class="tag-cloud-link">thực phẩm tươi ngon</a>
                            <a href="#" class="tag-cloud-link">đồ gia dụng</a>
                            <a href="#" class="tag-cloud-link">gia dụng tiện ích</a>
                            <a href="#" class="tag-cloud-link">cà rốt</a>
                            <a href="#" class="tag-cloud-link">mì tôm</a>
                            <a href="#" class="tag-cloud-link">chảo chống dính</a>
                            <a href="#" class="tag-cloud-link">bánh bông lan</a>
                        </div>
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
