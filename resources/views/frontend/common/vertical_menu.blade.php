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
                               <a
                                  href="{{ url('subcategory/product/' . $subcategory->id . '/' . $subcategory->sub_category_slug_en) }}">
                                  <h2 class="title">
                                     @if (session()->get('language') == 'hindi')
                                        {{ $subcategory->sub_category_name_hin }}
                                     @else
                                        {{ $subcategory->sub_category_name_en }}
                                     @endif
                                  </h2>
                               </a>

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
                                  <ul class="links list-unstyled">
                                     <li><a
                                           href="{{ url('subcategory/product/' . $subsubcat->id . '/' . $subsubcat->sub_sub_category_slug_en) }}">
                                           @if (session()->get('language') == 'hindi')
                                              {{ $subsubcat->sub_sub_category_name_hin }}
                                           @else
                                              {{ $subsubcat->sub_sub_category_name_en }}
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
