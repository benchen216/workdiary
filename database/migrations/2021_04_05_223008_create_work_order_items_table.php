<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("w_id");
            $table->unsignedBigInteger("wi_class");
            $table->unsignedBigInteger("wi");
            $table->unsignedBigInteger("num_before");
            $table->unsignedBigInteger("num_after")->default(0);
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
        Schema::dropIfExists('work_order_items');
    }
}
