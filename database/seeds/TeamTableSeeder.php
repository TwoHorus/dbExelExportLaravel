<?php

use Illuminate\Database\Seeder;

class TeamTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('team')->delete();
        
        \DB::table('team')->insert(array (
            0 =>
            array (
                'id' => '2',
                'name' => 'nichtzugewiesen',
            ),
            1 =>
            array (
                'id' => '3',
                'name' => 'falschzugewiesen',
            ),
            2 =>
            array (
                'id' => '4',
                'name' => 'Eins',
            ),
            3 =>
            array (
                'id' => '5',
                'name' => 'Zwei',
            ),
            4 =>
            array (
                'id' => '6',
                'name' => 'Drei',
            ),
            5 =>
            array (
                'id' => '7',
                'name' => 'Vier',
            ),
            6 =>
            array (
                'id' => '9',
                'name' => 'Fünf',
            ),
            7 =>
            array (
                'id' => '10',
                'name' => 'Sechs',
            ),
            8 =>
            array (
                'id' => '11',
                'name' => 'Sieben',
            ),
        ));
    }
}
