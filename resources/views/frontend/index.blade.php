@extends('frontend.master')
@section('title', session()->get('language') == 'hindi' ? 'घर' : 'Home')


@section('content')
   <div class="row ">
      <!-- ============================================== SIDEBAR ============================================== -->
      <div class="col-xs-12 col-sm-12 col-md-3 sidebar">

         <!-- ================================== TOP NAVIGATION ================================== -->
         <div class="side-menu animate-dropdown outer-bottom-xs">
            <div class="head"><i class="icon fa fa-align-justify fa-fw"></i>
               @if (session()->get('language') == 'hindi')
                  श्रेणियाँ
               @else
                  Categories
               @endif
            </div>
            <nav class="yamm megamenu-horizontal">
               @foreach ($categories as $category)
                  <ul class="nav">

                     <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                              class="icon fa {{ $category->category_icon }}" aria-hidden="true">
                              @if (session()->get('language') == 'hindi')
                                 {{ $category->category_name_hin }}
                              @else
                                 {{ $category->category_name_en }}
                              @endif
                           </i></a>
                        <ul class="dropdown-menu mega-menu">
                           <li class="yamm-content">
                              <div class="row">

                                 <!--   // Get SubCategory Table Data -->
                                 @php
                                    $subcategories = App\Models\SubCategory::where('category_id', $category->id)
                                        ->orderBy('sub_category_name_en', 'ASC')
                                        ->get();
                                 @endphp

                                 @foreach ($subcategories as $subcategory)
                                    <div class="col-sm-12 col-md-3">
                                       <h2 class="title">
                                          @if (session()->get('language') == 'hindi')
                                             {{ $subcategory->sub_category_name_hin }}
                                          @else
                                             {{ $subcategory->sub_category_name_en }}
                                          @endif
                                       </h2>

                                       <!--   // Get SubSubCategory Table Data -->
                                       @php
                                          $subsubcategories = App\Models\SubSubCategory::where(
                                              'sub_category_id',
                                              $subcategory->id,
                                          )
                                              ->orderBy('sub_sub_category_name_en', 'ASC')
                                              ->get();
                                       @endphp

                                       @foreach ($subsubcategories as $subsubcategory)
                                          <ul class="links list-unstyled">
                                             <li><a href="#">
                                                   @if (session()->get('language') == 'hindi')
                                                      {{ $subsubcategory->sub_sub_category_name_hin }}
                                                   @else
                                                      {{ $subsubcategory->sub_sub_category_name_en }}
                                                   @endif
                                                </a></li>

                                          </ul>
                                       @endforeach <!-- // End SubSubCategory Foreach -->

                                    </div>
                                    <!-- /.col -->
                                 @endforeach <!-- End SubCategory Foreach -->
                              </div>
                              <!-- /.row -->
                           </li>
                           <!-- /.yamm-content -->

                        </ul>

                        <!-- /.dropdown-menu -->
                     </li>
                     <!-- /.menu-item -->
                  </ul>
               @endforeach
               <!-- /.nav -->
            </nav>
            <!-- /.megamenu-horizontal -->
         </div>
         <!-- /.side-menu -->
         <!-- ================================== TOP NAVIGATION : END ================================== -->

         <!-- ============================================== HOT DEALS ============================================== -->
         <div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
            <h3 class="section-title">
               @if (session()->get('language') == 'hindi')
                  जबरदस्त सौदे
               @else
                  hot deals
               @endif
            </h3>
            <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
               @foreach ($hotDeals as $product)
                  <div class="item">
                     <div class="products">
                        <div class="hot-deal-wrapper">
                           <div class="image"> <img src="{{ asset($product->product_thumbnail) }}"
                                 alt="@if (session()->get('language') == 'hindi') {{ $product->product_name_hin }}
                                 @else
                                    {{ $product->product_name_en }} @endif">
                           </div>
                           @php
                              $amount = $product->selling_price - $product->discount_price;
                              $discount = ($amount / $product->selling_price) * 100;
                           @endphp
                           @if ($product->discount_price == null)
                              <div class="sale-offer-tag"><span>new</span></div>
                           @else
                              <div class="sale-offer-tag"><span>{{ round($discount) }}%<br>off</span></div>
                           @endif
                           <div class="timing-wrapper">
                              <div class="box-wrapper">
                                 <div class="date box"> <span class="key">120</span> <span class="value">Days</span>
                                 </div>
                              </div>
                              <div class="box-wrapper">
                                 <div class="hour box"> <span class="key">20</span> <span class="value">HRS</span>
                                 </div>
                              </div>
                              <div class="box-wrapper">
                                 <div class="minutes box"> <span class="key">36</span> <span class="value">MINS</span>
                                 </div>
                              </div>
                              <div class="box-wrapper hidden-md">
                                 <div class="seconds box"> <span class="key">60</span> <span class="value">SEC</span>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- /.hot-deal-wrapper -->
                        <div class="product-info text-left m-t-20">
                           <h3 class="name"><a href="{{ route('product.details', $product->id) }}">
                                 @if (session()->get('language') == 'hindi')
                                    {{ $product->product_name_hin }}
                                 @else
                                    {{ $product->product_name_en }}
                                 @endif
                              </a></h3>
                           <div class="rating rateit-small"></div>
                           <div class="product-price">
                              @if ($product->discount_price == null)
                                 <span class="price">${{ $product->selling_price }}</span>
                              @else
                                 <span class="price">${{ $product->discount_price }}</span>
                                 <span class="price-before-discount">${{ $product->selling_price }}</span>
                              @endif
                           </div>
                           <!-- /.product-price -->

                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                           <div class="action">
                              <div class="add-cart-button btn-group">
                                 <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i
                                       class="fa fa-shopping-cart"></i> </button>
                                 <button class="btn btn-primary cart-btn" type="button">
                                    @if (session()->get('language') == 'hindi')
                                       कार्ट में जोड़ें
                                    @else
                                       Add to cart
                                    @endif
                                 </button>
                              </div>
                           </div>
                           <!-- /.action -->
                        </div>
                        <!-- /.cart -->
                     </div>
                  </div>
               @endforeach
            </div>
            <!-- /.sidebar-widget -->
         </div>
         <!-- ============================================== HOT DEALS: END ============================================== -->
         <!-- ============================================== SPECIAL OFFER ============================================== -->

         <div class="sidebar-widget outer-bottom-small wow fadeInUp">
            <h3 class="section-title">
               @if (session()->get('language') == 'hindi')
                  विशेष पेशकश
               @else
                  Special Offer
               @endif
            </h3>
            <div class="sidebar-widget-body outer-top-xs">
               <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                  <div class="item">
                     <div class="products special-product">
                        @foreach ($specialOffers as $product)
                           <div class="product">
                              <div class="product-micro">
                                 <div class="row product-micro-row">
                                    <div class="col col-xs-5">
                                       <div class="product-image">
                                          <div class="image"> <a href="{{ route('product.details', $product->id) }}">
                                                <img src="{{ asset($product->product_thumbnail) }}"
                                                   alt="@if (session()->get('language') == 'hindi') {{ $product->product_name_hin }}
                                 @else
                                    {{ $product->product_name_en }} @endif">
                                             </a> </div>
                                          <!-- /.image -->

                                       </div>
                                       <!-- /.product-image -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col col-xs-7">
                                       <div class="product-info">
                                          <h3 class="name"><a href="">
                                                @if (session()->get('language') == 'hindi')
                                                   {{ $product->product_name_hin }}
                                                @else
                                                   {{ $product->product_name_en }}
                                                @endif
                                             </a></h3>
                                          <div class="rating rateit-small"></div>
                                          <div class="product-price"> <span class="price"> {{ $product->discount_price }}
                                             </span> </div>
                                          <!-- /.product-price -->

                                       </div>
                                    </div>
                                    <!-- /.col -->
                                 </div>
                                 <!-- /.product-micro-row -->
                              </div>
                              <!-- /.product-micro -->

                           </div>
                        @endforeach
                     </div>
                  </div>
               </div>
            </div>
            <!-- /.sidebar-widget-body -->
         </div>
         <!-- /.sidebar-widget -->
         <!-- ============================================== SPECIAL OFFER : END ============================================== -->
         <!-- ============================================== PRODUCT TAGS ============================================== -->
         <div class="sidebar-widget product-tag wow fadeInUp">
            <h3 class="section-title">Product tags</h3>
            <div class="sidebar-widget-body outer-top-xs">
               <div class="tag-list"> <a class="item" title="Phone" href="category.html">Phone</a> <a
                     class="item active" title="Vest" href="category.html">Vest</a> <a class="item" title="Smartphone"
                     href="category.html">Smartphone</a> <a class="item" title="Furniture"
                     href="category.html">Furniture</a> <a class="item" title="T-shirt"
                     href="category.html">T-shirt</a>
                  <a class="item" title="Sweatpants" href="category.html">Sweatpants</a> <a class="item"
                     title="Sneaker" href="category.html">Sneaker</a> <a class="item" title="Toys"
                     href="category.html">Toys</a> <a class="item" title="Rose" href="category.html">Rose</a>
               </div>
               <!-- /.tag-list -->
            </div>
            <!-- /.sidebar-widget-body -->
         </div>
         <!-- /.sidebar-widget -->
         <!-- ============================================== PRODUCT TAGS : END ============================================== -->
         <!-- ============================================== SPECIAL DEALS ============================================== -->

         <div class="sidebar-widget outer-bottom-small wow fadeInUp">
            <h3 class="section-title">
               @if (session()->get('language') == 'hindi')
                  विशेष पेश
               @else
                  Special Deals
               @endif
            </h3>
            <div class="sidebar-widget-body outer-top-xs">
               <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                  <div class="item">
                     <div class="products special-product">
                        @foreach ($specialDeals as $product)
                           <div class="product">
                              <div class="product-micro">
                                 <div class="row product-micro-row">
                                    <div class="col col-xs-5">
                                       <div class="product-image">
                                          <div class="image"> <a href="{{ route('product.details', $product->id) }}">
                                                <img src="{{ asset($product->product_thumbnail) }}"
                                                   alt="@if (session()->get('language') == 'hindi') {{ $product->product_name_hin }}
                                 @else
                                    {{ $product->product_name_en }} @endif">
                                             </a> </div>
                                          <!-- /.image -->

                                       </div>
                                       <!-- /.product-image -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col col-xs-7">
                                       <div class="product-info">
                                          <h3 class="name"><a href="">
                                                @if (session()->get('language') == 'hindi')
                                                   {{ $product->product_name_hin }}
                                                @else
                                                   {{ $product->product_name_en }}
                                                @endif
                                             </a></h3>
                                          <div class="rating rateit-small"></div>
                                          <div class="product-price"> <span class="price">
                                                {{ $product->discount_price }}
                                             </span> </div>
                                          <!-- /.product-price -->

                                       </div>
                                    </div>
                                    <!-- /.col -->
                                 </div>
                                 <!-- /.product-micro-row -->
                              </div>
                              <!-- /.product-micro -->

                           </div>
                        @endforeach
                     </div>
                  </div>

               </div>
            </div>
            <!-- /.sidebar-widget-body -->
         </div>
         <!-- /.sidebar-widget -->
         <!-- ============================================== SPECIAL DEALS : END ============================================== -->
         <!-- ============================================== NEWSLETTER ============================================== -->
         <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small">
            <h3 class="section-title">Newsletters</h3>
            <div class="sidebar-widget-body outer-top-xs">
               <p>Sign Up for Our Newsletter!</p>
               <form>
                  <div class="form-group">
                     <label class="sr-only" for="exampleInputEmail1">Email address</label>
                     <input type="email" class="form-control" id="exampleInputEmail1"
                        placeholder="Subscribe to our newsletter">
                  </div>
                  <button class="btn btn-primary">Subscribe</button>
               </form>
            </div>
            <!-- /.sidebar-widget-body -->
         </div>
         <!-- /.sidebar-widget -->
         <!-- ============================================== NEWSLETTER: END ============================================== -->
         <!-- ============================================== Testimonials============================================== -->
         <div class="sidebar-widget  wow fadeInUp outer-top-vs ">
            <div id="advertisement" class="advertisement">
               <div class="item">
                  <div class="avatar"><img src="{{ asset('frontend/assets/images/testimonials/member1.png') }}"
                        alt="Image">
                  </div>
                  <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis.
                     Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                  <div class="clients_author">John Doe <span>Abc Company</span> </div>
                  <!-- /.container-fluid -->
               </div>
               <!-- /.item -->
            </div>
            <!-- /.owl-carousel -->
         </div>
         <!-- ============================================== Testimonials: END ============================================== -->

         <div class="home-banner"> <img src="{{ asset('frontend/assets/images/banners/LHS-banner.jpg') }}"
               alt="Image">
         </div>
      </div>
      <!-- ============================================== END SIDEBAR ============================================== -->
      <!-- ============================================== content =============================-->
      <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
         <!-- ========================Slider================== SECTION – HERO ========================================= -->
         <div id="hero">
            <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
               @foreach ($sliders as $slider)
                  <div class="item" style="background-image: url({{ $slider->slider_img }});">
                     <div class="container-fluid">

                        <div class="caption bg-color vertical-center text-left">
                           <div class="slider-header fadeInDown-1">{{ $slider->title }}
                           </div>
                           <div class="excerpt fadeInDown-2 hidden-xs"> <span>{{ $slider->description }}</span> </div>
                           <div class="button-holder fadeInDown-3"> <a href="index.php?page=single-product"
                                 class="btn-lg btn btn-uppercase btn-primary shop-now-button">{{ session()->get('language') == 'hindi' ? 'अभी खरीदें' : 'Shop Now' }}</a>
                           </div>
                        </div>
                        <!-- /.caption -->

                     </div>
                     <!-- /.container-fluid -->
                  </div>
                  <!-- /.item -->
               @endforeach
            </div>
            <!-- /.owl-carousel -->
         </div>
         <!-- ========================================= SECTION – HERO : END ========================================= -->
         <!-- ============================================== INFO BOXES ============================================== -->
         <div class="info-boxes wow fadeInUp">
            <div class="info-boxes-inner">
               <div class="row">
                  <div class="col-md-6 col-sm-4 col-lg-4">
                     <div class="info-box">
                        <div class="row">
                           <div class="col-xs-12">
                              <h4 class="info-box-heading green">
                                 {{ session()->get('language') == 'hindi' ? 'पैसे वापस' : 'money back' }}</h4>
                           </div>
                        </div>
                        <h6 class="text">
                           {{ session()->get('language') == 'hindi' ? '30 दिन की मनी बैक गारंटी' : '30 Days Money Back Guarantee' }}
                        </h6>
                     </div>
                  </div>
                  <!-- .col -->

                  <div class="hidden-md col-sm-4 col-lg-4">
                     <div class="info-box">
                        <div class="row">
                           <div class="col-xs-12">
                              <h4 class="info-box-heading green">
                                 {{ session()->get('language') == 'hindi' ? 'मुफ़्त शिपिंग' : 'free shipping' }}</h4>
                           </div>
                        </div>
                        <h6 class="text">
                           {{ session()->get('language') == 'hindi' ? '$99 से अधिक के ऑर्डर पर शिपिंग' : 'Shipping on orders over $99' }}
                        </h6>
                     </div>
                  </div>
                  <!-- .col -->

                  <div class="col-md-6 col-sm-4 col-lg-4">
                     <div class="info-box">
                        <div class="row">
                           <div class="col-xs-12">
                              <h4 class="info-box-heading green">
                                 {{ session()->get('language') == 'hindi' ? 'विशेष बिक्री' : 'Special Sale' }}</h4>
                           </div>
                        </div>
                        <h6 class="text">
                           {{ session()->get('language') == 'hindi' ? 'सभी वस्तुओं पर अतिरिक्त $5 की छूट' : 'Extra $5 off on all items' }}
                        </h6>
                     </div>
                  </div>
                  <!-- .col -->
               </div>
               <!-- /.row -->
            </div>
            <!-- /.info-boxes-inner -->

         </div>
         <!-- /.info-boxes -->
         <!-- ============================================== INFO BOXES : END ============================================== -->
         <!-- =============products========================== SCROLL TABS ============================================== -->
         <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
            <div class="more-info-tab clearfix ">
               <h3 class="new-product-title pull-left">
                  {{ session()->get('language') == 'hindi' ? 'नये उत्पाद' : 'New Products' }}</h3>
               <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
                  <li class="active"><a data-transition-type="backSlide" href="#all"
                        data-toggle="tab">{{ session()->get('language') == 'hindi' ? 'सभी' : 'All' }}</a>
                  </li>
                  @foreach ($categories as $category)
                     <li><a data-transition-type="backSlide" href="#category{{ $category->id }}" data-toggle="tab">
                           @if (session()->get('language') == 'hindi')
                              {{ $category->category_name_hin }}
                           @else
                              {{ $category->category_name_en }}
                           @endif
                        </a>
                     </li>
                  @endforeach
               </ul>
               <!-- /.nav-tabs -->
            </div>
            <div class="tab-content outer-top-xs">

               <div class="tab-pane in active " id="all">
                  <div class="product-slider">
                     <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                        @foreach ($products as $product)
                           <div class="item item-carousel">
                              <div class="products">
                                 <div class="product">
                                    <div class="product-image">
                                       <div class="image"> <a href="{{ route('product.details', $product->id) }}"><img
                                                src="{{ asset($product->product_thumbnail) }}"
                                                alt="@if (session()->get('language') == 'hindi') {{ $product->product_name_hin }} @else {{ $product->product_name_en }} @endif"></a>
                                       </div>
                                       <!-- /.image -->

                                       @php
                                          $amount = $product->selling_price - $product->discount_price;
                                          $discount = ($amount / $product->selling_price) * 100;
                                       @endphp
                                       @if ($product->discount_price == null)
                                          <div class="tag new"><span>new</span></div>
                                       @else
                                          <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                                       @endif
                                    </div>
                                    <!-- /.product-image -->

                                    <div class="product-info text-left">
                                       <h3 class="name"><a href="{{ route('product.details', $product->id) }}">
                                             @if (session()->get('language') == 'hindi')
                                                {{ $product->product_name_hin }}
                                             @else
                                                {{ $product->product_name_en }}
                                             @endif
                                          </a></h3>
                                       <div class="rating rateit-small"></div>
                                       <div class="description"></div>
                                       <div class="product-price">
                                          @if ($product->discount_price == null)
                                             <span class="price">${{ $product->selling_price }}</span>
                                          @else
                                             <span class="price">${{ $product->discount_price }}</span>
                                             <span class="price-before-discount">${{ $product->selling_price }}</span>
                                          @endif
                                       </div>

                                       <!-- /.product-price -->

                                    </div>
                                    <!-- /.product-info -->
                                    <div class="cart clearfix animate-effect">
                                       <div class="action">
                                          <ul class="list-unstyled">
                                             <li class="add-cart-button btn-group">
                                                <button data-toggle="tooltip" class="btn btn-primary icon"
                                                   type="button" title="Add Cart"> <i class="fa fa-shopping-cart"></i>
                                                </button>
                                                <button class="btn btn-primary cart-btn" type="button">Add to
                                                   cart</button>
                                             </li>
                                             <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart"
                                                   href="{{ route('product.details', $product->id) }}" title="Wishlist">
                                                   <i class="icon fa fa-heart"></i>
                                                </a>
                                             </li>
                                             <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart"
                                                   href="{{ route('product.details', $product->id) }}" title="Compare">
                                                   <i class="fa fa-signal" aria-hidden="true"></i> </a>
                                             </li>
                                          </ul>
                                       </div>
                                       <!-- /.action -->
                                    </div>
                                    <!-- /.cart -->
                                 </div>
                                 <!-- /.product -->

                              </div>
                              <!-- /.products -->
                           </div>
                           <!-- /.item -->
                        @endforeach
                     </div>
                     <!-- /.home-owl-carousel -->
                  </div>
                  <!-- /.product-slider -->

               </div>
               <!-- /.tab-pane -->



               @foreach ($categories as $category)
                  <div class="tab-pane" id="category{{ $category->id }}">
                     <div class="product-slider">

                        @php
                           $catWiseProducts = App\Models\Product::where('category_id', $category->id)
                               ->orderBy('id', 'DESC')
                               ->get();
                        @endphp

                        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                           @forelse ($catWiseProducts as $product)
                              <div class="item item-carousel">
                                 <div class="products">
                                    <div class="product">
                                       <div class="product-image">
                                          <div class="image"> <a
                                                href="{{ route('product.details', $product->id) }}"><img
                                                   src="{{ asset($product->product_thumbnail) }}"
                                                   alt="@if (session()->get('language') == 'hindi') {{ $product->product_name_hin }} @else {{ $product->product_name_en }} @endif"></a>
                                          </div>
                                          <!-- /.image -->

                                          @php
                                             $amount = $product->selling_price - $product->discount_price;
                                             $discount = ($amount / $product->selling_price) * 100;
                                          @endphp
                                          @if ($product->discount_price == null)
                                             <div class="tag new"><span>new</span></div>
                                          @else
                                             <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                                          @endif
                                       </div>
                                       <!-- /.product-image -->

                                       <div class="product-info text-left">
                                          <h3 class="name"><a href="{{ route('product.details', $product->id) }}">
                                                @if (session()->get('language') == 'hindi')
                                                   {{ $product->product_name_hin }}
                                                @else
                                                   {{ $product->product_name_en }}
                                                @endif
                                             </a></h3>
                                          <div class="rating rateit-small"></div>
                                          <div class="description"></div>
                                          <div class="product-price">
                                             @if ($product->discount_price == null)
                                                <span class="price">${{ $product->selling_price }}</span>
                                             @else
                                                <span class="price">${{ $product->discount_price }}</span>
                                                <span class="price-before-discount">${{ $product->selling_price }}</span>
                                             @endif
                                          </div>

                                          <!-- /.product-price -->

                                       </div>
                                       <!-- /.product-info -->
                                       <div class="cart clearfix animate-effect">
                                          <div class="action">
                                             <ul class="list-unstyled">
                                                <li class="add-cart-button btn-group">
                                                   <button data-toggle="tooltip" class="btn btn-primary icon"
                                                      type="button" title="Add Cart"> <i
                                                         class="fa fa-shopping-cart"></i>
                                                   </button>
                                                   <button class="btn btn-primary cart-btn" type="button">Add to
                                                      cart</button>
                                                </li>
                                                <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart"
                                                      href="{{ route('product.details', $product->id) }}"
                                                      title="Wishlist">
                                                      <i class="icon fa fa-heart"></i>
                                                   </a>
                                                </li>
                                                <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart"
                                                      href="{{ route('product.details', $product->id) }}"
                                                      title="Compare">
                                                      <i class="fa fa-signal" aria-hidden="true"></i> </a>
                                                </li>
                                             </ul>
                                          </div>
                                          <!-- /.action -->
                                       </div>
                                       <!-- /.cart -->
                                    </div>
                                    <!-- /.product -->

                                 </div>
                                 <!-- /.products -->
                              </div>
                              <!-- /.item -->
                           @empty
                              <h5 class="text-danger">
                                 {{ session()->get('language') == 'hindi' ? 'नये उत्पाद' : 'No Products Found' }}</h5>
                           @endforelse
                        </div>
                        <!-- /.home-owl-carousel -->
                     </div>
                     <!-- /.product-slider -->

                  </div>
               @endforeach
               <!-- /.tab-pane -->
            </div>
            <!-- /.home-owl-carousel -->


         </div>
         <!-- /.tab-content -->

         <!-- /.scroll-tabs -->
         <!-- ============================================== SCROLL TABS : END ============================================== -->
         <!-- ===================2-images=========================== WIDE PRODUCTS ============================================== -->
         <div class="wide-banners wow fadeInUp outer-bottom-xs">
            <div class="row">
               <div class="col-md-7 col-sm-7">
                  <div class="wide-banner cnt-strip">
                     <div class="image"> <img class="img-responsive"
                           src="{{ asset('frontend/assets/images/banners/home-banner1.jpg') }}" alt=""> </div>
                  </div>
                  <!-- /.wide-banner -->
               </div>
               <!-- /.col -->
               <div class="col-md-5 col-sm-5">
                  <div class="wide-banner cnt-strip">
                     <div class="image"> <img class="img-responsive"
                           src="{{ asset('frontend/assets/images/banners/home-banner2.jpg') }}" alt=""> </div>
                  </div>
                  <!-- /.wide-banner -->
               </div>
               <!-- /.col -->
            </div>
            <!-- /.row -->
         </div>
         <!-- /.wide-banners -->
         <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
         <!-- ============================================== FEATURED PRODUCTS ============================================== -->
         <section class="section featured-product wow fadeInUp">
            <h3 class="section-title">{{ session()->get('language') == 'hindi' ? 'नये उत्पाद' : 'Featured products' }}
            </h3>
            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">


               @foreach ($featured as $product)
                  <div class="item item-carousel">
                     <div class="products">
                        <div class="product">
                           <div class="product-image">
                              <div class="image"> <a href="{{ route('product.details', $product->id) }}"><img
                                       src="{{ asset($product->product_thumbnail) }}"
                                       alt="@if (session()->get('language') == 'hindi') {{ $product->product_name_hin }} @else {{ $product->product_name_en }} @endif"></a>
                              </div>
                              <!-- /.image -->

                              @php
                                 $amount = $product->selling_price - $product->discount_price;
                                 $discount = ($amount / $product->selling_price) * 100;
                              @endphp
                              @if ($product->discount_price == null)
                                 <div class="tag new"><span>new</span></div>
                              @else
                                 <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                              @endif
                           </div>
                           <!-- /.product-image -->

                           <div class="product-info text-left">
                              <h3 class="name"><a href="{{ route('product.details', $product->id) }}">
                                    @if (session()->get('language') == 'hindi')
                                       {{ $product->product_name_hin }}
                                    @else
                                       {{ $product->product_name_en }}
                                    @endif
                                 </a></h3>
                              <div class="rating rateit-small"></div>
                              <div class="description"></div>
                              <div class="product-price">
                                 @if ($product->discount_price == null)
                                    <span class="price">${{ $product->selling_price }}</span>
                                 @else
                                    <span class="price">${{ $product->discount_price }}</span>
                                    <span class="price-before-discount">${{ $product->selling_price }}</span>
                                 @endif
                              </div>

                              <!-- /.product-price -->

                           </div>
                           <!-- /.product-info -->
                           <div class="cart clearfix animate-effect">
                              <div class="action">
                                 <ul class="list-unstyled">
                                    <li class="add-cart-button btn-group">
                                       <button data-toggle="tooltip" class="btn btn-primary icon" type="button"
                                          title="Add Cart"> <i class="fa fa-shopping-cart"></i>
                                       </button>
                                       <button class="btn btn-primary cart-btn" type="button">Add to
                                          cart</button>
                                    </li>
                                    <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart"
                                          href="{{ route('product.details', $product->id) }}" title="Wishlist">
                                          <i class="icon fa fa-heart"></i>
                                       </a>
                                    </li>
                                    <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart"
                                          href="{{ route('product.details', $product->id) }}" title="Compare">
                                          <i class="fa fa-signal" aria-hidden="true"></i> </a>
                                    </li>
                                 </ul>
                              </div>
                              <!-- /.action -->
                           </div>
                           <!-- /.cart -->
                        </div>
                        <!-- /.product -->

                     </div>
                     <!-- /.products -->
                  </div>
                  <!-- /.item -->
               @endforeach
               <!-- /.item -->


            </div>
            <!-- /.home-owl-carousel -->
         </section>
         <!-- /.section -->
         <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->
         {{-- ------------------------category-skip(0)-products--------------------- --}}
         <section class="section featured-product wow fadeInUp">
            <h3 class="section-title">
               {{ session()->get('language') == 'hindi' ? $category_skip_0->category_name_hin : $category_skip_0->category_name_en }}
            </h3>
            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">


               @foreach ($products_category_skip_0 as $product)
                  <div class="item item-carousel">
                     <div class="products">
                        <div class="product">
                           <div class="product-image">
                              <div class="image"> <a href="{{ route('product.details', $product->id) }}"><img
                                       src="{{ asset($product->product_thumbnail) }}"
                                       alt="@if (session()->get('language') == 'hindi') {{ $product->product_name_hin }} @else {{ $product->product_name_en }} @endif"></a>
                              </div>
                              <!-- /.image -->

                              @php
                                 $amount = $product->selling_price - $product->discount_price;
                                 $discount = ($amount / $product->selling_price) * 100;
                              @endphp
                              @if ($product->discount_price == null)
                                 <div class="tag new"><span>new</span></div>
                              @else
                                 <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                              @endif
                           </div>
                           <!-- /.product-image -->

                           <div class="product-info text-left">
                              <h3 class="name"><a href="{{ route('product.details', $product->id) }}">
                                    @if (session()->get('language') == 'hindi')
                                       {{ $product->product_name_hin }}
                                    @else
                                       {{ $product->product_name_en }}
                                    @endif
                                 </a></h3>
                              <div class="rating rateit-small"></div>
                              <div class="description"></div>
                              <div class="product-price">
                                 @if ($product->discount_price == null)
                                    <span class="price">${{ $product->selling_price }}</span>
                                 @else
                                    <span class="price">${{ $product->discount_price }}</span>
                                    <span class="price-before-discount">${{ $product->selling_price }}</span>
                                 @endif
                              </div>

                              <!-- /.product-price -->

                           </div>
                           <!-- /.product-info -->
                           <div class="cart clearfix animate-effect">
                              <div class="action">
                                 <ul class="list-unstyled">
                                    <li class="add-cart-button btn-group">
                                       <button data-toggle="tooltip" class="btn btn-primary icon" type="button"
                                          title="Add Cart"> <i class="fa fa-shopping-cart"></i>
                                       </button>
                                       <button class="btn btn-primary cart-btn" type="button">Add to
                                          cart</button>
                                    </li>
                                    <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart"
                                          href="{{ route('product.details', $product->id) }}" title="Wishlist">
                                          <i class="icon fa fa-heart"></i>
                                       </a>
                                    </li>
                                    <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart"
                                          href="{{ route('product.details', $product->id) }}" title="Compare">
                                          <i class="fa fa-signal" aria-hidden="true"></i> </a>
                                    </li>
                                 </ul>
                              </div>
                              <!-- /.action -->
                           </div>
                           <!-- /.cart -->
                        </div>
                        <!-- /.product -->

                     </div>
                     <!-- /.products -->
                  </div>
                  <!-- /.item -->
               @endforeach
               <!-- /.item -->


            </div>
            <!-- /.home-owl-carousel -->
         </section>
         {{-- ------------------------category-products--------------------- --}}
         {{-- ------------------------brand-skip(0)products--------------------- --}}
         <section class="section featured-product wow fadeInUp">
            <h3 class="section-title">
               {{ session()->get('language') == 'hindi' ? $brand_skip_0->brand_name_hin : $brand_skip_0->brand_name_en }}
            </h3>
            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">


               @foreach ($products_brand_skip_0 as $product)
                  <div class="item item-carousel">
                     <div class="products">
                        <div class="product">
                           <div class="product-image">
                              <div class="image"> <a href="{{ route('product.details', $product->id) }}"><img
                                       src="{{ asset($product->product_thumbnail) }}"
                                       alt="@if (session()->get('language') == 'hindi') {{ $product->product_name_hin }} @else {{ $product->product_name_en }} @endif"></a>
                              </div>
                              <!-- /.image -->

                              @php
                                 $amount = $product->selling_price - $product->discount_price;
                                 $discount = ($amount / $product->selling_price) * 100;
                              @endphp
                              @if ($product->discount_price == null)
                                 <div class="tag new"><span>new</span></div>
                              @else
                                 <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                              @endif
                           </div>
                           <!-- /.product-image -->

                           <div class="product-info text-left">
                              <h3 class="name"><a href="{{ route('product.details', $product->id) }}">
                                    @if (session()->get('language') == 'hindi')
                                       {{ $product->product_name_hin }}
                                    @else
                                       {{ $product->product_name_en }}
                                    @endif
                                 </a></h3>
                              <div class="rating rateit-small"></div>
                              <div class="description"></div>
                              <div class="product-price">
                                 @if ($product->discount_price == null)
                                    <span class="price">${{ $product->selling_price }}</span>
                                 @else
                                    <span class="price">${{ $product->discount_price }}</span>
                                    <span class="price-before-discount">${{ $product->selling_price }}</span>
                                 @endif
                              </div>

                              <!-- /.product-price -->

                           </div>
                           <!-- /.product-info -->
                           <div class="cart clearfix animate-effect">
                              <div class="action">
                                 <ul class="list-unstyled">
                                    <li class="add-cart-button btn-group">
                                       <button data-toggle="tooltip" class="btn btn-primary icon" type="button"
                                          title="Add Cart"> <i class="fa fa-shopping-cart"></i>
                                       </button>
                                       <button class="btn btn-primary cart-btn" type="button">Add to
                                          cart</button>
                                    </li>
                                    <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart"
                                          href="{{ route('product.details', $product->id) }}" title="Wishlist">
                                          <i class="icon fa fa-heart"></i>
                                       </a>
                                    </li>
                                    <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart"
                                          href="{{ route('product.details', $product->id) }}" title="Compare">
                                          <i class="fa fa-signal" aria-hidden="true"></i> </a>
                                    </li>
                                 </ul>
                              </div>
                              <!-- /.action -->
                           </div>
                           <!-- /.cart -->
                        </div>
                        <!-- /.product -->

                     </div>
                     <!-- /.products -->
                  </div>
                  <!-- /.item -->
               @endforeach
               <!-- /.item -->


            </div>
            <!-- /.home-owl-carousel -->
         </section>
         {{-- ------------------------brand-products--------------------- --}}
         <!-- ======================image======================== WIDE PRODUCTS ============================================== -->
         <div class="wide-banners wow fadeInUp outer-bottom-xs">
            <div class="row">
               <div class="col-md-12">
                  <div class="wide-banner cnt-strip">
                     <div class="image"> <img class="img-responsive"
                           src="{{ asset('frontend/assets/images/banners/home-banner.jpg') }}" alt=""> </div>
                     <div class="strip strip-text">
                        <div class="strip-inner">
                           <h2 class="text-right">
                              @if (session()->get('language') == 'hindi')
                                 'घर'
                              @else
                                 'New Mens Fashion'
                              @endif
                              <br>
                              <span class="shopping-needs">
                                 @if (session()->get('language') == 'hindi')
                                    'घर'
                                 @else
                                    'Save up to 40% off'
                                 @endif
                              </span>
                           </h2>
                        </div>
                     </div>
                     <div class="new-label">
                        <div class="text">NEW</div>
                     </div>
                     <!-- /.new-label -->
                  </div>
                  <!-- /.wide-banner -->
               </div>
               <!-- /.col -->

            </div>
            <!-- /.row -->
         </div>
         <!-- /.wide-banners -->
         <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
         <!-- ============================================== BEST SELLER ============================================== -->

         <div class="best-deal wow fadeInUp outer-bottom-xs">
            <h3 class="section-title">Best seller</h3>
            <div class="sidebar-widget-body outer-top-xs">
               <div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">
                  <div class="item">
                     <div class="products best-product">
                        <div class="product">
                           <div class="product-micro">
                              <div class="row product-micro-row">
                                 <div class="col col-xs-5">
                                    <div class="product-image">
                                       <div class="image"> <a href="#"> <img src="assets/images/products/p20.jpg"
                                                alt=""> </a>
                                       </div>
                                       <!-- /.image -->

                                    </div>
                                    <!-- /.product-image -->
                                 </div>
                                 <!-- /.col -->
                                 <div class="col2 col-xs-7">
                                    <div class="product-info">
                                       <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                       <div class="rating rateit-small"></div>
                                       <div class="product-price"> <span class="price"> $450.99 </span>
                                       </div>
                                       <!-- /.product-price -->

                                    </div>
                                 </div>
                                 <!-- /.col -->
                              </div>
                              <!-- /.product-micro-row -->
                           </div>
                           <!-- /.product-micro -->

                        </div>
                        <div class="product">
                           <div class="product-micro">
                              <div class="row product-micro-row">
                                 <div class="col col-xs-5">
                                    <div class="product-image">
                                       <div class="image"> <a href="#"> <img src="assets/images/products/p21.jpg"
                                                alt=""> </a>
                                       </div>
                                       <!-- /.image -->

                                    </div>
                                    <!-- /.product-image -->
                                 </div>
                                 <!-- /.col -->
                                 <div class="col2 col-xs-7">
                                    <div class="product-info">
                                       <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                       <div class="rating rateit-small"></div>
                                       <div class="product-price"> <span class="price"> $450.99 </span>
                                       </div>
                                       <!-- /.product-price -->

                                    </div>
                                 </div>
                                 <!-- /.col -->
                              </div>
                              <!-- /.product-micro-row -->
                           </div>
                           <!-- /.product-micro -->

                        </div>
                     </div>
                  </div>
                  <div class="item">
                     <div class="products best-product">
                        <div class="product">
                           <div class="product-micro">
                              <div class="row product-micro-row">
                                 <div class="col col-xs-5">
                                    <div class="product-image">
                                       <div class="image"> <a href="#"> <img src="assets/images/products/p22.jpg"
                                                alt=""> </a>
                                       </div>
                                       <!-- /.image -->

                                    </div>
                                    <!-- /.product-image -->
                                 </div>
                                 <!-- /.col -->
                                 <div class="col2 col-xs-7">
                                    <div class="product-info">
                                       <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                       <div class="rating rateit-small"></div>
                                       <div class="product-price"> <span class="price"> $450.99 </span>
                                       </div>
                                       <!-- /.product-price -->

                                    </div>
                                 </div>
                                 <!-- /.col -->
                              </div>
                              <!-- /.product-micro-row -->
                           </div>
                           <!-- /.product-micro -->

                        </div>
                        <div class="product">
                           <div class="product-micro">
                              <div class="row product-micro-row">
                                 <div class="col col-xs-5">
                                    <div class="product-image">
                                       <div class="image"> <a href="#"> <img src="assets/images/products/p23.jpg"
                                                alt=""> </a>
                                       </div>
                                       <!-- /.image -->

                                    </div>
                                    <!-- /.product-image -->
                                 </div>
                                 <!-- /.col -->
                                 <div class="col2 col-xs-7">
                                    <div class="product-info">
                                       <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                       <div class="rating rateit-small"></div>
                                       <div class="product-price"> <span class="price"> $450.99 </span>
                                       </div>
                                       <!-- /.product-price -->

                                    </div>
                                 </div>
                                 <!-- /.col -->
                              </div>
                              <!-- /.product-micro-row -->
                           </div>
                           <!-- /.product-micro -->

                        </div>
                     </div>
                  </div>
                  <div class="item">
                     <div class="products best-product">
                        <div class="product">
                           <div class="product-micro">
                              <div class="row product-micro-row">
                                 <div class="col col-xs-5">
                                    <div class="product-image">
                                       <div class="image"> <a href="#"> <img src="assets/images/products/p24.jpg"
                                                alt=""> </a>
                                       </div>
                                       <!-- /.image -->

                                    </div>
                                    <!-- /.product-image -->
                                 </div>
                                 <!-- /.col -->
                                 <div class="col2 col-xs-7">
                                    <div class="product-info">
                                       <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                       <div class="rating rateit-small"></div>
                                       <div class="product-price"> <span class="price"> $450.99 </span>
                                       </div>
                                       <!-- /.product-price -->

                                    </div>
                                 </div>
                                 <!-- /.col -->
                              </div>
                              <!-- /.product-micro-row -->
                           </div>
                           <!-- /.product-micro -->

                        </div>
                        <div class="product">
                           <div class="product-micro">
                              <div class="row product-micro-row">
                                 <div class="col col-xs-5">
                                    <div class="product-image">
                                       <div class="image"> <a href="#"> <img src="assets/images/products/p25.jpg"
                                                alt=""> </a>
                                       </div>
                                       <!-- /.image -->

                                    </div>
                                    <!-- /.product-image -->
                                 </div>
                                 <!-- /.col -->
                                 <div class="col2 col-xs-7">
                                    <div class="product-info">
                                       <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                       <div class="rating rateit-small"></div>
                                       <div class="product-price"> <span class="price"> $450.99 </span>
                                       </div>
                                       <!-- /.product-price -->

                                    </div>
                                 </div>
                                 <!-- /.col -->
                              </div>
                              <!-- /.product-micro-row -->
                           </div>
                           <!-- /.product-micro -->

                        </div>
                     </div>
                  </div>
                  <div class="item">
                     <div class="products best-product">
                        <div class="product">
                           <div class="product-micro">
                              <div class="row product-micro-row">
                                 <div class="col col-xs-5">
                                    <div class="product-image">
                                       <div class="image"> <a href="#"> <img src="assets/images/products/p26.jpg"
                                                alt=""> </a>
                                       </div>
                                       <!-- /.image -->

                                    </div>
                                    <!-- /.product-image -->
                                 </div>
                                 <!-- /.col -->
                                 <div class="col2 col-xs-7">
                                    <div class="product-info">
                                       <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                       <div class="rating rateit-small"></div>
                                       <div class="product-price"> <span class="price"> $450.99 </span>
                                       </div>
                                       <!-- /.product-price -->

                                    </div>
                                 </div>
                                 <!-- /.col -->
                              </div>
                              <!-- /.product-micro-row -->
                           </div>
                           <!-- /.product-micro -->

                        </div>
                        <div class="product">
                           <div class="product-micro">
                              <div class="row product-micro-row">
                                 <div class="col col-xs-5">
                                    <div class="product-image">
                                       <div class="image"> <a href="#"> <img src="assets/images/products/p27.jpg"
                                                alt=""> </a>
                                       </div>
                                       <!-- /.image -->

                                    </div>
                                    <!-- /.product-image -->
                                 </div>
                                 <!-- /.col -->
                                 <div class="col2 col-xs-7">
                                    <div class="product-info">
                                       <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                       <div class="rating rateit-small"></div>
                                       <div class="product-price"> <span class="price"> $450.99 </span>
                                       </div>
                                       <!-- /.product-price -->

                                    </div>
                                 </div>
                                 <!-- /.col -->
                              </div>
                              <!-- /.product-micro-row -->
                           </div>
                           <!-- /.product-micro -->

                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- /.sidebar-widget-body -->
         </div>
         <!-- /.sidebar-widget -->
         <!-- ============================================== BEST SELLER : END ============================================== -->

         <!-- ============================================== BLOG SLIDER ============================================== -->
         <section class="section latest-blog outer-bottom-vs wow fadeInUp">
            <h3 class="section-title">latest form blog</h3>
            <div class="blog-slider-container outer-top-xs">
               <div class="owl-carousel blog-slider custom-carousel">
                  <div class="item">
                     <div class="blog-post">
                        <div class="blog-post-image">
                           <div class="image"> <a href="blog.html"><img src="assets/images/blog-post/post1.jpg"
                                    alt=""></a> </div>
                        </div>
                        <!-- /.blog-post-image -->

                        <div class="blog-post-info text-left">
                           <h3 class="name"><a href="#">Voluptatem accusantium doloremque
                                 laudantium</a></h3>
                           <span class="info">By Jone Doe &nbsp;|&nbsp; 21 March 2016 </span>
                           <p class="text">Sed quia non numquam eius modi tempora incidunt ut labore et dolore
                              magnam aliquam quaerat voluptatem.</p>
                           <a href="#" class="lnk btn btn-primary">Read more</a>
                        </div>
                        <!-- /.blog-post-info -->

                     </div>
                     <!-- /.blog-post -->
                  </div>
                  <!-- /.item -->

                  <div class="item">
                     <div class="blog-post">
                        <div class="blog-post-image">
                           <div class="image"> <a href="blog.html"><img src="assets/images/blog-post/post2.jpg"
                                    alt=""></a> </div>
                        </div>
                        <!-- /.blog-post-image -->

                        <div class="blog-post-info text-left">
                           <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla
                                 pariatur</a></h3>
                           <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                           <p class="text">Sed quia non numquam eius modi tempora incidunt ut labore et dolore
                              magnam aliquam quaerat voluptatem.</p>
                           <a href="#" class="lnk btn btn-primary">Read more</a>
                        </div>
                        <!-- /.blog-post-info -->

                     </div>
                     <!-- /.blog-post -->
                  </div>
                  <!-- /.item -->

                  <!-- /.item -->

                  <div class="item">
                     <div class="blog-post">
                        <div class="blog-post-image">
                           <div class="image"> <a href="blog.html"><img src="assets/images/blog-post/post1.jpg"
                                    alt=""></a> </div>
                        </div>
                        <!-- /.blog-post-image -->

                        <div class="blog-post-info text-left">
                           <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla
                                 pariatur</a></h3>
                           <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                           <p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                              accusantium</p>
                           <a href="#" class="lnk btn btn-primary">Read more</a>
                        </div>
                        <!-- /.blog-post-info -->

                     </div>
                     <!-- /.blog-post -->
                  </div>
                  <!-- /.item -->

                  <div class="item">
                     <div class="blog-post">
                        <div class="blog-post-image">
                           <div class="image"> <a href="blog.html"><img src="assets/images/blog-post/post2.jpg"
                                    alt=""></a> </div>
                        </div>
                        <!-- /.blog-post-image -->

                        <div class="blog-post-info text-left">
                           <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla
                                 pariatur</a></h3>
                           <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                           <p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                              accusantium</p>
                           <a href="#" class="lnk btn btn-primary">Read more</a>
                        </div>
                        <!-- /.blog-post-info -->

                     </div>
                     <!-- /.blog-post -->
                  </div>
                  <!-- /.item -->

                  <div class="item">
                     <div class="blog-post">
                        <div class="blog-post-image">
                           <div class="image"> <a href="blog.html"><img src="assets/images/blog-post/post1.jpg"
                                    alt=""></a> </div>
                        </div>
                        <!-- /.blog-post-image -->

                        <div class="blog-post-info text-left">
                           <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla
                                 pariatur</a></h3>
                           <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                           <p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                              accusantium</p>
                           <a href="#" class="lnk btn btn-primary">Read more</a>
                        </div>
                        <!-- /.blog-post-info -->

                     </div>
                     <!-- /.blog-post -->
                  </div>
                  <!-- /.item -->

               </div>
               <!-- /.owl-carousel -->
            </div>
            <!-- /.blog-slider-container -->
         </section>
         <!-- /.section -->
         <!-- ============================================== BLOG SLIDER : END ============================================== -->

         <!-- ============================================== FEATURED PRODUCTS ============================================== -->
         <section class="section wow fadeInUp new-arriavls">
            <h3 class="section-title">New Arrivals</h3>
            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
               <div class="item item-carousel">
                  <div class="products">
                     <div class="product">
                        <div class="product-image">
                           <div class="image"> <a href="detail.html"><img src="assets/images/products/p19.jpg"
                                    alt=""></a> </div>
                           <!-- /.image -->

                           <div class="tag new"><span>new</span></div>
                        </div>
                        <!-- /.product-image -->

                        <div class="product-info text-left">
                           <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                           <div class="rating rateit-small"></div>
                           <div class="description"></div>
                           <div class="product-price"> <span class="price"> $450.99 </span> <span
                                 class="price-before-discount">$ 800</span> </div>
                           <!-- /.product-price -->

                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                           <div class="action">
                              <ul class="list-unstyled">
                                 <li class="add-cart-button btn-group">
                                    <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i
                                          class="fa fa-shopping-cart"></i> </button>
                                    <button class="btn btn-primary cart-btn" type="button">Add to
                                       cart</button>
                                 </li>
                                 <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist">
                                       <i class="icon fa fa-heart"></i> </a> </li>
                                 <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i
                                          class="fa fa-signal" aria-hidden="true"></i> </a>
                                 </li>
                              </ul>
                           </div>
                           <!-- /.action -->
                        </div>
                        <!-- /.cart -->
                     </div>
                     <!-- /.product -->

                  </div>
                  <!-- /.products -->
               </div>
               <!-- /.item -->

               <div class="item item-carousel">
                  <div class="products">
                     <div class="product">
                        <div class="product-image">
                           <div class="image"> <a href="detail.html"><img src="assets/images/products/p28.jpg"
                                    alt=""></a> </div>
                           <!-- /.image -->

                           <div class="tag new"><span>new</span></div>
                        </div>
                        <!-- /.product-image -->

                        <div class="product-info text-left">
                           <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                           <div class="rating rateit-small"></div>
                           <div class="description"></div>
                           <div class="product-price"> <span class="price"> $450.99 </span> <span
                                 class="price-before-discount">$ 800</span> </div>
                           <!-- /.product-price -->

                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                           <div class="action">
                              <ul class="list-unstyled">
                                 <li class="add-cart-button btn-group">
                                    <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i
                                          class="fa fa-shopping-cart"></i> </button>
                                    <button class="btn btn-primary cart-btn" type="button">Add to
                                       cart</button>
                                 </li>
                                 <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist">
                                       <i class="icon fa fa-heart"></i> </a> </li>
                                 <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i
                                          class="fa fa-signal" aria-hidden="true"></i> </a>
                                 </li>
                              </ul>
                           </div>
                           <!-- /.action -->
                        </div>
                        <!-- /.cart -->
                     </div>
                     <!-- /.product -->

                  </div>
                  <!-- /.products -->
               </div>
               <!-- /.item -->

               <div class="item item-carousel">
                  <div class="products">
                     <div class="product">
                        <div class="product-image">
                           <div class="image"> <a href="detail.html"><img src="assets/images/products/p30.jpg"
                                    alt=""></a> </div>
                           <!-- /.image -->

                           <div class="tag hot"><span>hot</span></div>
                        </div>
                        <!-- /.product-image -->

                        <div class="product-info text-left">
                           <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                           <div class="rating rateit-small"></div>
                           <div class="description"></div>
                           <div class="product-price"> <span class="price"> $450.99 </span> <span
                                 class="price-before-discount">$ 800</span> </div>
                           <!-- /.product-price -->

                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                           <div class="action">
                              <ul class="list-unstyled">
                                 <li class="add-cart-button btn-group">
                                    <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i
                                          class="fa fa-shopping-cart"></i> </button>
                                    <button class="btn btn-primary cart-btn" type="button">Add to
                                       cart</button>
                                 </li>
                                 <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist">
                                       <i class="icon fa fa-heart"></i> </a> </li>
                                 <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i
                                          class="fa fa-signal" aria-hidden="true"></i> </a>
                                 </li>
                              </ul>
                           </div>
                           <!-- /.action -->
                        </div>
                        <!-- /.cart -->
                     </div>
                     <!-- /.product -->

                  </div>
                  <!-- /.products -->
               </div>
               <!-- /.item -->

               <div class="item item-carousel">
                  <div class="products">
                     <div class="product">
                        <div class="product-image">
                           <div class="image"> <a href="detail.html"><img src="assets/images/products/p1.jpg"
                                    alt=""></a> </div>
                           <!-- /.image -->

                           <div class="tag hot"><span>hot</span></div>
                        </div>
                        <!-- /.product-image -->

                        <div class="product-info text-left">
                           <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                           <div class="rating rateit-small"></div>
                           <div class="description"></div>
                           <div class="product-price"> <span class="price"> $450.99 </span> <span
                                 class="price-before-discount">$ 800</span> </div>
                           <!-- /.product-price -->

                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                           <div class="action">
                              <ul class="list-unstyled">
                                 <li class="add-cart-button btn-group">
                                    <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i
                                          class="fa fa-shopping-cart"></i> </button>
                                    <button class="btn btn-primary cart-btn" type="button">Add to
                                       cart</button>
                                 </li>
                                 <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist">
                                       <i class="icon fa fa-heart"></i> </a> </li>
                                 <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i
                                          class="fa fa-signal" aria-hidden="true"></i> </a>
                                 </li>
                              </ul>
                           </div>
                           <!-- /.action -->
                        </div>
                        <!-- /.cart -->
                     </div>
                     <!-- /.product -->

                  </div>
                  <!-- /.products -->
               </div>
               <!-- /.item -->

               <div class="item item-carousel">
                  <div class="products">
                     <div class="product">
                        <div class="product-image">
                           <div class="image"> <a href="detail.html"><img src="assets/images/products/p2.jpg"
                                    alt=""></a> </div>
                           <!-- /.image -->

                           <div class="tag sale"><span>sale</span></div>
                        </div>
                        <!-- /.product-image -->

                        <div class="product-info text-left">
                           <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                           <div class="rating rateit-small"></div>
                           <div class="description"></div>
                           <div class="product-price"> <span class="price"> $450.99 </span> <span
                                 class="price-before-discount">$ 800</span> </div>
                           <!-- /.product-price -->

                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                           <div class="action">
                              <ul class="list-unstyled">
                                 <li class="add-cart-button btn-group">
                                    <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i
                                          class="fa fa-shopping-cart"></i> </button>
                                    <button class="btn btn-primary cart-btn" type="button">Add to
                                       cart</button>
                                 </li>
                                 <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist">
                                       <i class="icon fa fa-heart"></i> </a> </li>
                                 <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i
                                          class="fa fa-signal" aria-hidden="true"></i> </a>
                                 </li>
                              </ul>
                           </div>
                           <!-- /.action -->
                        </div>
                        <!-- /.cart -->
                     </div>
                     <!-- /.product -->

                  </div>
                  <!-- /.products -->
               </div>
               <!-- /.item -->

               <div class="item item-carousel">
                  <div class="products">
                     <div class="product">
                        <div class="product-image">
                           <div class="image"> <a href="detail.html"><img src="assets/images/products/p3.jpg"
                                    alt=""></a> </div>
                           <!-- /.image -->

                           <div class="tag sale"><span>sale</span></div>
                        </div>
                        <!-- /.product-image -->

                        <div class="product-info text-left">
                           <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                           <div class="rating rateit-small"></div>
                           <div class="description"></div>
                           <div class="product-price"> <span class="price"> $450.99 </span> <span
                                 class="price-before-discount">$ 800</span> </div>
                           <!-- /.product-price -->

                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                           <div class="action">
                              <ul class="list-unstyled">
                                 <li class="add-cart-button btn-group">
                                    <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i
                                          class="fa fa-shopping-cart"></i> </button>
                                    <button class="btn btn-primary cart-btn" type="button">Add to
                                       cart</button>
                                 </li>
                                 <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist">
                                       <i class="icon fa fa-heart"></i> </a> </li>
                                 <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i
                                          class="fa fa-signal" aria-hidden="true"></i> </a>
                                 </li>
                              </ul>
                           </div>
                           <!-- /.action -->
                        </div>
                        <!-- /.cart -->
                     </div>
                     <!-- /.product -->

                  </div>
                  <!-- /.products -->
               </div>
               <!-- /.item -->
            </div>
            <!-- /.home-owl-carousel -->
         </section>
         <!-- /.section -->
         <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->

      </div>
      <!-- ============================================== end content =============================-->
   </div>
@endsection
