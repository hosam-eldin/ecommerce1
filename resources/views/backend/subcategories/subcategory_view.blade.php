@extends('admin.admin_master')
@section('title', 'Categories View')
@section('admin')

   <section class="content">
      <div class="row">
         <div class="col-8">
            <div class="box">
               <div class="box-header with-border">
                  <h3 class="box-title">All SubCategories</h3>
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
                                       <th>SubCategory (HN)</th>
                                       <th>Actions</th>

                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach ($subcategories as $subcategory)
                                       <tr>
                                          <td>
                                             {{ $subcategory->category->category_name_en }}
                                          </td>
                                          <td>{{ $subcategory->sub_category_name_en }}</td>
                                          <td>{{ $subcategory->sub_category_name_hin }}</td>
                                          <td>
                                             <a href="{{ route('subcategory.edit', $subcategory->id) }}"
                                                class="btn btn-info"><i class="fa fa-edit"></i></a>
                                             <form action="{{ route('subcategory.delete', $subcategory->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button id="delete-{{ $subcategory->id }}" type="submit"
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
         <!---------------------------------- Add Category Page ------------------------------------------>
         <div class="col-4">
            <div class="box">
               <div class="box-header with-border">
                  <h3 class="box-title">Add SubCategory</h3>
               </div><!-- /.box-header -->
               <div class="box-body">
                  <form method="post" action="{{ route('subcategory.store') }}">
                     @csrf
                     <div class="form-group">
                        <label for="category">Category (EN)</label>
                        <select name="category_id" class="form-control" id="category">
                           <option value="" selected="" disabled="">Select Category</option>
                           @foreach ($categories as $category)
                              <option value="{{ $category->id }}">{{ $category->category_name_en }}</option>
                           @endforeach
                     </div>
                     <div class="form-group">
                        <label for="sub_category_name">SubCategory Name (EN)</label>
                        <input type="text" name="sub_category_name_en" class="form-control" id="sub_category_name"
                           placeholder="Enter SubCategory Name (EN)">
                     </div>
                     <div class="form-group">
                        <label for="sub_category_name_hin">SubCategory Name (HN)</label>
                        <input type="text" name="sub_category_name_hin" class="form-control" id="sub_category_name_hin"
                           placeholder="Enter SubCategory Name (HN)">
                     </div>

                     <button type="submit" class="btn btn-primary">Add SubCategory</button>
                  </form>
               </div><!-- /.box-body -->
            </div><!-- /.box -->

         </div><!-- /.col-4 -->
      </div><!-- /.row -->
   </section>





@endsection
