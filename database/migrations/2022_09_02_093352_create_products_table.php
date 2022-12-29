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
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('manufacture_id');
            $table->longText('product_short_description');
            $table->longText('product_long_description');
            $table->float('product_price');
            $table->string('product_image')->nullable();
            $table->string('product_size');
            $table->string('product_color');
            $table->integer('publication_status')->nullable()->default(0);
            $table->timestamps();

            $table->foreign('category_id')->references('category_id')->on('categoris')->onDelete('cascade');
            $table->foreign('manufacture_id')->references('id')->on('manufactures')->onDelete('cascade');
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
