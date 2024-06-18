<!--Start sidebar-wrapper-->
<div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
    <div class="brand-logo">
     <a href="/admins">
      <img src={{URL::asset("admin/assets/images/logo-icon.png")}} class="logo-icon" alt="logo icon">
      <h5 class="logo-text">MengSor Admin</h5>
    </a>
  </div>
  <ul class="sidebar-menu do-nicescrol">
     <li class="sidebar-header">MAIN NAVIGATION</li>
     <li class="sidebar-item {{Request::is('admins')? 'active': ''}}">
       <a href="/admins">
         <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
       </a>
     </li>
     <li class="sidebar-item {{Request::is('admins/banner*')? 'active': ''}}">
        <a href="/admins/banner">
          <i class="zmdi zmdi-airplay"></i> <span>Banners</span>
        </a>
      </li>
      <li class="sidebar-item {{Request::is('admins/product*')? 'active': ''}}">
        <a href="/admins/product">
          <i class="zmdi zmdi-inbox"></i> <span>Product</span>
        </a>
      </li >
      <li class="sidebar-item {{Request::is('admins/category*')? 'active': ''}}">
        <a href="/admins/category">
          <i class="zmdi zmdi-archive"></i> <span>Category</span>
        </a>
      </li>
      <li class="sidebar-item {{Request::is('admins/order*')? 'active': ''}}">
        <a href="/admins/order">
          <i class="zmdi zmdi-dropbox"></i> <span>Order</span>
        </a>
      </li>
      <li class="sidebar-item {{Request::is('admins/user*')? 'active': ''}}">
        <a href="/admins/user">
          <i class="zmdi zmdi-brightness-5"></i> <span>User</span>
        </a>
      </li>

   

     <li class="sidebar-header">LABELS</li>
     <li><a href="javaScript:void();"><i class="zmdi zmdi-coffee text-danger"></i> <span>Important</span></a></li>
     <li><a href="javaScript:void();"><i class="zmdi zmdi-chart-donut text-success"></i> <span>Warning</span></a></li>
     <li><a href="javaScript:void();"><i class="zmdi zmdi-share text-info"></i> <span>Information</span></a></li>

   </ul>
  
  </div>
  <!--End sidebar-wrapper-->