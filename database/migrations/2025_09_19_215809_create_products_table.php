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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->foreignId('subcategory_id')->constrained()->onDelete('cascade');
            $table->foreignId('subsubcategory_id')->constrained()->onDelete('cascade');
            $table->string('product_name_en');
            $table->string('product_name_hin');
            $table->string('product_slug_en');
            $table->string('product_slug_hin');
            $table->string('product_code');
            $table->string('product_qty');
            $table->string('product_tags_en');
            $table->string('product_tags_hin');
            $table->string('product_size_en')->nullable();
            $table->string('product_size_hin')->nullable();
            $table->string('product_color_en');
            $table->string('product_color_hin');
            $table->decimal('selling_price');
            $table->decimal('discount_price')->nullable();
            $table->text('short_descp_en');
            $table->text('short_descp_hin');
            $table->text('long_descp_en');
            $table->text('long_descp_hin');
            $table->string('product_thumbnail');
            $table->integer('hot_deals')->nullable();
            $table->integer('featured')->nullable();
            $table->integer('special_offer')->nullable();
            $table->integer('special_deals')->nullable();
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('products');
    }
};
