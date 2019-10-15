<?php

use Illuminate\Database\Seeder;

class WorkerprojectassignTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('workerprojectassign')->delete();
        
        \DB::table('workerprojectassign')->insert(array (
            0 =>
            array (
                'id' => '73',
                'projectid' => '26',
                'workerid' => '44',
                'soll' => null,
            ),
        ));
    }
}
