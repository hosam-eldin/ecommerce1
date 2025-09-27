 <div id="brands-carousel" class="logo-slider wow fadeInUp">
    <div class="logo-slider-inner">
       <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
          @php
             $brands = App\Models\Brand::all();
          @endphp
          @foreach ($brands as $brand)
             <div class="item m-t-15"> <a href="#" class="image"> <img width="90px" height="70px"
                      data-echo="{{ asset($brand->brand_photo) }}" src="{{ asset('frontend/assets/images/blank.gif') }}"
                      alt="{{ session()->get('language') == 'hindi' ? $brand->brand_name_hin : $brand->brand_name_en }}">
                </a>
             </div>
          @endforeach
          <!--/.item-->
       </div>
       <!-- /.owl-carousel #logo-slider -->
    </div>
    <!-- /.logo-slider-inner -->

 </div>
