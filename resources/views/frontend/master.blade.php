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

   <script src="https://js.stripe.com/v3/"></script>
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
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

   //----------Search--selectCategory-----------//
   <script>
      function selectCategory(id, name) {
         document.getElementById('selected-category-id').value = id;
         document.getElementById('selected-category-text').innerText = name;
         document.getElementById('search-field').placeholder = "Search in " + name + "...";
      }
   </script>
   //----------End-Search--selectCategory-----------//


   <!------------------------------  Product view with Modal ------------------>
   <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Product Name</h5>
               <button type="button" class="close" data-dismiss="modal" id="closeModal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>

            <div class="modal-body">
               <div class="row">


                  <div class="col-md-4">
                     <div class="card" style="width: 18rem;">
                        <img id="pimage" src="" class="card-img-top" alt=""
                           style="height: 200px; width: 200px;">
                     </div>
                  </div><!-- // end col md -->


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


                  <div class="col-md-4">
                     <div class="form-group">

                        <label for="pcolor">Choose Color</label>
                        <select class="form-control" id="pcolor"></select>

                     </div>

                     <div class="form-group" id="sizeArea">

                        <label for="psize">Choose Size</label>
                        <select class="form-control" id="psize"></select>

                     </div>

                     <div class="form-group">
                        <label for="pqty">Quantity</label>
                        <input type="number" class="form-control" id="pqty" value="1" min="1">
                     </div>
                     <input type="hidden" id="product_id">
                     <button type="submit" id="addToCartBtn" onclick="addToCart()" class="btn btn-primary mb-2">Add
                        to Cart</button>
                  </div><!-- // end col md -->
               </div>
            </div>
         </div>
      </div>
   </div>
   <!------------------------------ End- Product view with Modal ------------------>

   <!------------------------------start-script- -- Product view with Modal ------------------>
   <script type="text/javascript">
      $.ajaxSetup({
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
      })

      // Start Product View with Modal 
      function ProductViewAjax(id) {
         $.ajax({
            type: 'GET',
            url: '/product/view/modal/' + id,
            dataType: 'json',
            success: function(data) {

               $('#pimage').attr('src', '/' + data.product.product_thumbnail);
               $('#pname').text(data.product.product_name_en);
               $('#pcode').text(data.product.product_code);
               $('#pcategory').text(data.category_name_en);
               $('#pbrand').text(data.brand_name_en);
               $('#product_id').val(data.product.id);
               $('#pqty').val(1);

               if (data.product.product_qty > 0) {
                  $('#pstock')
                     .text('Available')
                     .css({
                        'background-color': 'green',
                        'color': 'white',
                        'padding': '3px 8px',
                        'border-radius': '5px'
                     });
                  $('#addToCartBtn').show();
               } else {
                  $('#pstock')
                     .text('Out of stock')
                     .css({
                        'background-color': 'red',
                        'color': 'white',
                        'padding': '3px 8px',
                        'border-radius': '5px'
                     });
                  $('#addToCartBtn').hide();
               }

               if (data.product.discount_price == null) {
                  $('#pprice').text('$' + data.product.selling_price);
                  $('#oldprice').text('');
               } else {
                  $('#pprice').text('$' + data.product.discount_price);
                  $('#oldprice').text('$' + data.product.selling_price);
               }

               if (data.product.product_size_en == null) {
                  $('#sizeArea').hide();
               } else {
                  $('#sizeArea').show();
                  $('#psize').empty();
                  $.each(data.size, function(key, value) {
                     $('#psize').append('<option value="' + value + '">' + value + '</option>');
                  });
               }


               $('#pcolor').empty();
               $.each(data.color, function(key, value) {
                  $('#pcolor').append('<option value="' + value + '">' + value + '</option>');
               });

               $('#psize').empty();
               $.each(data.size, function(key, value) {
                  $('#psize').append('<option value="' + value + '">' + value + '</option>');
               });
            }
         });
      } // End Product view with Modal

      // Start Add to Cart Product Modal
      function addToCart() {

         var product_name = $('#pname').text();
         var id = $('#product_id').val();
         var color = $('#pcolor option:selected').text();
         var size = $('#psize option:selected').text();
         var quantity = $('#pqty').val();

         $.ajax({
            type: "POST",
            dataType: 'json',
            data: {
               color: color,
               size: size,
               quantity: quantity,
               product_name: product_name,
               _token: '{{ csrf_token() }}'
            },
            url: "/cart/data/store/" + id,
            success: function(data) {
               miniCart()
               $('#closeModal').click();
               // Start Message 
               const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  icon: 'success',
                  showConfirmButton: false,
                  timer: 3000
               })
               if ($.isEmptyObject(data.error)) {
                  Toast.fire({
                     type: 'success',
                     title: data.success
                  })

               } else {
                  Toast.fire({
                     type: 'error',
                     title: data.error
                  })

               }
            }
            // End Message 
         });
      }
      // End Add to Cart Product Modal-------------
   </script>
   <!------------------------------End-script---   Product view with Modal ------------------>

   {{-- //---------Start Add to mini Cart -------------------// --}}
   <script type="text/javascript">
      function miniCart() {
         $.ajax({
            type: 'GET',
            url: '/product/mini/cart',
            dataType: 'json',
            success: function(response) {
               $('span[id="cartSubTotal"]').text(response.cartTotal);
               $('#cartQty').text(response.cartQty);
               var miniCart = ""

               $.each(response.carts, function(key, value) {
                  miniCart += `<div class="cart-item product-summary">
                           <div class="row">
                              <div class="col-xs-4">
                                 <div class="image"> <a href="/product/details/${value.id}"><img
                                          src="/${value.options.image}" alt=""></a>
                                 </div>
                              </div>
                              <div class="col-xs-7">
                                 <h3 class="name"><a href="/product/details/${value.id}">
                                       @if (session()->get('language') == 'hindi')
                                          सरल उत्पाद
                                       @else
                                          ${value.name}
                                       @endif
                                    </a></h3>
                                 <div class="price">${value.price} * ${value.qty}</div>
                              </div>
                              <div class="col-xs-1 action">
                                  <button type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)">
                                    <i class="fa fa-trash"></i></button>
                              </div>
                           </div>
                        </div>
                        <!-- /.cart-item -->
                        <div class="clearfix"></div>
                        <hr>`
               });

               $('#miniCart').html(miniCart);
            }
         })

      }

      miniCart();
      //---------end- Add to mini Cart -----------

      /// mini cart remove Start 
      function miniCartRemove(rowId) {
         $.ajax({
            type: 'GET',
            url: '/minicart/product-remove/' + rowId,
            dataType: 'json',
            success: function(data) {
               miniCart();

               // Start Message 
               const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',

                  showConfirmButton: false,
                  timer: 3000
               })
               if ($.isEmptyObject(data.error)) {
                  Toast.fire({
                     type: 'success',
                     icon: 'success',
                     title: data.success
                  })

               } else {
                  Toast.fire({
                     type: 'error',
                     icon: 'error',
                     title: data.error
                  })

               }

               // End Message 

            }
         });

      }

      //  end mini cart remove 
   </script>
   {{-- //--------- end- Add to mini Cart -------------------// --}}

   <!--------------  /// Start Add Wishlist Page  //// ----------->
   <script type="text/javascript">
      function addToWishList(product_id) {
         $.ajax({
            type: "POST",
            dataType: 'json',
            url: "/user/add-to-wishlist/" + product_id,
            data: {
               _token: "{{ csrf_token() }}"
            },
            success: function(data) {

               // Start Message 
               const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  timer: 3000
               });

               if ($.isEmptyObject(data.error)) {
                  Toast.fire({
                     icon: 'success',
                     title: data.success
                  });

               } else {
                  Toast.fire({
                     icon: 'error',
                     title: data.error
                  });
               }
               // End Message 
            }
         });
      }
   </script>
   <!----------------  /// End- Add Wishlist Page  //// -------------  -->

   <!----------------  ///start- load Wishlist products  //// -------------  -->
   <script type="text/javascript">
      function WishList() {
         $.ajax({
            type: 'GET',
            url: '/user/get-WishList-product',
            dataType: 'json',
            data: {
               _token: "{{ csrf_token() }}"
            },
            success: function(response) {

               var rows = ""
               $.each(response, function(key, value) {
                  rows += `<tr>
                    <td class="col-md-2"><img src="/${value.product.product_thumbnail} " alt="image"></td>
                    <td class="col-md-7">
                       <div class="product-name"><a href="#">${value.product.product_name_en}</a></div>
                       
                       <div class="price">
                        ${value.product.discount_price == null
                            ? `${value.product.selling_price}`
                            :
                            `${value.product.discount_price} <span>${value.product.selling_price}</span>`
                        }
                        </div>
                    </td>
        <td class="col-md-2">
            <button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="${value.product_id}" onclick="ProductViewAjax(this.id)"> Add to Cart </button>
        </td>
        <td class="col-md-1 close-btn">
            <button type="submit" class="" id="${value.id}" onclick="wishlistRemove(this.id)"><i class="fa fa-times"></i></button>
        </td>
                </tr>`
               });

               $('#wishList').html(rows);
            }
         })

      }
      WishList();

      ///  Wishlist remove Start 
      function wishlistRemove(id) {
         $.ajax({
            type: 'GET',
            url: '/user/wishlist-remove/' + id,
            dataType: 'json',
            success: function(data) {
               WishList();

               // Start Message 
               const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  timer: 3000
               })
               if ($.isEmptyObject(data.error)) {
                  Toast.fire({
                     type: 'success',
                     icon: 'success',
                     title: data.success
                  })
               } else {
                  Toast.fire({
                     type: 'error',
                     icon: 'error',
                     title: data.error
                  })
               }
               // End Message 
            }
         });
      }
      // End Wishlist remove   
   </script>
   <!----------------  ///End- load Wishlist products  //// -------------  -->

   <!-- ///start- Load My Cart /// -->
   <script type="text/javascript">
      function myCart() {
         $.ajax({
            type: 'GET',
            url: '/user/get-mycart-product',
            dataType: 'json',
            data: {
               _token: "{{ csrf_token() }}"
            },
            success: function(response) {
               var rows = ""
               $.each(response.carts, function(key, value) {
                  rows += `<tr>
        <td class="col-md-2"><img src="/${value.options.image} " alt="imga" style="width:60px; height:60px;"></td>
        <td class="col-md-2">
            <div class="product-name"><a href="#">${value.name}</a></div>
            <div class="price"> 
                            ${value.price}
                        </div>
                    </td>
                     <td class="col-md-2">
            <strong>${value.options.color} </strong> 
            </td>

         <td class="col-md-2">
          ${value.options.size == null
            ? `<span> .... </span>`
            :
          `<strong>${value.options.size} </strong>` 
          }           
            </td>

           <td class="col-md-2">
              ${value.qty > 1

            ? `<button type="submit" class="btn btn-danger btn-sm" id="${value.rowId}" onclick="cartDecrement(this.id)" >-</button> `

            : `<button type="submit" class="btn btn-danger btn-sm" disabled >-</button> `
            } 
            <strong>${value.qty} </strong> 
            <button type="submit" class="btn btn-success btn-sm" id="${value.rowId}" onclick="cartIncrement(this.id)" >+</button>

            </td>

             <td class="col-md-2">
            <strong>$${value.subtotal} </strong> 
            </td>
        <td class="col-md-1 close-btn">
            <button type="submit" class="" id="${value.rowId}" onclick="myCartRemove(this.id)"><i class="fa fa-times"></i></button>
        </td>
                </tr>`
               });
               $('#mycart').html(rows);
            }
         })
      }
      myCart();

      ///  Wishlist remove Start 
      function myCartRemove(rowId) {
         $.ajax({
            type: 'GET',
            url: '/user/mycart-remove/' + rowId,
            dataType: 'json',
            success: function(data) {
               $('#couponField').show();
               couponCalculation();
               $('#coupon_name').val('');
               myCart();
               miniCart();
               // Start Message 
               const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  timer: 3000
               })
               if ($.isEmptyObject(data.error)) {
                  Toast.fire({
                     type: 'success',
                     icon: 'success',
                     title: data.success
                  })
               } else {
                  Toast.fire({
                     type: 'error',
                     icon: 'error',
                     title: data.error
                  })
               }
               // End Message 
            }
         });
      }
      // End Wishlist remove   

      // -------- CART INCREMENT --------//
      function cartIncrement(rowId) {
         $.ajax({
            type: 'GET',
            url: "/cart-increment/" + rowId,
            dataType: 'json',
            success: function(data) {
               couponCalculation();
               myCart();
               miniCart();
            }
         });
      }
      // ---------- END CART INCREMENT -----///

      // -------- CART Decrement  --------//
      function cartDecrement(rowId) {
         $.ajax({
            type: 'GET',
            url: "/cart-decrement/" + rowId,
            dataType: 'json',
            success: function(data) {
               couponCalculation();
               myCart();
               miniCart();
            }
         });
      }
      // ---------- END CART Decrement -----///
   </script>
   <!-- //End Load My cart / -->

   <!--  //////////////// =========== Coupon Apply Start ================= ////  -->
   <script type="text/javascript">
      function applyCoupon() {
         var coupon_name = $('#coupon_name').val();
         $.ajax({
            type: 'POST',
            dataType: 'json',
            data: {
               coupon_name: coupon_name
            },
            url: "{{ url('/coupon/coupon-apply') }}",
            success: function(data) {

               // Start Message 
               const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  timer: 3000
               })
               if ($.isEmptyObject(data.error)) {
                  $('#couponField').hide();
                  couponCalculation();
                  Toast.fire({
                     type: 'success',
                     icon: 'success',
                     title: data.success
                  })
               } else {
                  Toast.fire({
                     type: 'error',
                     icon: 'error',
                     title: data.error
                  })
               }
               // End Message 
            }
         })
      }


      function couponCalculation() {
         $.ajax({
            type: 'GET',
            url: "{{ url('/coupon/coupon-calculation') }}",
            dataType: 'json',
            success: function(data) {
               if (data.total) {
                  $('#couponCalField').html(
                     `<tr>
                <th>
                    <div class="cart-sub-total">
                        Subtotal<span class="inner-left-md">$ ${data.total}</span>
                    </div>
                    <div class="cart-grand-total">
                        Grand Total<span class="inner-left-md">$ ${data.total}</span>
                    </div>
                </th>
            </tr>`
                  )
               } else {
                  $('#couponCalField').html(
                     `<tr>
        <th>
            <div class="cart-sub-total">
                Subtotal<span class="inner-left-md">$ ${data.subtotal}</span>
            </div>
            <div class="cart-sub-total">
                Coupon<span class="inner-left-md">$ ${data.coupon_name}</span>
                <button type="submit" onclick="couponRemove()"><i class="fa fa-times"></i>  </button>
            </div>
             <div class="cart-sub-total">
                Discount Amount<span class="inner-left-md">$ ${data.discount_amount}</span>
            </div>
            <div class="cart-grand-total">
                Grand Total<span class="inner-left-md">$ ${data.total_amount}</span>
            </div>
        </th>
            </tr>`
                  )
               }
            }
         })
      }
      couponCalculation();
   </script>
   <!--  //////////////// =========== End Coupon Apply  ================= ////  -->

   <!--  //////////////// =========== Start Coupon Remove================= ////  -->
   <script type="text/javascript">
      function couponRemove() {
         $.ajax({
            type: 'GET',
            url: "{{ url('/coupon/coupon-remove') }}",
            dataType: 'json',
            success: function(data) {

               // Start Message 
               const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  timer: 3000
               })
               if ($.isEmptyObject(data.error)) {
                  $('#couponField').show();
                  couponCalculation();
                  $('#coupon_name').val('');
                  Toast.fire({
                     type: 'success',
                     icon: 'success',
                     title: data.success
                  })
               } else {
                  Toast.fire({
                     type: 'error',
                     icon: 'error',
                     title: data.error
                  })
               }
               // End Message 
            }
         });
      }
      //  <!-- //////////////// =========== End Coupon Apply Start ================= ////  -->
   </script>
   <!--  //////////////// =========== End Coupon Remove================= ////  -->

   <x-toastr />
</body>

</html>
