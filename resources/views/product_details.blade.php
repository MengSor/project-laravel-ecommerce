@extends ("layout.maindetail")
@section ("contactdetail")
	<!--================Single Product Area =================-->
	<div class="product_image_area">
		<div class="container">
            <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
				@csrf
			<input type="hidden" value="{{ $featuredproducts->pid }}" name="id">
			<input type="hidden" value="{{ $featuredproducts->pname }}" name="name">
			<input type="hidden" value="{{ $featuredproducts->pprice }}" name="price">
			<input type="hidden" value="{{ $featuredproducts->pimg }}"  name="image">
			<input type="hidden" value="1" name="quantity">
			<div class="row s_product_inner">
				<div class="col-lg-6">
					<div class="s_Product_carousel">
						<div class="single-prd-item">
							<img class="img-fluid" src="img/product/{{$featuredproducts->pimg}}" alt="">
						</div>
						<div class="single-prd-item">
							<img class="img-fluid" src="img/product/{{$featuredproducts->pimg}}" alt="">
						</div>
						<div class="single-prd-item">
							<img class="img-fluid" src="img/product/{{$featuredproducts->pimg}}" alt="">
						</div>
					</div>
				</div>
				<div class="col-lg-5 offset-lg-1">
					<div class="s_product_text">
						<h3> {{$featuredproducts->pname}}</h3>
						<h2>${{$featuredproducts->pprice}}</h2>
						<ul class="list">
							<li><a class="active" href="#"><span>Category</span> : {{$featuredproducts->cateogry}}</a></li>
							<li><a href="#"><span>Availibility</span> : In Stock</a></li>
						</ul>
						<p> {{$featuredproducts->pdesc}}</p>
						<div class="product_count">
							<label for="qty">Quantity:</label>
							<input type="text" name="qty" id="sst" maxlength="12" value="1" title="Quantity:" class="input-text qty">
							<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
							 class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
							<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
							 class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
						</div>
						
						<div class="card_area d-flex align-items-center">
							<a href="{{url('add_cart', $featuredproducts->pid)}}" class="primary-btn" >Add to Cart</a>
							<a class="icon_btn" href="#"><i class="lnr lnr lnr-diamond"></i></a>
							<a class="icon_btn" href="#"><i class="lnr lnr lnr-heart"></i></a>
						</div>
						
					</div>
				</div>
			</div>	
		</form>
		</div>
	</div>
	<!--================End Single Product Area =================-->
@endsection