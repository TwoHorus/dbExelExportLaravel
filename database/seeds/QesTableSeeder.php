<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class QesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        
       
       // $faker = Faker::create();


        \DB::table('qes')->delete();
        
     /*   \DB::table('qes')->insert(array (
            0 =>
            array (
                'id' => '22',
                'workerid' => $faker->randomElement($workers),
                'contractmodelid' => '28',
                'quarterid' => '29',
                'confirmedstate' => '1',
                'desiredstate' => '10',
                'actualstate' => '10',
                'projectid' => '26',
            ),
        ));*/
    }
}
