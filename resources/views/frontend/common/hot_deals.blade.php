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
                  <div class="image"> <a href="{{ route('product.details', $product->id) }}">
                        <img src="{{ asset($product->product_thumbnail) }}"
                           alt="@if (session()->get('language') == 'hindi') {{ $product->product_name_hin }}
              @else
                  {{ $product->product_name_en }} @endif">
                     </a>
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
