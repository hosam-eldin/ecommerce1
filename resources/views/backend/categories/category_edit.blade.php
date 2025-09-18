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
                  <form method="post" action="{{ route('category.update', $category->id) }}" enctype="multipart/form-data">
                     @csrf
                     @method('PUT')
                     <div class="form-group">
                        <label for="category_name">Category Name (EN)</label>
                        <input type="text" name="category_name_en" class="form-control" id="category_name"
                           value="{{ $category->category_name_en }}">
                     </div>
                     <div class="form-group">
                        <label for="category_name_hin">Category Name (HN)</label>
                        <input type="text" name="category_name_hin" class="form-control" id="category_name_hin"
                           value="{{ $category->category_name_hin }}">
                     </div>
                     <div class="form-group">
                        <label for="category_icon">Category Icon</label>
                        <input id="category_icon" type="text" name="category_icon" class="form-control"
                           value="{{ $category->category_icon }}">
                     </div>

                     <button type="submit" class="btn btn-primary">Update Category</button>
                  </form>
               </div><!-- /.box-body -->
            </div><!-- /.box -->

         </div><!-- /.col-4 -->
      </div><!-- /.row -->
   </section>

@endsection
