<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('item_name',45);
            $table->string('item_description',200);
            $table->integer('sub_category_id')->unsigned();
            $table->integer('item_category_id')->unsigned();
            $table->string('item_unit',15);
            $table->timestamps();

            // $table->foreign('sub_category_id')
            // ->references('sub_category_id')
            // ->on('sub_categories');

            // $table->foreign('item_category_id')
            // ->references('item_category_id')
            // ->on('item_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventory_items');
    }
}
