<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataTable extends Migration
{    
    /**
     * Run the migrations.
     *
     * @return void
     */
   
    public function up()
    {
        Schema::create('data', function (Blueprint $table) {
            //schema to regenerate the table
            $table->increments('id');
            $table->longText('num_array');
            $table->timestamp('added_on');
            if (Schema::hasTable('users'))
            {
                $table->bigInteger('user_id')->unsigned();
                $table->foreign('user_id')->references('id')->on('users');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data');
    }
}
