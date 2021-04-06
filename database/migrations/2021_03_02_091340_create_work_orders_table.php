<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_orders', function (Blueprint $table) {
            $table->id();
            //$table->unsignedBigInteger("w_id");
           // $table->foreign('w_id')->references('id')->on("users");
            $table->string("w_name");
            //$table->string("name");
           // $table->string("phone");
            //$table->string("city");
            $table->string("address");
            $table->boolean("is_finish")->default(0);
            $table->dateTime("start_time");
            $table->dateTime("finish_time")->nullable();
            //$table->json("extra_data")->nullable();
            $table->unsignedBigInteger("last_mod_id");
            $table->foreign('last_mod_id')->references('id')->on("users");
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
        Schema::dropIfExists('work_orders');
    }
}
