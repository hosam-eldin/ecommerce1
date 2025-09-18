@extends('admin.admin_master')
@section('title', 'Categories View')
@section('admin')

   <section class="content">
      <div class="row">
         <div class="col-8">
            <div class="box">
               <div class="box-header with-border">
                  <h3 class="box-title">All Categories</h3>
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
                                       <th>Category Icon</th>
                                       <th>Category (EN)</th>
                                       <th>Category (HN)</th>
                                       <th>Actions</th>

                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach ($categories as $category)
                                       <tr>
                                          <td>
                                             @if ($category->category_icon)
                                                <i class=" fa {{ $category->category_icon }} "
                                                   style="font-size: 60px;"></i>
                                             @else
                                                <span>No Icon</span>
                                             @endif
                                          </td>
                                          <td>{{ $category->category_name_en }}</td>
                                          <td>{{ $category->category_name_hin }}</td>
                                          <td>
                                             <a href="{{ route('category.edit', $category->id) }}" class="btn btn-info"><i
                                                   class="fa fa-edit"></i></a>
                                             <form action="{{ route('category.delete', $category->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button id="delete-{{ $category->id }}" type="submit"
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
                  <h3 class="box-title">Add Category</h3>
               </div><!-- /.box-header -->
               <div class="box-body">
                  <form method="post" action="{{ route('category.store') }}">
                     @csrf
                     <div class="form-group">
                        <label for="category_name">Category Name (EN)</label>
                        <input type="text" name="category_name_en" class="form-control" id="category_name"
                           placeholder="Enter Category Name (EN)">
                     </div>
                     <div class="form-group">
                        <label for="category_name_hin">Category Name (HN)</label>
                        <input type="text" name="category_name_hin" class="form-control" id="category_name_hin"
                           placeholder="Enter Category Name (HN)">
                     </div>
                     <div class="form-group">
                        <label for="category_icon">Category Icon</label>
                        <input type="text" name="category_icon" class="form-control" required=""
                           data-validation-required-message="This field is required" aria-invalid="false">
                     </div>
                     <button type="submit" class="btn btn-primary">Add Category</button>
                  </form>
               </div><!-- /.box-body -->
            </div><!-- /.box -->

         </div><!-- /.col-4 -->
      </div><!-- /.row -->
   </section>





@endsection
