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
            $table->string('name' , 256);
            $table->float('sale_price' , 8 , 2);
            $table->integer('quantity');
            $table->unsignedBigInteger('code');
            $table->boolean('status')->comment('1 => active , 0 => not active')->default(1);
            $table->string('description' , 256);
            $table->float('purchase_price' , 8 , 2);
            $table->foreignId('seller_id')->constrained()->restrictOnDelete()->restrictOnUpdate();
            $table->foreignId('category_id')->constrained()->restrictOnDelete()->cascadeOnUpdate();
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
