<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGrnItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grn_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('inventory_item_id')->unsigned();
            $table->decimal('grn_quantity',10,2);
            $table->integer('grn_id')->unsigned();
            $table->string('grn_item_remarks',200);
            $table->timestamps();


            // $table->foreign('grn_id')
            // ->references('grn_id')
            // ->on('grns');

            // $table->foreign('item_id')
            // ->references('item_id')
            // ->on('inventory_items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grn__items');
    }
}
