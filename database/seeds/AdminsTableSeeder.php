<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admins')->delete();
        
        \DB::table('admins')->insert(array (
            0 =>
            array (
                'id' => '1',
                'name' => 'John',
                'email' => 'John@passwordis.onethroughsixindigits',
                'sAMAccountName' => 'John@passwordis.onethroughsixindigits',
                'password' => '$2y$10$aDgIdAG0OzDwkX4/bZAVBeuxA0pjf3uTAQxk32d0FCo4DxAYTLhkK',
                'remember_token' => 'iy5TzXRTFA8cEz309jJ3EfRl3JG2FglsJCHzG1WoohDa7qLbwaDTw6wKX6KN',
                'created_at' => '2017-06-21 05:07:30.0',
                'updated_at' => '2017-06-21 05:07:30.0',
                'isworkerid' => '1',
            ),
            1 =>
            array (
                'id' => '7',
                'name' => 'Adminaccount',
                'email' => 'Admin@test.test',
                'sAMAccountName' => null,
                'password' => '$2y$10$aDgIdAG0OzDwkX4/bZAVBeuxA0pjf3uTAQxk32d0FCo4DxAYTLhkK',
                'remember_token' => '4JCbjKilP6XOpCqPjZGAjxaFOVrG4bn6RyhezXszeWF3wfpTrYOthAGRHLRD',
                'created_at' => '2017-08-01 19:15:14.0',
                'updated_at' => '2017-08-01 19:15:14.0',
                'isworkerid' => '1',
            ),
        ));
    }
}
