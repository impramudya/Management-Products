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
        Schema::create('purchase', function (Blueprint $table) {
            $table->increments('purchase_id');
            $table->integer('products_id')->unsigned()->index();
            $table->foreign('products_id')->references('products_id')->on('Products')->onDelete('cascade');
            // $table->foreignId('products_id');
            $table->integer('supplier_id')->unsigned()->index();
            $table->foreign('supplier_id')->references('supplier_id')->on('Supplier')->onDelete('cascade');
            // $table->foreignId('supplier_id');
            $table->integer('stock');
            $table->text('comment');
            $table->timestamps();
            $table->date('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase');
    }
};
