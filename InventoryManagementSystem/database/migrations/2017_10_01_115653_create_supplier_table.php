<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupplierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sup_fname', 100);
            $table->string('sup_lname', 100);
            $table->string('sup_address', 200);
            $table->string('sup_city', 100);
            $table->string('sup_email', 100)->unique();
            $table->timestamps();
            $table->boolean('sup_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('suppliers');
    }
}
