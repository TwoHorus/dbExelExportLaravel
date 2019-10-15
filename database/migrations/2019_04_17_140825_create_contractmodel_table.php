<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContractmodelTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contractmodel', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name')->nullable();
            $table->decimal('manhoursinamonth', 5);
            $table->float('manmonthsinaquarter', 12, 0);
            $table->decimal('timescale', 5)->nullable();
            $table->string('created_at', 50)->nullable();
            $table->string('updated_at', 50)->nullable();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('contractmodel');
    }
}
