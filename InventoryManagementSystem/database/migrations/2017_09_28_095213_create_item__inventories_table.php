<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_inventories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('grn_item_id')->unsigned();
            $table->date('inventory_date');
            $table->integer('grn_id')->unsigned();
            $table->integer('inventory_item_id')->unsigned();
            $table->decimal('inventory_quantity',10,2);
            $table->decimal('inventory_balance',10,2);
            $table->timestamps();

            // $table->foreign('grn_item_id')
            // ->references('grn_item_id')
            // ->on('grn_items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item__inventories');
    }
}
