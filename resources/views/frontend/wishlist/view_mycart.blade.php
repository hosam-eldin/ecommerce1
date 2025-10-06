@extends('frontend.master')
@section('title', session()->get('language') == 'hindi' ? 'घर' : 'My-Cart')


@section('content')
   <div class="container">
      <div class="row ">
         <div class="shopping-cart">
            <div class="shopping-cart-table ">
               <div class="table-responsive">
                  <table class="table">
                     <thead>
                        <tr>
                           <th class="cart-romove item">Image</th>
                           <th class="cart-description item">Name</th>
                           <th class="cart-product-name item">Color</th>
                           <th class="cart-edit item">Size</th>
                           <th class="cart-qty item">Quantity</th>
                           <th class="cart-sub-total item">Subtotal</th>
                           <th class="cart-total last-item">Remove</th>
                        </tr>
                     </thead>
                     <tbody id="mycart">


                     </tbody>
                  </table>
               </div>
            </div>
            <!-- /.shopping-cart-table -->
            <div class="col-md-4 col-sm-12 estimate-ship-tax">

            </div>
            <!-- /.estimate-ship-tax -->

            <div class="col-md-4 col-sm-12 estimate-ship-tax">
               @if (Session::has('coupon'))
               @else
                  <table class="table" id="couponField">
                     <thead>
                        <tr>
                           <th>
                              <span class="estimate-title">Discount Code</span>
                              <p>Enter your coupon code if you have one..</p>
                           </th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td>
                              <div class="form-group">
                                 <input type="text" class="form-control unicase-form-control text-input"
                                    id="coupon_name" placeholder="You Coupon.." />
                              </div>
                              <div class="clearfix pull-right">
                                 <button type="submit" onclick="applyCoupon()" class="btn-upper btn btn-primary">
                                    APPLY COUPON
                                 </button>
                              </div>
                           </td>
                        </tr>
                     </tbody>
                     <!-- /tbody -->
                  </table>
                  <!-- /table -->
               @endif
            </div>
            <!-- /.estimate-ship-tax -->

            <div class="col-md-4 col-sm-12 cart-shopping-total">
               <table class="table">
                  <thead id="couponCalField">

                  </thead>
                  <!-- /thead -->
                  <tbody>
                     <tr>
                        <td>
                           <div class="cart-checkout-btn pull-right">
                              <button type="submit" class="btn btn-primary checkout-btn">
                                 PROCCED TO CHEKOUT
                              </button>
                              <span class="">Checkout with multiples address!</span>
                           </div>
                        </td>
                     </tr>
                  </tbody>
                  <!-- /tbody -->
               </table>
               <!-- /table -->
            </div>

         </div>
         <!-- /.row -->
      </div>
   @endsection
