<!DOCTYPE html>
<html lang="zxx" class="no-js">
@include ("include.head")
<body>
	<!-- Start Header Area -->
	@include ("include.header")
	<!-- End Header Area -->
	
  <!-- Start Banner Area -->
		@include ("include.banners.bannerblog")
	</section>

	<!-- Start blog -->
		@yield ("blogers")
	<!-- End blog -->
	
	<!-- start footer Area -->
	@include ("include.footer")
	@include ("include.food")
</body>

</html>