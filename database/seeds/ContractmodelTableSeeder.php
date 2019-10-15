<?php

use Illuminate\Database\Seeder;

class ContractmodelTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('contractmodel')->delete();
        
        \DB::table('contractmodel')->insert(array (
            0 =>
            array (
                'id' => '28',
                'name' => 'Vollzeit',
                'manhoursinamonth' => '100',
                'manmonthsinaquarter' => '3.0',
                'timescale' => null,
            ),
            1 =>
            array (
                'id' => '29',
                'name' => 'Teilzeit50',
                'manhoursinamonth' => '50',
                'manmonthsinaquarter' => '3.0',
                'timescale' => null,
            ),
            2 =>
            array (
                'id' => '30',
                'name' => 'Teilzeit75',
                'manhoursinamonth' => '75',
                'manmonthsinaquarter' => '3.0',
                'timescale' => null,
            ),
        ));
    }
}
