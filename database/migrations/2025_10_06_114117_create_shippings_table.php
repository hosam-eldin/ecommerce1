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
        Schema::create('shippings', function (Blueprint $table) {
            $table->id();


            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')
                ->references('id')->on('orders')
                ->onDelete('cascade');


            $table->unsignedBigInteger('division_id');
            $table->foreign('division_id')
                ->references('id')->on('ship_divisions')
                ->onDelete('cascade');


            $table->unsignedBigInteger('district_id');
            $table->foreign('district_id')
                ->references('id')->on('ship_districts')
                ->onDelete('cascade');


            $table->unsignedBigInteger('state_id');
            $table->foreign('state_id')
                ->references('id')->on('ship_states')
                ->onDelete('cascade');

            $table->string('shipping_name');
            $table->string('shipping_email');
            $table->string('shipping_phone');
            $table->integer('post_code');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shippings');
    }
};
