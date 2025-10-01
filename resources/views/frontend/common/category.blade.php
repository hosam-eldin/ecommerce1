<div class="sidebar-widget wow fadeInUp">
   <h3 class="section-title">
      @if (session()->get('language') == 'hindi')
         श्रेणियाँ
      @else
         Shop By
      @endif
   </h3>
   <div class="widget-header">
      <h4 class="widget-title">
         @if (session()->get('language') == 'hindi')
            श्रेणियाँ
         @else
            Category
         @endif
      </h4>
   </div>
   <div class="sidebar-widget-body">
      <div class="accordion" id="accordionCategories">
         @foreach ($categories as $category)
            @php
               $collapseId = 'collapse' . $category->id;
            @endphp
            <div class="accordion-group">
               <div class="accordion-heading">
                  <a href="#{{ $collapseId }}" data-toggle="collapse" class="accordion-toggle collapsed"
                     data-parent="#accordionCategories">
                     @if (session()->get('language') == 'hindi')
                        {{ $category->category_name_hin }}
                     @else
                        {{ $category->category_name_en }}
                     @endif
                  </a>
               </div>

               <div id="{{ $collapseId }}" class="accordion-body collapse">
                  <div class="accordion-inner">
                     @php
                        $subcategories = App\Models\SubCategory::where('category_id', $category->id)
                            ->orderBy('sub_category_name_en', 'ASC')
                            ->get();
                     @endphp
                     <ul>
                        @foreach ($subcategories as $subcategory)
                           <li>
                              <a
                                 href="{{ url('subcategory/product/' . $subcategory->id . '/' . $subcategory->sub_category_slug_en) }}">
                                 @if (session()->get('language') == 'hindi')
                                    {{ $subcategory->sub_category_name_hin }}
                                 @else
                                    {{ $subcategory->sub_category_name_en }}
                                 @endif
                              </a>
                           </li>
                        @endforeach
                     </ul>
                  </div>
               </div>
            </div>
         @endforeach
      </div>
   </div>
</div>
