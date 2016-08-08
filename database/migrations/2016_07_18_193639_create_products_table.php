<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->boolean('featured');
            $table->string('slug');
            $table->integer('brand_id');
            $table->string('gender');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->integer('price');
            $table->integer('discount_rate');
            $table->text('description');
            $table->string('color');
            $table->string('frame');
            $table->string('material');
            $table->string('lens_color');
            $table->string('made_in');
            $table->string('front_img');
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
        Schema::drop('products');
    }
}
