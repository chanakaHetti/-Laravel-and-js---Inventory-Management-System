<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGinItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gin_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('inventory_item_id')->unsigned();
            $table->decimal('gin_quantity',10,2);
            $table->integer('gin_id')->unsigned();
            $table->string('gin_item_remarks',200);
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
        Schema::dropIfExists('gin__items');
    }
}
