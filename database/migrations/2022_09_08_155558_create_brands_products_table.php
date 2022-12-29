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
        Schema::create('brands_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brand_id');
            $table->string('product_name')->nullable();
            $table->longText('description_short')->nullable();
            $table->longText('description_long')->nullable();
            $table->string('product_price')->nullable();
            $table->string('product_image')->nullable();
            $table->string('product_size')->nullable();
            $table->string('product_color')->nullable();
            $table->integer('publication_status')->nullable()->default(0);
            $table->timestamps();
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brands_products');
    }
};
