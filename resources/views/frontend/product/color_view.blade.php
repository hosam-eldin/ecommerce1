@extends('frontend.master')
@section('title', session()->get('language') == 'hindi' ? 'घर' : 'color wise product')


@section('content')
   <div class="row ">
      <!-- ================================= SIDEBAR ============================================== -->
      <div class="col-md-3 sidebar">
         <!-- ================================== TOP NAVIGATION ================================== -->
         @include('frontend.common.vertical_menu')
         <!-- /.side-menu -->
         <!-- ================================== TOP NAVIGATION : END ================================== -->
         <div class="sidebar-module-container">
            <div class="sidebar-filter">
               <!-- ============================================== SIDEBAR CATEGORY ============================================== -->
               @include('frontend.common.category')
               <!-- /.sidebar-widget -->
               <!-- ============================================== SIDEBAR CATEGORY : END ============================================== -->

               <!-- ============================================== PRICE SILDER============================================== -->
               @include('frontend.common.price_slider')
               <!-- /.sidebar-widget -->
               <!-- ============================================== PRICE SILDER : END ============================================== -->
               <!-- ===================brands=========================== MANUFACTURES============================================== -->
               @include('frontend.common.brands')
               <!-- /.sidebar-widget -->
               <!-- ============================================== MANUFACTURES: END ============================================== -->
               <!-- ============================================== COLOR============================================== -->
               @include('frontend.common.color')
               <!-- /.sidebar-widget -->
               <!-- ============================================== COLOR: END ============================================== -->
               <!-- ============================================== COMPARE============================================== -->
               @include('frontend.common.compare')
               <!-- /.sidebar-widget -->
               <!-- ============================================== COMPARE: END ============================================== -->
               <!-- ============================================== PRODUCT TAGS ============================================== -->
               @include('frontend.common.product_tags')
               <!-- /.sidebar-widget -->
               <!----------- Testimonials------------->

               @include('frontend.common.Testimonials')
               <!-- ============================================== Testimonials: END ============================================== -->

               <div class="home-banner">
                  <img src="{{ asset('frontend/assets/images/banners/LHS-banner.jpg') }}" alt="Image" />
               </div>
            </div>
            <!-- /.sidebar-filter -->
         </div>
         <!-- /.sidebar-module-container -->
      </div>
      <!-- =============================== END SIDEBAR ============================================== -->
      <!-- ============================================== content =============================-->
      <div class="col-md-9">
         <!-- ========================================== SECTION – HERO ========================================= -->

         <div id="category" class="category-carousel hidden-xs">
            <div class="item">
               <div class="image">
                  <img src="{{ asset('frontend/assets/images/banners/cat-banner-1.jpg') }}" alt=""
                     class="img-responsive" />
               </div>
               <div class="container-fluid">
                  <div class="caption vertical-top text-left">
                     <div class="big-text">Big Sale</div>
                     <div class="excerpt hidden-sm hidden-md">
                        Save up to 49% off
                     </div>
                     <div class="excerpt-normal hidden-sm hidden-md">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit
                     </div>
                  </div>
                  <!-- /.caption -->
               </div>
               <!-- /.container-fluid -->
            </div>
         </div>

         <div class="clearfix filters-container m-t-10">
            <div class="row">
               <div class="col col-sm-6 col-md-2">
                  <div class="filter-tabs">
                     <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                        <li class="active">
                           <a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-large"></i>Grid</a>
                        </li>
                        <li>
                           <a data-toggle="tab" href="#list-container"><i class="icon fa fa-th-list"></i>List</a>
                        </li>
                     </ul>
                  </div>
                  <!-- /.filter-tabs -->
               </div>
               <!-- /.col -->
               <div class="col col-sm-12 col-md-6">
                  <div class="col col-sm-3 col-md-6 no-padding">
                     <div class="lbl-cnt">
                        <span class="lbl">Sort by</span>
                        <div class="fld inline">
                           <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                              <button data-toggle="dropdown" type="button" class="btn dropdown-toggle">
                                 {{-- ---------------ul---------------- --}}
                              </button>

                           </div>
                        </div>
                        <!-- /.fld -->
                     </div>
                     <!-- /.lbl-cnt -->
                  </div>
                  <!-- /.col -->
                  <div class="col col-sm-3 col-md-6 no-padding">
                     <div class="lbl-cnt">
                        <span class="lbl">Show</span>
                        <div class="fld inline">
                           <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                              <button data-toggle="dropdown" type="button" class="btn dropdown-toggle">
                                 {{-- ----------ul--------------------- --}}
                              </button>

                           </div>
                        </div>
                        <!-- /.fld -->
                     </div>
                     <!-- /.lbl-cnt -->
                  </div>
                  <!-- /.col -->
               </div>
               <!-- /.col -->
               <div class="col col-sm-6 col-md-4 text-right">
                  <div class="pagination-container">
                     {{ $products->links() }}
                     <!-- /.list-inline -->
                  </div>
                  <!-- /.pagination-container -->
               </div>
               <!-- /.col -->
            </div>
            <!-- /.row -->
         </div>
         <div class="search-result-container">
            <div id="myTabContent" class="tab-content category-list">
               <div class="tab-pane active" id="grid-container">
                  <div class="category-product">
                     <div class="row">

                        @foreach ($products as $product)
                           <div class="col-sm-6 col-md-4 wow fadeInUp">
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
                     <!-- /.row -->
                  </div>
                  <!-- /.category-product -->
               </div>
               <!-- /.tab-pane -->

               <div class="tab-pane" id="list-container">
                  <div class="category-product">

                     @foreach ($products as $product)
                        <div class="category-product-inner wow fadeInUp">
                           <div class="products">
                              <div class="product-list product">
                                 <div class="row product-list-row">
                                    <div class="col col-sm-4 col-lg-4">
                                       <div class="product-image">
                                          <div class="image">
                                             <img src="{{ asset($product->product_thumbnail) }}"
                                                alt="@if (session()->get('language') == 'hindi') {{ $product->product_name_hin }} @else {{ $product->product_name_en }} @endif" />
                                          </div>
                                       </div>
                                       <!-- /.product-image -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col col-sm-8 col-lg-8">
                                       <div class="product-info">
                                          <h3 class="name">
                                             <a href="{{ route('product.details', $product->id) }}">
                                                @if (session()->get('language') == 'hindi')
                                                   {{ $product->product_name_hin }}
                                                @else
                                                   {{ $product->product_name_en }}
                                                @endif
                                             </a>
                                          </h3>
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
                                          <div class="description m-t-10">
                                             @if (session()->get('language') == 'hindi')
                                                {{ $product->short_descrp_hin }}
                                             @else
                                                {{ $product->short_descrp_en }}
                                             @endif
                                          </div>
                                          <div class="cart clearfix animate-effect">
                                             <div class="action">
                                                <ul class="list-unstyled">
                                                   <li class="add-cart-button btn-group">
                                                      <button class="btn btn-primary icon" data-toggle="dropdown"
                                                         type="button">
                                                         <i class="fa fa-shopping-cart"></i>
                                                      </button>
                                                      <button class="btn btn-primary cart-btn" type="button">
                                                         {{ session()->get('language') == 'hindi' ? 'नये उत्पाद' : 'Add to cart' }}
                                                      </button>
                                                   </li>
                                                   <li class="lnk wishlist">
                                                      <a class="add-to-cart"
                                                         href="{{ route('product.details', $product->id) }}"
                                                         title="Wishlist">
                                                         <i class="icon fa fa-heart"></i>
                                                      </a>
                                                   </li>
                                                   <li class="lnk">
                                                      <a class="add-to-cart"
                                                         href="{{ route('product.details', $product->id) }}"
                                                         title="Compare">
                                                         <i class="fa fa-signal"></i>
                                                      </a>
                                                   </li>
                                                </ul>
                                             </div>
                                             <!-- /.action -->
                                          </div>
                                          <!-- /.cart -->
                                       </div>
                                       <!-- /.product-info -->
                                    </div>
                                    <!-- /.col -->
                                 </div>
                                 <!-- /.product-list-row -->
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
                              <!-- /.product-list -->
                           </div>
                           <!-- /.products -->
                        </div>
                        <!-- /.category-product-inner -->
                     @endforeach
                  </div>
                  <!-- /.category-product -->
               </div>
               <!-- /.tab-pane #list-container -->
            </div>
            <!-- /.tab-content -->
            <div class="clearfix filters-container">
               <div class="text-right">
                  <div class="pagination-container">
                     {{ $products->links() }}
                     <!-- /.list-inline -->
                  </div>
                  <!-- /.pagination-container -->
               </div>
               <!-- /.text-right -->
            </div>
            <!-- /.filters-container -->
         </div>
         <!-- /.search-result-container -->
      </div>
      <!-- ============================================== end content =============================-->
   </div>
@endsection
