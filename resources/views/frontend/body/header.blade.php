<header class="header-style-1">
   <!-- ============================================== TOP MENU ============================================== -->
   <div class="top-bar animate-dropdown">
      <div class="container">
         <div class="header-top-inner">
            <div class="cnt-account">
               <ul class="list-unstyled">
                  <li><a href="#"><i class="icon fa fa-user"></i>
                        @if (session()->get('language') == 'hindi')
                           मेरी प्रोफाइल
                        @else
                           My Account
                        @endif
                     </a></li>
                  <li><a href="#"><i class="icon fa fa-heart"></i>
                        @if (session()->get('language') == 'hindi')
                           इच्छा-सूची
                        @else
                           WishList
                        @endif
                     </a></li>
                  <li><a href="#"><i class="icon fa fa-shopping-cart"></i>
                        @if (session()->get('language') == 'hindi')
                           मेरी कार्ट
                        @else
                           My Cart
                        @endif
                     </a></li>
                  <li><a href="#"><i class="icon fa fa-check"></i>
                        @if (session()->get('language') == 'hindi')
                           चेक आउट
                        @else
                           Checkout
                        @endif
                     </a></li>
                  @auth
                     <li><a href="{{ route('dashboard') }}"><i class="icon fa fa-user"></i>
                           @if (session()->get('language') == 'hindi')
                              डैशबोर्ड
                           @else
                              Dashboard
                           @endif
                        </a></li>
                  @else
                     <li><a href="{{ route('login') }}"><i class="icon fa fa-lock"></i>
                           @if (session()->get('language') == 'hindi')
                              लॉगिन और
                           @else
                              Login & Register
                           @endif
                        </a></li>
                  @endauth

               </ul>
            </div>
            <!-- /.cnt-account -->

            <div class="cnt-block">
               <ul class="list-unstyled list-inline">
                  {{-- <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown"
                         data-toggle="dropdown"><span class="value">USD </span><b class="caret"></b></a>
                      <ul class="dropdown-menu">
                         <li><a href="#">USD</a></li>
                         <li><a href="#">INR</a></li>
                         <li><a href="#">GBP</a></li>
                      </ul>
                   </li> --}}
                  <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown"
                        data-toggle="dropdown"><span class="value">
                           @if (session()->get('language') == 'hindi')
                              भाषा: हिन्दी
                           @else
                              Language
                           @endif
                        </span><b class="caret"></b></a>
                     <ul class="dropdown-menu">
                        @if (session()->get('language') == 'hindi')
                           <li><a href="{{ route('english.language') }}">English</a></li>
                        @else
                           <li><a href="{{ route('hindi.language') }}">हिन्दी</a></li>
                        @endif
                     </ul>
                  </li>
               </ul>
               <!-- /.list-unstyled -->
            </div>
            <!-- /.cnt-cart -->
            <div class="clearfix"></div>
         </div>
         <!-- /.header-top-inner -->
      </div>
      <!-- /.container -->
   </div>
   <!-- /.header-top -->
   <!-- ============================================== TOP MENU : END ============================================== -->
   <div class="main-header">
      <div class="container">
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
               <!-- ============================================================= LOGO ============================================================= -->
               <div class="logo"> <a href="{{ route('home') }}"> <img
                        src="{{ asset('frontend/assets/images/logo.png') }}" alt="logo"> </a>
               </div>
               <!-- /.logo -->
               <!-- ============================================================= LOGO : END ============================================================= -->
            </div>
            <!-- /.logo-holder -->

            <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
               <!-- /.contact-row -->
               <!-- ============================================================= SEARCH AREA ============================================================= -->
               <div class="search-area">
                  <form action="{{ route('product.search') }}" method="GET">
                     <div class="control-group">
                        <ul class="categories-filter animate-dropdown">
                           <li class="dropdown">
                              <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                 <span id="selected-category-text">Categories</span>
                                 <b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu" role="menu">
                                 @foreach ($categories as $category)
                                    <li role="presentation">
                                       <a role="menuitem" tabindex="-1" href="#"
                                          onclick="selectCategory('{{ $category->id }}', '{{ $category->category_name_en }}')">
                                          {{ $category->category_name_en }}
                                       </a>
                                    </li>
                                 @endforeach
                              </ul>
                           </li>
                        </ul>

                        <input type="hidden" name="category_id" id="selected-category-id" value="">
                        <input id="search-field" name="search" class="search-field" placeholder="Search here..." />
                        <button class="search-button" type="submit"></button>
                     </div>
                  </form>
               </div>

               <script>
                  function selectCategory(id, name) {
                     document.getElementById('selected-category-id').value = id;
                     document.getElementById('selected-category-text').innerText = name;
                     document.getElementById('search-field').placeholder = "Search in " + name + "...";
                  }
               </script>



               <!-- /.search-area -->
               <!-- =================================== SEARCH AREA : END ============================================================= -->
            </div>
            <!-- /.top-search-holder -->

            <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row">
               <!-- =============================== SHOPPING CART DROPDOWN ============================================================= -->

               <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart"
                     data-toggle="dropdown">
                     <div class="items-cart-inner">
                        <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
                        <div class="basket-item-count"><span class="count">2</span></div>
                        <div class="total-price-basket"> <span class="lbl">
                              @if (session()->get('language') == 'hindi')
                                 गाड़ी -
                              @else
                                 cart -
                              @endif
                           </span> <span class="total-price">
                              <span class="sign">$</span><span class="value">600.00</span>
                           </span> </div>
                     </div>
                  </a>
                  <ul class="dropdown-menu">
                     <li>
                        <div class="cart-item product-summary">
                           <div class="row">
                              <div class="col-xs-4">
                                 <div class="image"> <a href="detail.html"><img
                                          src="{{ asset('frontend/assets/images/cart.jpg') }}" alt=""></a>
                                 </div>
                              </div>
                              <div class="col-xs-7">
                                 <h3 class="name"><a href="index.php?page-detail">
                                       @if (session()->get('language') == 'hindi')
                                          सरल उत्पाद
                                       @else
                                          Simple Product
                                       @endif
                                    </a></h3>
                                 <div class="price">$600.00</div>
                              </div>
                              <div class="col-xs-1 action"> <a href="#"><i class="fa fa-trash"></i></a>
                              </div>
                           </div>
                        </div>
                        <!-- /.cart-item -->
                        <div class="clearfix"></div>
                        <hr>
                        <div class="clearfix cart-total">
                           <div class="pull-right"> <span class="text">
                                 @if (session()->get('language') == 'hindi')
                                    उप-योग :
                                 @else
                                    Sub Total :
                                 @endif
                              </span><span class='price'>$600.00</span> </div>
                           <div class="clearfix"></div>
                           <a href="checkout.html" class="btn btn-upper btn-primary btn-block m-t-20">
                              @if (session()->get('language') == 'hindi')
                                 चेक आउट
                              @else
                                 Checkout
                              @endif
                           </a>
                        </div>
                        <!-- /.cart-total-->

                     </li>
                  </ul>
                  <!-- /.dropdown-menu-->
               </div>
               <!-- /.dropdown-cart -->

               <!-- ===================== SHOPPING CART DROPDOWN : END============================================================= -->
            </div>
            <!-- /.top-cart-row -->
         </div>
         <!-- /.row -->

      </div>
      <!-- /.container -->

   </div>
   <!-- /.main-header -->

   <!-- ================================ NAVBAR ============================================== -->
   <div class="header-nav animate-dropdown">
      <div class="container">
         <div class="yamm navbar navbar-default" role="navigation">
            <div class="navbar-header">
               <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse"
                  class="navbar-toggle collapsed" type="button">
                  <span class="sr-only">
                     @if (session()->get('language') == 'hindi')
                        टॉगल से संचालित करना
                     @else
                        Toggle navigation
                     @endif
                  </span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span
                     class="icon-bar"></span> </button>
            </div>
            <div class="nav-bg-class">
               <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                  <div class="nav-outer">
                     <ul class="nav navbar-nav">
                        <li class="active dropdown yamm-fw"> <a href="{{ url('/') }}" data-hover="dropdown"
                              class="dropdown-toggle" data-toggle="dropdown">
                              @if (session()->get('language') == 'hindi')
                                 घर
                              @else
                                 Home
                              @endif
                           </a> </li>
                        <!--   // Get Category Table Data -->
                        @php
                           $categories = App\Models\Category::orderBy('category_name_en', 'ASC')->get();
                        @endphp

                        @foreach ($categories as $category)
                           <li class="dropdown yamm mega-menu"> <a href="home.html" data-hover="dropdown"
                                 class="dropdown-toggle"
                                 data-toggle="dropdown">{{ session()->get('language') == 'hindi' ? $category->category_name_hin : $category->category_name_en }}</a>

                              <ul class="dropdown-menu container">
                                 <li>
                                    <div class="yamm-content ">
                                       <div class="row">

                                          <!--   // Get SubCategory Table Data -->
                                          @php
                                             $subcategories = App\Models\SubCategory::where(
                                                 'category_id',
                                                 $category->id,
                                             )
                                                 ->orderBy('sub_category_name_en', 'ASC')
                                                 ->get();
                                          @endphp

                                          @foreach ($subcategories as $subcategory)
                                             <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                                                <a
                                                   href="{{ url('subcategory/product/' . $subcategory->id . '/' . $subcategory->sub_category_slug_en) }}">
                                                   @if (session()->get('language') == 'hindi')
                                                      <h2 class="title">{{ $subcategory->sub_category_name_hin }}
                                                      </h2>
                                                </a>
                                             @else
                                                <h2 class="title">{{ $subcategory->sub_category_name_en }}</h2> </a>
                                          @endif
                                          <!--   // Get SubSubCategory Table Data -->
                                          @php
                                             $subsubcategories = App\Models\SubSubCategory::where(
                                                 'sub_category_id',
                                                 $subcategory->id,
                                             )
                                                 ->orderBy('sub_sub_category_name_en', 'ASC')
                                                 ->get();
                                          @endphp

                                          @foreach ($subsubcategories as $subsubcat)
                                             <ul class="links">
                                                <li>
                                                   @if (session()->get('language') == 'hindi')
                                                      <a
                                                         href="{{ url('subcategory/product/' . $subsubcat->id . '/' . $subsubcat->sub_sub_category_slug_hin) }}">{{ $subsubcat->sub_sub_category_name_hin }}</a>
                                                   @else
                                                      <a
                                                         href="{{ url('subcategory/product/' . $subsubcat->id . '/' . $subsubcat->sub_sub_category_slug_en) }}">{{ $subsubcat->sub_sub_category_name_en }}</a>
                                                   @endif
                                                </li>
                                             </ul>
                                          @endforeach
                                          <!-- // End SubSubCategory Foreach -->

                                       </div>
                                       <!-- /.col -->
                        @endforeach <!-- // End SubCategory Foreach -->


                        <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image"> <img class="img-responsive"
                              src="{{ asset('frontend/assets/images/banners/top-menu-banner.jpg') }}" alt="">
                        </div>
                        <!-- /.yamm-content -->
                  </div>
               </div>
               </li>
               </ul>
               </li>
               @endforeach <!-- // End Category Foreach -->
               <li class="dropdown  navbar-right special-menu"> <a href="#">
                     @if (session()->get('language') == 'hindi')
                        आज का ऑफर
                     @else
                        Todays offer
                     @endif
                  </a> </li>
               </ul>
               <!-- /.navbar-nav -->
               <div class="clearfix"></div>
            </div>
            <!-- /.nav-outer -->
         </div>
         <!-- /.navbar-collapse -->

      </div>
      <!-- /.nav-bg-class -->
   </div>
   <!-- /.navbar-default -->
   </div>
   <!-- /.container-class -->

   </div>
   <!-- /.header-nav -->
   <!-- ============================================== NAVBAR : END ============================================== -->

</header>
