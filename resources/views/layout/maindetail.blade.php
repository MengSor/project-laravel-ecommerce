<!DOCTYPE html>
<html lang="zxx" class="no-js">
@include ("include.head")
<body>
	<!-- Start Header Area -->
	@include ("include.header")
	<!-- End Header Area -->
	
  <!-- Start Banner Area -->
		@include ("include.banners.bannerdetail")
	</section>

	<!-- Start blog -->
		@yield ("contactdetail")
	<!-- End blog -->
	
	<!-- Description -->
      @include ("include.add.description")
	<!-- end Description -->

	<!-- start footer Area -->
	@include ("include.footer")
	@include ("include.food")
</body>
</html>