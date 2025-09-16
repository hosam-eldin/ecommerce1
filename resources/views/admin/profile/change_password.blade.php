@extends('admin.admin_master')
@section('title')
   Admin Profile Change Password
@endsection

@section('admin')
   <div class="page-content">
      <div class="container-fluid">
         <section class="content">

            <div class="row">
               <div class="col-12">
                  <h4 class="box-title">Admin Profile Change Password</h4>
               </div>

               <!-- Basic Forms -->
               <div class="box">
                  <div class="box-body">
                     <form method="POST" action="{{ route('admin.update-password', $adminData->id) }}"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <h5>old password <span class="text-danger">*</span></h5>
                                 <div class="controls">
                                    <input type="password" name="oldpassword" class="form-control" required
                                       data-validation-required-message="This field is required">
                                 </div>
                              </div>
                           </div>
                        </div>


                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <h5>confirm new password <span class="text-danger">*</span></h5>
                                 <div class="controls">
                                    <input type="password" name="password_confirmation" class="form-control" required
                                       data-validation-required-message="This field is required">
                                 </div>
                              </div>
                           </div>
                        </div>


                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <h5>new password <span class="text-danger">*</span></h5>
                                 <div class="controls">
                                    <input type="password" name="password" class="form-control" required
                                       data-validation-required-message="This field is required">
                                 </div>
                              </div>
                           </div>

                        </div>


                  </div>

                  <div class="row">
                     <div class="col-md-12">
                        <div class="text-xs-right">
                           <button type="submit" style="width: 100%" class="btn btn-rounded btn-info">Update
                              Password</button>
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
