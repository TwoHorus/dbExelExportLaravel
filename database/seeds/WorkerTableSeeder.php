<?php

use Illuminate\Database\Seeder;

class WorkerTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('worker')->delete();
        
        /* \DB::table('worker')->insert(array (
            0 =>
            array (
                'id' => '38',
                'lastname' => 'Test',
                'firstname' => 'Vorname',
                'email' => 'vorname@firma.com',
                'teamid' => '10',
                'contractmodelid' => null,
            ),
        )); */
    }
}
