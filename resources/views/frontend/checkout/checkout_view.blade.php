@extends('frontend.master')
@section('title')
   My Checkout
@endsection
@section('content')
   <div class="breadcrumb">
      <div class="container">
         <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
               <li><a href="{{ url('/') }}">Home</a></li>
               <li class='active'>Checkout</li>
            </ul>
         </div><!-- /.breadcrumb-inner -->
      </div><!-- /.container -->
   </div><!-- /.breadcrumb -->

   <div class="body-content">
      <div class="container">
         <div class="checkout-box ">
            <div class="row">
               <form class="register-form" method="POST" action="{{ route('checkout.store') }}" role="form">
                  @csrf
                  <div class="col-md-8">
                     <div class="panel-group checkout-steps" id="accordion">
                        <!-- checkout-step-01  -->
                        <div class="panel panel-default checkout-step-01">
                           <!-- panel-heading -->
                           <!-- panel-heading -->
                           <div id="collapseOne" class="panel-collapse collapse in">
                              <!-- panel-body  -->
                              <div class="panel-body">
                                 <div class="row">
                                    <!-- guest-login -->

                                    <div class="col-md-6 col-sm-6 already-registered-login">


                                       <div class="form-group">
                                          <label class="info-title" for="exampleInputEmail1"><b>Shipping Name</b>
                                             <span>*</span></label>
                                          <input type="text" name="shipping_name"
                                             class="form-control unicase-form-control text-input" id="exampleInputEmail1"
                                             placeholder="Full Name" value="{{ Auth::user()->name }}" required="">
                                       </div> <!-- // end form group  -->


                                       <div class="form-group">
                                          <label class="info-title" for="exampleInputEmail1"><b>Email</b>
                                             <span>*</span></label>
                                          <input type="email" name="shipping_email"
                                             class="form-control unicase-form-control text-input" id="exampleInputEmail1"
                                             placeholder="Email" value="{{ Auth::user()->email }}" required="">
                                       </div> <!-- // end form group  -->


                                       <div class="form-group">
                                          <label class="info-title" for="exampleInputEmail1"><b>Phone</b>
                                             <span>*</span></label>
                                          <input type="number" name="shipping_phone"
                                             class="form-control unicase-form-control text-input" id="exampleInputEmail1"
                                             placeholder="Phone" value="{{ Auth::user()->phone }}" required="">
                                       </div> <!-- // end form group  -->


                                       <div class="form-group">
                                          <label class="info-title" for="exampleInputEmail1"><b>Post Code</b>
                                             <span>*</span></label>
                                          <input type="text" name="post_code"
                                             class="form-control unicase-form-control text-input" id="exampleInputEmail1"
                                             placeholder="Post Code">
                                       </div> <!-- // end form group  -->


                                       @if (session('error'))
                                          <div class="alert alert-danger">{{ session('error') }}</div>
                                       @endif
                                    </div>
                                    <div class="col-md-6 col-sm-6 already-registered-login">

                                       <div class="form-group">
                                          <h5><b>Division Select </b> <span class="text-danger">*</span></h5>
                                          <div class="controls">
                                             <select name="division_id" id="division" class="form-control" required="">
                                                <option value="" selected="" disabled="">Select Division
                                                </option>
                                                @foreach ($divisions as $item)
                                                   <option value="{{ $item->id }}">{{ $item->division_name_en }}
                                                   </option>
                                                @endforeach
                                             </select>
                                             @error('division_id')
                                                <span class="text-danger">{{ $message }}</span>
                                             @enderror
                                          </div>
                                       </div> <!-- // end form group -->

                                       <div class="form-group">
                                          <h5><b>District Select</b> <span class="text-danger">*</span></h5>
                                          <div class="controls">
                                             <select name="district_id" id="district" class="form-control" required="">
                                                <option value="" selected="" disabled="">Select District
                                                </option>
                                             </select>
                                             @error('district_id')
                                                <span class="text-danger">{{ $message }}</span>
                                             @enderror
                                          </div>
                                       </div> <!-- // end form group -->

                                       <div class="form-group">
                                          <h5><b>State Select</b> <span class="text-danger">*</span></h5>
                                          <div class="controls">
                                             <select name="state_id" class="form-control" id="state" required="">
                                                <option value="" selected="" disabled="">Select State</option>
                                             </select>
                                             @error('state_id')
                                                <span class="text-danger">{{ $message }}</span>
                                             @enderror
                                          </div>
                                       </div> <!-- // end form group -->

                                       <div class="form-group">
                                          <label class="info-title" for="exampleInputEmail1">Notes <span>*</span></label>
                                          <textarea class="form-control" cols="30" rows="5" placeholder="Notes" name="notes"></textarea>
                                       </div> <!-- // end form group  -->
                                    </div>
                                    <!-- already-registered-login -->
                                 </div>
                              </div>
                              <!-- panel-body  -->
                           </div><!-- row -->
                        </div>
                        <!-- End checkout-step-01  -->
                     </div><!-- /.checkout-steps -->
                  </div>
                  <div class="col-md-4">
                     <!-- checkout-progress-sidebar -->
                     <div class="checkout-progress-sidebar ">
                        <div class="panel-group">
                           <div class="panel panel-default">
                              <div class="panel-heading">
                                 <h4 class="unicase-checkout-title">Your Checkout Progress</h4>
                              </div>
                              <div class="">
                                 <ul class="nav nav-checkout-progress list-unstyled">
                                    @foreach ($carts as $item)
                                       <li>
                                          <strong>Image: </strong>
                                          <img src="{{ asset($item->options->image) }}"
                                             style="height: 50px; width: 50px;">
                                       </li>
                                       <li>
                                          <strong>Qty: </strong>
                                          ({{ $item->qty }})
                                          <strong>Color: </strong>
                                          {{ $item->options->color }}
                                          <strong>Size: </strong>
                                          {{ $item->options->size }}
                                       </li>
                                    @endforeach
                                    <hr>
                                    <li>
                                       @if (Session::has('coupon'))
                                          <strong>SubTotal: </strong> ${{ $cartTotal }}
                                          <hr>
                                          <strong>Coupon Name : </strong> {{ session()->get('coupon')['coupon_name'] }}
                                          ( {{ session()->get('coupon')['coupon_discount'] }} % )
                                          <hr>
                                          <strong>Coupon Discount : </strong>
                                          ${{ session()->get('coupon')['discount_amount'] }}
                                          <hr>
                                          <strong>Grand Total : </strong> ${{ session()->get('coupon')['total_amount'] }}
                                          <hr>
                                       @else
                                          <strong>SubTotal: </strong> ${{ $cartTotal }}
                                          <hr>
                                          <strong>Grand Total : </strong> ${{ $cartTotal }}
                                          <hr>
                                       @endif
                                    </li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- checkout-progress-sidebar -->
                     <!-- checkout-progress-sidebar -->
                     <div class="checkout-progress-sidebar ">
                        <div class="panel-group">
                           <div class="panel panel-default">
                              <div class="panel-heading">
                                 <h4 class="unicase-checkout-title">Select Payment Method</h4>
                              </div>
                              <div class="row">
                                 <div class="col-md-4">
                                    <label for="">Stripe</label>
                                    <input type="radio" name="payment_method" value="stripe">
                                    <img src="{{ asset('frontend/assets/images/payments/4.png') }}">
                                 </div> <!-- end col md 4 -->
                                 <div class="col-md-4">
                                    <label for="">Card</label>
                                    <input type="radio" name="payment_method" value="card">
                                    <img src="{{ asset('frontend/assets/images/payments/3.png') }}">
                                 </div> <!-- end col md 4 -->
                                 <div class="col-md-4">
                                    <label for="">Cash</label>
                                    <input type="radio" name="payment_method" value="cash">
                                    <img src="{{ asset('frontend/assets/images/payments/2.png') }}">
                                 </div> <!-- end col md 4 -->
                              </div> <!-- // end row  -->
                              <hr>
                              <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Payment
                                 Step</button>
                           </div>
                        </div>
                     </div>
                     <!-- checkout-progress-sidebar -->
                  </div>
               </form>
            </div><!-- /.row -->
         </div><!-- /.checkout-box -->

      </div><!-- /.container -->
   </div><!-- /.body-content -->

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

   <script>
      $(document).ready(function() {

         $('select[name="division_id"]').on('change', function() {
            var division_id = $(this).val();

            $('select[name="district_id"]').html(
               '<option value="" selected disabled>Select district</option>');
            $('select[name="state_id"]').html('<option value="" selected disabled>Select state</option>');
            if (division_id) {
               $.ajax({
                  url: '/shipping/get-districts/ajax/' + division_id,
                  type: "GET",
                  dataType: "json",
                  success: function(data) {
                     $.each(data, function(key, value) {
                        $('select[name="district_id"]').append(
                           '<option value="' + value.id + '">' + value.district_name_en +
                           '</option>'
                        );
                     });
                  },
                  error: function() {
                     alert('Failed to load districts!');
                  }
               });
            }
         });
         $('select[name="district_id"]').on('change', function() {
            var district_id = $(this).val();
            $('select[name="state_id"]').html('<option value="" selected disabled>Select state</option>');
            if (district_id) {
               $.ajax({
                  url: '/shipping/get-states/ajax/' + district_id,
                  type: "GET",
                  dataType: "json",
                  success: function(data) {
                     $.each(data, function(key, value) {
                        $('select[name="state_id"]').append(
                           '<option value="' + value.id + '">' + value.state_name_en +
                           '</option>'
                        );
                     });
                  },
                  error: function() {
                     alert('Failed to load states!');
                  }
               });
            }
         });

      });
   </script>
@endsection
