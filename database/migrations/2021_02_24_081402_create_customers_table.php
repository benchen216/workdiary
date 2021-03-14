<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string("group");
            $table->string("name");
            $table->string("email")->nullable();
            $table->string("phone");
            $table->string("city")->nullable();
            $table->string("address")->nullable();
            $table->timestamp("last_finish_time")->nullable();
            $table->json("data_extend")->nullable();
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
        Schema::dropIfExists('customers');
    }
}
