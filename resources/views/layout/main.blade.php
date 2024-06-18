<!DOCTYPE html>
<html lang="zxx" class="no-js">
@include ("include.head")
<body id="category">
	<!-- Start Header Area -->
	@include ("include.header")
	<!-- End Header Area -->
    <!-- Start Banner Area -->
	@include ("include.banners.bannershop")
	<!-- End Banner Area -->
	
	<div class="container">
		<div class="row">
				@include ("include.add.sidebar")
			<div class="col-xl-9 col-lg-8 col-md-7">
				<!-- Start Filter Bar -->
				@include ("include.filter.filteron")
				<!-- End Filter Bar -->

				<!-- Start Best Seller -->
				@yield ("content")
				<!-- End Best Seller -->

				<!-- Start Filter Bar -->
				
				<!-- End Filter Bar -->
			</div>
		</div>
	</div>

	<!-- Start related-product Area -->
	@include ("include.related")
	<!-- End related-product Area -->

	<!-- start footer Area -->
	@include ("include.footer")
	@include ("include.food")
</body>

</html>