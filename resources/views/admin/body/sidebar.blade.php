<?php
$prifix = Request::route()->getPrefix();
$route = Route::current()->getName();
?>

<aside class="main-sidebar">
   <!-- sidebar-->
   <section class="sidebar">

      <div class="user-profile">
         <div class="ulogo">
            <a href="{{ route('admin.dashboard') }}">
               <!-- logo for regular state and mobile devices -->
               <div class="d-flex align-items-center justify-content-center">
                  <img src="{{ asset('backend/images/logo-dark.png') }}" alt="">
                  <h3><b>Sunny</b> Admin</h3>
               </div>
            </a>
         </div>
      </div>

      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">

         <li class="{{ $route == 'admin.dashboard' ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}">
               <i data-feather="pie-chart"></i>
               <span>Dashboard</span>
            </a>
         </li>

         <li class="treeview {{ $prifix == '/brand' ? 'active' : '' }}">
            <a href="#">
               <i data-feather="message-circle"></i>
               <span>Brands</span>
               <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
               </span>
            </a>
            <ul class="treeview-menu">
               <li class="{{ $route == 'all.brands' ? 'active' : '' }}"><a href="{{ route('all.brands') }}"><i
                        class="ti-more "></i>All Brands</a>
               </li>

            </ul>
         </li>

         <li class="treeview {{ $prifix == '/category' ? 'active' : '' }}">
            <a href="#">
               <i data-feather="mail"></i> <span>Categories</span>
               <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
               </span>
            </a>
            <ul class="treeview-menu">
               <li class="{{ $route == 'all.categories' ? 'active' : '' }}"><a href="{{ route('all.categories') }}"><i
                        class="ti-more "></i>All Categories</a></li>
               <li class="{{ $route == 'all.subcategories' ? 'active' : '' }}"><a
                     href="{{ route('all.subcategories') }}"><i class="ti-more"></i>All SubCategory</a>
               </li>
               <li class="{{ $route == 'all.sub.subcategories' ? 'active' : '' }}"><a
                     href="{{ route('all.sub.subcategories') }}"><i class="ti-more "></i>All
                     Sub_SubCategory</a></li>
            </ul>
         </li>

         <li class="treeview {{ $prifix == '/product' ? 'active' : '' }}">
            <a href="#">
               <i data-feather="file"></i>
               <span>Products</span>
               <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
               </span>
            </a>
            <ul class="treeview-menu">
               <li class="{{ $route == 'add.product' ? 'active' : '' }}"><a href="{{ route('add.product') }}"><i
                        class="ti-more"></i>Add Product</a></li>
               <li class="{{ $route == 'all.products' ? 'active' : '' }}"><a href="{{ route('all.products') }}"><i
                        class="ti-more"></i>Manage Products</a></li>
            </ul>
         </li>

         <li class="treeview {{ $prifix == '/slider' ? 'active' : '' }}  ">
            <a href="#">
               <i data-feather="file"></i>
               <span>Slider</span>
               <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
               </span>
            </a>
            <ul class="treeview-menu">
               <li class="{{ $route == 'all.sliders' ? 'active' : '' }}"><a href="{{ route('all.sliders') }}"><i
                        class="ti-more"></i>Manage Slider</a></li>
            </ul>
         </li>

         <li class="treeview {{ $prifix == '/coupon' ? 'active' : '' }}  ">
            <a href="#">
               <i data-feather="file"></i>
               <span>Coupon</span>
               <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
               </span>
            </a>
            <ul class="treeview-menu">
               <li class="{{ $route == 'coupon.manage' ? 'active' : '' }}"><a href="{{ route('coupon.manage') }}"><i
                        class="ti-more"></i>Manage Coupon</a></li>
            </ul>
         </li>

         <li class="treeview {{ $prifix == '/shipping' ? 'active' : '' }}">
            <a href="#">
               <i data-feather="mail"></i> <span>shipping</span>
               <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
               </span>
            </a>
            <ul class="treeview-menu">
               <li class="{{ $route == 'division.index' ? 'active' : '' }}"><a href="{{ route('division.index') }}"><i
                        class="ti-more "></i>All Divisions</a></li>
               <li class="{{ $route == 'district.index' ? 'active' : '' }}"><a href="{{ route('district.index') }}"><i
                        class="ti-more"></i>All Districtis</a>
               </li>
               <li class="{{ $route == 'state.index' ? 'active' : '' }}"><a href="{{ route('state.index') }}"><i
                        class="ti-more "></i>All
                     States</a></li>
            </ul>
         </li>

      </ul>
   </section>

   <div class="sidebar-footer">
      <!-- item-->
      <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings"
         aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
      <!-- item-->
      <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i
            class="ti-email"></i></a>
      <!-- item-->
      <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i
            class="ti-lock"></i></a>
   </div>
</aside>
