@extends('admin.admin_master')
@section('title', 'Brands Edit')
@section('admin')

   <section class="content">
      <div class="row">

         <div class="col-4">
            <div class="box">
               <div class="box-header with-border">
                  <h3 class="box-title">Update Brand</h3>
               </div><!-- /.box-header -->
               <div class="box-body">
                  <form method="post" action="{{ route('brand.update', $brand->id) }}" enctype="multipart/form-data">
                     @csrf
                     @method('PUT')
                     <div class="form-group">
                        <label for="brand_name">Brand Name (EN)</label>
                        <input type="text" name="brand_name_en" class="form-control" id="brand_name"
                           value="{{ $brand->brand_name_en }}">
                     </div>
                     <div class="form-group">
                        <label for="brand_name_hin">Brand Name (HN)</label>
                        <input type="text" name="brand_name_hin" class="form-control" id="brand_name_hin"
                           value="{{ $brand->brand_name_hin }}">
                     </div>
                     <div class="form-group">
                        <label for="brand_photo">Brand Photo</label>
                        <input id="brand_photo" type="file" name="brand_photo" class="form-control">
                     </div>
                     <div class="form-group">
                        <img id="brand_photo_preview" src="{{ asset($brand->brand_photo) }}" alt=""
                           style="width: 100px; height: 100px;">
                     </div>
                     <button type="submit" class="btn btn-primary">Update Brand</button>
                  </form>
               </div><!-- /.box-body -->
            </div><!-- /.box -->

         </div><!-- /.col-4 -->
      </div><!-- /.row -->
   </section>
   <script type="text/javascript">
      document.getElementById('brand_photo').onchange = function(evt) {
         const [file] = this.files
         if (file) {
            document.getElementById('brand_photo_preview').src = URL.createObjectURL(file)
         }
      }
   </script>




@endsection
