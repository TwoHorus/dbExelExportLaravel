<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAcceptedTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accepted', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('workerid');
            $table->integer('teamid');
            $table->string('time', 50)->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
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
        Schema::drop('accepted');
    }
}
