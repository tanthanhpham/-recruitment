<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupportTreatment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('support_treatment', function (Blueprint $table) {
            $table->unsignedBigInteger('skin_id');
            $table->unsignedBigInteger('product_id');
            $table->primary(['skin_id', 'product_id']);
            $table->foreign('skin_id')->references('id')->on('skinproblems');
            $table->foreign('product_id')->references('id')->on('product');
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
        Schema::dropIfExists('support_treatment');
    }
}
