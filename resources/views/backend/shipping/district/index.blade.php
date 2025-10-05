@extends('admin.admin_master')
@section('title', 'districts View')
@section('admin')

   <section class="content">
      <div class="row">
         <div class="col-8">
            <div class="box">
               <div class="box-header with-border">
                  <h3 class="box-title">All districts</h3>
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
                                       <th>division (EN)</th>
                                       <th>district (EN)</th>
                                       <th>district (HN)</th>
                                       <th>Actions</th>

                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach ($districts as $district)
                                       <tr>
                                          <td>
                                             {{ $district->division->division_name_en }}
                                          </td>
                                          <td>{{ $district->district_name_en }}</td>
                                          <td>{{ $district->district_name_hin }}</td>
                                          <td width="30%">
                                             <a href="{{ route('district.edit', $district->id) }}" class="btn btn-info"><i
                                                   class="fa fa-edit"></i></a>
                                             <form action="{{ route('district.delete', $district->id) }}" method="POST"
                                                style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button id="delete-{{ $district->id }}" type="submit"
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
         <!---------------------------------- Add district Page ------------------------------------------>
         <div class="col-4">
            <div class="box">
               <div class="box-header with-border">
                  <h3 class="box-title">Add district</h3>
               </div><!-- /.box-header -->
               <div class="box-body">
                  <form method="post" action="{{ route('district.store') }}">
                     @csrf
                     <div class="  form-group">
                        <label for="division">division (EN)</label>
                        <select name="division_id" class="form-control" id="division">
                           <option value="" selected="" disabled="">Select division</option>
                           @foreach ($divisions as $division)
                              <option value="{{ $division->id }}">{{ $division->division_name_en }}</option>
                           @endforeach
                        </select>
                     </div>

                     <div class="  form-group">
                        <label for="district_name">district Name (EN)</label>
                        <input type="text" name="district_name_en" class="form-control" id="district_name"
                           placeholder="Enter district Name (EN)">
                     </div>
                     <div class="form-group">
                        <label for="district_name_hin">district Name (HN)</label>
                        <input type="text" name="district_name_hin" class="form-control" id="district_name_hin"
                           placeholder="Enter district Name (HN)">
                     </div>

                     <button type="submit" class="btn btn-primary">Add district</button>
                  </form>
               </div><!-- /.box-body -->
            </div><!-- /.box -->

         </div><!-- /.col-4 -->
      </div><!-- /.row -->
   </section>





@endsection
