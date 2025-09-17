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
                  <h4 class="text-center">Update Your Profile</h4>
                  <div class="card-body">
                     <form method="post" action="{{ route('user.profile.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                           <label class="info-title" for="name">Name <span>*</span></label>
                           <input type="text" class="form-control" id="name" name="name"
                              value="{{ $user->name }}" required>
                        </div>
                        <div class="form-group">
                           <label class="info-title" for="email">Email <span>*</span></label>
                           <input type="email" class="form-control" id="email" name="email"
                              value="{{ $user->email }}" required>
                        </div>
                        <div class="form-group">
                           <label class="info-title" for="phone">Phone <span>*</span></label>
                           <input type="text" class="form-control" id="phone" name="phone"
                              value="{{ $user->phone }}" required>
                        </div>
                        <div class="form-group">
                           <label class="info-title" for="profile_photo_path">Profile Photo</label>
                           <input type="file" class="form-control" id="profile_photo_path" name="profile_photo_path">
                        </div>
                        <img id="profile_photo_preview" class="card-img-top" style="border-radius: 50%"
                           src="{{ $user->profile_photo_url }}" width="100" height="100" alt="user_photo">
                        <button type="submit" class="btn btn-danger float-end mt-2">Update Profile</button>
                     </form>
                  </div>
               </div>
            </div> <!------ end col md 6 ------->
         </div> <!------ end row ------->
      </div> <!------ end container ------->
   </div>
   <! ------ end body-content ------->

      <script type="text/javascript">
         document.getElementById('profile_photo_path').onchange = function(evt) {
            const [file] = this.files
            if (file) {
               document.getElementById('profile_photo_preview').src = URL.createObjectURL(file)
            }
         }
      </script>

   @endsection
