<!DOCTYPE html>
<html lang="zxx" class="no-js">

@include("include.head")

<body>

	<!-- Start Header Area -->
	@include("include.header")
	<!-- End Header Area -->

	<!-- start banner Area -->
	@include("include.banners.banner")
	<!-- End banner Area -->

	<!-- start features Area -->
	@include("include.features")
	<!-- end features Area -->

	<!-- Start category Area -->
	@include("include.category")
	<!-- End category Area -->

	<!-- start product Area -->
	@yield("contant")
	<!-- end product Area -->

	<!-- Start exclusive deal Area -->
	@include("include.exclusive")
	<!-- End exclusive deal Area -->

	<!-- Start brand Area -->
	@include("include.brand")
	<!-- End brand Area -->

	<!-- Start related-product Area -->
	@include("include.related")
	<!-- End related-product Area -->

	<!-- start footer Area -->
	@include("include.footer")
	<!-- End footer Area -->

	@include("include.food")
	
</body>

</html>