<section class="section featured-product wow fadeInUp">
   <h3 class="section-title">
      @if (session()->get('language') == 'hindi')
         {{ $product->product_name_hin }}
      @else
         upsell products
      @endif
   </h3>
   <div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">


      @forelse ($relatedProducts as $product)
         <div class="item item-carousel">
            <div class="products">
               <div class="product">
                  <div class="product-image">
                     <div class="image"> <a href="{{ route('product.details', $product->id) }}"><img
                              src="{{ asset($product->product_thumbnail) }}"
                              alt="{{ session('language') == 'hindi' ? $related->product_name_hin : $related->product_name_en }}"></a>
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
                              <button class="btn btn-primary cart-btn"
                                 type="button">{{ session()->get('language') == 'hindi' ? 'नये उत्पाद' : 'Add to cart' }}
                              </button>
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
      @empty
         <span class="text-danger mb-3"><strong>No Related Products Until Yet</strong></span>
      @endforelse
      <!-- /.item -->

   </div>
   <!-- /.home-owl-carousel -->
</section>
