@extends('frontend.master')
@section('title', 'User Profile')
@section('content')
   <div class="body-content">
      <div class="container">
         <div class="row">
            <div class="col-md-2">
               <img class="card-img-top" style="border-radius: 50%" src="{{ Auth::user()->profile_photo_url }}" width="100%"
                  height="70%" alt="user_photo">
               <ul class="list-group list-group-flush">
                  <a href="{{ route('home') }}" class="btn btn-primary btn-sm btn-block">Home</a>
                  <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
                  <a href="{{ route('user.change-password') }}" class="btn btn-primary btn-sm btn-block">Change
                     Password</a>
                  <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
            </div> <!------ end col md 2 ------->
            <div class="col-md-2">

            </div> <!------ end col md 2 ------->
            <div class="col-md-6">
               <div class="card">
                  <h3 class="text-center"><span class="text-danger">Hi..!</span><strong>{{ Auth::user()->name }}</strong>
                  </h3>
                  <h4 class="text-center">Change Your Password</h4>
                  <div class="card-body">
                     <form method="post" action="{{ route('user.update-password') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                           <label class="info-title" for="old_password">Old Password <span>*</span></label>
                           <input type="password" class="form-control" id="old_password" name="old_password" required>
                        </div>
                        <div class="form-group">
                           <label class="info-title" for="password">New Password <span>*</span></label>
                           <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="form-group">
                           <label class="info-title" for="password_confirmation">Confirm Password <span>*</span></label>
                           <input type="password" class="form-control" id="password_confirmation"
                              name="password_confirmation" required>
                        </div>
                        <button type="submit" class="btn btn-danger float-end mt-2">Change Password</button>
                     </form>
                  </div>
               </div>
            </div> <!------ end col md 6 ------->
         </div> <!------ end row ------->
      </div> <!------ end container ------->
   </div>
   <! ------ end body-content ------->



   @endsection
