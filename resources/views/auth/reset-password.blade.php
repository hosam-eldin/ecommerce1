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

   <title>Forgot Password</title>

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
               <li class='active'>Confirm Password</li>
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
                  <h4 class="">Confirm Password</h4>


                  <form class="register-form outer-top-xs" role="form" method="POST"
                     action="{{ route('password.update') }}">
                     @csrf
                     <input type="hidden" name="token" value="{{ $request->route('token') }}">
                     <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                        <input type="email" class="form-control unicase-form-control text-input"
                           id="exampleInputEmail1" name="email" value="{{ old('email', $request->email) }}" required
                           autofocus>
                     </div>
                     <div class="form-group">
                        <label class="info-title" for="password">Password <span>*</span></label>
                        <input type="password" class="form-control unicase-form-control text-input" id="password"
                           name="password" required>
                     </div>
                     <div class="form-group">
                        <label class="info-title" for="password_confirmation">Confirm Password <span>*</span></label>
                        <input type="password" class="form-control unicase-form-control text-input"
                           id="password_confirmation" name="password_confirmation" required>
                     </div>

                     <button type="submit" class="btn-upper btn btn-primary checkout-page-button">confirm new
                        password</button>
                  </form>
               </div>
               <!-- Sign-in -->


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


   <x-toastr />
</body>

</html>
