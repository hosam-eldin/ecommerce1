@extends('admin.admin_master')
@section('title', 'Ship-Divisions View')
@section('admin')

   <section class="content">
      <div class="row">
         <div class="col-8">
            <div class="box">
               <div class="box-header with-border">
                  <h3 class="box-title">All Divisions</h3>
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
                                       <th>Division (EN)</th>
                                       <th>Division (HN)</th>
                                       <th>Actions</th>

                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach ($divisions as $division)
                                       <tr>

                                          <td>{{ $division->division_name_en }}</td>
                                          <td>{{ $division->division_name_hin }}</td>
                                          <td width="30%">
                                             <a href="{{ route('division.edit', $division->id) }}" class="btn btn-info"><i
                                                   class="fa fa-edit"></i></a>
                                             <form action="{{ route('division.delete', $division->id) }}" method="POST"
                                                style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button id="delete-{{ $division->id }}" type="submit"
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
         <!---------------------------------- Add division Page ------------------------------------------>
         <div class="col-4">
            <div class="box">
               <div class="box-header with-border">
                  <h3 class="box-title">Add division</h3>
               </div><!-- /.box-header -->
               <div class="box-body">
                  <form method="post" action="{{ route('division.store') }}">
                     @csrf
                     <div class="form-group">
                        <label for="division_name">division Name (EN)</label>
                        <input type="text" name="division_name_en" class="form-control" id="division_name"
                           placeholder="Enter division Name (EN)">
                     </div>
                     <div class="form-group">
                        <label for="division_name_hin">division Name (HN)</label>
                        <input type="text" name="division_name_hin" class="form-control" id="division_name_hin"
                           placeholder="Enter division Name (HN)">
                     </div>

                     <button type="submit" class="btn btn-primary">Add division</button>
                  </form>
               </div><!-- /.box-body -->
            </div><!-- /.box -->

         </div><!-- /.col-4 -->
      </div><!-- /.row -->
   </section>





@endsection
