<?php

use Illuminate\Support\Facades\Schema;
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
            $table->longText('productName')->nullable();
            $table->string('category')->nullable();
            $table->longText('type')->nullable();
            $table->string('price')->nullable();
            $table->string('discount')->nullable();
            $table->string('property1')->nullable();
            $table->string('property2')->nullable();
            $table->string('property3')->nullable();
            $table->string('property4')->nullable();
            $table->string('property5')->nullable();
            $table->string('variant1')->nullable();
            $table->string('variant2')->nullable();
            $table->string('variant3')->nullable();
            $table->string('variant4')->nullable();
            $table->string('variant5')->nullable();
            $table->longText('description')->nullable();
            $table->string('keywords')->nullable();
            $table->longText('image1')->nullable();
            $table->longText('image2')->nullable();
            $table->boolean('isTrending')->default(false);
            $table->string('class')->nullable();

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
}
