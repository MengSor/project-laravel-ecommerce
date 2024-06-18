<!DOCTYPE html>
<html lang="en">
@include ("admin.include.head")
<body class="bg-theme bg-theme1">
 
<!-- Start wrapper-->
<div id="wrapper">
   @include ("admin.include.sidebar")
  <!--Start topbar header-->
    @include ("admin.include.header")
  <!--End topbar header-->

<div class="clearfix"></div>	
   <div class="content-wrapper">
      <div class="container-fluid">

         <!--Start Dashboard Content-->
          @yield('content')
         <!--End Dashboard Content-->
	  
	     <!--start overlay-->
         <div class="overlay toggle-menu"></div>
	     <!--end overlay-->
		
        </div>
       <!-- End container-fluid-->
    
    </div><!--End content-wrapper-->
   <!--Start Back To Top Button-->
   <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
	<!--Start footer-->
    @include ("admin.include.footer")
	<!--End footer-->
	
   <!--start color switcher-->
    @include ("admin.include.color")
   <!--end color switcher-->
   
</div><!--End wrapper-->
<!-- Bootstrap core JavaScript-->
<script src={{URL::asset("admin/assets/js/jquery.min.js")}}></script>
<script src={{URL::asset("admin/assets/js/popper.min.js")}}></script>
<script src={{URL::asset("admin/assets/js/bootstrap.min.js")}}></script>
  
<!-- simplebar js -->
<script src={{URL::asset("admin/assets/plugins/simplebar/js/simplebar.js")}}></script>
<!-- sidebar-menu js -->
<script src={{URL::asset("admin/assets/js/sidebar-menu.js")}}></script>
<!-- loader scripts -->
<script src={{URL::asset("admin/assets/js/jquery.loading-indicator.js")}}></script>
<!-- Custom scripts -->
<script src={{URL::asset("admin/assets/js/app-script.js")}}></script>
<!-- Chart js -->

<script src={{URL::asset("admin/assets/plugins/Chart.js/Chart.min.js")}}></script>

<!-- Index js -->
<script src={{URL::asset("admin/assets/js/index.js")}}></script>
  
  
</body>
</html>
