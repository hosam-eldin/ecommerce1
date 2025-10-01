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
