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
                <span>CHO ĐƠN HÀNG TRÊN 1000k</span>
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
    @include('layouts.signnewfeed')

@endsection