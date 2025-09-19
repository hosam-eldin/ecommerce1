@extends('admin.admin_master')
@section('title', 'Sub_SubCategories View')
@section('admin')

   <section class="content">
      <div class="row">
         <div class="col-8">
            <div class="box">
               <div class="box-header with-border">
                  <h3 class="box-title">All Sub_SubCategories list</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <div class="table-responsive">
                     <div id="example1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                        <div class="row">
                           <div class="col-sm-12 col-md-6">
                              <div class="dataTables_length" id="example1_length">
                                 <label>Show
                                    <select name="example1_length" aria-controls="example1"
                                       class="form-control form-control-sm">
                                       <option value="10">10</option>
                                       <option value="25">25</option>
                                       <option value="50">50</option>
                                       <option value="100">100</option>
                                    </select>
                                    entries</label>
                              </div>
                           </div>
                           <div class="col-sm-12 col-md-6">
                              <div id="example1_filter" class="dataTables_filter">
                                 <label>Search:<input type="search" class="form-control form-control-sm" placeholder=""
                                       aria-controls="example1" /></label>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-sm-12">
                              <table id="example1" class="table table-bordered table-striped">
                                 <thead>
                                    <tr>
                                       <th>Category (EN)</th>
                                       <th>SubCategory (EN)</th>
                                       <th>Sub_SubCategory (EN)</th>
                                       <th>Actions</th>

                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach ($subsubcategories as $subsubcategory)
                                       <tr>
                                          <td>
                                             {{ $subsubcategory->category->category_name_en }}
                                          </td>
                                          <td>{{ $subsubcategory->subCategory->sub_category_name_en }}</td>
                                          <td>{{ $subsubcategory->sub_sub_category_name_en }}</td>
                                          <td>
                                             <a href="{{ route('sub.subcategory.edit', $subsubcategory->id) }}"
                                                class="btn btn-info"><i class="fa fa-edit"></i></a>
                                             <form action="{{ route('sub.subcategory.delete', $subsubcategory->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button id="delete-{{ $subsubcategory->id }}" type="submit"
                                                   class="btn btn-danger "><i class="fa fa-trash"></i></button>
                                             </form>
                                          </td>
                                       </tr>
                                    @endforeach
                                 </tbody>
                              </table>
                           </div>
                        </div>

                     </div><!-- /.box-body -->
                  </div><!-- /.col-8 -->
               </div>
            </div>
         </div>
         <!---------------------------------- Add Sub_SubCategory Page ------------------------------------------>
         <div class="col-4">
            <div class="box">
               <div class="box-header with-border">
                  <h3 class="box-title">Add Sub_SubCategory</h3>
               </div><!-- /.box-header -->
               <div class="box-body">
                  <form method="post" action="{{ route('sub.subcategory.store') }}">
                     @csrf
                     <div class="form-group">
                        <label for="category">Category (EN)</label>
                        <select name="category_id" class="form-control" id="category">
                           <option value="" selected="" disabled="">Select Category</option>
                           @foreach ($categories as $category)
                              <option value="{{ $category->id }}">{{ $category->category_name_en }}</option>
                           @endforeach
                        </select>
                     </div>
                     <div class="form-group">
                        <label for="sub_category">Sub Category (EN)</label>
                        <select name="sub_category_id" class="form-control" id="sub_category">
                           <option value="" selected="" disabled="">Select Sub Category</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <label for="sub_sub_category_name">Sub SubCategory Name (EN)</label>
                        <input type="text" name="sub_sub_category_name_en" class="form-control"
                           id="sub_sub_category_name" placeholder="Enter Sub SubCategory Name (EN)">
                     </div>
                     <div class="form-group">
                        <label for="sub_sub_category_name_hin">Sub SubCategory Name (HN)</label>
                        <input type="text" name="sub_sub_category_name_hin" class="form-control"
                           id="sub_sub_category_name_hin" placeholder="Enter Sub SubCategory Name (HN)">
                     </div>

                     <button type="submit" class="btn btn-primary">Add Sub SubCategory</button>
                  </form>
               </div><!-- /.box-body -->
            </div><!-- /.box -->

         </div><!-- /.col-4 -->
      </div><!-- /.row -->
   </section>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
   <script>
      $(document).ready(function() {
         $('select[name="category_id"]').on('change', function() {
            var category_id = $(this).val();
            if (category_id) {
               $.ajax({
                  url: '/category/get-subcategories/ajax/' + category_id,
                  type: "GET",
                  dataType: "json",
                  success: function(data) {
                     var d = $('select[name="sub_category_id"]').empty();
                     $('select[name="sub_category_id"]').append(
                        '<option value="" selected="" disabled="">Select Sub Category</option>'
                     );
                     $.each(data, function(key, value) {
                        $('select[name="sub_category_id"]').append('<option value="' + value
                           .id +
                           '">' + value.sub_category_name_en + '</option>');
                     });
                  },
               });
            } else {
               alert('danger');
            }
         });
      });
   </script>




@endsection
