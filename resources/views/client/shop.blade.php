@extends('layouts.client')
@section('title')
<title>Mua Sắm</title>
@endsection
@section('content')
<div class="hero-wrap hero-bread" style="background-image: url({{asset('client/images/bg1.jpg')}});">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Trang chủ</a></span> <span>Sản phẩm</span></p>
            <h1 class="mb-0 bread">danh sách sản phẩm</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-md-10 mb-5 text-center categories">
    				<ul class="product-category">
						<li><a href="{{ route('categoryProducts', ['category_id' => 0]) }}" class="{{ is_null($selectedCategory) ? 'active' : '' }}">All</a></li>
						@forelse ($categories as $category)
							<li><a href="{{ route('categoryProducts', ['category_id' => $category->category_id]) }}" 
							class="{{ $category->category_id === $selectedCategory ? 'active' : '' }}">
							{{ $category->name }}</a></li>
						@empty
						No Categories
						@endforelse
    				</ul>
    			</div>
    		</div>
    		<div class="container">
				<div class="products row">
					@forelse($products as $product)
					<div class="col-md-6 col-lg-3 ftco-animate">
						<div class="product">
							<a href="product-detail{{ $product->product_id }}" class="img-prod">
								<img class="img-fluid" src="{{ URL::asset('client/images/product/' . $product->image_url) }}" alt="Colorlib Template" style="width: 254px; height: 191px;">
								@if ($product->selling_price < $product->original_price)
                                    <span class="status">
                                        {{ discounted($product) }}%
                                    </span>
                                @endif
								<div class="overlay"></div>
							</a>
							<div class="text py-3 pb-4 px-3 text-center">
								<h3><a href="#">{{ $product->name }}</a></h3>
								<div class="d-flex">
									<div class="pricing">
										<p class="price">
                                            @if ($product->selling_price < $product->original_price)
                                                <span class="mr-2 price-dc">{{ originalPrice($product) }}đ</span>
                                            @endif
                                            <span>{{ sellingPrice($product) }}đ</span>
                                        </p>
									</div>
								</div>
								<div class="bottom-area d-flex px-3">
									<div class="m-auto d-flex">
										<a href="product-detail{{ $product->product_id }}"
                                            class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                            <span><i class="ion-ios-menu"></i></span>
                                        </a>
                                        <a href="add-cart{{ $product->product_id }}"
                                            class="buy-now d-flex justify-content-center align-items-center mx-1 ion-ios-cart"
                                            onclick="onAddCart(event)">
                                        </a>
									</div>
								</div>
							</div>
						</div>
					</div>
					@empty
					Không có sản phẩm
					@endforelse
				</div>
			</div>
    		<div class="row mt-5">
          <div class="col text-center">
				{{$products->links()}}
          </div>
        </div>
    	</div>
    </section>
@endsection