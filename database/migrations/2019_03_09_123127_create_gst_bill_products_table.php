<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGstBillProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gst_bill_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('bill_id')->unsigned();
            $table->string('item');
            $table->string('hsn');
            $table->string('amount');
            $table->string('discount');
            $table->string('sgst');
            $table->string('cgst');
            $table->string('total');
            $table->timestamps();
        });

        Schema::table('gst_bill_products', function (Blueprint $table){
            $table->foreign('bill_id')->references('id')->on('gst_bills');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gst_bill_products');
    }
}
