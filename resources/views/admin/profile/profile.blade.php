@extends('admin.admin_master')
@section('title')
   Admin Profile
@endsection

@section('admin')
   <section class="content container-fluid width-100">
      <div class="row">
         <div class="col-12">
            <h4 class="box-title">Admin Profile Page </h4>
         </div>
         <div class="box box-widget widget-user mb-3 ">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-black">
               <h4 class="widget-user-username">
                  UserName: {{ $adminData->name }}
               </h4>
               <h4 class="widget-user-username">
                  Email: {{ $adminData->email }}
               </h4>

               <a href="{{ route('admin.profile.edit', $adminData->id) }}" class="btn btn-info float-right">Edit
                  Profile</a>
            </div>

            <div class="widget-user-image">
               <img class="rounded-circle" src="{{ $adminData->profile_photo_url }}" alt="">
            </div>
            <div class="box-footer">
               <div class="row">
                  <div class="col-sm-4">
                     <div class="description-block">
                        <h5 class="description-header">12K</h5>
                        <span class="description-text">FOLLOWERS</span>
                     </div>
                     <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 br-1 bl-1">
                     <div class="description-block">
                        <h5 class="description-header">550</h5>
                        <span class="description-text">FOLLOWERS</span>
                     </div>
                     <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4">
                     <div class="description-block">
                        <h5 class="description-header">158</h5>
                        <span class="description-text">TWEETS</span>
                     </div>
                     <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
               </div>
               <!-- /.row -->
            </div>
         </div>
   </section>
@endsection
