<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblSaleRegTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_sale_reg', function (Blueprint $table) {
            $table->increments('sale_id');
            $table->string('sale_email');
            $table->string('sale_phone');
            $table->string('location1');
            $table->string('location2');
            $table->string('sale_country');
            $table->string('state');
            $table->string('local');
            $table->string('sale_zip_code');
            $table->integer('agreed_status');
            $table->string('sale_description');
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
        Schema::dropIfExists('tbl_sale_reg');
    }
}
