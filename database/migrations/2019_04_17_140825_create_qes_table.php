<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qes', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('workerid');
            $table->integer('contractmodelid');
            $table->integer('quarterid');
            $table->integer('confirmedstate')->nullable();
            $table->decimal('desiredstate', 5)->nullable();
            $table->decimal('actualstate', 5)->nullable();
            $table->integer('projectid');
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
        Schema::drop('qes');
    }
}
