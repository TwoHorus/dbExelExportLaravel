<?php

use Illuminate\Database\Seeder;

class AcceptedTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('accepted')->delete();
    }
}
