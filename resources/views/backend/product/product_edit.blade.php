@extends('admin.admin_master')
@section('title', ' Edit-Product')
@section('admin')
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


   <div class="container-full">
      <!-- Content Header (Page header) -->


      <!-- Main content -->
      <section class="content">

         <!-- Basic Forms -->
         <div class="box">
            <div class="box-header with-border">
               <h4 class="box-title">Edit Product </h4>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <div class="row">
                  <div class="col">

                     <form method="post" action="{{ route('product-update', $product->id) }}">
                        @csrf
                        @method('put')
                        <div class="row">
                           <div class="col-12">


                              <div class="row"> <!-- start 1st row  -->
                                 <div class="col-md-4">

                                    <div class="form-group">
                                       <h5>Brand Select <span class="text-danger">*</span></h5>
                                       <div class="controls">
                                          <select name="brand_id" class="form-control" required="">
                                             <option value="" selected="" disabled="">Select Brand</option>
                                             @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}"
                                                   {{ $brand->id == $product->brand_id ? 'selected' : '' }}>
                                                   {{ $brand->brand_name_en }}</option>
                                             @endforeach
                                          </select>
                                          @error('brand_id')
                                             <span class="text-danger">{{ $message }}</span>
                                          @enderror
                                       </div>
                                    </div>

                                 </div> <!-- end col md 4 -->

                                 <div class="col-md-4">

                                    <div class="form-group">
                                       <h5>Category Select <span class="text-danger">*</span></h5>
                                       <div class="controls">
                                          <select name="category_id" class="form-control" required="">
                                             <option value="" selected="" disabled="">Select Category</option>
                                             @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                   {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                                   {{ $category->category_name_en }}</option>
                                             @endforeach
                                          </select>
                                          @error('category_id')
                                             <span class="text-danger">{{ $message }}</span>
                                          @enderror
                                       </div>
                                    </div>

                                 </div> <!-- end col md 4 -->


                                 <div class="col-md-4">

                                    <div class="form-group">
                                       <h5>SubCategory Select <span class="text-danger">*</span></h5>
                                       <div class="controls">
                                          <select name="subcategory_id" class="form-control" required="">
                                             <option value="" selected="" disabled="">Select SubCategory
                                             </option>

                                          </select>
                                          @error('subcategory_id')
                                             <span class="text-danger">{{ $message }}</span>
                                          @enderror
                                       </div>
                                    </div>

                                 </div> <!-- end col md 4 -->

                              </div> <!-- end 1st row  -->



                              <div class="row"> <!-- start 2nd row  -->
                                 <div class="col-md-4">

                                    <div class="form-group">
                                       <h5>SubSubCategory Select <span class="text-danger">*</span></h5>
                                       <div class="controls">
                                          <select name="subsubcategory_id" class="form-control" required="">
                                             <option value="" selected="" disabled="">Select SubSubCategory
                                             </option>

                                          </select>
                                          @error('subsubcategory_id')
                                             <span class="text-danger">{{ $message }}</span>
                                          @enderror
                                       </div>
                                    </div>

                                 </div> <!-- end col md 4 -->

                                 <div class="col-md-4">

                                    <div class="form-group">
                                       <h5>Product Name En <span class="text-danger">*</span></h5>
                                       <div class="controls">
                                          <input type="text" name="product_name_en"
                                             value="{{ $product->product_name_en }}" class="form-control" required="">
                                          @error('product_name_en')
                                             <span class="text-danger">{{ $message }}</span>
                                          @enderror
                                       </div>
                                    </div>

                                 </div> <!-- end col md 4 -->


                                 <div class="col-md-4">

                                    <div class="form-group">
                                       <h5>Product Name Hin <span class="text-danger">*</span></h5>
                                       <div class="controls">
                                          <input type="text" name="product_name_hin"
                                             value="{{ $product->product_name_hin }}" class="form-control" required="">
                                          @error('product_name_hin')
                                             <span class="text-danger">{{ $message }}</span>
                                          @enderror
                                       </div>
                                    </div>

                                 </div> <!-- end col md 4 -->

                              </div> <!-- end 2nd row  -->



                              <div class="row"> <!-- start 3RD row  -->
                                 <div class="col-md-4">

                                    <div class="form-group">
                                       <h5>Product Code <span class="text-danger">*</span></h5>
                                       <div class="controls">
                                          <input type="text" name="product_code" value="{{ $product->product_code }}"
                                             class="form-control" required="">
                                          @error('product_code')
                                             <span class="text-danger">{{ $message }}</span>
                                          @enderror
                                       </div>
                                    </div>

                                 </div> <!-- end col md 4 -->

                                 <div class="col-md-4">

                                    <div class="form-group">
                                       <h5>Product Quantity <span class="text-danger">*</span></h5>
                                       <div class="controls">
                                          <input type="text" name="product_qty" value="{{ $product->product_qty }}"
                                             class="form-control" required="">
                                          @error('product_qty')
                                             <span class="text-danger">{{ $message }}</span>
                                          @enderror
                                       </div>
                                    </div>

                                 </div> <!-- end col md 4 -->


                                 <div class="col-md-4">

                                    <div class="form-group">
                                       <h5>Product Tags En <span class="text-danger">*</span></h5>
                                       <div class="controls">
                                          <input type="text" name="product_tags_en" class="form-control"
                                             value="{{ $product->product_tags_en }}" data-role="tagsinput"
                                             required="">
                                          @error('product_tags_en')
                                             <span class="text-danger">{{ $message }}</span>
                                          @enderror
                                       </div>
                                    </div>

                                 </div> <!-- end col md 4 -->

                              </div> <!-- end 3RD row  -->






                              <div class="row"> <!-- start 4th row  -->
                                 <div class="col-md-4">

                                    <div class="form-group">
                                       <h5>Product Tags Hin <span class="text-danger">*</span></h5>
                                       <div class="controls">
                                          <input type="text" name="product_tags_hin" class="form-control"
                                             value="{{ $product->product_tags_hin }}" data-role="tagsinput"
                                             required="">
                                          @error('product_tags_hin')
                                             <span class="text-danger">{{ $message }}</span>
                                          @enderror
                                       </div>
                                    </div>

                                 </div> <!-- end col md 4 -->

                                 <div class="col-md-4">

                                    <div class="form-group">
                                       <h5>Product Size En <span class="text-danger">*</span></h5>
                                       <div class="controls">
                                          <input type="text" name="product_size_en" class="form-control"
                                             value="{{ $product->product_size_en }}" data-role="tagsinput"
                                             required="">
                                          @error('product_size_en')
                                             <span class="text-danger">{{ $message }}</span>
                                          @enderror
                                       </div>
                                    </div>

                                 </div> <!-- end col md 4 -->


                                 <div class="col-md-4">

                                    <div class="form-group">
                                       <h5>Product Size Hin <span class="text-danger">*</span></h5>
                                       <div class="controls">
                                          <input type="text" name="product_size_hin" class="form-control"
                                             value="{{ $product->product_size_hin }}" data-role="tagsinput"
                                             required="">
                                          @error('product_size_hin')
                                             <span class="text-danger">{{ $message }}</span>
                                          @enderror
                                       </div>
                                    </div>

                                 </div> <!-- end col md 4 -->

                              </div> <!-- end 4th row  -->



                              <div class="row"> <!-- start 5th row  -->
                                 <div class="col-md-6">

                                    <div class="form-group">
                                       <h5>Product Color En <span class="text-danger">*</span></h5>
                                       <div class="controls">
                                          <input type="text" name="product_color_en" class="form-control"
                                             value="{{ $product->product_color_en }}" data-role="tagsinput"
                                             required="">
                                          @error('product_color_en')
                                             <span class="text-danger">{{ $message }}</span>
                                          @enderror
                                       </div>
                                    </div>

                                 </div> <!-- end col md 6 -->

                                 <div class="col-md-6">

                                    <div class="form-group">
                                       <h5>Product Color Hin <span class="text-danger">*</span></h5>
                                       <div class="controls">
                                          <input type="text" name="product_color_hin" class="form-control"
                                             value="{{ $product->product_color_hin }}" data-role="tagsinput"
                                             required="">
                                          @error('product_color_hin')
                                             <span class="text-danger">{{ $message }}</span>
                                          @enderror
                                       </div>
                                    </div>

                                 </div> <!-- end col md 6 -->

                              </div> <!-- end 5th row  -->

                              <div class="row"> <!-- start 6th row  -->
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <h5>Product Selling Price <span class="text-danger">*</span></h5>
                                       <div class="controls">
                                          <input type="text" value="{{ $product->selling_price }}"
                                             name="selling_price" class="form-control" required="">
                                          @error('selling_price')
                                             <span class="text-danger">{{ $message }}</span>
                                          @enderror
                                       </div>
                                    </div>
                                 </div> <!-- end col md 6 -->

                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <h5>Product Discount Price <span class="text-danger">*</span></h5>
                                       <div class="controls">
                                          <input type="text" value="{{ $product->discount_price }}"
                                             name="discount_price" class="form-control" required="">
                                          @error('discount_price')
                                             <span class="text-danger">{{ $message }}</span>
                                          @enderror
                                       </div>
                                    </div>
                                 </div><!-----end-col-md-6--->
                              </div> <!-- end 6th row  -->


                              <div class="row"> <!-- start 7th row  -->
                                 <div class="col-md-6">

                                    <div class="form-group">
                                       <h5>Short Description English <span class="text-danger">*</span></h5>
                                       <div class="controls">
                                          <textarea name="short_descp_en" id="textarea" class="form-control" required placeholder="Textarea text">
                                            {!! $product->short_descp_en !!}
                                          </textarea>
                                       </div>
                                    </div>

                                 </div> <!-- end col md 6 -->

                                 <div class="col-md-6">

                                    <div class="form-group">
                                       <h5>Short Description Hindi <span class="text-danger">*</span></h5>
                                       <div class="controls">
                                          <textarea name="short_descp_hin" id="textarea" class="form-control" required placeholder="Textarea text">
                                            {!! $product->short_descp_hin !!}
                                          </textarea>
                                       </div>
                                    </div>
                                 </div> <!-- end col md 6 -->

                              </div> <!-- end 7th row  -->

                              <div class="row"> <!-- start 8th row  -->
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <h5>Long Description English <span class="text-danger">*</span></h5>
                                       <div class="controls">
                                          <textarea id="editor1" name="long_descp_en" rows="10" cols="80" required="">
                                              {!! $product->long_descp_en !!}
                                                        </textarea>
                                       </div>
                                    </div>

                                 </div> <!-- end col md 6 -->

                                 <div class="col-md-6">

                                    <div class="form-group">
                                       <h5>Long Description Hindi <span class="text-danger">*</span></h5>
                                       <div class="controls">
                                          <textarea id="editor2" name="long_descp_hin" rows="10" cols="80">
                                            {!! $product->long_descp_hin !!}
                                                   </textarea>
                                       </div>
                                    </div>
                                 </div> <!-- end col md 6 -->
                              </div> <!-- end 8th row  -->
                              <hr>
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <div class="controls">
                                          <fieldset>
                                             <input type="checkbox" id="checkbox_2" name="hot_deals"
                                                {{ $product->hot_deals == 1 ? 'checked' : '' }} value="1">
                                             <label for="checkbox_2">Hot Deals</label>
                                          </fieldset>
                                          <fieldset>
                                             <input type="checkbox" id="checkbox_3" name="featured"
                                                {{ $product->featured == 1 ? 'checked' : '' }} value="1">
                                             <label for="checkbox_3">Featured</label>
                                          </fieldset>
                                       </div>
                                    </div>
                                 </div>

                                 <div class="col-md-6">
                                    <div class="form-group">

                                       <div class="controls">
                                          <fieldset>
                                             <input type="checkbox" id="checkbox_4" name="special_offer"
                                                {{ $product->special_offer == 1 ? 'checked' : '' }} value="1">
                                             <label for="checkbox_4">Special Offer</label>
                                          </fieldset>
                                          <fieldset>
                                             <input type="checkbox" id="checkbox_5" name="special_deals"
                                                {{ $product->special_deals == 1 ? 'checked' : '' }} value="1">
                                             <label for="checkbox_5">Special Deals</label>
                                          </fieldset>
                                       </div>
                                    </div>
                                 </div>
                              </div>

                              <div class="text-xs-right">
                                 <input type="submit" class="btn btn-rounded btn-primary mb-5 " style="width:100%"
                                    value="Update Product">
                              </div>
                     </form>

                  </div>
                  <!-- /.col -->
               </div>
               <!-- /.row -->
            </div>
            <!-- /.box-body -->
         </div>
         <!-- /.box -->

      </section><!-- /.content -->
      <!-- ///////////////// Start Multiple Image Update Area ///////// -->

      <section class="content">
         <div class="row">
            <div class="col-md-12">
               <div class="box bt-3 border-info">
                  <div class="box-header">
                     <h4 class="box-title">Product Multiple Image <strong>Update</strong></h4>
                  </div>
                  <form method="post" action="{{ route('update-product-image') }}" enctype="multipart/form-data">
                     @csrf
                     @method('put')
                     <div class="row row-sm">
                        @foreach ($multiImgs as $img)
                           <div class="col-md-3">
                              <div class="card">
                                 <img src="{{ asset($img->photo_name) }}" class="card-img-top"
                                    style="height: 130px; width: 280px;">
                                 <div class="card-body">
                                    <h5 class="card-title">
                                       <a href="{{ route('product.multiimg.delete', $img->id) }}"
                                          class="btn btn-sm btn-danger" id="delete-{{ $img->id }}"
                                          title="Delete Data"><i class="fa fa-trash"></i> </a>
                                    </h5>
                                    <p class="card-text">
                                    <div class="form-group">
                                       <label class="form-control-label">Change Image <span
                                             class="tx-danger">*</span></label>
                                       <input class="form-control" type="file"
                                          name="multi_img[ {{ $img->id }} ]">
                                    </div>
                                    </p>
                                 </div>
                              </div>
                           </div><!--  end col md 3		 -->
                        @endforeach
                     </div>
                     <div class="text-xs-right">
                        <input type="submit" class="btn btn-rounded btn-primary mb-5 " style="width:100%"
                           value="Update Image">
                     </div>
                     <br><br>
                  </form>
               </div>
            </div>
         </div> <!-- // end row  -->
      </section><!-- ///////////////// End Multiple Image Update Area ///////// -->

      <!-- ///////////////// Start Thambnail Image Update Area ///////// -->
      <section class="content">
         <div class="row">
            <div class="col-md-12">
               <div class="box bt-3 border-info">
                  <div class="box-header">
                     <h4 class="box-title">Product Thambnail Image <strong>Update</strong></h4>
                  </div>
                  <form method="post" action="{{ route('update-product-thumbnail') }}" enctype="multipart/form-data">
                     @csrf
                     <input type="hidden" name="id" value="{{ $product->id }}">
                     <input type="hidden" name="old_img" value="{{ $product->product_thumbnail }}">
                     <div class="row row-sm">
                        <div class="col-md-3">
                           <div class="card">
                              <img src="{{ asset($product->product_thumbnail) }}" class="card-img-top"
                                 style="height: 130px; width: 280px;">
                              <div class="card-body">
                                 <p class="card-text">
                                 <div class="form-group">
                                    <label class="form-control-label">Change Image <span
                                          class="tx-danger">*</span></label>
                                    <input type="file" name="product_thumbnail" class="form-control"
                                       onChange="mainThamUrl(this)">
                                    <img src="" id="mainThmb">
                                 </div>
                                 </p>
                              </div>
                           </div>
                        </div><!--  end col md 3		 -->
                     </div>
                     <div class="text-xs-right">
                        <input type="submit" class="btn btn-rounded btn-primary mb-5 " style="width:100%"
                           value="Update Image">
                     </div>
                     <br><br>
                  </form>
               </div>
            </div>
         </div>
   </div> <!-- // end row  -->
   </section>
   <!-- ///////////////// End Start Thambnail Image Update Area ///////// -->


   </div><!---------------------------------end-container------------------------->

   {{-- display image --}}
   <script type="text/javascript">
      function mainThamUrl(input) {
         if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
               $('#mainThmb').attr('src', e.target.result).width(80).height(80);
            };
            reader.readAsDataURL(input.files[0]);
         }
      }
   </script>
   {{-- sub &sub-sub-category --}}
   <script>
      $(document).ready(function() {

         // 🟢 قيم المنتج القديمة (لو موجودة)
         var oldSubCategory = "{{ $product->subcategory_id ?? '' }}";
         var oldSubSubCategory = "{{ $product->subsubcategory_id ?? '' }}";

         // عند تغيير الكاتيجوري
         $('select[name="category_id"]').on('change', function(e, isPageLoad) {
            var category_id = $(this).val();

            $('select[name="subcategory_id"]').html(
               '<option selected="" disabled="" value="">-- Select SubCategory --</option>');
            $('select[name="subsubcategory_id"]').html(
               '<option selected="" disabled="" value="">-- Select SubSubCategory --</option>');

            if (category_id) {
               $.ajax({
                  url: "{{ url('/category/get-subcategories/ajax') }}/" + category_id,
                  type: "GET",
                  dataType: "json",
                  success: function(data) {
                     $.each(data, function(key, value) {
                        $('select[name="subcategory_id"]').append(
                           '<option value="' + value.id + '"' +
                           (isPageLoad && value.id == oldSubCategory ? ' selected' : '') +
                           '>' + value.sub_category_name_en + '</option>'
                        );
                     });

                     // 🟢 أول تحميل فقط → شغل change للـ SubCategory عشان يجيب subsub
                     if (isPageLoad && oldSubCategory) {
                        $('select[name="subcategory_id"]').trigger('change', [true]);
                     }
                  },
               });
            }
         });

         // عند تغيير الساب كاتيجوري
         $('select[name="subcategory_id"]').on('change', function(e, isPageLoad) {
            var subcategory_id = $(this).val();

            $('select[name="subsubcategory_id"]').html(
               '<option selected="" disabled="" value="">--Select SubSubCategory --</option>');

            if (subcategory_id) {
               $.ajax({
                  url: "{{ url('/category/get-sub-subcategory/ajax') }}/" + subcategory_id,
                  type: "GET",
                  dataType: "json",
                  success: function(data) {
                     $.each(data, function(key, value) {
                        $('select[name="subsubcategory_id"]').append(
                           '<option value="' + value.id + '"' +
                           (isPageLoad && value.id == oldSubSubCategory ? ' selected' : '') +
                           '>' + value.sub_sub_category_name_en + '</option>'
                        );
                     });
                  },
               });
            }
         });

         // ⬅️ أول ما الصفحة تفتح → نمرر flag (true) عشان يختار القديم
         var category_id = $('select[name="category_id"]').val();
         if (category_id) {
            $('select[name="category_id"]').trigger('change', [true]);
         }
      });
   </script>
@endsection
