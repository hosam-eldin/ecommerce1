@extends('admin.admin_master')
@section('title', 'Sub_SubCategories Edit')
@section('admin')

   <section class="content">
      <div class="row">

         <!---------------------------------- Edit Sub Sub_SubCategory Page ------------------------------------------>
         <div class="col-8">
            <div class="box">
               <div class="box-header with-border">
                  <h3 class="box-title">Edit Sub_SubCategory</h3>
               </div><!-- /.box-header -->
               <div class="box-body">
                  <form method="post" action="{{ route('sub.subcategory.update', $subsubcategory->id) }}">
                     @csrf
                     @method('PUT')
                     <div class="form-group">
                        <label for="category">Category (EN)</label>
                        <select name="category_id" class="form-control" id="category">
                           <option value="" selected="" disabled="">Select Category</option>
                           @foreach ($categories as $category)
                              <option value="{{ $category->id }}"
                                 {{ $category->id == $subsubcategory->category_id ? 'selected' : '' }}>
                                 {{ $category->category_name_en }}</option>
                           @endforeach
                        </select>
                     </div>
                     <div class="form-group">
                        <label for="sub_category">Sub Category (EN)</label>
                        <select name="sub_category_id" class="form-control" id="sub_category">
                           <option value="" selected="" disabled="">Select Sub Category</option>
                           @foreach ($subcategories as $subcategory)
                              <option value="{{ $subcategory->id }}"
                                 {{ $subcategory->id == $subsubcategory->sub_category_id ? 'selected' : '' }}>
                                 {{ $subcategory->sub_category_name_en }}</option>
                           @endforeach
                        </select>
                     </div>
                     <div class="form-group">
                        <label for="sub_sub_category_name">Sub SubCategory Name (EN)</label>
                        <input value="{{ $subsubcategory->sub_sub_category_name_en }}" type="text"
                           name="sub_sub_category_name_en" class="form-control" id="sub_sub_category_name"
                           placeholder="Enter Sub SubCategory Name (EN)">
                     </div>
                     <div class="form-group">
                        <label for="sub_sub_category_name_hin">Sub SubCategory Name (HN)</label>
                        <input value="{{ $subsubcategory->sub_sub_category_name_hin }}" type="text"
                           name="sub_sub_category_name_hin" class="form-control" id="sub_sub_category_name_hin"
                           placeholder="Enter Sub SubCategory Name (HN)">
                     </div>

                     <button type="submit" class="btn btn-primary">Update Sub SubCategory</button>
                  </form>
               </div><!-- /.box-body -->
            </div><!-- /.box -->

         </div><!-- /.col-4 -->
      </div><!-- /.row -->
   </section>


@endsection
