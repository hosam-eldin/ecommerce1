@extends('admin.admin_master')
@section('title', 'State Edit')
@section('admin')

   <section class="content">
      <div class="row">

         <!---------------------------------- Edit Sub state Page ------------------------------------------>
         <div class="col-8">
            <div class="box">
               <div class="box-header with-border">
                  <h3 class="box-title">Edit state</h3>
               </div><!-- /.box-header -->
               <div class="box-body">
                  <form method="post" action="{{ route('state.update', $state->id) }}">
                     @csrf
                     @method('PUT')
                     <div class="form-group">
                        <label for="division">division (EN)</label>
                        <select name="division_id" class="form-control" id="division">
                           <option value="" selected="" disabled="">Select division</option>
                           @foreach ($divisions as $division)
                              <option value="{{ $division->id }}"
                                 {{ $division->id == $state->division_id ? 'selected' : '' }}>
                                 {{ $division->division_name_en }}</option>
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
                        <label for="state">state Name (EN)</label>
                        <input value="{{ $state->state_name_en }}" type="text" name="state_name_en" class="form-control"
                           id="state" placeholder="Enter state Name (EN)">
                     </div>
                     <div class="form-group">
                        <label for="state_name_hin">state Name (HN)</label>
                        <input value="{{ $state->state_name_hin }}" type="text" name="state_name_hin"
                           class="form-control" id="state_name_hin" placeholder="Enter state Name (HN)">
                     </div>

                     <button type="submit" class="btn btn-primary">Update state</button>
                  </form>
               </div><!-- /.box-body -->
            </div><!-- /.box -->

         </div><!-- /.col-4 -->
      </div><!-- /.row -->
   </section>

   <!-- jQuery CDN -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <script>
      $(document).ready(function() {
         let selectedDiv = "{{ $state->division_id }}"; // Get the selected division ID from the server
         let selectedDist =
            "{{ $state->district_id }}"; // Get the selected subdivision ID from the server

         // Load districts for the selected division on page load
         if (selectedDiv) {
            $.ajax({
               url: "{{ url('/shipping/get-districts/ajax') }}/" + selectedDiv,
               type: "GET",
               dataType: "json",
               success: function(data) {
                  $('select[name="district_id"]').html(
                     '<option value="" disabled>Select district</option>'
                  );
                  $.each(data, function(key, value) {
                     let selected = (value.id == selectedDist) ? 'selected' : '';
                     $('select[name="district_id"]').append(
                        '<option value="' + value.id + '" ' + selected + '>' +
                        value.district_name_en + '</option>'
                     );
                  });
               }
            });
         }

         // Update districts when division changes

         $('select[name="division_id"]').on('change', function() {
            var division_id = $(this).val();
            if (division_id) {
               $.ajax({
                  url: "{{ url('/shipping/get-districts/ajax') }}/" + division_id,
                  type: "GET",
                  dataType: "json",
                  success: function(data) {
                     $('select[name="district_id"]').html(
                        '<option value="" selected disabled >Select district</option>'
                     );
                     $.each(data, function(key, value) {
                        $('select[name="district_id"]').append(
                           '<option value="' + value.id + '">' +
                           value.district_name_en + '</option>'
                        );
                     });
                  }
               });
            }
         });
      });
   </script>


@endsection
