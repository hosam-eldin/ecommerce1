@extends('admin.admin_master')
@section('title')
   Admin Profile Edit
@endsection

@section('admin')
   <div class="page-content">
      <div class="container-fluid">
         <section class="content">

            <div class="row">
               <div class="col-12">
                  <h4 class="box-title">Admin Profile Edit Page </h4>
               </div>

               <!-- Basic Forms -->
               <div class="box">
                  <div class="box-body">
                     <form method="POST" action="{{ route('admin.profile.store', $adminData->id) }}"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <h5>UserName <span class="text-danger">*</span></h5>
                                 <div class="controls">
                                    <input value="{{ $adminData->name }}" type="text" name="username"
                                       class="form-control" required
                                       data-validation-required-message="This field is required">
                                 </div>
                              </div>
                           </div>

                           <div class="col-md-6">
                              <div class="form-group">
                                 <h5>Email Field <span class="text-danger">*</span></h5>
                                 <div class="controls">
                                    <input value="{{ $adminData->email }}" type="email" name="email"
                                       class="form-control" required
                                       data-validation-required-message="This field is required">
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <h5>File Input Field <span class="text-danger">*</span></h5>
                                 <div class="controls">
                                    <input type="file" id="image" name="profile_photo_path" class="form-control">
                                 </div>
                              </div>
                           </div>

                           <div class="col-md-6">
                              <div class="form-group">
                                 <h5>Profile Preview</h5>
                                 <img id="showImage" class="mb-3 rounded-circle" src="{{ $adminData->profile_photo_url }}"
                                    style="width: 100px; height: 100px;">
                              </div>
                           </div>
                        </div>

                        <div class="row">
                           <div class="col-md-12">
                              <div class="text-xs-right">
                                 <button type="submit" style="width: 100%"
                                    class="btn btn-rounded btn-info">Update</button>
                              </div>
                           </div>
                        </div>

                     </form>
                  </div>
               </div>
            </div>
         </section>
      </div>
   </div>

   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script type="text/javascript">
      $(document).ready(function() {
         $('#image').change(function(e) {
            let reader = new FileReader();
            reader.onload = function(e) {
               $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
         });
      });
   </script>
@endsection
