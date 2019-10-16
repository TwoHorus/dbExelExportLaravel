<?php

use Illuminate\Database\Seeder;

class QuarterTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('quarter')->delete();
        
       /* \DB::table('quarter')->insert(array (
            0 =>
            array (
                'id' => '29',
                'year' => '2018',
                'quarterenddate' => null,
                'q' => '3',
                'confirmedstate' => '2',
            ),
        ));*/
    }
}
