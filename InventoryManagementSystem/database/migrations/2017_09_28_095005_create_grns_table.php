<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGrnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grns', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('supplier_id')->unsigned();
            $table->string('grn_date',15);
            $table->string('sup_name',200);
            $table->string('sup_address',200);
            $table->string('sup_city',100);
            $table->string('grn_remarks',200);
            $table->timestamps();

            // $table->foreign('sup_id')
            // ->references('sup_id')
            // ->on('suppliers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grns');
    }
}
