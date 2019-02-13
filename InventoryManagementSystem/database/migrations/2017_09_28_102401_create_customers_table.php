<!-- 
Auther:Shirantha Madusanka
Purpose:Define all fields related to customer model 
-->

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('cus_fname', 100);
            $table->string('cus_lname', 100);
            $table->string('cus_address', 200);
            $table->string('cus_city', 200);
            $table->string('cus_email',200);
            $table->boolean('cus_status');
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
