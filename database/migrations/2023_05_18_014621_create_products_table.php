<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->integer('sku')->unique();
            $table->string('name', 255);
            $table->bigInteger('productType_id')->unsigned();
            $table->decimal('price', 8,2);
            $table->text('description')->nullable();
            $table->integer('size_mb')->nullable();
            $table->decimal('weight_kg', 8, 2)->nullable();
            $table->string('dimensions')->nullable();
            $table->timestamps();
            $table->dateTime('deleted_at')->nullable();

            $table->foreign('productType_id')->references('id')->on('product_types');
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
