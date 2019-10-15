<?php

use Illuminate\Database\Seeder;

class QesgroupTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('qesgroup')->delete();
        
        \DB::table('qesgroup')->insert(array (
            0 =>
            array (
                'id' => '0',
                'accesslevel' => '0',
                'name' => 'guest',
            ),
            1 =>
            array (
                'id' => '1',
                'accesslevel' => '1',
                'name' => 'Standard',
            ),
            2 =>
            array (
                'id' => '3',
                'accesslevel' => '3',
                'name' => 'Teamleiter',
            ),
            3 =>
            array (
                'id' => '4',
                'accesslevel' => '5',
                'name' => 'Abteilungsleitung',
            ),
            4 =>
            array (
                'id' => '5',
                'accesslevel' => '10',
                'name' => 'Administrator',
            ),
            5 =>
            array (
                'id' => '7',
                'accesslevel' => '7',
                'name' => 'Verwaltung',
            ),
        ));
    }
}
