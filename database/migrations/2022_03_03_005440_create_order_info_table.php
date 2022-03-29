<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_info', function (Blueprint $table) {
            $table->bigIncrements('id');  
            $table->string('session_id', 255);         
            $table->string('first_name', 255);
            $table->string('last_name', 255);            
            $table->string('phone', 20);
            $table->string('email', 100);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_info');
    }
}
