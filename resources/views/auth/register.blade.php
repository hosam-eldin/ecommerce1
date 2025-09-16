<!DOCTYPE html>
<html lang="en">

<head>
   <!-- Meta -->
   <meta charset="utf-8">
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
   <meta name="description" content="">
   <meta name="author" content="">
   <meta name="keywords" content="MediaCenter, Template, eCommerce">
   <meta name="robots" content="all">

   <title>login & register</title>

   <!-- Bootstrap Core CSS -->
   <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">

   <!-- Customizable CSS -->
   <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}">
   <link rel="stylesheet" href="{{ asset('frontend/assets/css/blue.css') }}">
   <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.css') }}">
   <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.transitions.css') }}">
   <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.min.css') }}">
   <link rel="stylesheet" href="{{ asset('frontend/assets/css/rateit.css') }}">
   <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap-select.min.css') }}">




   <!-- Icons/Glyphs -->
   <link rel="stylesheet" href="{{ asset('frontend/assets/css/font-awesome.css') }}">

   <!-- Fonts -->
   <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
   <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800'
      rel='stylesheet' type='text/css'>
   <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>


</head>

<body class="cnt-home">
   <!-- ============================================== HEADER ============================================== -->
   @include('frontend.body.header')

   <!-- ============================================== HEADER : END ============================================== -->
   <div class="breadcrumb">
      <div class="container">
         <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
               <li><a href="home.html">Home</a></li>
               <li class='active'>Login & Register</li>
            </ul>
         </div><!-- /.breadcrumb-inner -->
      </div><!-- /.container -->
   </div><!-- /.breadcrumb -->

   <div class="body-content">
      <div class="container">
         <div class="sign-in-page">
            <div class="row">
               <!-- Sign-in -->
               <div class="col-md-6 col-sm-6 sign-in">
                  <h4 class="">Sign in</h4>
                  <p class="">Hello, Welcome to your account.</p>
                  {{-- <div class="social-sign-in outer-top-xs">
                     <a href="#" class="facebook-sign-in"><i class="fa fa-facebook"></i> Sign In with
                        Facebook</a>
                     <a href="#" class="twitter-sign-in"><i class="fa fa-twitter"></i> Sign In with Twitter</a>
                  </div> --}}
                  <form id="myForm" class="register-form outer-top-xs" role="form" method="POST"
                     action="{{ route('login') }}">
                     @csrf
                     <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                        <input type="email" class="form-control unicase-form-control text-input"
                           id="exampleInputEmail1" name="email" required autofocus>
                        <span class="text-danger error-text email_error"></span>
                     </div>
                     <div class="form-group">
                        <label class="info-title" for="exampleInputPassword1">Password <span>*</span></label>
                        <input type="password" class="form-control unicase-form-control text-input"
                           id="exampleInputPassword1" name="password" required>
                        <span class="text-danger error-text password_error"></span>
                     </div>
                     <div class="radio outer-xs">
                        <label>
                           <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Remember
                           me!
                        </label>
                        <a href="#" class="forgot-password pull-right">Forgot your Password?</a>
                     </div>
                     <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button>
                  </form>
               </div>
               <!-- Sign-in -->

               <!-- create a new account -->
               <div class="col-md-6 col-sm-6 create-new-account">
                  <h4 class="checkout-subtitle">Create a new account</h4>
                  <p class="text title-tag-line">Create your new account.</p>
                  <form id="myForm" class="register-form outer-top-xs" role="form" method="POST"
                     action="{{ route('register') }}">
                     @csrf
                     <div class="form-group">
                        <label class="info-title" for="email">Email Address <span>*</span></label>
                        <input type="email" class="form-control unicase-form-control text-input" id="email"
                           name="email" required>
                        <span class="text-danger error-text email_error"></span>
                     </div>
                     <div class="form-group">
                        <label class="info-title" for="name">Name <span>*</span></label>
                        <input type="text" class="form-control unicase-form-control text-input" id="name"
                           name="name" required>
                        <span class="text-danger error-text name_error"></span>
                     </div>
                     <div class="form-group">
                        <label class="info-title" for="phone">Phone Number <span>*</span></label>
                        <input type="text" class="form-control unicase-form-control text-input" id="phone"
                           name="phone" required>
                        <span class="text-danger error-text phone_error"></span>
                     </div>
                     <div class="form-group">
                        <label class="info-title" for="password">Password <span>*</span></label>
                        <input type="password" class="form-control unicase-form-control text-input" id="password"
                           name="password" required>
                        <span class="text-danger error-text password_error"></span>
                     </div>
                     <div class="form-group">
                        <label class="info-title" for="password_confirmation">Confirm Password <span>*</span></label>
                        <input type="password" class="form-control unicase-form-control text-input"
                           id="password_confirmation" name="password_confirmation" required>
                     </div>
                     <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Sign Up</button>
                  </form>


               </div>
               <!-- create a new account -->
            </div><!-- /.row -->
         </div><!-- /.sigin-in-->
         <!-- ============================================== BRANDS CAROUSEL ============================================== -->
         <div id="brands-carousel" class="logo-slider wow fadeInUp">

            <div class="logo-slider-inner">
               <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
                  <div class="item m-t-15">
                     <a href="#" class="image">
                        <img data-echo="{{ asset('frontend/assets/images/brands/brand1.png') }}"
                           src="{{ asset('frontend/assets/images/blank.gif') }}" alt="">
                     </a>
                  </div><!--/.item-->

                  <div class="item m-t-10">
                     <a href="#" class="image">
                        <img data-echo="{{ asset('frontend/assets/images/brands/brand2.png') }}"
                           src="{{ asset('frontend/assets/images/blank.gif') }}" alt="">
                     </a>
                  </div><!--/.item-->

                  <div class="item">
                     <a href="#" class="image">
                        <img data-echo="{{ asset('frontend/assets/images/brands/brand3.png') }}"
                           src="{{ asset('frontend/assets/images/blank.gif') }}" alt="">
                     </a>
                  </div><!--/.item-->

                  <div class="item">
                     <a href="#" class="image">
                        <img data-echo="{{ asset('frontend/assets/images/brands/brand4.png') }}"
                           src="{{ asset('frontend/assets/images/blank.gif') }}" alt="">
                     </a>
                  </div><!--/.item-->

                  <div class="item">
                     <a href="#" class="image">
                        <img data-echo="{{ asset('frontend/assets/images/brands/brand5.png') }}"
                           src="{{ asset('frontend/assets/images/blank.gif') }}" alt="">
                     </a>
                  </div><!--/.item-->

                  <div class="item">
                     <a href="#" class="image">
                        <img data-echo="assets/images/brands/brand6.png" src="assets/images/blank.gif"
                           alt="">
                     </a>
                  </div><!--/.item-->

                  <div class="item">
                     <a href="#" class="image">
                        <img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif"
                           alt="">
                     </a>
                  </div><!--/.item-->

                  <div class="item">
                     <a href="#" class="image">
                        <img data-echo="{{ asset('frontend/assets/images/brands/brand4.png') }}"
                           src="{{ asset('frontend/assets/images/blank.gif') }}" alt="">
                     </a>
                  </div><!--/.item-->

                  <div class="item">
                     <a href="#" class="image">
                        <img data-echo="{{ asset('frontend/assets/images/brands/brand1.png') }}"
                           src="{{ asset('frontend/assets/images/blank.gif') }}" alt="">
                     </a>
                  </div><!--/.item-->

                  <div class="item">
                     <a href="#" class="image">
                        <img data-echo="{{ asset('frontend/assets/images/brands/brand5.png') }}"
                           src="{{ asset('frontend/assets/images/blank.gif') }}" alt="">
                     </a>
                  </div><!--/.item-->
               </div><!-- /.owl-carousel #logo-slider -->
            </div><!-- /.logo-slider-inner -->

         </div><!-- /.logo-slider -->
         <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
      </div><!-- /.container -->
   </div><!-- /.body-content -->
   <!-- ============================================================= FOOTER ============================================================= -->
   @include('frontend.body.footer')
   <!-- ============================================================= FOOTER : END============================================================= -->


   <!-- For demo purposes – can be removed on production -->


   <!-- For demo purposes – can be removed on production : End -->

   <!-- JavaScripts placed at the end of the document so the pages load faster -->
   <script src="{{ asset('frontend/assets/js/jquery-1.11.1.min.js') }}"></script>

   <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>

   <script src="{{ asset('frontend/assets/js/bootstrap-hover-dropdown.min.js') }}"></script>
   <script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>

   <script src="{{ asset('frontend/assets/js/echo.min.js') }}"></script>
   <script src="{{ asset('frontend/assets/js/jquery.easing-1.3.min.js') }}"></script>
   <script src="{{ asset('frontend/assets/js/bootstrap-slider.min.js') }}"></script>
   <script src="{{ asset('frontend/assets/js/jquery.rateit.min.js') }}"></script>
   <script type="text/javascript" src="{{ asset('frontend/assets/js/lightbox.min.js') }}"></script>
   <script src="{{ asset('frontend/assets/js/bootstrap-select.min.js') }}"></script>
   <script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script>
   <script src="{{ asset('frontend/assets/js/scripts.js') }}"></script>

   <!-- For demo purposes – can be removed on production -->

   <script src="{{ asset('frontend/assets/js/switchstylesheet/switchstylesheet.js') }}"></script>

   <script>
      $(document).ready(function() {
         $(".changecolor").switchstylesheet({
            seperator: "color"
         });
         $('.show-theme-options').click(function() {
            $(this).parent().toggleClass('open');
            return false;
         });
      });

      $(window).bind("load", function() {
         $('.show-theme-options').delay(2000).trigger('click');
      });
   </script>
   <!-- For demo purposes – can be removed on production : End -->
   <script>
      $(document).ready(function() {
         $('#myForm').on('submit', function(e) {
            e.preventDefault();

            // امسح الأخطاء القديمة
            $('.error-text').text('');

            $.ajax({
               url: $(this).attr('action'),
               method: $(this).attr('method'),
               data: $(this).serialize(),
               success: function(response) {
                  alert("تم الحفظ بنجاح ✅");
                  $('#myForm')[0].reset(); // امسح البيانات من الفورم
               },
               error: function(xhr) {
                  if (xhr.status === 422) {
                     let errors = xhr.responseJSON.errors;
                     $.each(errors, function(key, value) {
                        $('.' + key + '_error').text(value[0]);
                     });
                  }
               }
            });
         });
      });
   </script>

   <x-toastr />
</body>

</html>
