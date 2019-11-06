<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        /* \DB::table('users')->insert(array (
            0 =>
            array (
                'id' => '50',
                'name' => 'Test Name',
                'username' => 'testname',
                'sAMAccountName' => 'testname',
                'password' => '',
                'remember_token' => 'czjkgV4CizKSNk2vhV6Fpkfmf9a6as7fbkSWc2W8qt3oBK1kmvkCylvvFP51',
                'isworkerid' => '38',
                'email' => null,
            ),
        )); */
    }
}
