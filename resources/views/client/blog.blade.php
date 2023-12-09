@extends('layouts.client')
@section('css')
<style>
    .linelimit-3 {
        line-height: 1.6;
        height: 4.8em;
        overflow: hidden;
    }
</style>
@endsection
@section('title')
<title>Diễn Đàn</title>
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
            <div class="col-lg-8 ftco-animate">
                <div class="scrolling-pagination">
                    <div class="row">
                        @forelse ($blogs as $blog)
                        <div class="col-md-12 d-flex">
                            <div class="blog-entry align-self-stretch d-md-flex">
                                <a href="{{ url('blog-singles/' . $blog->blog_id) }}" class="block-20"
                                    style="background-image: url({{ asset('client/images/blog/' . $blog->image_url) }});">
                                </a>
                                <div class="text d-block pl-md-4">
                                    <div class="meta mb-3">
                                        <div><a href="#">{{ \Carbon\Carbon::parse($blog->created_at)->format('d/m/Y')
                                                }}</a>
                                        </div>
                                        <div><a href="#" class="meta-chat"><span class="icon-chat"></span>
                                                {{$blog->com_count}}</a>
                                        </div>
                                    </div>
                                    <h3 class="heading"><a href="{{ url('blog-singles/' . $blog->blog_id) }}"> {{ $blog->title }}</a> </h3>
                                    <p class="linelimit-3"> {{ $blog->text }} </p>
                                    <p><a href="{{ url('blog-singles/' . $blog->blog_id) }}"
                                            class="btn btn-primary py-2 px-3">Đọc
                                            thêm</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        @empty
                        No blogs
                        @endforelse
                        {{ $blogs->links() }}
                    </div>
                </div>
            </div> <!-- .col-md-8 -->
            <div class="col-lg-4 sidebar ftco-animate">
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
                    <h3 class="heading">Có thể bạn sẽ muốn đọc</h3>
                    @forelse ( $randoms as $random_blog )
                    <div class="block-21 mb-4 d-flex">
                        <a href="{{ url('/blog-singles/'. $random_blog->blog_id)}}" class="blog-img mr-4"
                            style="background-image: url({{ asset('client/images/blog/' . $random_blog->image_url) }})"></a>
                        <div class="text">
                            <h3 class="heading-1"><a href="{{ url('/blog-singles/'. $random_blog->blog_id)}}">
                                    {{ $random_blog->title }}</a></h3>
                            <div class="meta">
                                <div><a href="#"><span class="icon-calendar"></span> {{ \Carbon\Carbon::parse($random_blog->created_at)->format('d/m/Y') }}</a></div>
                            </div>
                        </div>
                    </div>
                    @empty
                    Không có blog thích hợp
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
@section('js')
<script src="{{ asset('client/js/jscroll.js') }}"></script>
<script type="text/javascript">
    $('ul.pagination').hide();
        $(function() {
            $('.scrolling-pagination').jscroll({
                autoTrigger: true,
                padding: 0,
                nextSelector: '.pagination li.active + li a',
                contentSelector: 'div.scrolling-pagination',
                callback: function() {
                    $('ul.pagination').remove();
                }
            });
        });
</script>
@endsection