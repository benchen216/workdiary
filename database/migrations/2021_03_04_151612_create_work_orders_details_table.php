<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkOrdersDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_orders_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("work_id")->nullable();
            for ($x = 0; $x <= 30; $x++) {
                $table->string("col".strval($x))->nullable();
            }
            $table->unsignedBigInteger("last_mod_id")->nullable();
            #$table->foreign('last_mod_id')->references('id')->on("users");
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
        Schema::dropIfExists('work_orders_details');
    }
}
