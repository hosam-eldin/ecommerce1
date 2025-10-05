@extends('admin.admin_master')
@section('title', 'states View')
@section('admin')

   <section class="content">
      <div class="row">
         <div class="col-8">
            <div class="box">
               <div class="box-header with-border">
                  <h3 class="box-title">All states list</h3>
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
                                       <th>state (EN)</th>
                                       <th>Actions</th>

                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach ($states as $state)
                                       <tr>
                                          <td>
                                             {{ $state->division->division_name_en }}
                                          </td>
                                          <td>{{ $state->district->district_name_en }}</td>
                                          <td>{{ $state->state_name_en }}</td>
                                          <td width="30%">
                                             <a href="{{ route('state.edit', $state->id) }}" class="btn btn-info"><i
                                                   class="fa fa-edit"></i></a>
                                             <form action="{{ route('state.delete', $state->id) }}" method="POST"
                                                style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button id="delete-{{ $state->id }}" type="submit"
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
         <!---------------------------------- Add state Page ------------------------------------------>
         <div class="col-4">
            <div class="box">
               <div class="box-header with-border">
                  <h3 class="box-title">Add state</h3>
               </div><!-- /.box-header -->
               <div class="box-body">
                  <form method="post" action="{{ route('state.store') }}">
                     @csrf
                     <div class="form-group">
                        <label for="division">division (EN)</label>
                        <select name="division_id" class="form-control" id="division">
                           <option value="" selected="" disabled="">Select division</option>
                           @foreach ($divisions as $division)
                              <option value="{{ $division->id }}">{{ $division->division_name_en }}</option>
                           @endforeach
                        </select>
                     </div>
                     <div class="form-group">
                        <label for="district">district (EN)</label>
                        <select name="district_id" class="form-control" id="district">
                           <option value="" selected="" disabled="">Select district</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <label for="state_name">state Name (EN)</label>
                        <input type="text" name="state_name_en" class="form-control" id="state_name"
                           placeholder="Enter state Name (EN)">
                     </div>
                     <div class="form-group">
                        <label for="state_name_hin">state Name (HN)</label>
                        <input type="text" name="state_name_hin" class="form-control" id="state_name_hin"
                           placeholder="Enter state Name (HN)">
                     </div>

                     <button type="submit" class="btn btn-primary">Add state</button>
                  </form>
               </div><!-- /.box-body -->
            </div><!-- /.box -->

         </div><!-- /.col-4 -->
      </div><!-- /.row -->
   </section>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
   <script>
      $(document).ready(function() {
         $('select[name="division_id"]').on('change', function() {
            var division_id = $(this).val();
            if (division_id) {
               $.ajax({
                  url: '/shipping/get-districts/ajax/' + division_id,
                  type: "GET",
                  dataType: "json",
                  success: function(data) {
                     var d = $('select[name="district_id"]').empty();
                     $('select[name="district_id"]').append(
                        '<option value="" selected="" disabled="">Select district</option>'
                     );
                     $.each(data, function(key, value) {
                        $('select[name="district_id"]').append('<option value="' + value
                           .id +
                           '">' + value.district_name_en + '</option>');
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
