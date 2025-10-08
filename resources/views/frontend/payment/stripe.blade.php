@extends('frontend.master')
@section('title', 'Stripe Payment Page')

@section('content')
   <style>
      .StripeElement {
         box-sizing: border-box;
         height: 40px;
         padding: 10px 12px;
         border: 1px solid transparent;
         border-radius: 4px;
         background-color: white;
         box-shadow: 0 1px 3px 0 #e6ebf1;
         transition: box-shadow 150ms ease;
      }

      .StripeElement--focus {
         box-shadow: 0 1px 3px 0 #cfd7df;
      }

      .StripeElement--invalid {
         border-color: #fa755a;
      }
   </style>

   <div class="container">
      <div class="row">
         <div class="col-md-6">
            <div class="checkout-progress-sidebar">
               <h4>Your Shopping Amount</h4>
               <hr>
               @if (Session::has('coupon'))
                  <p><strong>SubTotal:</strong> ${{ $cartTotal }}</p>
                  <p><strong>Coupon:</strong> {{ session('coupon')['coupon_name'] }}
                     ({{ session('coupon')['coupon_discount'] }}%)</p>
                  <p><strong>Discount:</strong> ${{ session('coupon')['discount_amount'] }}</p>
                  <p><strong>Grand Total:</strong> ${{ session('coupon')['total_amount'] }}</p>
               @else
                  <p><strong>SubTotal:</strong> ${{ $cartTotal }}</p>
                  <p><strong>Grand Total:</strong> ${{ $cartTotal }}</p>
               @endif
            </div>
         </div>

         <div class="col-md-6">
            <form action="{{ route('stripe.order') }}" method="POST" id="payment-form">
               @csrf

               <input type="hidden" name="name" value="{{ $data['shipping_name'] }}">
               <input type="hidden" name="email" value="{{ $data['shipping_email'] }}">
               <input type="hidden" name="phone" value="{{ $data['shipping_phone'] }}">
               <input type="hidden" name="post_code" value="{{ $data['post_code'] }}">
               <input type="hidden" name="division_id" value="{{ $data['division_id'] }}">
               <input type="hidden" name="district_id" value="{{ $data['district_id'] }}">
               <input type="hidden" name="state_id" value="{{ $data['state_id'] }}">
               <input type="hidden" name="notes" value="{{ $data['notes'] }}">

               <input type="hidden" name="payment_method_id" id="payment_method_id">

               <label for="card-element">Credit or Debit Card</label>
               <div id="card-element"></div>
               <div id="card-errors" role="alert" class="text-danger mt-2"></div>
               <br>

               <button class="btn btn-primary">Submit Payment</button>
            </form>
         </div>
      </div>
   </div>

   <script src="https://js.stripe.com/v3/"></script>
   <script>
      const stripe = Stripe("{{ env('STRIPE_KEY') }}");
      const elements = stripe.elements();
      const card = elements.create("card");
      card.mount("#card-element");

      const form = document.getElementById("payment-form");
      form.addEventListener("submit", async (e) => {
         e.preventDefault();

         const {
            paymentMethod,
            error
         } = await stripe.createPaymentMethod({
            type: "card",
            card: card,
         });

         if (error) {
            document.getElementById("card-errors").textContent = error.message;
         } else {
            document.getElementById("payment_method_id").value = paymentMethod.id;
            form.submit();
         }
      });
   </script>
@endsection
