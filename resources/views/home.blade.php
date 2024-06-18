@extends('layout.defualt')
@section('contant')
<section>
	<!-- single product slide -->
	<div class="single-product-slider">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6 text-center">
					<div class="section-title">
						<h1>Latest Products</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
							dolore
							magna aliqua.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<!-- single product -->
				@foreach ($featuredproducts as $fp)
				<div class="col-lg-3 col-md-6">
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
							<div class="prd-bottom" >
								<a href="{{url('add_cart', $fp->pid)}}" class="social-info" >				
									<span class="ti-bag"></span>
									<p class="hover-text">add to bag</p>
								</a>
							
								<a href="{{url('product_details', $fp->pid)}}" class="social-info">
									<span class="lnr lnr-move"></span>
									<p class="hover-text" class="pro">view more</p>
								</a>
							</div>
						</div>
					 </form>
					</div>
				</div>
				@endforeach
				
			
			</div>
		</div>
	</div>
	
</section>	
@endsection
