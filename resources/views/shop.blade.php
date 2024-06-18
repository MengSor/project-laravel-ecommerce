@extends("layout.main")
@section('content')
<!-- Start Best Seller -->
<section class="lattest-product-area pb-40 category-list">
	<div class="row">
		<!-- single product -->
		@foreach ($featuredproducts as $fp)
		<div class="col-lg-4 col-md-6">
			<div class="single-product">
				<form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
					@csrf
				<input type="hidden" value="{{ $fp->pid }}" name="id">
				<input type="hidden" value="{{ $fp->pname }}" name="name">
				<input type="hidden" value="{{ $fp->pprice }}" name="price">
				<input type="hidden" value="{{ $fp->pimg }}"  name="image">
				<input type="hidden" value="1" name="quantity">
				<img class="img-fluid" src="img/product/{{$fp->pimg}}" alt="">
				<div class="product-details">
					<h6>{{$fp->pname}}</br>
						{{$fp->pdesc}}</h6>
					<div class="price">
						<h6>${{$fp->pprice}}</h6>
						<h6 class="l-through">$210.00</h6>
					</div>
					<div class="prd-bottom">

						<a href="{{url('add_cart', $fp->pid)}}" class="social-info">
							<span class="ti-bag"></span>
							<p class="hover-text">add to bag</p>
						</a>
						<a href="{{url('product_details', $fp->pid)}}" class="social-info">
							<span class="lnr lnr-move"></span>
							<p class="hover-text">view more</p>
						</a>
					</div>
				</div>
				</form>
			</div>
		</div>	
		@endforeach
		
		
	</div>
</section>
<!-- End Best Seller -->
@endsection