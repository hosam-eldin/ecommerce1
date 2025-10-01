<!DOCTYPE html>
<html lang="en">

<head>
   <!-- Meta -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
   <meta name="description" content="">
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <meta name="author" content="">
   <meta name="keywords" content="MediaCenter, Template, eCommerce">
   <meta name="robots" content="all">
   <title>@yield('title')</title>

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
   <link href="{{ asset('frontend/assets/css/lightbox.css') }}" rel="stylesheet" />

   <!-- Icons/Glyphs -->
   <link rel="stylesheet" href="{{ asset('frontend/assets/css/font-awesome.css') }}">

   <!-- Fonts -->
   <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
   <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800'
      rel='stylesheet' type='text/css'>
   <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body class="cnt-home">
   <!-- ============================================== HEADER ============================================== -->
   @include('frontend.body.header')

   <!-- ============================================== HEADER : END ============================================== -->
   <div class="body-content outer-top-xs" id="top-banner-and-menu">
      <div class="container">

         <!-- ============================================== CONTENT ============================================== -->
         @yield('content')
         <!-- /.homebanner-holder -->
         <!-- ============================================== CONTENT : END ============================================== -->

         <!-- /.row -->
         <!-- ============================================== BRANDS CAROUSEL ============================================== -->
         @include('frontend.body.brands')
         <!-- /.logo-slider -->
         <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
      </div>
      <!-- /.container -->
   </div>
   <!-- /#top-banner-and-menu -->

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
   <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
   <script>
      function selectCategory(id, name) {
         document.getElementById('selected-category-id').value = id;
         document.getElementById('selected-category-text').innerText = name;
         document.getElementById('search-field').placeholder = "Search in " + name + "...";
      }
   </script>

   <!-- Add to Cart Product Modal -->
   <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Product Name</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>

            <div class="modal-body">
               <div class="row">

                  <!-- صورة المنتج -->
                  <div class="col-md-4">
                     <div class="card" style="width: 18rem;">
                        <img id="pimage" src="" class="card-img-top" alt=""
                           style="height: 200px; width: 200px;">
                     </div>
                  </div><!-- // end col md -->

                  <!-- تفاصيل المنتج -->
                  <div class="col-md-4">
                     <ul class="list-group">
                        <li class="list-group-item">Product Price: <strong id="pprice"></strong> <span id="oldprice"
                              style="text-decoration: line-through; color:red;"></span></li>
                        <li class="list-group-item">Product Code: <strong id="pcode"></strong></li>
                        <li class="list-group-item">Category: <strong id="pcategory"></strong></li>
                        <li class="list-group-item">Brand: <strong id="pbrand"></strong></li>
                        <li class="list-group-item">Stock: <strong id="pstock"></strong></li>
                     </ul>
                  </div><!-- // end col md -->

                  <!-- الألوان والمقاسات -->
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Choose Color</label>
                        <select class="form-control" id="pcolor"></select>
                     </div>
                     <div class="form-group">
                        <label>Choose Size</label>
                        <select class="form-control" id="psize"></select>
                     </div>
                     <div class="form-group">
                        <label>Quantity</label>
                        <input type="number" class="form-control" id="pqty" value="1" min="1">
                     </div>
                     <input type="hidden" id="product_id">
                     <button type="submit" class="btn btn-primary mb-2">Add to Cart</button>
                  </div><!-- // end col md -->
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- End Add to Cart Product Modal -->

   <script type="text/javascript">
      $.ajaxSetup({
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
      })
      // Start Product View with Modal 
      function productView(id) {
         $.ajax({
            type: 'GET',
            url: '/product/view/modal/' + id,
            dataType: 'json',
            success: function(data) {

               // صورة المنتج
               $('#pimage').attr('src', '/' + data.product.product_thumbnail);

               // تفاصيل المنتج
               $('#pname').text(data.product.product_name_en);
               $('#pcode').text(data.product.product_code);
               $('#pcategory').text(data.category_name_en);
               $('#pbrand').text(data.brand_name_en);

               $('#product_id').val(data.product.id);

               // المخزون
               if (data.product.product_qty > 0) {
                  $('#pstock')
                     .text('Available')
                     .css({
                        'background-color': 'green',
                        'color': 'white',
                        'padding': '3px 8px',
                        'border-radius': '5px'
                     });
               } else {
                  $('#pstock')
                     .text('Out of stock')
                     .css({
                        'background-color': 'red',
                        'color': 'white',
                        'padding': '3px 8px',
                        'border-radius': '5px'
                     });
               }


               // السعر
               if (data.product.discount_price == null) {
                  $('#pprice').text('$' + data.product.selling_price);
                  $('#oldprice').text('');
               } else {
                  $('#pprice').text('$' + data.product.discount_price);
                  $('#oldprice').text('$' + data.product.selling_price);
               }

               // الألوان
               $('#pcolor').empty();
               $.each(data.color, function(key, value) {
                  $('#pcolor').append('<option value="' + value + '">' + value + '</option>');
               });

               // المقاسات
               $('#psize').empty();
               $.each(data.size, function(key, value) {
                  $('#psize').append('<option value="' + value + '">' + value + '</option>');
               });
            }
         });
      }
   </script>

   <x-toastr />
</body>

</html>
