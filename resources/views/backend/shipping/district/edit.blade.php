@extends('admin.admin_master')
@section('title', 'districts Edit')
@section('admin')

   <section class="content">
      <div class="row">

         <div class="col-4">
            <div class="box">
               <div class="box-header with-border">
                  <h3 class="box-title">Update district</h3>
               </div><!-- /.box-header -->
               <div class="box-body">
                  <form method="post" action="{{ route('district.update', $district->id) }}" enctype="multipart/form-data">
                     @csrf
                     @method('PUT')
                     <div class="form-group">
                        <label for="division_name">division (EN)</label>
                        <select name="division_id" class="form-control" id="division_name">
                           <option value="" selected="" disabled="">Select division</option>
                           @foreach ($divisions as $division)
                              <option value="{{ $division->id }}"
                                 {{ $division->id == $district->division_id ? 'selected' : '' }}>
                                 {{ $division->division_name_en }}</option>
                           @endforeach
                        </select>
                     </div>
                     <div class="form-group">
                        <label for="district_name_en">district (En)</label>
                        <input type="text" name="district_name_en" class="form-control" id="district_name_en"
                           value="{{ $district->district_name_en }}">
                     </div>
                     <div class="form-group">
                        <label for="district_name_hin">district (HN)</label>
                        <input id="district_name_hin" type="text" name="district_name_hin" class="form-control"
                           value="{{ $district->district_name_hin }}">
                     </div>

                     <button type="submit" class="btn btn-primary">Update district</button>
                  </form>
               </div><!-- /.box-body -->
            </div><!-- /.box -->

         </div><!-- /.col-4 -->
      </div><!-- /.row -->
   </section>

@endsection
