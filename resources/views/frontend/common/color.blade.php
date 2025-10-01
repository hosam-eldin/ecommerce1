@php
   $colors_en = App\Models\Product::groupBy('product_color_en')->select('product_color_en')->get();
   $colors_hin = App\Models\Product::groupBy('product_color_hin')->select('product_color_hin')->get();
@endphp


<div class="sidebar-widget wow fadeInUp">
   <div class="widget-header">
      <h4 class="widget-title">
         @if (session()->get('language') == 'hindi')
            रंग
         @else
            Colors
         @endif
      </h4>
   </div>
   <div class="sidebar-widget-body">
      <ul class="list">
         @if (session()->get('language') == 'hindi')
            @foreach ($colors_hin as $color)
               <li>
                  <a class="{{ isset($color_selected) && $color_selected == $color->product_color_hin ? 'active' : '' }}"
                     href="{{ url('product/color/' . $color->product_color_hin) }}">
                     {{ str_replace(',', ' ', $color->product_color_hin) }}
                  </a>
               </li>
            @endforeach
         @else
            @foreach ($colors_en as $color)
               <li>
                  <a class="{{ isset($color_selected) && $color_selected == $color->product_color_en ? 'active' : '' }}"
                     href="{{ url('product/color/' . $color->product_color_en) }}">
                     {{ str_replace(',', ' ', $color->product_color_en) }}
                  </a>
               </li>
            @endforeach
         @endif
      </ul>
   </div>
</div>
