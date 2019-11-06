<?php

use Illuminate\Database\Seeder;

class ProjecttypeTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('projecttype')->delete();
        
       /*  \DB::table('projecttype')->insert(array (
            0 =>
            array (
                'id' => '1',
                'name' => 'intern',
            ),
            1 =>
            array (
                'id' => '2',
                'name' => 'extern',
            ),
            2 =>
            array (
                'id' => '3',
                'name' => 'drittmittelfinanziert',
            ),
        )); */
    }
}
