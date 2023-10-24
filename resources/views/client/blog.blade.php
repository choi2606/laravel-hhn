@extends('layouts.client')
@section('content')
<div class="hero-wrap hero-bread" style="background-image: url({{asset('client/images/bg1.jpg')}});">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animlúce text-center">
            <h1 class="mb-0 bread"><span class="mr-2"><a href="index.html" style="font-size: 30px; color: aliceblue;">BLOG</span></a></h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 ftco-animate">
						<div class="row">
							<div class="col-md-12 d-flex ftco-animate">
		            <div class="blog-entry align-self-stretch d-md-flex">
		              <a href="{{url('blog-singles')}}" class="block-20" style="background-image: url({{asset('client/images/image1.jpg')}});">
		              </a>
		              <div class="text d-block pl-md-4">
		              	<div class="meta mb-3">
		                  <div><a href="#">11-12-2022</a></div>
		                  <div><a href="#">Admin</a></div>
		                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
		                </div>
		                <h3 class="heading"><a href="#">Thực phẩm hữu cơ tốt cho sức khỏe của bạn</a></h3>
		                <p>Thực phẩm hữu cơ đang là xu hướng tiêu dùng thực dùng thực phẩm của thế giới.
                    </p>
		                <p><a href="{{url('blog-singles')}}" class="btn btn-primary py-2 px-3">Đọc thêm</a></p>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-12 d-flex ftco-animate">
		            <div class="blog-entry align-self-stretch d-md-flex">
		              <a href="{{url('blog-singles')}}" class="block-20" style="background-image: url({{asset('client/images/image2.jpg')}});">
		              </a>
		              <div class="text d-block pl-md-4">
		              	<div class="meta mb-3">
		                  <div><a href="#">19-12-2021</a></div>
		                  <div><a href="#">Admin</a></div>
		                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
		                </div>
		                <h3 class="heading"><a href="#">Sự tiện ích của đồ dùng gia dụng</a></h3>
		                <p>Đồ dùng gia đình thông minh là đồ gia dụng có những tính năng thông minh, với những giải pháp đa năng tiện ích. </p>
		                <p><a href="{{url('blog-singles')}}" class="btn btn-primary py-2 px-3">Đọc thêm</a></p>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-12 d-flex ftco-animate">
		            <div class="blog-entry align-self-stretch d-md-flex">
		              <a href="{{url('blog-singles')}}" class="block-20" style="background-image: url({{asset('client/images/image3.jpg')}});">
		              </a>
		              <div class="text d-block pl-md-4">
		              	<div class="meta mb-3">
		                  <div><a href="#">19-12-2021</a></div>
		                  <div><a href="#">Admin</a></div>
		                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
		                </div>
		                <h3 class="heading"><a href="#">Sale 90% các mặt hàng rau củ quả từ ngày 15-05-2022 đến 25-05-2022</a></h3>
		                <p>Hàng ngàn quà tặng hấp dẫn đang chờ đón. Hãy đến với chúng tôi.</p>
		                <p><a href="{{url('blog-singles')}}" class="btn btn-primary py-2 px-3">Đọc thêm</a></p>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-12 d-flex ftco-animate">
		            <div class="blog-entry align-self-stretch d-md-flex">
		              <a href="{{url('blog-singles')}}" class="block-20" style="background-image: url({{asset('client/images/image4.jpg')}});">
		              </a>
		              <div class="text d-block pl-md-4">
		              	<div class="meta mb-3">
		                  <div><a href="#">19-12-2021</a></div>
		                  <div><a href="#">Admin</a></div>
		                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
		                </div>
		                <h3 class="heading"><a href="#">
                      Shop best goods thêm các mặt hàng gia dụng nhằm đáp ứng nhu cầu của khách hàng</a></h3>
		                <p>Khách hàng thường muốn các sản phẩm độc lạ và nhiều chức năng hơn. Chúng tôi thêm các sản phẩm để giải quyết </p>
		                <p><a href="{{url('blog-singles')}}" class="btn btn-primary py-2 px-3">Đọc thêm</a></p>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-12 d-flex ftco-animate">
		            <div class="blog-entry align-self-stretch d-md-flex">
		              <a href="{{url('blog-singles')}}" class="block-20" style="background-image: url({{asset('client/images/image5.jpg')}});">
		              </a>
		              <div class="text d-block pl-md-4">
		              	<div class="meta mb-3">
		                  <div><a href="#">19-12-2021</a></div>
		                  <div><a href="#">Admin</a></div>
		                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
		                </div>
		                <h3 class="heading"><a href="#">
                      Sinh nhật 8 tuổi của Shop best goods giảm giá sốc tất cả các mặt hàng lên đến 99%</a></h3>
		                <p>Chúc mừng sinh nhật Shop best goods với hàng ngàn quà tặng và voucher dành cho khách hàng.</p>
		                <p><a href="{{url('blog-singles')}}" class="btn btn-primary py-2 px-3">Đọc thêm</a></p>
		              </div>
		            </div>
		          </div>
						</div>
          </div> <!-- .col-md-8 -->
          <div class="col-lg-4 sidebar ftco-animate">
            <!-- <div class="sidebar-box">
              <form action="#" class="search-form">
                <div class="form-group">
                  <span class="icon ion-ios-search"></span>
                  <input type="text" class="form-control" placeholder="Search...">
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
                <a class="blog-img mr-4" style="background-image: url({{asset('client/images/image1.jpg')}});"></a>
                <div class="text">
                  <h3 class="heading-1"><a href="#">Sale 90% các mặt hàng rau củ quả từ ngày 15-05-2022 đến 25-05-2022</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> 15-05-2022</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chlúc"></span> 34</a></div>
                  </div>
                </div>
              </div>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url({{asset('client/images/image2.jpg')}});"></a>
                <div class="text">
                  <h3 class="heading-1"><a href="#">Shop best goods thêm các mặt hàng gia dụng nhằm đáp ứng nhu cầu của khách hàng </a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> 10-04-2022</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chlúc"></span> 11</a></div>
                  </div>
                </div>
              </div>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url({{asset('client/images/image5.jpg')}});"></a>
                <div class="text">
                  <h3 class="heading-1"><a href="#">Sinh nhật 8 tuổi của Shop best goods giảm giá sốc tất cả các mặt hàng lên đến 99%</a></h3>
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
              <p>"Cửa hàng Shop best goods của chúng tôi la của hàng bách hóa với đa dạng hàng hóa đáp ứng tất cả nhu cầu của khách hàng. Shop best goods mong muốn đem lại sự thỏa mãn khi mua sắm của khách hàng và đặt khẩu hiệu "Khách hàng là thượng đế" lên hàng đầu"</p>
            </div>
          </div>

        </div>
      </div>
    </section> <!-- .section -->
    @endsection