@extends('admin.admin_master')
@section('title', 'divisions Edit')
@section('admin')

   <section class="content">
      <div class="row">

         <div class="col-4">
            <div class="box">
               <div class="box-header with-border">
                  <h3 class="box-title">Update division</h3>
               </div><!-- /.box-header -->
               <div class="box-body">
                  <form method="post" action="{{ route('division.update', $division->id) }}" ">
                           @csrf
                           @method('PUT')
                           <div class="form-group">
                              <label for="division_name">division Name (EN)</label>
                              <input type="text" name="division_name_en" class="form-control" id="division_name"
                                 value="{{ $division->division_name_en }}">
                           </div>
                           <div class="form-group">
                              <label for="division_name_hin">division Name (HN)</label>
                              <input type="text" name="division_name_hin" class="form-control" id="division_name_hin"
                                 value="{{ $division->division_name_hin }}">
                           </div>

                           <button type="submit" class="btn btn-primary">Update division</button>
                        </form>
                     </div><!-- /.box-body -->
                  </div><!-- /.box -->

               </div><!-- /.col-4 -->
            </div><!-- /.row -->
         </section>

@endsection
