@extends('layouts.client')
@section('title')
<title>Giới Thiệu</title>
@endsection
@section('content')
<div class="hero-wrap hero-bread" style="background-image: url({{asset('client/images/bg1.jpg')}});">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="{{url('/')}}">Trang chủ</a></span> <span>Giới thiệu</span></p>
            <h1 class="mb-0 bread">Về chúng tôi</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-no-pb ftco-no-pt bg-light">
			<div class="container">
				<div class="row">
					<div class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url({{asset('client/images/about.jpg')}});">
						<a href="https://vimeo.com/45830194" class="icon popup-vimeo d-flex justify-content-center align-items-center">
							<span class="icon-play"></span>
						</a>
					</div>
					<div class="col-md-7 py-5 wrap-about pb-md-5 ftco-animate">
	          <div class="heading-section-bold mb-4 mt-md-5">
	          	<div class="ml-md-0">
		            <h2 class="mb-4">Chào mừng bạn đến với Shop best goods, một trang web Thương mại điện tử</h2>
	            </div>
	          </div>
	          <div class="pb-md-5">
	          	<p>Tưng bừng khai trương, tưng bừng giảm giá. Chúng tôi chỉ kiếm lòng tin không kiềm tiền. Hoan nghênh cả nhà lên đơn.</p>
							<p>Sản phẩm của shop chúng tôi đều là hàng thật đảm bảo chất lượng 100%. Chúng tôi hỗ trợ quý khách kiểm tra hàng hóa bằng bất cứ phương thức nào. Nếu có hàng giả, chúng tôi nguyện bồi hoàn gấp 100 lần cho quý khách. Quý khách hãy yên tâm mua sắm.</p>
              <p>Trên tinh thần khách hàng là thượng đế, chúng tôi nguyện phục vụ khách hàng bằng thái độ phục vụ chân thành nhất.</p>
							<p><a href="{{url('shop')}}" class="btn btn-primary">Mua sắm ngay bay giờ</a></p>
						</div>
					</div>
				</div>
			</div>
		</section>
    @include('layouts.signnewfeed')
		
		<section class="ftco-section testimony-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
          	<span class="subheading">Đánh giá</span>
            <h2 class="mb-4">Sự hài lòng của khách hàng</h2>
            <p>Trên tinh thần khách hàng là thượng đế, chúng tôi nguyện phục vụ khách hàng bằng thái độ phục vụ chân thành nhất</p>
          </div>
        </div>
        <div class="row ftco-animate">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel">
              <div class="item">
                <div class="testimony-wrap p-4 pb-5">
                  <div class="user-img mb-5" style="background-image: url({{asset('client/images/person1.jpg')}})">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text text-center">
                    <p class="mb-5 pl-4 line">Không gì có thể phá hủy sắt, nhưng rỉ sét của chính nó có thể. Tương tự như vậy, không ai có thể phá hủy một con người.</p>
                    <p class="name">Tony Hsieh</p>
                    <span class="position">Giám đốc điều hành</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap p-4 pb-5">
                  <div class="user-img mb-5" style="background-image: url({{asset('client/images/person2.webp')}})">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text text-center">
                    <p class="mb-5 pl-4 line">Nó phụ thuộc vào cách khách hàng của bạn trải nghiệm thương hiệu - và thương hiệu đó khiến một người cảm thấy như thế nào.</p>
                    <p class="name">Alex Allwood</p>
                    <span class="position">Giám đốc điều hành</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap p-4 pb-5">
                  <div class="user-img mb-5" style="background-image: url({{asset('client/images/person3.webp')}})">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text text-center">
                    <p class="mb-5 pl-4 line">Có một cách nhất định để tạo ra một dịch vụ, sự hiếu khách và trải nghiệm khiến mọi người luôn cảm thấy họ là người quan trọng.</p>
                    <p class="name">Julie Rice</p>
                    <span class="position">Đồng sáng lập SoulCycle và Giám đốc thương hiệu của WeWork</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap p-4 pb-5">
                  <div class="user-img mb-5" style="background-image: url({{asset('client/images/person4.jpg')}})">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text text-center">
                    <p class="mb-5 pl-4 line">Đến gần hơn bao giờ hết với khách hàng của bạn. Gần đến mức bạn nói rõ họ cần gì trước khi họ tự nhận ra điều đó.</p>
                    <p class="name">Steve Jobs</p>
                    <span class="position">Đồng sáng lập và cựu Giám đốc điều hành của Apple</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section bg-light">
			<div class="container">
				<div class="row no-gutters ftco-services">
          <div class="col-lg-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-shipped"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Miễn phí ship</h3>
                <span>ĐỐI VỚI ĐƠN ĐẶT HÀNG TRÊN $ 100</span>
              </div>
            </div>      
          </div>
          <div class="col-lg-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-2 d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-diet"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">LUÔN TƯƠI</h3>
                <span>GÓI SẢN PHẨM TỐT</span>
              </div>
            </div>    
          </div>
          <div class="col-lg-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-award"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">CHẤT LƯỢNG CAO</h3>
                <span>CHẤT LƯỢNG SẢN PHẨM</span>
              </div>
            </div>      
          </div>
          <div class="col-lg-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-4 d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-customer-service"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">hõ trợ</h3>
                <span>24/7 hỗ trợ</span>
              </div>
            </div>      
          </div>
        </div>
			</div>
		</section>
@endsection