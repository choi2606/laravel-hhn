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
          <div class="col-lg-8 ftco-animlúce">
						<h2 class="mb-3">#1. Thực phẩm hữu cơ tốt cho sức khỏe của bạn</h2>
            <p>Thực phẩm hữu cơ đang là xu hướng tiêu dùng thực dùng thực phẩm của thế giới. Ở Việt Nam, xu hướng dùng thực phẩm hữu cơ ngày càng cũng được phổ biến rộng rãi. Ngoài là nguồn thực phẩm sạch tốt cho sức khỏe cho người dùng, việc nuôi trồng thực phẩm hữu cơ còn giúp bảo vệ môi trường, cân bằng hệ sinh thái và bảo tồn sự đa dạng của sinh học.</p>
            <p>
              <img src="{{asset('client/images/image1.jpg')}}" alt="" class="img-fluid">
            </p>
            <p>Thực phẩm hữu cơ có nhiều chất dinh dưỡng và những người bị dị ứng với thực phẩm, hóa chất hoặc chất bảo quản thường thấy các triệu chứng của họ giảm hoặc biến mất khi họ chỉ ăn thực phẩm hữu cơ.</p>
            <h2 class="mb-3 mt-5">#2. Sự tiện ích của đồ dùng gia dụng</h2>
            <p>Đồ dùng gia đình thông minh là đồ gia dụng có những tính năng thông minh, với những giải pháp đa năng tiện ích. Với những thao tác đơn giản, tiện lợi, dễ sử dụng, giúp tiết kiệm thời gian, công sức đáp ứng nhu cầu sử dụng thường xuyên trong đời sống sinh hoạt hằng ngày của một gia đình, hộ gia đình.</p>
            <p>
              <img src="{{asset('client/images/image2.jpg')}}" alt="" class="img-fluid">
            </p>
            <p>Các đồ dùng thông minh đều thiết kế với cơ chế hoạt động thông minh. Hoàn toàn tự động thực hiện theo ý muốn của con người. Bạn có thể chủ động hẹn giờ bật tắt các thiết bị điện khác thông qua việc hẹn giờ. Hoàn toàn thay thế con người trong điều khiển và sử dụng các thiết bị trong gia đình. Thậm chí là điều khiển từ xa thông qua một thiết bị khác. Có thể thấy thiết bị hoạt động với cơ chế cực thông minh thay thế hoàn toàn con người. Sử dụng tiện lợi hơn hẳn so với các dòng thiết bị điện trước kia. Bên cạnh đó các đồ dùng đó cũng đảm bảo độ an toàn cao. Ví dụ như các bóng đèn chiếu sáng cảm ứng tự động sáng khi có người lại gần. Hoặc với những chiếc chuông cửa cảm ứng hồng ngoại tự động báo chuông khi có người lại gần. Vừa dùng làm chức năng báo khách, đồng thời báo chống trộm. Như vậy bạn có thể sử dụng đồng thời hoặc thay đổi chức năng sử dụng các sản phẩm một cách tiện lợi nhất.</p>
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
                <img src="{{asset('client/images/person1.jpg')}}" alt="Image placeholder" class="img-fluid mb-4">
              </div>
              <div class="desc align-self-md-center">
                <h3>Alex Allwood</h3>
                <p>Nó phụ thuộc vào cách khách hàng của bạn trải nghiệm thương hiệu - và thương hiệu đó khiến một người cảm thấy như thế nào.</p>
              </div>
            </div>


            <div class="pt-5 mt-5">
              <h3 class="mb-5">6 bình luận</h3>
              <ul class="comment-list">
                <li class="comment">
                  <div class="vcard bio">
                    <img src="{{asset('client/images/person2.webp')}}" alt="Image placeholder">
                  </div>
                  <div class="comment-body">
                    <h3></h3>
                    <div class="meta"> 27-02-2022 lúc 14:33pm</div>
                    <p>Không gì có thể phá hủy sắt, nhưng rỉ sét của chính nó có thể. Tương tự như vậy, không ai có thể phá hủy một con người.</p>
                    <p><a href="#" class="reply">Trả lời</a></p>
                  </div>
                </li>

                <li class="comment">
                  <div class="vcard bio">
                    <img src="{{asset('client/images/person3.webp')}}" alt="Image placeholder">
                  </div>
                  <div class="comment-body">
                    <h3>John Doe</h3>
                    <div class="meta"> 12-02-2022 lúc 15:11pm</div>
                    <p>Có một cách nhất định để tạo ra một dịch vụ, sự hiếu khách và trải nghiệm khiến mọi người luôn cảm thấy họ là người quan trọng.</p>
                    <p><a href="#" class="reply">Trả lời</a></p>
                  </div>

                  <ul class="children">
                    <li class="comment">
                      <div class="vcard bio">
                        <img src="{{asset('client/images/person1.jpg')}}" alt="Image placeholder">
                      </div>
                      <div class="comment-body">
                        <h3>John Doe</h3>
                        <div class="meta"> 24-02-2022 lúc 8:30pm</div>
                        <p>Tôi cảm thấy rất thích khi sử dụng dịch vụ của Shop best goods, thực phẩm tươi ngon, dịch vụ tốt và chất lượng. </p>
                        <p><a href="#" class="reply">Trả lời</a></p>
                      </div>


                      <ul class="children">
                        <li class="comment">
                          <div class="vcard bio">
                            <img src="{{asset('client/images/person4.jpg')}}" alt="Image placeholder">
                          </div>
                          <div class="comment-body">
                            <h3>John Doe</h3>
                            <div class="meta"> 16-02-2022 lúc 22:11pm</div>
                            <p>Ngày nay các đồ dùng gia đình có rất nhiều mẫu mã, màu sắc tha hồ lựa chọn. Các bạn có thể lựa chọn sao cho phù hợp với sở thích của bạn. Đồng thời giá cả cũng hợp lý.</p>
                            <p><a href="#" class="reply">Trả lời</a></p>
                          </div>

                            <ul class="children">
                              <li class="comment">
                                <div class="vcard bio">
                                  <img src="{{asset('client/images/person1.jpg')}}" alt="Image placeholder">
                                </div>
                                <div class="comment-body">
                                  <h3>John Doe</h3>
                                  <div class="meta"> 23-02-2022 lúc  pm</div>
                                  <p>Các đồ dùng thông minh đều thiết kế với cơ chế hoạt động thông minh. Hoàn toàn tự động thực hiện theo ý muốn của con người. Bạn có thể chủ động hẹn giờ bật tắt các thiết bị điện khác thông qua việc hẹn giờ.</p>
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
                    <img src="{{asset('client/images/person1.jpg')}}" alt="Image placeholder">
                  </div>
                  <div class="comment-body">
                    <h3>John Doe</h3>
                    <div class="meta"> 27-02-2022 lúc 6:23pm</div>
                    <p>Ngày trước thay vì cặm cụi làm việc nhà dọn dẹp bếp núc, nhà cửa bằng tay hoặc các dụng cụ lỗi thời. Thì nay đã có các đồ dùng thông minh hỗ trợ chị em. Chị em có thể thoải mái thư giãn, làm đẹp, spa,...mà vẫn đảm bảo công việc nhà.</p>
                    <p><a href="#" class="reply">Trả lời</a></p>
                  </div>
                </li>
              </ul>
              <!-- END comment-list -->
              
              <div class="comment-form-wrap pt-5">
                <h3 class="mb-5">Bình luận</h3>
                <form action="#" class="p-5 bg-light">
                  <div class="form-group">
                    <label for="name">Tên *</label>
                    <input type="text" class="form-control" id="name">
                  </div>
                  <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" class="form-control" id="email">
                  </div>
                  <div class="form-group">
                    <label for="website">Website</label>
                    <input type="url" class="form-control" id="website">
                  </div>

                  <div class="form-group">
                    <label for="message">Tin nhắn</label>
                    <textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <input type="submit" value="Thêm bình luận" class="btn py-3 px-4 btn-primary">
                  </div>

                </form>
              </div>
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
                <a class="blog-img mr-4" style="background-image: url({{asset('client/images/image_3.jpg')}});"></a>
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
