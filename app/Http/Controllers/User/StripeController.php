<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Exception;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;

class StripeController extends Controller
{
    public function StripeOrder(Request $request)
    {
        try {
            DB::beginTransaction();

            $total_amount = Session::has('coupon')
                ? Session::get('coupon')['total_amount']
                : round(Cart::total());

            Stripe::setApiKey(env('STRIPE_SECRET'));


            $paymentIntent = \Stripe\PaymentIntent::create([
                'amount' => $total_amount * 100,
                'currency' => 'usd',
                'description' => 'handaq Online Store Order',
                'metadata' => ['order_id' => uniqid()],
                'payment_method' => $request->payment_method_id,
                'confirm' => true,
                'automatic_payment_methods' => [
                    'enabled' => true,
                    'allow_redirects' => 'never',
                ],
            ]);

            if ($paymentIntent->status === 'succeeded') {
                $order_id = Order::insertGetId([
                    'user_id' => Auth::id(),
                    'division_id' => $request->division_id,
                    'district_id' => $request->district_id,
                    'state_id' => $request->state_id,
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'post_code' => $request->post_code,
                    'notes' => $request->notes,
                    'payment_type' => 'Stripe',
                    'payment_method' => 'card',
                    'payment_status' => 'Pending',
                    'transaction_id' => $paymentIntent->id,
                    'currency' => $paymentIntent->currency,
                    'amount' => $total_amount,
                    'order_number' => 'ORD-' . mt_rand(100000, 999999),
                    'invoice_no' => 'INV-' . mt_rand(10000000, 99999999),
                    'order_date' => Carbon::now()->format('Y-m-d'),
                    'order_month' => Carbon::now()->format('F'),
                    'order_year' => Carbon::now()->format('Y'),
                    'status' => 'Pending',
                    'created_at' => Carbon::now(),
                ]);

                // Start Send Email 
                $invoice = Order::findOrFail($order_id);
                $data = [
                    'invoice_no' => $invoice->invoice_no,
                    'amount' => $total_amount,
                    'name' => $invoice->name,
                    'email' => $invoice->email,
                ];

                Mail::to($request->email)->send(new OrderMail($data));
                // End Send Email 

                foreach (Cart::content() as $cart) {
                    OrderItem::insert([
                        'order_id' => $order_id,
                        'product_id' => $cart->id,
                        'color' => $cart->options->color,
                        'size' => $cart->options->size,
                        'qty' => $cart->qty,
                        'price' => $cart->price,
                        'created_at' => Carbon::now(),
                    ]);
                }

                Session::forget('coupon');
                Cart::destroy();

                DB::commit();
                return redirect()->route('dashboard')->with('success', '✅ Your order has been placed successfully!');
            }

            DB::rollBack();
            return redirect()->route('checkout')->with('error', '⚠️ Payment not completed. Please try again.');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('checkout')->with('error', 'Stripe Error: ' . $e->getMessage());
        }
    }
}
