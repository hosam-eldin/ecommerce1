@extends('admin.admin_master')
@section('title', 'Brands View')
@section('admin')

   <section class="content">
      <div class="row">
         <div class="col-8">
            <div class="box">
               <div class="box-header with-border">
                  <h3 class="box-title">All Brands</h3>
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
                                       <th>Brand (EN)</th>
                                       <th>Brand (HN)</th>
                                       <th>Brand Image</th>
                                       <th>Actions</th>

                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach ($brands as $brand)
                                       <tr>
                                          <td>{{ $brand->brand_name_en }}</td>
                                          <td>{{ $brand->brand_name_hin }}</td>
                                          <td>
                                             @if ($brand->brand_photo)
                                                <img src="{{ asset($brand->brand_photo) }}"
                                                   alt="{{ $brand->brand_name_en }}" width="70" height="40">
                                             @else
                                                <span>No Image</span>
                                             @endif
                                          </td>

                                          <td>
                                             <a href="{{ route('brand.edit', $brand->id) }}" class="btn btn-info"><i
                                                   class="fa fa-edit"></i></a>
                                             <form action="{{ route('brand.delete', $brand->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button id="delete-{{ $brand->id }}" type="submit"
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
         <div class="col-4">
            <div class="box">
               <div class="box-header with-border">
                  <h3 class="box-title">Add Brand</h3>
               </div><!-- /.box-header -->
               <div class="box-body">
                  <form method="post" action="{{ route('brand.store') }}" enctype="multipart/form-data">
                     @csrf
                     <div class="form-group">
                        <label for="brand_name">Brand Name (EN)</label>
                        <input type="text" name="brand_name_en" class="form-control" id="brand_name"
                           placeholder="Enter Brand Name (EN)">
                     </div>
                     <div class="form-group">
                        <label for="brand_name_hin">Brand Name (HN)</label>
                        <input type="text" name="brand_name_hin" class="form-control" id="brand_name_hin"
                           placeholder="Enter Brand Name (HN)">
                     </div>
                     <div class="form-group">
                        <label for="brand_photo">Brand Photo</label>
                        <input type="file" name="brand_photo" class="form-control" id="brand_photo">
                     </div>
                     <button type="submit" class="btn btn-primary">Add Brand</button>
                  </form>
               </div><!-- /.box-body -->
            </div><!-- /.box -->

         </div><!-- /.col-4 -->
      </div><!-- /.row -->
   </section>





@endsection
