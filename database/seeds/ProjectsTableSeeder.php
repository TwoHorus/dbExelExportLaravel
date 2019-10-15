<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class ProjectsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        
        $kt = App\Kostentraeger::all()->pluck('id')->toArray();

        $faker = Faker::create();

        \DB::table('projects')->delete();
        
        \DB::table('projects')->insert(array (
            0 =>
            array (
                'name' => substr($faker->hexcolor, 1),
                'shortdescription' => null,
                'projecttypeid' => $faker->numberBetween(0, 3),
                'ktid' => $faker->randomElement($kt),
            ),
        1 =>
            array (
                'name' => substr($faker->hexcolor, 1),
                'shortdescription' => null,
                'projecttypeid' => $faker->numberBetween(0, 3),
                'ktid' => $faker->randomElement($kt),
            ),
        2 =>
            array (
                'name' => substr($faker->hexcolor, 1),
                'shortdescription' => null,
                'projecttypeid' => $faker->numberBetween(0, 3),
                'ktid' => $faker->randomElement($kt),
            ),
        3 =>
            array (
                'name' => substr($faker->hexcolor, 1),
                'shortdescription' => null,
                'projecttypeid' => $faker->numberBetween(0, 3),
                'ktid' => $faker->randomElement($kt),
            ),

        ));
    }
}
