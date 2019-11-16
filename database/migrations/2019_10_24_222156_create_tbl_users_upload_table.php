<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblUsersUploadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_users_upload', function (Blueprint $table) {
            $table->increments('users_upload_id');
            $table->string('customer_id');
            $table->string('users_product_name');
            $table->string('users_seller_name');
            $table->string('users_seller_phone');
            $table->string('users_image_front');
            $table->string('users_image_back');
            $table->string('users_product_description');
            $table->string('users_product_condition');
            
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
        Schema::dropIfExists('tbl_users_upload');
    }
}
