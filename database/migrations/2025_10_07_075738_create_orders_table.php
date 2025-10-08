<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('division_id')->constrained('ship_divisions')->onDelete('cascade');
            $table->foreignId('district_id')->constrained('ship_districts')->onDelete('cascade');
            $table->foreignId('state_id')->constrained('ship_states')->onDelete('cascade');

            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->integer('post_code')->nullable();
            $table->text('notes')->nullable();

            $table->enum('payment_type', ['COD', 'Stripe', 'Paypal', 'Bank'])->default('COD');
            $table->enum('payment_status', ['Pending', 'Paid', 'Failed', 'Refunded'])->default('Pending');
            $table->string('payment_method')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('currency')->default('EGP');

            $table->decimal('amount', 10, 2);
            $table->decimal('shipping_cost', 8, 2)->default(0);
            $table->decimal('discount', 8, 2)->default(0);

            $table->string('order_number')->unique();
            $table->string('invoice_no')->unique();
            $table->date('order_date');
            $table->string('order_month');
            $table->string('order_year');

            $table->timestamp('confirmed_date')->nullable();
            $table->timestamp('processing_date')->nullable();
            $table->timestamp('picked_date')->nullable();
            $table->timestamp('shipped_date')->nullable();
            $table->timestamp('delivered_date')->nullable();
            $table->timestamp('cancel_date')->nullable();
            $table->timestamp('return_date')->nullable();

            $table->string('return_reason')->nullable();

            $table->enum('status', ['Pending', 'Confirmed', 'Processing', 'Picked', 'Shipped', 'Delivered', 'Cancelled', 'Returned'])->default('Pending');

            $table->timestamps();

            $table->index(['user_id', 'status', 'order_date']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
