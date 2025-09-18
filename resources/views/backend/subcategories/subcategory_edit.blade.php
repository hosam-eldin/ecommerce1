@extends('admin.admin_master')
@section('title', 'Categories Edit')
@section('admin')

   <section class="content">
      <div class="row">

         <div class="col-4">
            <div class="box">
               <div class="box-header with-border">
                  <h3 class="box-title">Update Category</h3>
               </div><!-- /.box-header -->
               <div class="box-body">
                  <form method="post" action="{{ route('subcategory.update', $subcategory->id) }}"
                     enctype="multipart/form-data">
                     @csrf
                     @method('PUT')
                     <div class="form-group">
                        <label for="category_name">Category (EN)</label>
                        <select name="category_id" class="form-control" id="category_name">
                           <option value="" selected="" disabled="">Select Category</option>
                           @foreach ($categories as $category)
                              <option value="{{ $category->id }}"
                                 {{ $category->id == $subcategory->category_id ? 'selected' : '' }}>
                                 {{ $category->category_name_en }}</option>
                           @endforeach
                     </div>
                     <div class="form-group">
                        <label for="sub_category_name_en">SubCategory (En)</label>
                        <input type="text" name="sub_category_name_en" class="form-control" id="sub_category_name_en"
                           value="{{ $subcategory->sub_category_name_en }}">
                     </div>
                     <div class="form-group">
                        <label for="sub_category_name_hin">SubCategory (HN)</label>
                        <input id="sub_category_name_hin" type="text" name="sub_category_name_hin" class="form-control"
                           value="{{ $subcategory->sub_category_name_hin }}">
                     </div>

                     <button type="submit" class="btn btn-primary">Update Category</button>
                  </form>
               </div><!-- /.box-body -->
            </div><!-- /.box -->

         </div><!-- /.col-4 -->
      </div><!-- /.row -->
   </section>

@endsection
